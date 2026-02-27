<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AstrologerDetail;
use App\Models\Kundli_Matching_Detail;
use App\Models\KundliDetailsModel;
use App\Models\User;
use App\Models\UserEnquiry;
use App\Models\WalletManagement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Exception;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $managers = User::where(['is_active' => 1])->get();
            return view('users.register', compact('managers'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function user_list(Request $request)
    {
        try {
            $users = User::where(['type' => 'internal', 'is_active' => 1]);
            $name = $request->name;
            $phone = $request->phone;
            $email = $request->email;
            $users->where(function ($query) use ($name, $phone, $email) {
                if ($name) {
                    $query->orWhere('name', 'like', '%' . $name . '%');
                }
                if ($phone) {
                    $query->orWhere('mobile', 'like', '%' . $phone . '%');
                }
                if ($email) {
                    $query->orWhere('email', 'like', '%' . $email . '%');
                }
            });
            $users = $users->get();
            return view('users.user_list', compact('users', 'name', 'phone', 'email'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function user_save(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'mobile' => 'required|string|max:20',
                'gender' => 'required|string',
                'password' => 'required|string|min:6',
            ]);
            $user = new User();
            $user->name = $request->name;
            $user->mobile = $request->mobile;
            $user->gender = $request->gender;
            $user->type = 'internal';
            $user->email = $request->email;
            $user->sub_type = $request->role == '0' ? null : $request->role;
            $user->parent_id = $request->parent == '0' ? null : $request->parent;
            $user->password = Hash::make($request->password);
            if ($request->imageBaseString) {
                $user->avtar = saveUserImage($request->imageBaseString);
            }
            $user->save();
            return back()->with('success', 'User Saved Successfully');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'mobile' => 'required|string|max:20|unique:users,mobile,' . $id,
            ]);

            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->mobile = $request->mobile;
            $user->gender = $request->gender;
            $user->type = 'internal';
            $user->email = $request->email;
            $user->sub_type = $request->role == '0' ? null : $request->role;
            $user->parent_id = $request->parent == '0' ? null : $request->parent;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            if ($request->imageBaseString) {
                $user->avtar = saveUserImage($request->imageBaseString);
            }
            $user->save();
            return back()->with('success', 'User Updated Successfully');
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function get_parent(Request $request)
    {
        try {
            if ($request->role == 'manager') {
                $parent = User::where('sub_type', 'admin')->get();
            } else {
                $parent = User::where('sub_type', 'manager')->get();
            }
            return response()->json(['parent' => $parent], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function reset_password(Request $request)
    {
        try {
            $currentUser = User::find(Auth::user()->id);
            $currentUser->password = Hash::make($request->password);
            $currentUser->save();
            return back()->with('success', 'Password Reset Successfully');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit_user($id)
    {
        try {
            $user = User::find($id);
            return view('users.edit_user', compact('user'));
        } catch (Exception $e) {

        }
    }

    public function logOut()
    {
        $user = Auth::user();
        if ($user) {
            // Update activity_status to 0
            $user->active_status = 0;
            $user->save(); // Save the change to the database
        }

        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function adminDashboard()
    {
        $astrologers = User::where('type', 'astrologer')->where('is_active', '1')->paginate(25);
        $appointments = Appointment::where('user_id', Auth::user()->id)->paginate(25);
        $users = UserEnquiry::paginate(25);
        $monthlyUsers = UserEnquiry::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month')->toArray();
        $monthlyAppointments = Appointment::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month')->toArray();

        $monthlyAstrologers = AstrologerDetail::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month')->toArray();
        $months = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June',
            7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December',
        ];

        $totalUserEnquiry = UserEnquiry::where('type', 'user')->count();
        $totalAstrologerEnquiry = UserEnquiry::where('type', 'astrologer')->count();
        $totalWebsiteEnquiry = UserEnquiry::count();
        $KundliUsers = KundliDetailsModel::count();
        $kundliUsers = Kundli_Matching_Detail::count();
        $kundliMatchingUsers = Kundli_Matching_Detail::count();
        $kundliMatchingUsers = Kundli_Matching_Detail::count();
        $walletAmount = WalletManagement::sum('admin_amount');
        return view('master.main', compact('astrologers', 'users', 'appointments', 'months', 'monthlyUsers', 'monthlyAppointments', 'monthlyAstrologers', 'totalUserEnquiry', 'totalAstrologerEnquiry', 'totalWebsiteEnquiry', 'kundliUsers', 'kundliMatchingUsers', 'walletAmount'));
    }


    public function allAstrologer()
    {
        $users = User::where('type', 'astrologer')->where('is_active', '1')->paginate(25);
        return view('users.dashboard-alluser', compact('users'));
    }

    public function allusers()
    {
        $users = UserEnquiry::paginate(25);
        return view('users.dashboard-alluser', compact('users'));
    }

    public function allAppointment()
    {
        $users = Appointment::where('user_id', Auth::user()->id)->paginate(25);
        return view('users.appointment_list', compact('users'));
    }

    public function appointmentSearch(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $users = Appointment::query();
        $users->where(function ($query) use ($name, $phone, $email) {
            if ($name) {
                $query->where('name', 'like', '%' . $name . '%');
            }
            if ($phone) {
                $query->orWhere('phone', 'like', '%' . $phone . '%');
            }
            if ($email) {
                $query->orWhere('email', 'like', '%' . $email . '%');
            }
        });
        $users = $users->get();
        return view('users.appointment_list', compact('users', 'name', 'phone', 'email'));
    }

    public function notTodayAppointment()
    {
        $users = Appointment::where('user_id', Auth::user()->id)
            ->whereDate('created_at', '<', Carbon::today())
            ->paginate(25);
        return view('users.appointment_list', compact('users'));
    }

}
