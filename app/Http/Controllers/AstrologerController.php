<?php

namespace App\Http\Controllers;

use App\Events\SendmessageEvent;
use App\Models\Appointment;
use App\Models\AstroBankDetail;
use App\Models\AstrologerDetail;
use App\Models\AstrologerGallary;
use App\Models\AstroWithdrawRequest;
use App\Models\ChatMeeting;
use App\Models\Payment;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserMeeting;
use App\Models\WalletManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
use App\Events\VideoChatNotification;
use App\Events\PrivateChatEvent;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Validation\ValidationException;
use function PHPUnit\Framework\returnArgument;

class AstrologerController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $userDetails = AstrologerDetail::where('user_id', $user->id)->first();

        return view('website.astrologer_dashboard', compact('user', 'userDetails'));
    }

    public function save_astrologer_details($userId, Request $request)
    {
        // Validation with custom error messages
        $request->validate([
            'name' => 'required|string|max:255',
            'languages' => 'required|array|min:1',
            'languages.*' => 'string',
            'gender' => 'required|in:male,female,other',
            'expertise' => 'required|array|min:1',
            'expertise.*' => 'string',
            'experience' => 'required|integer|min:0|max:100'
        ]);
        // Update user information
        $user = User::find($userId);
        if ($user) {
            $user->name = $request->name;
            $user->gender = $request->gender;
            $user->save();
            // Update astrologer details
            $astrologer = AstrologerDetail::where('user_id', $userId)->first();
            if ($astrologer) {
                $astrologer->languages = implode(',', $request->languages);
                $astrologer->expertise = implode(',', $request->expertise);
                $astrologer->total_experience = $request->experience;
                $astrologer->save();
                // Return success message
                return back()->with('success', 'Details saved successfully.');
            }
            // Return error if astrologer not found
            return back()->with('error', 'Astrologer details not found.');
        }

        // Return error if user not found
        return back()->with('error', 'User not found.');
    }

    public function astrologer_appointments()
    {
           $appointments = Appointment::with('userDetails')->where('astrologer_id', Auth::user()->id)->orderBy('id','DESC')->paginate(9);

        if (!empty($appointments)) {

            foreach ($appointments as $appointment) {
                 $appointment->way_to_reach;
                if ($appointment->way_to_reach == "video") {
                     $appointment["url"] = "create-astro-meeting";
                } else {
                    $appointment["url"] = "initiate-call";
                }
            }
        }
        // return $appointments;
        return view('website.astro_appointment_list', compact('appointments'));
    }

    public function website_dashboard()
    {
    //        $chats = ChatMeeting::where('astrologer_id', Auth::user()->id)->pluck('user_id')->toArray();

    //     $usersChat = User::whereIn('id',$chats)->with('userDetails','userChat')->where('type', 'user')->latest()->take(10)->get();

        $usersChat = ChatMeeting::where('astrologer_id', Auth::user()->id)->get();

        $user = User::with('astrologerDetail')->where('id', Auth::user()->id)->first();
        $totalChat = DB::table('chat_logs')->where('astrologer_id',Auth::user()->id)->sum('duration');
        $totalChat = gmdate('H:i:s', $totalChat);
        $appointment = Appointment::where('astrologer_id',Auth::user()->id)->where('way_to_reach','video')->count();
        $appointment_calls = Appointment::where('astrologer_id',Auth::user()->id)->where('way_to_reach','phone')->count();
        return view('website.astro_dashboard', compact('usersChat', 'user', 'totalChat','appointment','appointment_calls' ));
    }
    public function gallaryPage(request $request)
    {
        $user = User::where('id', $request->id)->first();
        return view('gallery.astro_gallery', compact('user'));
    }

    public function uploadImageWithBase64($base64Image, $basePath)
    {
        $imageInfo = explode(";base64,", $base64Image);
        $extension = explode('/', $imageInfo[0])[1];
        $fileName = Str::random(20) . '.' . $extension;
        $imageData = base64_decode($imageInfo[1]);
        $filePath = public_path($basePath . $fileName);
        file_put_contents($filePath, $imageData);
        return $fileName;
    }

    public function astrologoerGallery(Request $request, $id)
    {
        $request->validate([
            'cover_image' => 'required|image|mimes:jpg,jpeg,png,gif',
            'about_image' => 'required|image|mimes:jpg,jpeg,png,gif',
            'gallery_image.*' => 'required|image|mimes:jpg,jpeg,png,gif', // Use gallery_image.* for array validation
        ]);
        $astroGallery = new AstrologerGallary();
        $astroGallery->user_id = $id;
        $astroGallery->astrologer_id = $id;
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $destinationPath = 'portfolio_image';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path($destinationPath), $fileName);
            $astroGallery->cover_image = $destinationPath . '/' . $fileName;
        }

        if ($request->hasFile('about_image')) {
            $file = $request->file('about_image');
            $destinationPath = 'portfolio_image';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path($destinationPath), $fileName);
            $astroGallery->about_image = $destinationPath . '/' . $fileName;
        }

        if ($request->hasFile('gallery_image')) {
            $galleryImages = [];
            foreach ($request->file('gallery_image') as $file) {
                $destinationPath = 'portfolio_image';
                $fileName = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path($destinationPath), $fileName);
                $galleryImages[] = $destinationPath . '/' . $fileName;
            }

            $astroGallery->gallary_image = str_replace('\/', '/', json_encode($galleryImages)); // Ensure proper slash format
        }
        $astroGallery->save();
        return redirect('/onboarded-astrologer')->with('success', 'Images inserted successfully');
    }

    public function accept_appointment(Request $request)
    {
        $latestAppointment = Appointment::find($request->id);
        if($request->accept == 1 ){
            $astrologer = User::find($latestAppointment->astrologer_id);
            $price_per_min = (int) $astrologer->astrologerDetail->charge_per_min;
            $formattedBalance = getUserBalance($latestAppointment->user_id);
            $cleanedBalance = str_replace(',', '', $formattedBalance);
            $walletAmount = (float) $cleanedBalance;
             $totalCharge = $price_per_min * (int) $latestAppointment->duration;
            //  $price_per_min = $astrologer->astrologerDetail->charge_per_min;
            // $getWalletAmount =  (int) getUserWalletAmount($latestAppointment->user_id);
            // if ( $getWalletAmount > $price_per_min * (int) $latestAppointment->duration) {
            if ($walletAmount > $totalCharge) {
            $payment = new Payment();
            $payment->user_id = $latestAppointment->user_id;
            $payment->astrologer_id = $latestAppointment->astrologer_id;
            $payment->appointment_id = $latestAppointment->id;
            $payment->name = Auth::user()->name;
            $payment->date = now();
            $payment->debits = $price_per_min * (int) $latestAppointment->duration;
            $payment->status = 'completed';
            $payment->save();
            // WhatsAppController::sendMessageForAppointment($latestAppointment);
            if (isset($payment)) {
                $latestAppointment->amount_paid = $payment->debits;
                 $latestAppointment->status = 1; //1 == accept
                $latestAppointment->save();
            }
                if (!empty($latestAppointment->user_id)) {
                    $meeting = ChatMeeting::where('user_id', $latestAppointment->user_id)->get();
                    // $userBalance = getUserBalance($latestAppointment->user_id);
                    foreach ($meeting as $key => $chatMeeting) {
                        $chatMeeting->wallet = $walletAmount - $payment->debits;
                        $chatMeeting->timer = floor(($chatMeeting->wallet / $price_per_min) * 60);
                        $chatMeeting->balance_time = $chatMeeting->timer;
                        $chatMeeting->save();
                    }
                }
        }
        else {
                return response()->json(["error" => "Insufficient wallet balance"], 422);
        }
            $arrayData = [
                "user_id" => $latestAppointment->user_id,
                "astrologer_id" => $latestAppointment->astrologer_id,
                "total_amount" => $payment->debits,
                "source" => $latestAppointment->way_to_reach,
            ];
            $newRequest = Request::create('walletManagement', 'POST', $arrayData);
            $rating = new WalletManagementController();
            $response = $rating->walletManagement($newRequest);
        }
        else{

            $latestAppointment->status = 2; //2 == reject
            $latestAppointment->save();
        }
        return response()->json(["data" => "success"]);
    }

    public function listed_chats()
    {
        $chats = ChatMeeting::with('userDetails')->where('astrologer_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(3);
        return view('astro_chat.listed_chat', compact('chats'));
    }

    public function astroEarningHistory(){

        try {
             $earnings = WalletManagement::where('astrologer_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
            return view('astrologer_detail.astro_earning_history', compact('earnings'));
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }
    public function withdrawMoney(){

        try {
             $withdrawDetails = AstroWithdrawRequest::where('astrologer_id', Auth::user()->id)->get();
            $BankDetails = AstroBankDetail::where('astrologer_id', Auth::user()->id)->where('status', 1)->get();
                return view('astrologer_detail.withdraw_money_form', compact('BankDetails', 'withdrawDetails'));
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }
    public function saveWithdrawRequest(Request $request){

        try {
            // return $request->all();
            if (isset($request->bank_id)) {
                $request->validate([
                    'bank_id' => 'required',
                    'withdraw_amount' => 'required|numeric|min:1',
                ]);
                if (getAstrologerWalletBalance(Auth::user()->id) >= $request->withdraw_amount) {
                    $withdrawRequest = new AstroWithdrawRequest();
                    $withdrawRequest->astrologer_id = Auth::user()->id;
                    $withdrawRequest->bank_id = $request->bank_id;
                    $withdrawRequest->withdraw_amount = $request->withdraw_amount;
                    $withdrawRequest->status = 0; //pending;
                    $withdrawRequest->remark = $request->remark;
                    $withdrawRequest->save();
                }else{
                    return redirect()->back()->with('error', 'Withdraw amount Value is greater then wallet amount value');
                }
            } else {

                $request->validate([
                    'bank_name' => 'required|string|max:255',
                    'account_number' => 'required|numeric|digits_between:9,18',
                    'account_holder_name' => 'required|string|max:255',
                    'ifsc_code' => 'required|regex:/^[A-Z]{4}0[A-Z0-9]{6}$/',
                    'pan_number' => 'required|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/',
                    'adhaar_number' => 'required|numeric|digits:12',
                    'withdraw_amount' => 'required',
                ]);
                  $bankAlreadyExist = AstroBankDetail::where('account_number', $request->account_number)->exists();
                if (empty($bankAlreadyExist) ) {
                    $bankDetails = new AstroBankDetail();
                    $bankDetails->astrologer_id = Auth::user()->id;
                    $bankDetails->bank_name = $request->bank_name;
                    $bankDetails->account_number = $request->account_number;
                    $bankDetails->account_holder_name = $request->account_holder_name;
                    $bankDetails->ifsc_code = $request->ifsc_code;
                    $bankDetails->upi_id = $request->upi_id;
                    $bankDetails->pan_number = $request->pan_number;
                    $bankDetails->adhaar_number = $request->adhaar_number;
                    $bankDetails->save();
                    if ($bankDetails->astrologer_id == Auth::user()->id && getAstrologerWalletBalance(Auth::user()->id) >= $request->withdraw_amount) {
                        $withdrawRequest = new AstroWithdrawRequest();
                        $withdrawRequest->astrologer_id = $bankDetails->astrologer_id;
                        $withdrawRequest->bank_id = $bankDetails->id;
                        $withdrawRequest->withdraw_amount = $request->withdraw_amount;
                        $withdrawRequest->status = 0; //pending;
                        $withdrawRequest->remark = $request->remark;
                        $withdrawRequest->save();
                    } else {
                        return redirect()->back()->with('error', 'Withdraw amount Value is greater then wallet amount value');

                    }
                } else {
                    return redirect()->back()->with('Bank Deatails Not Found');
                }
            }
            return redirect('withdraw-money#request')->with('success', 'Your Request is successfully Sent To ADMIN');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function astroAppointment($astroId){
           $appointment = Appointment::where('id', Auth::user()->id)->latest()->first();
        return view('appointment.appoinment_form', compact('astroId', 'appointment'));
    }

    public function userTransactionDetails($userId){
        $earnings = WalletManagement::where('user_id', $userId)->where('astrologer_id', Auth::user()->id)->get();
        $totalEarning = WalletManagement::where('user_id', $userId)->where('astrologer_id', Auth::user()->id)->sum('astrologer_amount');
        return view('reports.astrologer_earnings_history', compact('earnings', 'totalEarning'));
    }


}
