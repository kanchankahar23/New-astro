<?php

namespace App\Http\Controllers;

use App\Models\AstrologerDetail;
use App\Models\Package;
use App\Models\User;
use App\Models\UserEnquiry;
use App\Models\AstroStatus;
use Illuminate\Http\Request;
use App\Models\AstrologerGallary;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class OnBoardController extends Controller
{
    public function onboardUser(Request $request)
    {
        try {
            $user = UserEnquiry::find($request->id);
            return view('onboard.onBoardModel', compact('user'));
        } catch (\Exception $e) {
            \Log::error('Error onboarding user: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Please try again.']);
        }
    }
    public function onboardDetail(Request $request, $enquiry_id)
    {
        try {
            $existingUser = User::where('email', $request->email)
                ->orWhere('mobile', $request->mobile)
                ->first();
            if ($existingUser) {
                return redirect()->back()->withErrors(['error' => 'Astrologer already onboarded.']);
            }
            $user = new User();
            $slug = Str::slug($request->name);
            $count = User::where('slug', 'like', $slug . '%')->count();
            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }
            $user->name = $request->name;
            $user->slug =  $slug;
            $user->avtar = $request->avatar;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->gender = $request->gender;
            $user->enquiry_id = $enquiry_id;
            $user->type = 'astrologer';
            $user->password = Hash::make(12345678);
            $user->avtar = saveBase64Image($request->image);
            $user->save();
            if ($user->id) {
                $astroDetails = new AstrologerDetail();
                $astroDetails->user_id = $user->id;
                $astroDetails->enquiry_id = $enquiry_id;
                $astroDetails->expertise = $request->expertise ?? '';
                $astroDetails->languages = $request->language ?? '';
                $astroDetails->total_experience = $request->experience ?? '0';
                $astroDetails->rating = $request->rating ?? '0';
                $astroDetails->about = $request->about ?? ' ';
                $astroDetails->charge_per_min = $request->rate ?? '0';
                $astroDetails->agreement_percent = $request->agreement_percent ?? '0';
                if ($request->conversation_type) {
                    $astroDetails->conversation_type = implode(",",$request->conversation_type);
                }
                $astroDetails->save();
                $status = new AstroStatus();
                $status->astrologer_id = $user->id;
                $status->status = "available";
                $status->save();
            }
            return redirect('enquiry/enquiry-list')->with('success', 'User onboarded successfully');
        } catch (\Exception $e) {
            \Log::error('Error onboarding user: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' =>  $e->getMessage()]);
        }
    }

    // public function onboardDetail(Request $request, $enquiry_id)
    // {
    //     try {
    //         $existingUser = User::where('email', $request->email)
    //             ->orWhere('mobile', $request->mobile)
    //             ->first();

    //         if ($existingUser) {
    //             return redirect()->back()->withErrors(['error' => 'Astrologer already onboarded.']);
    //         }
    //         $user = new User();
    //         $user->name = $request->name;
    //         $user->avtar = $request->avatar;
    //         $user->email = $request->email;
    //         $user->mobile = $request->mobile;
    //         $user->gender = $request->gender;
    //         $user->enquiry_id = $enquiry_id;
    //         $user->type = 'astrologer';
    //         $user->password = Hash::make(12345678);
    //         $user->avtar = saveBase64Image($request->image);
    //         $user->save();
    //         // if($user->id){
    //         //     $astroGallery = new AstrologerGallary();
    //         //     $astroGallery->user_id = $user->id;
    //         //     $astroGallery->astrologer_id = $user->id;
    //         //     if ($request->hasFile('image')) {
    //         //         $file = $request->file('image');
    //         //         $destinationPath = 'portfolio_image';
    //         //         $fileName = time() . '-' . $file->getClientOriginalName();
    //         //         $file->move(public_path($destinationPath), $fileName);
    //         //         $astroGallery->cover_image = $destinationPath . '/' . $fileName;
    //         //     }
    //         // }
    //         if ($user->id) {
    //             $astroDetails = new AstrologerDetail();
    //             $astroDetails->user_id = $user->id; //user_id == astrologer_id
    //             $astroDetails->enquiry_id = $enquiry_id;
    //             $astroDetails->expertise = $request->expertise ?? '';
    //             $astroDetails->languages = $request->language ?? '';
    //             $astroDetails->total_experience = $request->experience ?? '0';
    //             $astroDetails->rating = $request->rating ?? '0';
    //             $astroDetails->about = $request->about ?? ' ';
    //             $astroDetails->charge_per_min = $request->rate ?? '0';
    //             $astroDetails->agreement_percent = $request->agreement_percent ?? '0';
    //             if ($request->conversation_type) {
    //                 $astroDetails->conversation_type = implode(",",$request->conversation_type);
    //             }
    //             $astroDetails->save();
    //             $status = new AstroStatus();
    //             $status->astrologer_id = $user->id;
    //             $status->status = "available";
    //             $status->save();
    //         }
    //         return redirect('enquiry/enquiry-list')->with('success', 'User onboarded successfully');
    //     } catch (\Exception $e) {
    //         \Log::error('Error onboarding user: ' . $e->getMessage());
    //         return redirect()->back()->withErrors(['error' =>  $e->getMessage()]);
    //     }
    // }

    public function packageList()
    {
        try {
            $packages = Package::where('is_active', '1')->orderBy('id', 'desc')->get();
            return view('package.package_list', compact('packages'));
        } catch (\Exception $e) {
            \Log::error('Error onboarding user: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Please try again.']);
        }
    }

    public function DeletePackage($id)
    {
        try {
            $package = Package::find($id);
            if (!$package) {
                return back()->with('error', 'Package not found');
            }
            $package->delete();
            return back()->with('success', 'Package deleted successfully');
        } catch (\Exception $e) {
            \Log::error('Error onboarding user: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Please try again.']);
        }
    }
    public function editPackage($id)
    {
        try {
            $package = Package::find($id);
            return view('package.edit-package', compact('package'));
        } catch (\Exception $e) {
            \Log::error('Error onboarding user: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Please try again.']);
        }
    }
    public function editPackageSave(Request $request, $id)
    {
        try {
            $package = Package::find($id);
            if (!$package) {
                return redirect('/package-create')->with('error', 'Package not found!');
            }
            $package->price = $request->input('price');
            $package->extra = $request->input('extra');
            $package->gst = $request->input('gst');
            $package->total = $request->input('total');
            $package->bonus = $request->input('bonus');
            $package->save();
            return redirect('/package-list')->with('success', 'Package updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Error updating package: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to update package. Please try again later.');
        }
    }

    public function packageCreate()
    {
        try {
            return view('package.package-create');
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }

    public function packageStore(Request $request)
    {
        try {
        //   return  $request->all();
            $validatedData = $request->validate([
                'price' => 'required',
                'gst' => 'required',
                'total' => 'required',
            ]);

            $package = new Package();
            $package->price = $request->price;
            $package->gst = $request->gst;
            $package->total = $request->total;
            $package->extra = $request->bonus;
            $package->save();

            return redirect('/package-list')->with('success', 'Package created successfully!');
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }

    }

    public function editAstrologer(request $request)
    {
        try {
            $id = $request->id;
            $enquiry = User::with('astrologerDetail')->where('id',$id)->first();
            return view('onboard.onboardEditModel', compact('enquiry'));
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }

    public function onboardEditStoreSave(request $request, $id)
    {
        try {
            // return $request->all();
            $astrologer = User::find($id);
            $slug = Str::slug($astrologer->name);
            $count = User::where('slug', 'like', $slug . '%')->count();
            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }
            $astrologer->name = $request->name;
            if (empty($astrologer->slug)) {
                $astrologer->slug = $slug;
            }
            $astrologer->mobile = $request->mobile;
            $astrologer->gender = $request->gender;
            if (!empty($request->image)) {
                $astrologer->avtar = saveBase64Image($request->image);
            }
            $astrologer->save();
            $astroDetails = AstrologerDetail::where('user_id', $id)->first();
            $astroDetails->languages = $request->language;
            $astroDetails->expertise = $request->expertise;
            $astroDetails->charge_per_min = $request->rate ?? '0';
            $astroDetails->agreement_percent = $request->agreement_percent ?? '0';
            $astroDetails->save();
            return back()->with('success', 'Astrologer Updated Successfully');
        } catch (\Exception $e) {
            \Log::error('Error fetching wallet data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
        }
    }
    // public function onboardEditStoreSave(request $request, $id)
    // {
    //     try {
    //         // return $request->all();
    //         $astrologer = User::find($id);
    //         $astrologer->name = $request->name;
    //         $astrologer->mobile = $request->mobile;
    //         $astrologer->gender = $request->gender;
    //         $astrologer->avtar = saveBase64Image($request->image);
    //         $astrologer->save();
    //         $astroDetails = AstrologerDetail::where('user_id', $id)->first();
    //         $astroDetails->languages = $request->language;
    //         $astroDetails->expertise = $request->expertise;
    //         $astroDetails->charge_per_min = $request->rate ?? '0';
    //         $astroDetails->agreement_percent = $request->agreement_percent ?? '0';

    //         $astroDetails->save();
    //         return back()->with('success', 'Astrologer Updated Successfully');
    //     } catch (\Exception $e) {
    //         \Log::error('Error fetching wallet data: ' . $e->getMessage());
    //         return redirect()->back()->with('error', 'Unable to fetch wallet data. Please try again later.');
    //     }
    // }

    public function onboardedAstrologer(Request $request)
    {
        try {
            $user_id = AstrologerDetail::pluck('user_id')->toArray();
            $users = User::with('astrologerDetail')->whereIn('id', $user_id)->orderBy('id','DESC');
            $name = $request->name;
            $phone = $request->phone;
            $email = $request->email;
            if (!empty($name)) {
                $users = $users->where('name', 'like', '%' . $name . '%');
            }
            if (!empty($phone)) {
                $users = $users->where('mobile', 'like', '%' . $phone . '%');
            }
            if (!empty($email)) {
                $users = $users->where('email', 'like', '%' . $email . '%');
            }
            $users = $users->paginate(20);
            return view('onboard.onboarded_user', compact('users', 'name', 'phone', 'email'));
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
