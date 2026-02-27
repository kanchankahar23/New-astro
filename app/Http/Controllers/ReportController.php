<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AstrologerDetail;
use App\Models\Payment;
use App\Models\User;
use App\Models\Tag;
use App\Models\WalletManagement;
use App\Models\AstroWithdrawRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function alloverTransection(Request $request)
    {
        try {
            $name = $request->input('name');
            $amount = $request->input('amount');
            $pay_id = $request->input('pay_id');
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');

            // Query to get latest appointments per user
            $latestAppointmentsSubquery = Payment::where('status', 'completed')->selectRaw('MAX(id) as id')
                ->groupBy('user_id');

            // Main query
            $transectionsQuery = Payment::where('status', 'completed')->joinSub($latestAppointmentsSubquery, 'latest_appointments', function ($join) {
                $join->on('payments.id', '=', 'latest_appointments.id');
            });

            // Apply filters
            if ($name) {
                $transectionsQuery->where('payments.name', 'like', '%' . $name . '%');
            }
            if ($amount) {
                $transectionsQuery->where('payments.amount', '=', $amount); // Changed to '=' for numerical comparison
            }
            if ($pay_id) {
                $transectionsQuery->where('payments.razorpay_payment_id', 'like', '%' . $pay_id . '%');
            }
            if ($fromDate && $toDate) {
                $transectionsQuery->whereBetween('payments.date', [$fromDate, $toDate]);
            }

            $transections = $transectionsQuery->orderBy('payments.id', 'DESC')->paginate(20);
            $total = $transections->sum('amount');
            $totalBonus = $transections->sum('bonus');
            $total = number_format($total, 2);
            $totalBonus = number_format($totalBonus, 2);
            $totalDabits = $transections->sum('debits');
            $totalAvaBl = $total - $totalDabits;
            $totalAvaBl = number_format($totalAvaBl, 2);
            return view('reports.all-transection', compact('transections', 'name', 'amount', 'pay_id', 'total', 'totalBonus', 'totalAvaBl'));
        } catch (\Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function allTransectionUser($id)
    {
        $transections = Payment::where('status', 'completed')->where('user_id', $id)->orderBy('id', 'DESC')->paginate(20);
        $total = $transections->sum('amount');
        $total = number_format($total, 2);
        $totalBonus = $transections->sum('bonus');
        $totalBonus = number_format($totalBonus, 2);
        $totalDabits = $transections->sum('debits');
        $total = str_replace(',', '', $total);
        $totalDabits = str_replace(',', '', $totalDabits);
        $totalAvaBl = $total - $totalDabits;
        return view('reports.all-transection', compact('transections', 'total', 'totalBonus', 'totalAvaBl'));
    }

    public function userAppointment(Request $request)
    {
        try {
            $name = $request->input('name');
            $email = $request->input('email');
            $mobile = $request->input('mobile');
            $astrologer = $request->input('astrologer');
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');

            $query = Appointment::query();

            if ($name) {
                $query->where('name', 'like', '%' . $name . '%');
            }
            if ($email) {
                $query->where('email', 'like', '%' . $email . '%');
            }
            if ($mobile) {
                $query->where('mobile', 'like', '%' . $mobile . '%');
            }
            if ($astrologer) {
                $query->where('astrologer_id', $astrologer);
            }
            if ($fromDate && $toDate) {
                $query->whereBetween('preferred_date', [$fromDate, $toDate]);
            }

            $latestAppointmentsSubquery = Appointment::selectRaw('MAX(id) as id')
                ->groupBy('user_id');

            $appointments = Appointment::joinSub($latestAppointmentsSubquery, 'latest_appointments', function ($join) {
                $join->on('appointments.id', '=', 'latest_appointments.id');
            })
                ->when($name, function ($query) use ($name) {
                    $query->where('appointments.name', 'like', '%' . $name . '%');
                })
                ->when($email, function ($query) use ($email) {
                    $query->where('appointments.email', 'like', '%' . $email . '%');
                })
                ->when($mobile, function ($query) use ($mobile) {
                    $query->where('appointments.mobile', 'like', '%' . $mobile . '%');
                })
                ->when($astrologer, function ($query) use ($astrologer) {
                    $query->where('appointments.astrologer_id', $astrologer);
                })
                ->when($fromDate && $toDate, function ($query) use ($fromDate, $toDate) {
                    $query->whereBetween('appointments.preferred_date', [$fromDate, $toDate]);
                })
                ->orderBy('appointments.id', 'DESC')
                ->paginate(20);
            $astrologers = User::where('type', 'astrologer')->get();
            return view('reports.all-appointment', compact('appointments', 'name', 'email', 'mobile', 'astrologers', 'fromDate', 'toDate'));

        } catch (Exception $e) {
            Log::error('Transaction query failed: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function allBonus()
    {
        try {
            $users = User::where('type', 'user')->get();
            $payments = Payment::where('status', 'completed')->orderBy('id', 'desc')->get();
            $totalAmount = Payment::where('status', 'completed')->sum('amount');
            $totalAmount = number_format($totalAmount, 2);
            $totalAmount = str_replace(',', '', $totalAmount);
            $totalBonus = Payment::where('status', 'completed')->sum('bonus');
            $totalBonus = number_format($totalBonus, 2);
            $totalBonus = str_replace(',', '', $totalBonus);
            return view('reports.all-bonus', compact('users', 'payments', 'totalAmount', 'totalBonus'));
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }

    public function appointmentDetail($id)
    {
        try {
            $appointments = Appointment::where('user_id', $id)->paginate(20);
            return view('reports.appointment-detail', compact('appointments'));
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }

    public function astroUser(request $request)
    {
        try {
            $name = $request->input('name');
            $mobile = $request->input('mobile');
            $query = User::where('type', 'user');
            if ($name) {
                $query->where('name', 'like', '%' . $name . '%');
            }
            if ($mobile) {
                $query->where('mobile', 'like', '%' . $mobile . '%');
            }
            $users = $query->paginate(20);
            $transections = Payment::where('status', 'completed');
            $totalAmount = $transections->sum('amount');
            $totalAmount = number_format($totalAmount, 2);
            $totalAmount = str_replace(',', '', $totalAmount);
            $totalBonus = $transections->sum('bonus');
            $totalDabits = $transections->sum('debits');
            $totalAvaBl = $totalAmount - $totalDabits;
            $totalAvaBl = number_format($totalAvaBl, 2);
            $totalAvaBl = str_replace(',', '', $totalAvaBl);
            return view('reports.astro-user-list', compact('users', 'name', 'mobile', 'totalAmount', 'totalBonus', 'totalAvaBl'));
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }

    public function appointmentHistory(Request $request)
    {
        try {
            $appointments = Appointment::where('user_id', $request->id)->orderBy('id', 'DESC')->get();
            return view('reports.appointment-history-model', compact('appointments'));
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }

    public function specialBonus(Request $request)
    {
        try {
            $payment = Payment::find($request->id);
            return view('reports.bonus-mode', compact('payment'));
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }

    }

    public function addBonus(Request $request)
    {
        try {
            $payment = Payment::find($request->id);
            return view('reports.add-bonus-model', compact('payment'));
        } catch (Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }
    public function addBonusData(Request $request, $id)
    {
        try {
            $pay = Payment::find($id);
            if ($pay) {
                $pay->bonus += $request->addBonus;
                $pay->remark = $request->remark;
                $pay->save();
                return redirect('allover-transection')->with('success', 'Bonus Added Successfully.');
            } else {
                return redirect()->back()->with('error', 'Payment record not found.');
            }

        } catch (Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }

    public function appointmentsHistory($id)
    {
        $appointments = Appointment::where('user_id', $id)->get();
        return view('reports.history-model', compact('appointments'));
    }

    public function accountHistory(){
        $rechargeHistory = Payment::where('status', 'completed')->orderBy('id', 'DESC')->paginate(10);
        return view('reports.wallet-recharge-history', compact('rechargeHistory'));
    }

    public function walletHistory()
    {
        $walletHistory = WalletManagement::whereNotNull('admin_amount')->paginate(10);
        $totalWalletAmount = WalletManagement::sum('admin_amount');
        return view('reports.wallet_history', compact('walletHistory', 'totalWalletAmount'));
    }

        public function astrologerPayment(){
        try {
            $paymentList = WalletManagement::whereNotNull('astro_withdraw_amount')->orderBy('id', 'DESC')->paginate(10);
            $paymentListCount = AstroWithdrawRequest::orderBy('id', 'DESC')->count();
            return view('reports.payment_list', compact('paymentList', 'paymentListCount'));
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
        public function approveWithdrawRequest($id){
        try {
             $approveRequest = AstroWithdrawRequest::find($id);
            if (!empty($approveRequest)) {
               $withdraw_amount = new WalletManagement();
               $withdraw_amount->astrologer_id = $approveRequest->astrologer_id;
               $withdraw_amount->astro_withdraw_amount = $approveRequest->withdraw_amount;
               $withdraw_amount->save();
               $approveRequest->status = 1;
                $approveRequest->save();
            }else {
                return response()->json(['error' => 'Withdraw Amount request not found '], 500);
            }
            return redirect('withdrow-request-list');
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function asignTagModel(Request $request){
        try {
            $astroId = $request->id;
            $astrologerTag = AstrologerDetail::where('user_id', $astroId)->first();
            $tags = Tag::get();
            return view('onboard.asign_tag', compact('astroId', 'tags', 'astrologerTag'));
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }
    public function asignAstrologerTag(Request $request){
        try {
            $astroId = $request->astroId;
           $astrologerTag = AstrologerDetail::where('user_id', $astroId)->first();
            $astrologerTag->tag_id = $request->tag_id;
            $astrologerTag->save();
            return redirect('onboarded-astrologer')->back()->with('success', 'Tag asign Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Tag Not Asign');
        }
    }
    public function astrologerpaymentModel(Request $request){

        try {
            $astroId = $request->id;
            $tags = Tag::get();
            return view('onboard.astrologer_payment_model', compact('astroId'));
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }
    public function makeAstrologerPayment(Request $request){

        try {
            $astroId = $request->astroId;
            if ((int) getAstrologerWalletBalance($astroId) >= $request->astro_withdraw_amount) {
                $withdraw_amount = new WalletManagement();
                $withdraw_amount->astrologer_id = $astroId;
                $withdraw_amount->astro_withdraw_amount = $request->astro_withdraw_amount;
                if ($request->hasFile('payment_invoice')) {
                    $file = $request->file('payment_invoice');
                    $destinationPath = 'payment_invoice';
                    $fileName = time() . '-' . $file->getClientOriginalName();
                    $file->move(public_path($destinationPath), $fileName);
                    $withdraw_amount->payment_invoice = $destinationPath . '/' . $fileName;
                }
                $withdraw_amount->save();
            } else {
                return redirect()->back()->with('error', 'Withdraw amount Value is greater then wallet amount value');
            }
            return redirect('onboarded-astrologer')->with('success', 'Payment Successfully Done');
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }
}
