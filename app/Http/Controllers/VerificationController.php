<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Hashids;
use App\Http\Controllers\Controller;
use App\Mail\SendOtpMail;
use App\Models\EmailOtp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
class VerificationController extends Controller
{

    public function register_mobile_verify(Request $request)
    {
         $request->all();
        $phone = $request->number;
        $cointryCode = $request->country_code;
        $currency = $request->currency;
        $userExists = User::where('mobile', $phone)->exists();
        if ($userExists) {
            return back()->with('message', 'User Already exist');
        }
        $otp = rand(100000, 999999);

        session()->put('astro_mobile', $phone);
        session()->put('astro_otp', $otp);
        session()->put('astro_country_code', $cointryCode);
        session()->put('astro_currency', $currency);


        $storedPhone = session()->get('astro_mobile');
        $storedOtp = session()->get('astro_otp');
        $contacts = $storedPhone;
        $from = 'HSQAUR';
        $sms_text = urlencode('Your one time password for Astro Buddy login is ' . $otp . '. Kindly enter to verify. Team HSQUARE
       ');
        $template_id = "1707171983122031110";
        $message = 'Your one time password for Astro Buddy registration is ';
        $data = [
            'message' => $message,
            'otp' => $otp,
            'mobile' => $phone,
        ];
        sendMessage($data);
        $response = sendOtp($template_id, $contacts, $from, $sms_text);
        if (isset($storedPhone) && isset($storedOtp)) {
            return view('otp_verify.register_mobile_otp', compact('storedOtp'));
        } else {
            return back()->with('message', 'Enter Your Mobile Number');
        }
    }

    public function register_otp_verify(Request $request){
        try {

            $otp = session()->get('astro_otp');
            $url = url('/register-details');
            if ($otp !== null) {
                if ($otp === (int)$request->otp) {
                    return response()->json(['message' => 'verified', 'url' => $url], 200);
                }
                return response()->json(['message' => 'not verified'], 400);
            } else {
                return response()->json(['error' => 'OTP not found in session.'], 400);
            }
        } catch (\Exception $e) {
            // Return a response with the error message
            return response()->json(['error' => $e->getMessage()]);
        }

    }

    public function register_details_save(Request $request){
        try{
            session()->put('astro_name', $request->user_name);
            session()->put('astro_gender', $request->user_gender);
            $url = url('/register-password');
            return response()->json(['message' => 'verified','url'=>$url], 200);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()],400);
        }
    }

    public function register_password_save(Request $request){
        try{
            session()->put('astro_password', $request->user_password);
            $user = User::create([
                'name' =>   session()->get('astro_name'),
                'password' => Hash::make(session()->get('astro_password')),
                'mobile' =>   session()->get('astro_mobile'),
                'avtar' => saveUserImage($request->avtar),
                'gender' =>  session()->get('astro_gender'),
                'type'  => 'user',
                'country_code' => session()->get('astro_country_code'),
                'currency' => session()->get('astro_currency'),
            ]);
            if(isset($user)){
                $token = $user->createToken('astroUser')->plainTextToken;
                return response()->json(['token' => $token], 200);
            }else{
                return response()->json(['message' => 'faild'], 200);
            }

        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()],400);
        }
    }


    public function form()
    {
        return view('otp_verify.email.email_form');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $storedPhone = session()->get('astro_mobile'); 
        // if (User::where('email', $request->email)->exists() && !null()) {
        //     return back()->withErrors(['email' => 'Email already registered.']);
        // }
        if (User::where('mobile', $storedPhone)->exists()) {
            return back()->withErrors(['mobile' => 'Mobile number already registered.']);
        }
        $otp = rand(100000, 999999);
        $user = User::updateOrCreate(
            ['email' => $request->email],
            [
                'email_otp' => $otp,
                'email_otp_expires_at' => Carbon::now()->addMinutes(5)
            ]
        );

        Mail::to($request->email)->send(new SendOtpMail($otp));
        return view('otp_verify.email.verify_email_otp', [
            'email' => $request->email
        ]);
    }

    public function verifyEmailOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6'
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Email not found'
            ], 404);
        }
        if ($user->email_otp != $request->otp) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid OTP'
            ], 400);
        }
        if (now()->greaterThan($user->email_otp_expires_at)) {
            return response()->json([
                'status' => false,
                'message' => 'OTP expired'
            ], 400);
        }
        $user->update([
            'email_otp' => null,
            'email_otp_expires_at' => null
        ]);
        return response()->json([
            'status' => true,
            'message' => 'verified',
            'url' => url('/register-details')
        ]);
    }
}
