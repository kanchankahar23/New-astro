<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'mobile' => 'required|string|min:8',
                'gender' => 'required|string|',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobile' => $request->mobile,
                'avtar' => saveUserImage($request->avtar),
                'gender' => $request->gender,
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['message' => 'Registration successful', 'user' => $user, 'token' => $token], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Something went wrong', 'error' => $e->getMessage()], 500);
        }

    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json(['token' => $token, 'user' => $user], 200);
            }

            return response()->json(['message' => 'Invalid login credentials'], 401);
        } catch (Exception $e) {
            return response()->json(['message' => 'Something went wrong', "error" => $e->getMessage()], 500);
        }

    }
    public function get_number(Request $request)
    {
        try {
            $user = User::where('mobile', $request->mobile_number)->first();
            if (isset($user)) {
                $otp = rand(100000, 999999);
                $user->mobile_verified_at = $otp;
                $user->save();
                $contacts = $user->mobile;
                $from = 'HSQAUR';
                $sms_text = urlencode('Your one time password for Astro Buddy login is ' . $otp . '. Kindly enter to verify. Team HSQUARE
                ');
                $template_id = "1707171983122031110";
                $response = sendOtp($template_id, $contacts, $from, $sms_text);
                $hashId = Hashids::encode($user->id);
                $url = url('otp-verify') . '/' . $hashId;
                $message = 'Your one time password for Astro Buddy login is ';
                $token = $user->createToken('candidate_api_token')->plainTextToken;
                // $data = [
                //     'message' => $message,
                //     'otp' => $otp,
                //     'mobile' => $user->mobile,
                // ];
                //   sendMessage($data);
                return response()->json(['message' => 'success', 'token' => $token, 'user' => $user, 'url' => $url, 'response' => $response], 200);
            } else {
                return response()->json(['message' => 'User not found'], 200);
            }
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }
    }

    // public function get_number(Request $request)
    // {
    //     try {
    //        $user = User::where('mobile', $request->mobile_number)->first();
    //         if (isset($user)) {
    //             $otp = rand(100000, 999999);
    //             $user->mobile_verified_at = $otp;
    //             $user->save();
    //             $contacts = $user->mobile;
    //             $from = 'HSQAUR';
    //             $sms_text = urlencode('Your one time password for Astro Buddy login is ' . $otp . '. Kindly enter to verify. Team HSQUARE');
    //             $template_id = "1707171983122031110";
    //             $response = sendOtp($template_id, $contacts, $from, $sms_text);
    //             $hashId = Hashids::encode($user->id);
    //             $url = url('otp-verify') . '/' . $hashId;
    //         //     $data = [
    //         //         'otp' => $otp,
    //         //         'mobile' => $user->mobile,
    //         //     ];
    //         //   return  sendMessage($data);
    //             return response()->json(['message' => 'success', 'url' => $url, 'response' => $response, 'otp' => $user->mobile_verified_at], 200);
    //         } else {
    //             return response()->json(['message' => 'User not found'], 200);
    //         }
    //     } catch (Exception $e) {
    //         return response()->json(['message' => $e->getMessage()], 401);
    //     }
    // }

    public function verify_otp(Request $request)
    {
        try {
            $userId = Hashids::decode($request->user);
            $user = User::where('id', $userId)->first();
            if ($user->mobile_verified_at == $request->otp) {
                Auth::login($user); // Pass the user model instance to Auth::login()
                $token = $user->createToken('astroUser')->plainTextToken;
                return response()->json(['token' => $token], 200);
            } else {
                return response()->json(['message' => 'faild'], 200);
            }
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }
    }

    public function authenticateWithToken(Request $request)
    {
        try {
            // Extract the token from the request (or hardcoded for testing purposes)
            $token = $request->token;
            // Find the token record in the database
            $tokenRecord = PersonalAccessToken::findToken($token);

            if (!$tokenRecord) {
                return response()->json(['message' => 'Token not found'], 404);
            }

            // Retrieve the associated user
            $user = $tokenRecord->tokenable;

            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }
            // Log in the user
            Auth::login($user);
            // Ensure the session is persisted
            $request->session()->regenerate();

            // Redirect to the /user route
            return response()->json(['message' => 'Success'], 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }
    }


    public function testOtp(Request $request)
    {
        try {
            $otp = rand(100000, 999999);
            $contacts = $request->mobile_number;
            $from = 'HSQAUR';
            //$sms_text = urlencode('Your one time password for Astro Buddy login is '.$otp.'. Kindly enter to verify. Team HSQUARE');
            $name = $request->name;
            $sms_text = urlencode('Dear ' . $name . ', Your premium Kundali has been successfully generated. Please log in to your Astrobuddy account to download it. Team HappySquare');
            $template_id = "1707173752990941625";
            $response = sendOtp($template_id, $contacts, $from, $sms_text);

            return response()->json(['message' => 'success', 'response' => $response], 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }
    }
}
