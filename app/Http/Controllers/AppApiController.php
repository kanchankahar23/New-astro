<?php

namespace App\Http\Controllers;

use App\Models\AppBanner;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KundliDetailsModel;
use App\Models\Appointment;
use App\Models\ChatMeeting;
use App\Models\Kundli_Matching_Detail;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;
use Auth;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Rating;
use App\Models\WalletManagement;
use App\Models\UserDetails;
use App\Models\ParasarKundliDetail;
use Mockery\Matcher\Type;
use App\Http\Controllers\WalletManagementController;
use App\Mail\SendOtpMail;
use App\Models\EmailOtp;
use Illuminate\Support\Facades\Mail;

class AppApiController extends Controller
{
    public function verify_register_number(Request $request)
    {
        try {

            $phone = $request->input('number');
            $userExists = User::where('mobile', $phone)->exists();
            if ($userExists) {
                return response()->json([
                    "success" => true,
                    "message" => 'User Already exists'
                ]);
            }
            $otp = rand(1000, 9999);
            if ($otp && $phone) {
                $contacts = $phone;
                $from = 'HSQAUR';
                $sms_text = urlencode('Your one-time password for Astro Buddy login is ' . $otp . '. Kindly enter to verify. Team HSQUARE');
                $template_id = "1707171983122031110";
                $response = sendOtp($template_id, $contacts, $from, $sms_text);
                Log::info('OTP SMS Response:', ['response' => $response]);
                return response()->json([
                    "success" => true,
                    "message" => "OTP sent successfully",
                    "otp" => $otp
                ]);
            } else {
                return response()->json([
                    "error" => true,
                    "message" => "Failed to store OTP or mobile number in session."
                ]);
            }
            return response()->json([
                "success" => true,
                "message" => "OTP sent successfully",
                "otp" => $otp
            ]);
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Error in verify_register_number:', ['error' => $e->getMessage()]);
            return response()->json([
                "error" => true,
                "message" => "An error occurred: " . $e->getMessage()
            ]);
        }
    }

    public function app_login(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string|min:10|max:15',
            'password' => 'required|string|min:6',
            // 'app_device_id' => 'required|string|min:6',
        ]);
        $user = User::where('mobile', $request->mobile)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }
        $user->app_device_id = $request->app_device_id;
        $user->save();
        // Create a Sanctum token
        $token = $user->createToken('auth_token')->plainTextToken;

        // Return the token with a success message
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'message' => 'Login successful',
            'user' => $user
        ]);
    }

    public function app_logout(Request $request)
    {
        $user = User::find($request->user_id);
        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
        $user->tokens()->delete();
        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
    public function app_register(Request $request)
    {
        try {
            $requiredFields = ['name', 'password', 'mobile', 'gender'];
            foreach ($requiredFields as $field) {
                if (is_null($request->$field)) {
                    return response()->json(['message' => ucfirst($field) . ' cannot be null'], 400);
                }
            }
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobile' => $request->mobile,
                'avtar' => saveUserImage($request->file('avtar')),
                'gender' => $request->gender,
                'type' => "user"
            ]);
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['message' => 'Registration successful', 'user' => $user, 'access_token' => $token], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Something went wrong', 'error' => $e->getMessage()], 500);
        }
    }

    public function app_daily_horoscope(Request $request)
    {
        // $userId = $request->user_id;
        $report_type = $request->report_type;
        $zodiac = $request->zodiac_id;
        $lang = $request->language;
        $userId = $request->user_id;
        $apiKey = env('VEDIC_ASTRO_API_KEY');
        $date = Carbon::parse(Carbon::now())->format('d/m/Y');
        $year = Carbon::parse(Carbon::now())->format('Y');
        $user = User::find($userId);
        if (isset($lang)) {
            if ($user->user_lang != $lang) {
                $user->user_lang = $lang;
                $user->save();
            }
        }
        $lang = $lang ?? $user->user_lang;
        App::setLocale($lang);
        $translations = trans(key: 'messages');
        if ($report_type == 'daily') {
            $response = Http::get("https://api.vedicastroapi.com/v3-json/prediction/daily-sun", [
                'zodiac' => $zodiac,
                'date' => $date,
                'show_same' => 'true',
                'api_key' => $apiKey,
                'lang' => $lang,
                'split' => 'true',
                'type' => 'big',
            ]);
        } elseif ($report_type == 'weekly') {
            $response = Http::get("https://api.vedicastroapi.com/v3-json/prediction/weekly-sun", [
                'zodiac' => $zodiac,
                'week' => 'thisweek',
                'show_same' => 'true',
                'api_key' => $apiKey,
                'lang' => $lang,
                'split' => 'true',
                'type' => 'big',
            ]);
        } elseif ($report_type == 'yearly') {
            $response = Http::get("https://api.vedicastroapi.com/v3-json/prediction/yearly", [
                'year' => $year,
                'zodiac' => $zodiac,
                'api_key' => $apiKey,
                'lang' => $lang,
            ]);
        }
        if ($response->successful()) {
            $data = json_decode($response->body(), true);
            if (isset($data['response'])) {
                return response()->json(['message' => 'Registration successful', 'data' => $data['response'], 'zodiac' => $zodiac, 'report_type' => $report_type, 'lang' => $lang, 'translations' => $translations,], 200);
            } else {
                return response()->json(['error' => 'Unexpected response structure'], 500);
            }
        } else {
            return response()->json(['error' => 'Failed to retrieve data from the astrology API'], 500);
        }
    }
    // User Kundli
    public function app_kundli_details(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'gender' => 'required',
            'place' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'dob' => 'required',
            'tob' => 'required',
            'lang' => 'required',
        ]);
        // return 1;
        $full_name = $request->input('full_name');
        $gender = $request->input('gender');
        $place = $request->input('place');
        $dob = Carbon::parse($request->input('dob'))->format('d/m/Y');
        $tob = $request->input('tob');
        $userId = $request->input(key: 'user_id');
        $lat = $request->input('lat') ?? 23.1686;
        $lon = $request->input('lon') ?? 79.9339;
        $tz = '5.5';
        $apiKey = env('VEDIC_ASTRO_API_KEY');
        $lang = $request->input('lang');
        App::setLocale($lang);
        $translations = trans('messages');
        $details = KundliDetailsModel::where('user_login_id', $userId)
            ->where('dob', $dob)
            ->where('tob', $tob)
            ->where('lat', $lat)
            ->where('lon', $lon)
            ->where('language', $lang)
            ->first();
        if ($details && !empty($details->panchang_details)) {
            $basicKundliDetails = json_decode($details->panchang_details, true);
            $userId = $details->id;
        } else {
            try {
                $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/extended-kundli-details";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $tob,
                    'lat' => $lat,
                    'lon' => $lon,
                    'tz' => $tz,
                    'api_key' => $apiKey,
                    'lang' => $lang,
                ]);
                $basicKundliDetails = $response->json();
                if (isset($basicKundliDetails['response'])) {
                    $details = new KundliDetailsModel();
                    $details->user_login_id = $userId;
                    $details->name = $full_name;
                    $details->dob = $dob;
                    $details->tob = $tob;
                    $details->gender = $gender;
                    $details->place = $place;
                    $details->lat = $lat;
                    $details->lon = $lon;
                    $details->language = $lang;
                    $details->panchang_details = json_encode($basicKundliDetails);
                    $details->save();
                } else {
                    return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['error' => $e->getMessage()], 400);
            }
        }
        return response()->json([
            'basicKundliDetails' => $basicKundliDetails['response'],
            'basicUserDetails' => compact('full_name', 'gender', 'place', 'dob', 'tob', 'lat', 'lon', 'tz', 'lang'),
            'lang' => $lang,
            'translations' => $translations
        ], status: 200);
    }
    public function app_plantary_position(Request $request)
    {
        // return $request->user_id;
        $userId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        try {
            if (isset($payload)) {
                $planetaryPositionsData = json_decode($payload->planetary_positions_data, true);
                if (!$planetaryPositionsData) {
                    $url = "https://api.vedicastroapi.com/v3-json/horoscope/planet-details";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $planetaryPositions = $response->json();
                    if (isset($planetaryPositions)) {
                        $payload->planetary_positions_data = json_encode($planetaryPositions);
                        $payload->save();
                        $planetaryPositionsData = $planetaryPositions;
                    } else {
                        return response()->json(['error' => 'Failed to retrieve planetary positions data from the astrology API.'], 400);
                    }
                }

            } elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/horoscope/planet-details";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $planetaryPositionsData = $response->json();

            } else {
                return response()->json(['error' => 'No Kundli details found for the user.'], 400);
            }

            return response()->json([
                'planetaryPositions' => $planetaryPositionsData['response'],
                'translations' => $translations
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function app_divisional_charts(Request $request, )
    {

        $userId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        try {
            $chartName = $request->input('chartName', 'D1');
            if (isset($payload)) {
                $chartName = $chartName ?? 'D1';
                $url = "https://api.vedicastroapi.com/v3-json/horoscope/chart-image";
                $response = Http::get($url, [
                    'dob' => $payload->dob,
                    'tob' => $payload->tob,
                    'lat' => $payload->lat,
                    'lon' => $payload->lon,
                    'div' => $chartName,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => $payload->language,
                    'color' => '#75429c',
                    'style' => 'north',
                    'font_size' => 20,
                    'font_style' => 'roboto',
                    'colorful_planets' => 0,
                    'size' => 400,
                    'stroke' => 2,
                    'format' => 'base64'
                ]);
                if ($response->successful()) {
                    $kundliChartSvg = $response->body();
                    return view('kundli_pages.kundli_chart', [
                        'kundliChartSvg' => $kundliChartSvg,
                        'chartName' => $chartName,
                        'translations' => $translations
                    ]);
                }
            } elseif (isset($chatMeeting)) {
                $chartName = $chartName ?? 'D1';
                $url = "https://api.vedicastroapi.com/v3-json/horoscope/chart-image";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'div' => $chartName,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                    'color' => '#75429c',
                    'style' => 'north',
                    'font_size' => 20,
                    'font_style' => 'roboto',
                    'colorful_planets' => 0,
                    'size' => 400,
                    'stroke' => 2,
                    'format' => 'base64'
                ]);
                if ($response->successful()) {
                    $kundliChartSvg = $response->body();
                    return view('kundli_pages.kundli_chart', [
                        'kundliChartSvg' => $kundliChartSvg,
                        'chartName' => $chartName,
                        'translations' => $translations
                    ]);
                   
                }
            } else {
                return response()->json(['error' => 'No Kundli data found for the user.'], 400);
            }
        } catch (\Exception $e) {
            Log::error('Error retrieving Kundli data: ', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Exception: ' . $e->getMessage()], 400);
        }
    }
    public function app_personal_characterstics(Request $request)
    {
        $userId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        try {
            if ($payload) {
                $personalCharacteristicsData = json_decode($payload->personal_characteristics_data, true);
                if (!$personalCharacteristicsData) {

                    $url = "https://api.vedicastroapi.com/v3-json/horoscope/personal-characteristics";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $personalCharacteristics = $response->json();
                    if (isset($personalCharacteristics)) {
                        $payload->personal_characteristics_data = json_encode($personalCharacteristics);
                        $payload->save();
                        $personalCharacteristicsData = $personalCharacteristics;
                    } else {
                        return response()->json(['error' => 'Failed to retrieve personal characteristics data from the astrology API.'], 400);
                    }
                }
                return response()->json([
                    'response' => $personalCharacteristicsData,
                    'lang' => $payload->language,
                    'translations' => $translations
                ]);
            } elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/horoscope/personal-characteristics";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $personalCharacteristicsData = $response->json();
                return response()->json([
                    'response' => $personalCharacteristicsData,
                    'translations' => $translations
                ]);
            } else {
                return response()->json(['error' => 'No Kundli details found for the user.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function app_ascendant_report(Request $request)
    {
        $userId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;

        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        try {
            if ($payload) {
                $ascendantReportData = json_decode($payload->ascendant_report_data, true);
                if (!$ascendantReportData) {
                    $url = "https://api.vedicastroapi.com/v3-json/horoscope/ascendant-report";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $ascendantReport = $response->json();
                    if (isset($ascendantReport)) {
                        $payload->ascendant_report_data = json_encode($ascendantReport);
                        $payload->save();
                        $ascendantReportData = $ascendantReport;
                    } else {
                        return response()->json(['error' => 'Failed to retrieve ascendant report data from the astrology API.'], 400);
                    }
                }
                return response()->json([
                    'response' => $ascendantReportData,
                    'lang' => $payload->language,
                    'translations' => $translations
                ]);
            } elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/horoscope/ascendant-report";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $ascendantReportData = $response->json();
                return response()->json([
                    'response' => $ascendantReportData,
                    'translations' => $translations
                ]);
            } else {
                return response()->json(['error' => 'No Kundli details found for the user.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function app_mahadasha(Request $request)
    {
        $userId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        $dashaType = $request->input('dashaType');
        try {
            if ($payload) {
                $mahadshaData = json_decode($payload->mahadasha_data, true);
                if (!$mahadshaData) {
                    $url = "https://api.vedicastroapi.com/v3-json/dashas/maha-dasha";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $mahadsha = $response->json();
                    if (isset($mahadsha)) {
                        $payload->mahadasha_data = json_encode($mahadsha);
                        $payload->save();
                        $mahadshaData = $mahadsha;
                    } else {
                        return response()->json(['error' => 'Failed to retrieve mahadasha data from the astrology API.'], 400);
                    }
                }
                return response()->json(['data' => $mahadshaData, 'lang' => $payload->language, 'translations' => $translations]);
            } elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/dashas/maha-dasha";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $mahadshaData = $response->json();
                return response()->json(['data' => $mahadshaData, 'meetingId' => $meetingId, 'translations' => $translations]);
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function app_antardasha(Request $request)
    {
        $userId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $dashaType = $request->input('dashaType');
        $planetType = $request->input('planetType');
        $translations = trans('messages');
        try {
            if (isset($payload)) {
                $antardashaData = json_decode($payload->antardasha_data, true);
                if (!$antardashaData) {
                    $url = "https://api.vedicastroapi.com/v3-json/dashas/antar-dasha";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $antardasha = $response->json();
                    if (isset($antardasha)) {
                        $payload->antardasha_data = json_encode($antardasha);
                        $payload->save();
                        $antardashaData = $antardasha;
                    } else {
                        return response()->json(['error' => 'Failed to retrieve antardasha data from the astrology API '], 400);
                    }
                }
                return response()->json(['response' => $antardashaData, 'dashaType' => $dashaType, 'planetType' => $planetType, 'lang' => $payload->language, 'translations' => $translations]);
            } elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/dashas/antar-dasha";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $antardashaData = $response->json();
                return response()->json(['response' => $antardashaData, 'dashaType' => $dashaType, 'planetType' => $planetType, 'meetingId' => $meetingId, 'translations' => $translations]);
            } else {
                return response()->json([
                    'error' => 'Failed to retrieve Kundli data from the
                    astrology API.'
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function app_pratyantardasha(Request $request)
    {
        $userId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $dashaType = $request->input('dashaType');
        $planetType = $request->input('planetType');
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        try {
            $pratyantardashaData = [];
            if (isset($payload)) {
                if (!empty($payload->pratyantardasha_data)) {
                    $pratyantardashaData = json_decode($payload->pratyantardasha_data, true);
                } else {
                    $url = "https://api.vedicastroapi.com/v3-json/dashas/paryantar-dasha";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $pratyantardasha = $response->json();
                    if (isset($pratyantardasha['status']) && $pratyantardasha['status'] === 200) {
                        $payload->pratyantardasha_data = json_encode($pratyantardasha);
                        $payload->save();
                        $pratyantardashaData = $pratyantardasha;
                    } elseif (isset($pratyantardasha['status']) && $pratyantardasha['status'] === 402) {
                        return "Out of API calls; please renew subscription.";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $pratyantardasha['status']);
                    }
                }

                $finalData = [];
                if (
                    isset($pratyantardashaData['response']['paryantardasha']) &&
                    is_array($pratyantardashaData['response']['paryantardasha']) &&
                    isset($pratyantardashaData['response']['paryantardasha_order']) &&
                    is_array($pratyantardashaData['response']['paryantardasha_order'])
                ) {
                    $firstParyantardasha = $pratyantardashaData['response']['paryantardasha'][$planetType][$dashaType] ?? [];
                    $firstParyantardashaOrder = $pratyantardashaData['response']['paryantardasha_order'][$planetType][$dashaType + 1] ?? [];

                    foreach ($firstParyantardasha as $index => $pratyantar) {
                        $finalData[] = [
                            'planet' => $pratyantar,
                            'start_date' => $firstParyantardashaOrder[$index] ?? null,
                            'end_date' => $firstParyantardashaOrder[$index + 1] ?? 'End of Period',
                        ];
                    }
                }
                return response()->json(['data' => $finalData, 'lang' => $payload->language, 'translations' => $translations]);
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    // public function app_pratyantardasha(Request $request)
    // {
    //     $userId = $request->user_id;
    //     $chatMeeting = null;
    //     $payload = null;
    //     $meetingId = $request->meetingId;
    //     if (isset($meetingId)) {
    //         $chatMeeting = ChatMeeting::find($meetingId);
    //         $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
    //         App::setLocale('hi');
    //     } else {
    //         $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
    //         App::setLocale($payload->language);
    //     }
    //     $dashaType = $request->input('dashaType');
    //     $planetType = $request->input('planetType');
    //     $translations = trans('messages');
    //     try {
    //         if (isset($payload)) {
    //             $pratyantardashaData = json_decode($payload->pratyantardasha_data, true);
    //             if (!$pratyantardashaData) {
    //                 $url = "https://api.vedicastroapi.com/v3-json/dashas/paryantar-dasha";
    //                 $response = Http::get($url, [
    //                     'dob' => $payload->dob,
    //                     'tob' => $payload->tob,
    //                     'lat' => $payload->lat,
    //                     'lon' => $payload->lon,
    //                     'tz' => '5.5',
    //                     'api_key' => env('VEDIC_ASTRO_API_KEY'),
    //                     'lang' => $payload->language,
    //                 ]);
    //                 $pratyantardasha = $response->json();
    //                 if (isset($pratyantardasha)) {
    //                     $payload->pratyantardasha_data = json_encode($pratyantardasha);
    //                     $payload->save();
    //                     $pratyantardashaData = $pratyantardasha;
    //                 } else {
    //                     return response()->json([
    //                         'error' => 'Failed to retrieve pratyantar dasha data from astrology API'
    //                     ], 400);
    //                 }

    //             }
    //             return response()->json(['response' => $pratyantardashaData['response'], 'dashaType' => $dashaType, 'planetType' => $planetType, 'lang' => $payload->language, 'translations' => $translations]);
    //         } elseif (isset($chatMeeting)) {
    //             $url = "https://api.vedicastroapi.com/v3-json/dashas/paryantar-dasha";
    //             $response = Http::get($url, [
    //                 'dob' => $dob,
    //                 'tob' => $chatMeeting->tob,
    //                 'lat' => $chatMeeting->lat,
    //                 'lon' => $chatMeeting->lon,
    //                 'tz' => '5.5',
    //                 'api_key' => env('VEDIC_ASTRO_API_KEY'),
    //                 'lang' => 'hi',
    //             ]);
    //             $pratyantardashaData = $response->json();
    //             return response()->json(['response' => $pratyantardashaData['response'], 'dashaType' => $dashaType, 'planetType' => $planetType, 'translations' => $translations]);
    //         } else {
    //             return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
    //         }
    //     } catch (Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 400);
    //     }
    // }

    public function app_mahadasha_prediction(Request $request)
    {
        $userId = $request->input('user_id');
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        try {
            if (isset($payload)) {
                $mahadashaPredictionData = json_decode($payload->mahadasha_prediction_data, true);
                if (!$mahadashaPredictionData) {
                    $url = "https://api.vedicastroapi.com/v3-json/dashas/maha-dasha-predictions";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $mahadashaPrediction = $response->json();
                    if (isset($mahadashaPrediction)) {
                        $payload->mahadasha_prediction_data = json_encode($mahadashaPrediction);
                        $payload->save();
                        $mahadashaPredictionData = $mahadashaPrediction;
                    } else {
                        return response()->json(['error' => 'Failed to retrieve mahadsha prediction data from astrology API'], 400);
                    }
                }
                return response()->json(['response' => $mahadashaPredictionData['response'], 'lang' => $payload->language, 'translations' => $translations]);
            } elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/dashas/maha-dasha-predictions";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $mahadashaPredictionData = $response->json();
                return response()->json(['response' => $mahadashaPredictionData['response'], 'translations' => $translations]);
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function app_sade_sati(Request $request)
    {
        $userId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        try {
            if ($payload) {
                $sadeSatiData = json_decode($payload->sadesati_data, true);
                if (!$sadeSatiData) {
                    $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/current-sade-sati";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $sadeSati = $response->json();
                    if (isset($sadeSati)) {
                        $payload->sadesati_data = json_encode($sadeSati);
                        $payload->save();
                        $sadeSatiData = $sadeSati;
                    } else {
                        return response()->json(['error' => 'Failed to retrieve sadesati data from astrology API'], 400);
                    }

                }
                return response()->json(['sadeSati' => $sadeSatiData['response'], 'lang' => $payload->language, 'translations' => $translations]);
            } elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/current-sade-sati";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $sadeSatiData = $response->json();
                return response()->json(['sadeSati' => $sadeSatiData['response'], 'translations' => $translations]);
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function app_sade_sati_table(Request $request)
    {
        $userId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        try {
            if ($payload) {
                $sadeSatiTableData = json_decode($payload->sadesati_table_data, true);
                if (!$sadeSatiTableData) {
                    $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/sade-sati-table";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $sadeSatiTable = $response->json();
                    if (isset($sadeSatiTable)) {
                        $payload->sadesati_table_data = json_encode($sadeSatiTable);
                        $payload->save();
                        $sadeSatiTableData = $sadeSatiTable;
                    } else {
                        return response()->json([
                            'error' => 'Failed to retrieve sadesati table data from astrology API'
                        ], 400);
                    }
                }
                return response()->json(['sadeSatiTable' => $sadeSatiTableData['response'], 'lang' => $payload->language, 'translations' => $translations]);
            } elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/sade-sati-table";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $sadeSatiTableData = $response->json();
                return response()->json(['sadeSatiTable' => $sadeSatiTableData['response'], 'translations' => $translations]);
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function app_friendship_composite(Request $request)
    {
        $ueserId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $ueserId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        try {
            if ($payload) {
                $friendshipTableData = json_decode($payload->friendship_table_data, true);
                if (!$friendshipTableData) {
                    $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/friendship";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $friendshipTable = $response->json();
                    if (isset($friendshipTable)) {
                        $payload->friendship_table_data = json_encode($friendshipTable);
                        $payload->save();
                        $friendshipTableData = $friendshipTable;
                    } else {
                        return response()->json(['error' => 'Failed to retrieve  friendship table data from astrology API']);
                    }
                }
                return response()->json(['response' => $friendshipTableData, 'lang' => $payload->language, 'translations' => $translations]);
            } elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/friendship";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $friendshipTableData = $response->json();
                return response()->json(['response' => $friendshipTableData, 'translations' => $translations]);
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function app_kp_houses(Request $request)
    {
        $userId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        try {
            if ($payload) {
                $kpHousesData = json_decode($payload->kp_house_data, true);
                if (!$kpHousesData) {
                    $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/kp-houses";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $kpHouses = $response->json();
                    if (isset($kpHouses)) {
                        $payload->kp_house_data = json_encode($kpHouses);
                        $payload->save();
                        $kpHousesData = $kpHouses;
                    } else {
                        return response()->json([
                            'error' => 'Failed to retrieve KP House data from astrology API'
                        ], 400);
                    }
                }
                return response()->json(['response' => $kpHousesData, 'lang' => $payload->language, 'translations' => $translations]);
            } elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/kp-houses";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $kpHousesData = $response->json();
                return response()->json(['response' => $kpHousesData, 'translations' => $translations]);
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function app_kp_houses_planet(Request $request)
    {
        $userId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        try {
            if ($payload) {
                $kpHousesPlanetData = json_decode($payload->kp_houses_planet_data, true);
                if (!$kpHousesPlanetData) {
                    $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/kp-planets";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $kpHousesPlanet = $response->json();
                    if (isset($kpHousesPlanet)) {
                        $payload->kp_houses_planet_data = json_encode($kpHousesPlanet);
                        $payload->save();
                        $kpHousesPlanetData = $kpHousesPlanet;
                    } else {
                        return response()->json(['error' => 'Failed to retrieve kphouses planet from the astrology API.'], 400);
                    }
                }
                return response()->json(['response' => $kpHousesPlanetData, 'lang' => $payload->language, 'translations' => $translations]);
            } elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/kp-planets";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $kpHousesPlanetData = $response->json();
                return response()->json(['response' => $kpHousesPlanetData, 'translations' => $translations]);
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function app_gem_suggestion(Request $request)
    {
        $userId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        try {
            if ($payload) {
                $gemSuggestionData = json_decode($payload->gem_suggestion_data, true);
                if (!$gemSuggestionData) {
                    $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/gem-suggestion";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $gemSuggestion = $response->json();
                    if (isset($gemSuggestion)) {
                        $payload->gem_suggestion_data = json_encode($gemSuggestion);
                        $payload->save();
                        $gemSuggestionData = $gemSuggestion;
                    } else {
                        return response()->json(['error' => 'Failed to retrieve Gem Suggestion data from the astrology API.'], 400);
                    }
                }
                //  return   $kundli = $planetaryPositions;
                return response()->json(['response' => $gemSuggestionData, 'lang' => $payload->language, 'translations' => $translations]);
            } elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/gem-suggestion";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $gemSuggestionData = $response->json();
                return response()->json(['response' => $gemSuggestionData, 'translations' => $translations]);
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function app_rudraksh_suggestion(Request $request)
    {
        $userId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        try {

            if ($payload) {
                $rudrakshSuggestionData = json_decode($payload->rudraksh_suggestion_data, true);
                if (!$rudrakshSuggestionData) {
                    $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/rudraksh-suggestion";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $rudrakshSuggestion = $response->json();
                    if (isset($rudrakshSuggestion)) {
                        $payload->rudraksh_suggestion_data = json_encode($rudrakshSuggestion);
                        $payload->save();
                        $rudrakshSuggestionData = $rudrakshSuggestion;
                    } else {
                        return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
                    }
                }
                return response()->json(['response' => $rudrakshSuggestionData, 'lang' => $payload->language, 'translations' => $translations]);
            } elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/rudraksh-suggestion";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $rudrakshSuggestionData = $response->json();
                return response()->json(['response' => $rudrakshSuggestionData, 'translations' => $translations]);
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function app_mangal_dosha(Request $request)
    {
        $userId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        try {
            if (isset($payload)) {
                $mangalDoshaData = json_decode($payload->mangal_dosha_data, true);
                if (!$mangalDoshaData) {
                    $url = "https://api.vedicastroapi.com/v3-json/dosha/mangal-dosh";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $mangalDosha = $response->json();
                    if (isset($mangalDosha)) {
                        $payload->mangal_dosha_data = json_encode($mangalDosha);
                        $payload->save();
                        $mangalDoshaData = $mangalDosha;
                    } else {
                        return response()->json(['error' => 'Failed to retrieve Mangal Dosha data from the astrology API.'], 400);
                    }
                }
                return response()->json(['response' => $mangalDoshaData['response'], 'lang' => $payload->language, 'translations' => $translations]);
            } elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/dosha/mangal-dosh";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $mangalDoshaData = $response->json();
                return response()->json(['response' => $mangalDoshaData['response'], 'translations' => $translations]);
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function app_kaalsarp_dosha(Request $request)
    {
        $userId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        try {
            if ($payload) {
                $kaalsharpDoshaData = json_decode($payload->kaalsharp_dosha_data, true);
                if (!$kaalsharpDoshaData) {
                    $url = "https://api.vedicastroapi.com/v3-json/dosha/kaalsarp-dosh";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $kaalsharpDosha = $response->json();
                    if (isset($kaalsharpDosha)) {
                        $payload->kaalsharp_dosha_data = json_encode($kaalsharpDosha);
                        $payload->save();
                        $kaalsharpDoshaData = $kaalsharpDosha;
                    } else {
                        return response()->json(['error' => 'Failed to retrieve Kaalsharp dosha data from the astrology API.'], 400);
                    }
                }
                return response()->json(['response' => $kaalsharpDoshaData['response'], 'lang' => $payload->language, 'translations' => $translations]);
            } elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/dosha/kaalsarp-dosh";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $kaalsharpDoshaData = $response->json();
                return response()->json(['response' => $kaalsharpDoshaData['response'], 'translations' => $translations]);
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function app_pitra_dosha(Request $request)
    {
        $userId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        try {

            if ($payload) {
                $pitraDoshaData = json_decode($payload->pitra_dosha_data, true);
                if (!$pitraDoshaData) {
                    $url = "https://api.vedicastroapi.com/v3-json/dosha/pitra-dosh";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $pitraDosha = $response->json();
                    if (isset($pitraDosha)) {
                        $payload->pitra_dosha_data = json_encode($pitraDosha);
                        $payload->save();
                        $pitraDoshaData = $pitraDosha;
                    } else {
                        return response()->json(['error' => 'Failed to retrieve pitra dosha data from the astrology API.'], 400);
                    }
                }
                return response()->json(['data' => $pitraDoshaData, 'lang' => $payload->language, 'translations' => $translations]);

            } elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/dosha/pitra-dosh";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $pitraDoshaData = $response->json();
                return response()->json(['data' => $pitraDoshaData, 'translations' => $translations]);
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function app_papasamaya(Request $request)
    {
        $userId = $request->user_id;
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', $userId)->latest()->first();
            App::setLocale($payload->language);
        }
        $translations = trans('messages');
        try {
            if ($payload) {
                $papasamayaData = json_decode($payload->papasamaya_data, true);
                if (!$papasamayaData) {
                    $url = "https://api.vedicastroapi.com/v3-json/dosha/papasamaya";
                    $response = Http::get($url, [
                        'dob' => $payload->dob,
                        'tob' => $payload->tob,
                        'lat' => $payload->lat,
                        'lon' => $payload->lon,
                        'tz' => '5.5',
                        'api_key' => env('VEDIC_ASTRO_API_KEY'),
                        'lang' => $payload->language,
                    ]);
                    $papasamaya = $response->json();
                    if (isset($papasamaya)) {
                        $payload->papasamaya_data = $papasamaya;
                        $payload->save();
                        $papasamayaData = $papasamaya;
                    } else {
                        return response()->json(['error' => 'Failed to retrieve papasamaya data from the astrology API.'], 400);
                    }
                }
                return response()->json(['response' => $papasamayaData['response'], 'lang' => $payload->language, 'translations' => $translations]);
            } elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/dosha/papasamaya";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $papasamayaData = $response->json();
                return response()->json(['response' => $papasamayaData['response'], 'translations' => $translations]);
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    //User Kundli Matching
    public function app_ashtakoot_matching(Request $request)
    {
        $request->validate([
            'male_name' => 'required|string',
            'male_dob' => 'required',
            'male_tob' => 'required',
            'male_place' => 'required',
            'male_lat' => 'required',
            'male_lon' => 'required',
            'female_name' => 'required|string',
            'female_dob' => 'required',
            'female_tob' => 'required',
            'female_place' => 'required',
            'female_lat' => 'required',
            'female_lon' => 'required',
            'lang' => 'required',
            'user_id' => 'required',
        ]);
        try {
            // male details
            $male_name = $request->input('male_name');
            $male_dob = $request->input('male_dob');
            $male_tob = $request->input('male_tob');
            $male_place = $request->input('male_place');
            $male_lat = $request->input('male_lat') ?? '23.1686';
            $male_lon = $request->input('male_lon') ?? '79.9339';
            //female details
            $female_name = $request->input('female_name');
            $female_dob = $request->input('female_dob');
            $female_tob = $request->input('female_tob');
            $female_place = $request->input('female_place');
            $female_lat = $request->input('female_lat') ?? '23.1686';
            $female_lon = $request->input('female_lon') ?? '79.9339';
            $userId = $request->input('user_id');
            $lang = $request->input('lang', 'en');
            App::setLocale($lang);
            $translations = trans('messages');
            $kundliMatchingDetail = new Kundli_Matching_Detail();
            // Assign values
            $kundliMatchingDetail->male_name = $male_name;
            $kundliMatchingDetail->male_dob = $male_dob;
            $kundliMatchingDetail->male_tob = $male_tob;
            $kundliMatchingDetail->male_place = $male_place;
            $kundliMatchingDetail->male_lat = $male_lat;
            $kundliMatchingDetail->male_lon = $male_lon;

            $kundliMatchingDetail->female_name = $female_name;
            $kundliMatchingDetail->female_dob = $female_dob;
            $kundliMatchingDetail->female_tob = $female_tob;
            $kundliMatchingDetail->female_place = $female_place;
            $kundliMatchingDetail->female_lat = $female_lat;
            $kundliMatchingDetail->female_lon = $female_lon;
            $kundliMatchingDetail->language = $lang;
            $kundliMatchingDetail->user_login_id = $userId;
            $kundliMatchingDetail->save();
            // API details
            $apiKey = env('VEDIC_ASTRO_API_KEY');
            $url = "https://api.vedicastroapi.com/v3-json/matching/ashtakoot";
            $params = [
                'boy_dob' => $male_dob,
                'boy_tob' => $male_tob,
                'boy_tz' => 5.5,
                'boy_lat' => $male_lat,
                'boy_lon' => $male_lon,
                'girl_dob' => $female_dob,
                'girl_tob' => $female_tob,
                'girl_tz' => 5.5,
                'girl_lat' => $male_lat,
                'girl_lon' => $male_lon,
                'api_key' => $apiKey,
                'lang' => $lang,

            ];
            // return $kundliMatchingDetail;
            $response = Http::get($url, $params);
            if ($response->successful()) {
                $data = $response->json();
                return response()->json(['response' => $data, 'kundliMatchingDetail' => $kundliMatchingDetail, 'lang' => $lang, 'translations' => $translations]);
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function app_dashakoot_matching(Request $request)
    {

        $userId = $request->user_id;
        if (!empty($userId)) {
            $payload = Kundli_Matching_Detail::where('user_login_id', $userId)->latest()->first();
        }
        App::setLocale($payload->language);
        $translations = trans('messages');
        try {
            if ($payload) {
                $apiKey = env('VEDIC_ASTRO_API_KEY');
                $url = "https://api.vedicastroapi.com/v3-json/matching/dashakoot";
                $params = [
                    'boy_dob' => $payload->male_dob,
                    'boy_tob' => $payload->male_tob,
                    'boy_tz' => 5.5,
                    'boy_lat' => $payload->male_lat,
                    'boy_lon' => $payload->male_lon,
                    'girl_dob' => $payload->female_dob,
                    'girl_tob' => $payload->female_tob,
                    'girl_tz' => 5.5,
                    'girl_lat' => $payload->female_lat,
                    'girl_lon' => $payload->female_lon,
                    'api_key' => $apiKey,
                    'lang' => $payload->language,

                ];
                $response = Http::get($url, $params);
                if ($response->successful()) {
                    $data = $response->json();
                    return response()->json(['data' => $data, 'payload' => $payload, 'lang' => $payload->language, 'translations' => $translations]);
                }
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function app_aggregate_matching(Request $request)
    {
        $userId = $request->user_id;
        if (!empty($userId)) {
            $payload = Kundli_Matching_Detail::where('user_login_id', $userId)->latest()->first();
        }
        try {
            App::setLocale($payload->language);
            $translations = trans('messages');
            if ($payload) {
                $apiKey = env('VEDIC_ASTRO_API_KEY');
                $url = "https://api.vedicastroapi.com/v3-json/matching/aggregate-match";
                $params = [
                    'boy_dob' => $payload->male_dob,
                    'boy_tob' => $payload->male_tob,
                    'boy_tz' => 5.5,
                    'boy_lat' => $payload->male_lat,
                    'boy_lon' => $payload->male_lon,
                    'girl_dob' => $payload->female_dob,
                    'girl_tob' => $payload->female_tob,
                    'girl_tz' => 5.5,
                    'girl_lat' => $payload->female_lat,
                    'girl_lon' => $payload->female_lon,
                    'api_key' => $apiKey,
                    'lang' => $payload->language,

                ];
                $response = Http::get($url, $params);
                if ($response->successful()) {
                    $data = $response->json();
                    return response()->json(['data' => $data, 'payload' => $payload, 'lang' => $payload->language, 'translations' => $translations]);
                }
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function rajju_vedha_matching(Request $request)
    {
        $userId = $request->user_id;
        if (!empty($userId)) {
            $payload = Kundli_Matching_Detail::where('user_login_id', $userId)->latest()->first();
        }
        try {
            App::setLocale($payload->language);
            $translations = trans('messages');
            if ($payload) {
                $apiKey = env('VEDIC_ASTRO_API_KEY');
                $url = "https://api.vedicastroapi.com/v3-json/matching/rajju-vedha-details";
                $params = [
                    'boy_dob' => $payload->male_dob,
                    'boy_tob' => $payload->male_tob,
                    'boy_tz' => 5.5,
                    'boy_lat' => $payload->male_lat,
                    'boy_lon' => $payload->male_lon,
                    'girl_dob' => $payload->female_dob,
                    'girl_tob' => $payload->female_tob,
                    'girl_tz' => 5.5,
                    'girl_lat' => $payload->female_lat,
                    'girl_lon' => $payload->female_lon,
                    'api_key' => $apiKey,
                    'lang' => $payload->language,

                ];
                $response = Http::get($url, $params);
                if ($response->successful()) {
                    $data = $response->json();
                    return response()->json(['data' => $data, 'payload' => $payload, 'lang' => $payload->language, 'translations' => $translations]);
                }
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function app_papasamaya_matching(Request $request)
    {
        $userId = $request->user_id;
        if (!empty($userId)) {
            $payload = Kundli_Matching_Detail::where('user_login_id', $userId)->latest()->first();
        }
        try {
            App::setLocale($payload->language);
            $translations = trans('messages');
            if ($payload) {
                $apiKey = env('VEDIC_ASTRO_API_KEY');
                $url = "https://api.vedicastroapi.com/v3-json/matching/papasamaya-match";
                $params = [
                    'boy_dob' => $payload->male_dob,
                    'boy_tob' => $payload->male_tob,
                    'boy_tz' => 5.5,
                    'boy_lat' => $payload->male_lat,
                    'boy_lon' => $payload->male_lon,
                    'girl_dob' => $payload->female_dob,
                    'girl_tob' => $payload->female_tob,
                    'girl_tz' => 5.5,
                    'girl_lat' => $payload->female_lat,
                    'girl_lon' => $payload->female_lon,
                    'api_key' => $apiKey,
                    'lang' => $payload->language,

                ];
                $response = Http::get($url, $params);
                if ($response->successful()) {
                    $data = $response->json();
                    return response()->json(['data' => $data, 'payload' => $payload, 'lang' => $payload->language, 'translations' => $translations]);
                }
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    //user numerology
    public function app_numerology_details(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'gender' => 'required',
            'place' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'dob' => 'required',
            'tob' => 'required',
            'lang' => 'required',
        ]);
        // return 1;
        $userId = $request->user_id;
        $full_name = $request->input('full_name');
        $gender = $request->input('gender');
        $place = $request->input('place');
        $dob = Carbon::parse($request->input('dob'))->format('d/m/Y');
        $tob = $request->input('tob');
        $lat = $request->input('lat') ?? '23.1686';
        $lon = $request->input('lon') ?? '79.9339';
        $tz = '5.5';
        $apiKey = env('VEDIC_ASTRO_API_KEY');
        $lang = $request->lang;
        App::setLocale($lang);
        $translations = trans('messages');
        $basicUserDetails = [
            'full_name' => $request->input('full_name'),
            'gender' => $request->input('gender'),
            'place' => $request->input('place'),
            'dob' => Carbon::parse($request->input('dob'))->format('d/m/Y'),
            'tob' => $request->input('tob'),
            // 'lat' => $request->input('lat');
            // 'lon' => $request->input('lon');
            'lat' => '23.1686',
            'lon' => '79.9339',
            'tz' => '5.5',
            'apiKey' => env('VEDIC_ASTRO_API_KEY'),
            'lang' => $request->lang,
        ];
        try {
            $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/numero-table";
            $response = Http::get($url, [
                'name' => $full_name,
                'dob' => $dob,
                'tob' => $tob,
                'lat' => $lat,
                'lon' => $lon,
                'tz' => $tz,
                'api_key' => $apiKey,
                'lang' => $lang,
            ]);
            $numerology = $response->json();
            if (isset($numerology)) {
                //  return   $kundli = $data;
                return response()->json(['data' => $numerology, 'basicUserDetails' => $basicUserDetails, 'lang' => $lang, 'translations' => $translations]);
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function app_panchang_details(Request $request)
    {
        $request->validate([
            'place' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'date' => 'required',
            'time' => 'required',
            'lang' => 'required',
        ]);
        $place = $request->input('place');
        $date = Carbon::parse($request->input('date'))->format('d/m/Y');
        $time = $request->input('time');
        $lat = $request->input('lat') ?? '23.1686';
        $lon = $request->input('lon') ?? '79.9339';
        // $lat = '23.1686';
        // $lon = '79.9339';
        $tz = '5.5';
        $apiKey = env('VEDIC_ASTRO_API_KEY');
        $lang = $request->input('lang');
        App::setLocale($lang);
        $translations = trans('messages');
        try {
            $url = "https://api.vedicastroapi.com/v3-json/panchang/panchang";
            $response = Http::get($url, [
                'date' => $date,
                'time' => $time,
                'lat' => $lat,
                'lon' => $lon,
                'tz' => $tz,
                'api_key' => $apiKey,
                'lang' => $lang,
            ]);
            $panchangDetails = $response->json();
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        return response()->json([
            'response' => $panchangDetails['response'],
            'lang' => $lang,
            'translations' => $translations
        ]);
    }

    public function app_yogas_details(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'gender' => 'required',
            'place' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'dob' => 'required',
            'tob' => 'required',
            'lang' => 'required',
        ]);
        $full_name = $request->input('full_name');
        $gender = $request->input('gender');
        $place = $request->input('place');
        $dob = Carbon::parse($request->input('dob'))->format('d/m/Y');
        $tob = $request->input('tob');
        $lat = $request->input('lat') ?? '23.1686';
        $lon = $request->input('lon') ?? '79.9339';
        $tz = '5.5';
        $apiKey = env('VEDIC_ASTRO_API_KEY');
        $lang = $request->lang;
        App::setLocale($lang);
        $translations = trans('messages');
        $basicUserDetails = [
            'full_name' => $request->input('full_name'),
            'gender' => $request->input('gender'),
            'place' => $request->input('place'),
            'dob' => Carbon::parse($request->input('dob'))->format('d/m/Y'),
            'tob' => $request->input('tob'),
            'lat' => $request->input('lat'),
            'lon' => $request->input('lon'),
            'tz' => '5.5',
            'apiKey' => env('VEDIC_ASTRO_API_KEY'),
            'lang' => $request->lang,
        ];

        try {
            $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/yoga-list";
            $response = Http::get($url, [
                'name' => $full_name,
                'dob' => $dob,
                'tob' => $tob,
                'lat' => $lat,
                'lon' => $lon,
                'tz' => $tz,
                'api_key' => $apiKey,
                'lang' => $lang,
            ]);
            $numerology = $response->json();
            if (isset($numerology)) {
                //  return   $kundli = $data;
                return response()->json(['yogas' => $numerology['response']['yogas_list'], 'lang' => $lang, 'basicUserDetails' => $basicUserDetails, 'translations' => $translations]);
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function fetchUserLanguage(Request $request){

        $request->validate([
            'user_id' => 'required',
            'user_lang' => 'required'
        ]);
        try {
            $user = User::find($request->user_id);
            $user->user_lang = $request->user_lang;
            $user->save();
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        return response()->json(['user' => $user]);
    }
    public function appBannerImage(){
        $banner = AppBanner::where('status', 1)->get();
        return response()->json(['banner' => $banner]);
    }
    public function appAstrologerList()
    {
        $astrologers = User::with('astrologerGallery')->with('astrologerDetail')->where('type', 'astrologer')->where('is_active', 1)->get();
        return response()->json([
            'status' => 'success',
            'data' => $astrologers
        ]);
    }

    public function chatMeetingSave(Request $request){

        $request->validate([
            'user_id' => 'required',
            'astrologer_id' => 'required',
            'name' => 'required',
            'mobile_number' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'tob' => 'required',
            'place' => 'required',
            'lat' => 'required',
            'lon' => 'required'
        ]);

        $user_id = $request->user_id;
        $astrologer_id = $request->astrologer_id;
        $name = $request->name;
        $mobile = $request->mobile_number;
        $gender = $request->gender;
        $dob = $request->dob;
        $tob = $request->tob;
        $place = $request->place;
        $lat = $request->lat;
        $lon = $request->lon;
        $astrologer = User::find($astrologer_id);
        $price_per_min = $astrologer->astrologerDetail->charge_per_min;
        $formattedBalance = getUserBalance($user_id);
        $cleanedBalance = str_replace(',', '', $formattedBalance);
        $balance = (float) $cleanedBalance;
        if ($price_per_min < $balance) {
            if (isset($astrologer)) {
                $meeting = ChatMeeting::firstOrNew(['user_id' => $user_id, 'astrologer_id' => $astrologer->id]);
                $meeting->user_id = $user_id;
                $meeting->astrologer_id = $astrologer_id;
                $meeting->user_encrypt = generateRandomString();
                $meeting->astro_encrypt = generateRandomString();
                $meeting->name = $name;
                $meeting->phone = $mobile;
                $meeting->gender = $gender;
                $meeting->dob = date('Y-m-d', strtotime($dob));
                $meeting->tob = date('H:i', strtotime($tob));
                $meeting->place = $place;
                $meeting->lat = $lat;
                $meeting->lon = $lon;
                $meeting->wallet = getUserBalance($user_id);
                $meeting->charge_per_min = $astrologer->astrologerDetail->charge_per_min;
                $meeting->is_stop = 1;
                $meeting->is_complete = 2;
                $formattedBalance = getUserBalance($user_id);
                $cleanedBalance = str_replace(',', '', $formattedBalance);
                $balance = (float) $cleanedBalance;
                $meeting->timer = floor(($balance / $astrologer->astrologerDetail->charge_per_min) * 60);
                $meeting->balance_time = $meeting->timer;
                $meeting->save();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Meeting created successfully',
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Insufficient balance, Please recharge now',
            ]);
        }
       
    }

    public function chatMeetingList(Request $request)
{
    $request->validate([
        'type' => 'required'
    ]);

    if ($request->type == 'user') {
        $request->validate([
            'user_id' => 'required'
        ]);
        $user_id = $request->user_id;

        $chats = ChatMeeting::with('astrologerDetails', 'userDetails')
            ->where('user_id', $user_id)
            ->orderBy('id', 'DESC')
            ->get();

    } elseif ($request->type == 'astrologer') {
        $request->validate([
            'astrologer_id' => 'required'
        ]);
        $astrologer_id = $request->astrologer_id;

        $chats = ChatMeeting::with('astrologerDetails', 'userDetails')
            ->where('astrologer_id', $astrologer_id)
            ->orderBy('id', 'DESC')
            ->get();
    }

    $chats = $chats->map(function ($chat) {
        $chat->wallet_balance = getUserBalance($chat->user_id);
        return $chat;
    });

    return response()->json([
        'status' => 'success',
        'data'   => $chats,
    ]);
}


    // public function chatMeetingList(Request $request){
    //     $request->validate([
    //         'type' => 'required'
    //     ]);
    //     if ($request->type == 'user') {
    //         $request->validate([
    //             'user_id' => 'required'
    //         ]);
    //         $user_id = $request->user_id;
    //         $chats = ChatMeeting::with('astrologerDetails', 'userDetails')
    //             ->where('user_id', $user_id)
    //             ->orderBy('id', 'DESC')
    //             ->get();
    //     } elseif ($request->type == 'astrologer') {
    //         $request->validate([
    //             'astrologer_id' => 'required'
    //         ]);
    //         $astrologer_id = $request->astrologer_id;
    //         $chats = ChatMeeting::with('astrologerDetails', 'userDetails')
    //             ->where('astrologer_id', $astrologer_id)
    //             ->orderBy('id', 'DESC')
    //             ->get();
    //     }

    //     return response()->json([
    //         'status' => 'success',
    //         'data' => $chats,
    //     ]);
    // }

    public function userWalletBalance(Request $request){
        $request->validate([
            'user_id' => 'required'
        ]);
        $type = $request->type;
        $user_id = $request->user_id;
        if (isset($type)) {
            $earnings = WalletManagement::where('astrologer_id', $user_id)->get();
            $wallletBalance = $earnings->sum('astrologer_amount');
        } else {    
            $wallletBalance = getUserBalance($user_id);
        }
        return response()->json([
            'status' => 'success',
            'data' => $wallletBalance,
        ]);
    }

    public function appAppointmentSave(Request $request)
    {
        // return $request->all();
        $request->validate([
            'user_id' => 'required',
            'astrologer_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'tob' => 'required',
            'duration' => 'required',
            'gender' => 'required',
            'place' => 'required',
            'reason' => 'required',
            'method' => 'required',
            'preferred_date' => 'required',
            'lat' => 'required',
            'lon' => 'required',
        ]);
        try {
                $astrologer = User::find($request->astrologer_id);
            $price_per_min = $astrologer->astrologerDetail->charge_per_min;
            $formattedBalance = getUserBalance($request->user_id);
            $cleanedBalance = str_replace(',', '', $formattedBalance);
            $balance = (float) $cleanedBalance;
            if ($balance > $price_per_min * (int) $request->duration) {
                $appointment = new Appointment();
                $appointment->user_id = $request->user_id;
                $appointment->astrologer_id = $request->astrologer_id;
                $appointment->name = $request->name;
                $appointment->phone = $request->phone;
                $appointment->dob = date('Y-m-d', strtotime($request->dob));
                $appointment->tob = date('H:i', strtotime($request->tob));
                $appointment->place = $request->place;
                $appointment->preferred_time = date('H:i', strtotime($request->preferred_date));
                $appointment->gender = $request->gender;
                $appointment->duration = $request->duration;

                $appointment->lat = $request->lat;
                $appointment->lon = $request->lon;
                $appointment->preferred_date = date('Y-m-d', strtotime($request->preferred_date));
                $appointment->way_to_reach = $request->method;
                $appointment->reason = $request->reason;
                $appointment->save();
            } else {
                
                $neededBalance = (float) $request->duration * (float) $price_per_min - $balance;
                return response()->json([
                    'error' => "You don't have enough balance",
                    'neededBalance' => $neededBalance,
                    'flex' => 'flex',
                ]);
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Appointment saved successfully',
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

   
    public function appAppointmentList(Request $request)
    {
        $request->validate([
            'type' => 'required'
        ]);
        if ($request->type == 'user') {
            $request->validate([
                'user_id' => 'required'
            ]);
            $appoinments = Appointment::with('astroDetails', 'userDetails', 'getAstrologerDetail')->where('user_id', $request->user_id)->orderBy('id', 'desc')->get();
        } elseif ($request->type == 'astrologer') {
            $request->validate([
                'astrologer_id' => 'required'
            ]);
            $appoinments = Appointment::with('astroDetails', 'userDetails', 'getAstrologerDetail')->where('astrologer_id', $request->astrologer_id)->orderBy('id', 'desc')->get();
        }
        return response()->json([
            'status' => 'success',
            'data' => $appoinments
        ]);
    }

    public function appPricingPlan()
    {
        try {
            $packages = Package::where('is_active', '1')->orderBy('id', 'desc')->get();
            return response()->json([
                'status' => 'success',
                'packages' => $packages
            ]);
        } catch (\Exception $e) {
            \Log::error('Error onboarding user: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Please try again.']);
        }
    }

    public function handlePaymentStatus(Request $request)
    {
        $code = $request->input('code');
        $order_id = $request->input('transactionId');
        $providerReferenceId = $request->input('providerReferenceId');
        $amount = $request->input('amount') / 100;
        if (!$code || !$order_id) {
            return response()->json(['status' => false, 'message' => 'Invalid payment response.'], 400);
        }
        $payment = Payment::where('order_id', $order_id)->first();
        if (!$payment) {
            return response()->json(['status' => false, 'message' => 'Payment record not found.'], 404);
        }
        if ($code === 'PAYMENT_SUCCESS') {
            $payment->status = 'completed';
            $payment->amount = $amount;
            $payment->save();
            // return response()->json(['status' => true, 'message' => 'Payment successful.']);
            return redirect('wallet')->with('success', 'Payment successfully completed!');
        } else {
            $payment->status = 'failed';
            $payment->save();
            // return response()->json(['status' => false, 'message' => 'Payment failed.'], 400);
            return redirect('wallet')->with('error', 'Payment failed!');
        }
    }

     public function handlePaymentStatusKundli(Request $request)
    {
        $code = $request->input('code');
        $order_id = $request->input('transactionId');
        $providerReferenceId = $request->input('providerReferenceId');
        $amount = $request->input('amount') / 100;
        if (!$code || !$order_id) {
            return response()->json(['status' => false, 'message' => 'Invalid payment response.'], 400);
        }
      
        $payment = ParasarKundliDetail::where('order_id', $order_id)->first();
        $payments = Payment::where('order_id', $order_id)->first();
        if (!$payment) {
            return response()->json(['status' => false, 'message' => 'Payment record not found.'], 404);
        }
        if ($code === 'PAYMENT_SUCCESS') {
            $payment->payment_status = 'completed';
            $payment->payble_amount = $amount;
            $payment->save();
            $payments->status = 'completed';
            $payments->amount = $amount;
            $payments->save();
           
            // return response()->json(['status' => true, 'message' => 'Payment successful.']);
            return redirect('wallet')->with('success', 'Payment successfully completed!');
        } else {
            $payment->payment_status = 'failed';
            $payment->save();
            $payments->status = 'failed';
            $payments->save();
            // return response()->json(['status' => false, 'message' => 'Payment failed.'], 400);
            return redirect('wallet')->with('error', 'Payment failed!');
        }
    }

    public function appAppointmentUpdate(Request $request){
        $request->validate([
            'appointment_id' => 'required|numeric',
            'status' => 'required|in:1,2,3,4',
            'is_completed' => 'required|in:0,1',
        ]);
        $appointmentId = $request->input('appointment_id');
        $status = $request->input('status');
        $is_completed = $request->input('is_completed');
        $timeDcrease = $request->input('duration', 0);
        $appointment = Appointment::find($appointmentId);
        if (!$appointment) {
            return response()->json(['status' => false, 'message' => 'Appointment not found.'], 404);
        }
        $appointment->status = $status;
        $appointment->is_completed = $is_completed;
        if ($timeDcrease > 0) {
            if ($appointment && $appointment->duration > $timeDcrease) {
                $appointment->duration = $timeDcrease;
            }
        }
        $appointment->save();
        
        return response()->json(['status' => true, 'message' => 'Appointment status updated successfully.', 'appointment' => $appointment]);
    }
    public function appAstroEarningHistory(Request $request){
         $request->validate([
              'astrologer_id' => 'required|numeric',
         ]);
        try {
            $astrologerId = $request->input('astrologer_id');
            $earnings = WalletManagement::where('astrologer_id', $astrologerId)->with(['getAstrologer:id,name,avtar', 'getUser:id,name,avtar'])->orderBy('id', 'DESC')->get();
            $totalEarning = $earnings->sum('astrologer_amount');
            return response()->json([
                'status' => 'success',
                'packages' => $earnings,
                'totalEarning' => $totalEarning
            ]);

       } catch (\Throwable $e) {
           return response()->json(['error' => $e->getMessage()], 500);
       }
    }
    // public function updateUserDetails(Request $request){
    //     try {
    //         // return $request->all();
    //         $request->validate([
    //             'name' => 'required|string|max:255',
    //             'email' => 'required',
    //             'dob' => 'required|date|before:today',
    //             'tob' => 'required|date_format:H:i',
    //             'gender' => 'required|in:male,female,other',
    //             'pob' => 'required|string|max:255',
    //         ]);
    //         $userId = $request->input('user_id');
    //         $name = $request->input('name');
    //         $email = $request->input('email');
    //         $dob = $request->input('dob');
    //         $tob = $request->input('tob');
    //         $gender = $request->input('gender');
    //         $pob = $request->input('pob');
    //         $about = $request->input('about', '');
    //         $user = User::find($userId);
    //         if (!$user) {
    //             return back()->with('error', 'User not found.');
    //         }
    //         $previousPath = $user->avtar;
    //         $user->avtar = saveUserImage($request->profile_image);
    //         $user->save();
    //         if ($previousPath && file_exists(public_path($previousPath))) {
    //             unlink(public_path($previousPath));
    //         }
    //         $user->name = $name;
    //         $user->email = $email;
    //         $user->gender = $gender;
    //         $user->save();
    //         $userDetails = UserDetails::firstOrNew(['user_id' => $userId]);
    //         $userDetails->dob = $dob;
    //         $userDetails->tob = $tob;
    //         $userDetails->pob = $pob;
    //         // $userDetails->rashi = $request->rashi;
    //         $userDetails->about = $about;
    //         $userDetails->save();
    //         return response()->json(['status' => true, 'message' => 'User updated successfully.']);
    //     } catch (\Exception $e) {
    //         return back()->with('error', $e->getMessage());
    //     }
    //    }

    public function updateUserDetails(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'dob' => ['required'],
                'tob' => 'required|date_format:H:i',
                'gender' => 'required|in:male,female,other',
                'pob' => 'required|string|max:255',
                'about' => 'nullable|string',
            ]);
            // Retrieve user
            $user = User::find($request->user_id);
            if (!$user) {
                return response()->json(['status' => false, 'message' => 'User not found.'], 404);
            }
            if ($request->input('profile_image')) {
                   $user->avtar = saveBase64Image($request->file('profile_image'));
            }
            // if ($request->filled('profile_image')) {
            //     $base64Image = $request->input('profile_image');
            //     $previousPath = $user->avtar;
            //     if ($previousPath && file_exists(public_path($previousPath))) {
            //         @unlink(public_path($previousPath));
            //     }
            //    return $user->avtar = saveBase64Image($base64Image);
            // }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->save();
            $userDetails = UserDetails::firstOrNew(['user_id' => $user->id]);
            // $userDetails->dob = Carbon::createFromFormat('d/m/Y', $request->input('dob'));
            $userDetails->dob = Carbon::parse($request->dob)->format('Y-m-d');
            $userDetails->tob = $request->tob;
            $userDetails->pob = $request->pob;
            $userDetails->about = $request->about ?? '';
            $userDetails->save();
            return response()->json(['status' => true, 'message' => 'User updated successfully.', 'user' => $user, 'userDetails' => $userDetails]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function appUserDetails(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);
        $userId = $request->input('user_id');
        $user = User::with('getWalletInfo')->find($userId);
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found.'], 404);
        }
        $userDetails = UserDetails::where('user_id', $user->id)->first();
        $user = ['user' => $user, 'userDetails' => $userDetails];
        // $d = User::with('getWalletInfo')->where('id', Auth::user()->id)->first();
        // $rashis = Rashi::get();
        return response()->json([
            'status' => 'success',
            'user' => $user
        ]);
    }
    public function appUpdateLastSeen(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'last_seen' => 'required',
        ]);
        $userId = $request->input('user_id');
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found.'], 404);
        }
        $user->last_seen = $request->input('last_seen');
        $user->save();
        return response()->json([
            'status' => 'success',
        ]);
    }

    private $merchantId;
    private $saltKey;
    private $saltIndex;
    private $apiUrl;
    public function __construct()
    {
        $this->merchantId = config('phonepe.merchant_id', 'M22MBXL2T7FMF');
        $this->saltKey = config('phonepe.salt_key', '291e0728-76f0-4ec1-9ea0-89f4b833069f');
        $this->saltIndex = config('phonepe.salt_index', 1);
        $this->apiUrl = config('phonepe.api_url', 'https://api.phonepe.com/apis/hermes');
    }
    /**
     * Create Payment Order
     */
    public function createOrder(Request $request)
    {
        try {
            // $request->validate([
            //     'amount' => 'required|numeric|min:1',
            //     'mobile' => 'required|string|size:10',
            //     'user_id' => 'required|exists:users,id',
            //     'name' => 'required|string|max:255',
            //     // 'bonus' => 'nullable|numeric|min:0',
            //     // 'pkg_id' => 'nullable|numeric|min:0',
            // ]);
            $userId = $request->input('user_id');
            $amount = $request->input('amount');
            $without_gst_ammount = $amount * 82 / 100;
            $bonus = $request->input('bonus') ?? 0;
            $pkg_id = $request->input('pkg_id') ?? 0;
            $name = $request->input('name');
            $mobile = $request->input('mobile');
            $merchantTransactionId = 'T' . time() . rand(1000, 9999);
            $merchantUserId = 'U' . rand(1000, 9999);

            //premium kundli
            $dob = $request->input('dob');
            $tob = $request->input('tob');
            $place = $request->input('place');
            $gender = $request->input('gender');
            $lang = $request->input('lang');
            if (!empty($dob) && !empty($tob) && !empty($place) && !empty($gender)){
                    $paymentk = new ParasarKundliDetail();
                    $paymentk->name = $name;
                    $paymentk->mobile = $mobile;
                    $paymentk->payment_status = 'pending';
                    $paymentk->dob = $dob;
                    $paymentk->tob = $tob;
                    $paymentk->place = $place;
                    $paymentk->gender = $gender;
                    $paymentk->payble_amount = $amount;
                    $paymentk->lang = $lang;
                    $paymentk->order_id = $merchantTransactionId;
                    $paymentk->user_id = $userId;
                    $paymentk->save();
                    
                    $payment = new Payment();
                    $payment->user_id = $userId;
                    $payment->amount = $amount;
                    $payment->credits = 500;
                    $payment->status = 'pending';
                    $payment->name = $name;
                    $payment->order_id = $merchantTransactionId;
                    $payment->date = now();
                    $payment->save();
            } else {
                $payment = new Payment();
                $payment->user_id = $userId;
                $payment->amount = $amount;
                $payment->credits = $without_gst_ammount;
                $payment->status = 'initiated';
                $payment->bonus = $bonus;
                $payment->pkg_id = $pkg_id;
                $payment->name = $name;
                $payment->order_id = $merchantTransactionId;
                $payment->date = now();
                $payment->save();
            }

            $paymentPayload = [
                'merchantId' => $this->merchantId,
                'merchantTransactionId' => $merchantTransactionId,
                'merchantUserId' => $merchantUserId,
                'amount' => $amount * 100, 
                'redirectUrl' => url('/api/phonepe/callback'), 
                'redirectMode' => 'POST', 
                'callbackUrl' => url('/api/phonepe/callback'),
                'mobileNumber' => $mobile, 
                'paymentInstrument' => [
                    'type' => 'PAY_PAGE'
                ]
            ];
            $base64Body = base64_encode(json_encode($paymentPayload));
            $checksum = $this->generateChecksums($base64Body, '/pg/v1/pay');
            return response()->json([
                'success' => true,
                'request' => $base64Body,
                'checksum' => $checksum,
                'merchantTransactionId' => $merchantTransactionId,
                'paymentPayload' => $paymentPayload,
                'token' => $token = \Str::random(40),
            ]);
        } catch (Exception $e) {
            Log::error('PhonePe Create Order Error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'error' => 'Failed to create order: ' . $e->getMessage()
            ], 500);
        }
    }
    private function generateChecksums($base64Body, $endpoint)
    {
        $string = $base64Body . $endpoint . $this->saltKey;
        $sha256 = hash('sha256', $string);
        return $sha256 . '###' . $this->saltIndex;
    }
    public function generateChecksum(Request $request)
    {
        try {
            $request->validate([
                'base64Body' => 'required|string'
            ]);
            $base64Body = $request->input('base64Body');
            $checksum = $this->generateChecksums($base64Body, '/pg/v1/pay');
            return response()->json([
                'success' => true,
                'checksum' => $checksum
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 400);
        }
    }

   public function callback(Request $request){
        $transactionId = $request->input(key: 'transactionId');
        $status = $request->input('status');
        if (!$transactionId || !$status) {
            return response()->json(['status' => false, 'message' => 'Invalid callback data.'], 400);
        }
        $kundliPayment = ParasarKundliDetail::where('order_id', $transactionId)->first();
        if ($kundliPayment) {
            if ($status === 'SUCCESS') {
                $kundliPayment->payment_status = 'completed';
                $kundliPayment->save();
            } else {
                $kundliPayment->payment_status = 'failed';
                $kundliPayment->save();
            }
        }
        $payment = Payment::where('order_id', $transactionId)->first();
        if (!$payment) {
            return response()->json(['status' => false, 'message' => 'Payment record not found.'], 404);
        }
        if ($status === 'SUCCESS') {
            $payment->status = 'completed';
            $payment->save();
            return response()->json(['status' => true, 'message' => 'Payment successful.']);
        } else {
            $payment->status = 'failed';
            $payment->save();
            return response()->json(['status' => false, 'message' => 'Payment failed.'], 400);
        }
   }
    // public function callback(Request $request)
    // {
    //     try {
    //         $response = $request->input('response');   // base64 encoded
    //         $checksum = $request->header('X-VERIFY');

    //         if (!$response || !$checksum) {
    //             Log::error('PhonePe Callback: Missing response or checksum');
    //             return response()->json(['error' => 'Invalid callback'], 400);
    //         }

    //         // Decode
    //         $decodedResponse = base64_decode($response);
    //         $responseData = json_decode($decodedResponse, true);
    //         Log::info('PhonePe Decoded Response:', $responseData);

    //         // Verify checksum (use /pg/v1/pay for callback validation)
    //         if (!$this->verifyCallbackChecksum($response, '/pg/v1/pay', $checksum)) {
    //             Log::error('PhonePe Callback: Checksum verification failed');
    //             return response()->json(['error' => 'Checksum verification failed'], 400);
    //         }

    //         $merchantTransactionId = $responseData['data']['merchantTransactionId'] ?? null;
    //         $transactionId = $responseData['data']['transactionId'] ?? null;
    //         $amount = $responseData['data']['amount'] ?? 0;
    //         $responseCode = $responseData['code'] ?? null;

    //         // ✅ Update Payment Table
    //         $payment = Payment::where('order_id', $merchantTransactionId)->first();

    //         if ($responseCode === 'PAYMENT_SUCCESS') {
    //             if ($payment) {
    //                 $payment->status = 'completed'; 
    //                 $payment->save();
    //             }

    //             return response()->json([
    //                 'success' => true,
    //                 'message' => 'Payment successful',
    //                 'data' => [
    //                     'merchantTransactionId' => $merchantTransactionId,
    //                     'transactionId' => $transactionId,
    //                     'amount' => $amount,
    //                     'status' => 'SUCCESS'
    //                 ]
    //             ]);
    //         } else {
    //             if ($payment) {
    //                 $payment->status = 'failed';
    //                 $payment->save();
    //             }

    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Payment failed',
    //                 'data' => [
    //                     'merchantTransactionId' => $merchantTransactionId,
    //                     'responseCode' => $responseCode,
    //                     'status' => 'FAILED'
    //                 ]
    //             ]);
    //         }
    //     } catch (Exception $e) {
    //         Log::error('PhonePe Callback Error:', [
    //             'message' => $e->getMessage(),
    //             'trace' => $e->getTraceAsString()
    //         ]);

    //         return response()->json([
    //             'success' => false,
    //             'error' => 'Callback processing failed'
    //         ], 500);
    //     }
    // }
    public function checkPaymentStatus($merchantTransactionId)
    {
        try {
            $endpoint = "/pg/v1/status/{$this->merchantId}/{$merchantTransactionId}";
            $checksum = $this->generateChecksums('', $endpoint);

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'X-VERIFY' => $checksum,
                'X-MERCHANT-ID' => $this->merchantId
            ])->get($this->apiUrl . $endpoint);

            $responseData = $response->json();

            Log::info('PhonePe Status Check Response:', $responseData);

            return response()->json([
                'success' => true,
                'data' => $responseData
            ]);

        } catch (Exception $e) {
            Log::error('PhonePe Status Check Error:', [
                'message' => $e->getMessage(),
                'merchantTransactionId' => $merchantTransactionId
            ]);

            return response()->json([
                'success' => false,
                'error' => 'Status check failed'
            ], 500);
        }
    }
        private function verifyCallbackChecksum($response, $endpoint, $receivedChecksum)
    {
        $string = $response . $endpoint . $this->saltKey;
        $expectedChecksum = hash('sha256', $string) . '###' . $this->saltIndex;

        return hash_equals($expectedChecksum, $receivedChecksum);
    }

    private function storeTransaction($merchantTransactionId, $payload, $base64Body, $checksum)
    {
        try {
            // Store in database - adjust according to your schema
            \DB::table('phonepe_transactions')->insert([
                'merchant_transaction_id' => $merchantTransactionId,
                'merchant_user_id' => $payload['merchantUserId'],
                'amount' => $payload['amount'],
                'payload' => json_encode($payload),
                'base64_body' => $base64Body,
                'checksum' => $checksum,
                'status' => 'PENDING',
                'created_at' => now(),
                'updated_at' => now()
            ]);

        } catch (Exception $e) {
            Log::error('Failed to store transaction:', [
                'merchantTransactionId' => $merchantTransactionId,
                'error' => $e->getMessage()
            ]);
        }
    }

    // public function appAcceptAppointment(){
    //     return 1;
    // }
    public function appAcceptAppointment(Request $request)
    {
        $latestAppointment = Appointment::find($request->appointment_id);
        if ($request->accept == 1) {
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
                $payment->name = $latestAppointment->name;
                $payment->date = now();
                $payment->debits = $totalCharge;
                $payment->status = 'completed';
                $payment->save();
                // WhatsAppController::sendMessageForAppointment($latestAppointment);
                if (isset($payment)) {
                    $latestAppointment->amount_paid = $payment->debits;
                    $latestAppointment->status = 1; //1 == accept
                    $latestAppointment->is_completed = 0; //1 == accept
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
            } else {
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
        } else {

            $latestAppointment->status = 2; //2 == reject
            $latestAppointment->save();
        }
        return response()->json(["data" => "success"]);
    }

    public function userWalletHistory(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required',
            ]);
            $userId = $request->user_id;
            $plans = Package::where('is_active', 1)->orderBy('price', 'ASC')->get();

            $payments = Payment::with('getUser', 'getAstrologer')->where('status', 'completed')
                ->where('user_id', $userId)
                ->orderBy('id', 'DESC')
                ->get();
            $totalAmount = Payment::where('status', 'completed')->where('user_id', $userId)->sum('credits');
            $totalBonusAmount = Payment::where('status', 'completed')->where('user_id', $userId)->sum('bonus');
            return response()->json([
                'status' => 'success',
                'plans' => $plans,
                'payments' => $payments,
                'totalAmount' => $totalAmount,
                'totalBonusAmount' => $totalBonusAmount
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function appLatestAppointment(Request $request) {
       
        // $request->validate([
        //     'user_id' => 'required',
        //     'type' => 'required|in:user,astrologer',
        // ]);
        // $latestAppointment = null;
        $userId = $request->user_id ?? 47;
        if ('user' == 'user') {
            $latestChat = ChatMeeting::with('astrologerDetails', 'userDetails')->where('user_id', $userId)->orderBy('id', 'desc')->first();
            $latestAppointment = Appointment::with('astroDetails', 'userDetails')->where('user_id', $userId)->orderBy('id', 'desc')->first();  
        }elseif ($request->type == 'astrologer') {
            $latestChat = ChatMeeting::with('astrologerDetails', 'userDetails')->where('astrologer_id', $userId)->orderBy('id', 'desc')->first();
            $latestAppointment = Appointment::with('astroDetails', 'userDetails')->where('astrologer_id', $userId)->orderBy('id', 'desc')->first();
        }
        $data = [
            'latestChat' => $latestChat,
            'latestAppointment' => $latestAppointment,
        ];
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function saveChatAmount(Request $request){
        $request->validate([
            'chat_meeting_id' => 'required',
            'decrease_time' => 'required',

        ]);
        try {
            $chatMeetingId = $request->chat_meeting_id;
            $decreaseTime = $request->decrease_time;
            $decreaseTimeSec = $decreaseTime * 60;
            $chatMeeting = ChatMeeting::find($chatMeetingId);
            $chargePerMin = $chatMeeting->charge_per_min;
            if (!$chatMeeting) {
                return response()->json(['error' => 'Chat meeting not found'], 404);
            }
            $chatMeeting->app_time = $chatMeeting->app_time + $decreaseTime;
            $chatMeeting->timer = $chatMeeting->timer - $decreaseTimeSec;
            $chatMeeting->save();
            if ($decreaseTime > 0) {
                $payment = new Payment();
                $payment->chat_meeting_id = $chatMeetingId;
                $payment->user_id = $chatMeeting->user_id;
                $payment->astrologer_id = $chatMeeting->astrologer_id;
                $payment->name = $chatMeeting->userDetails->name;
                $payment->date = now();
                $payment->debits = $chargePerMin * $decreaseTime;
                $payment->status = 'completed';
                $payment->save();
            }
            if ($payment->status == 'completed') {
                $arrayData = [
                    "user_id" => $chatMeeting->user_id,
                    "astrologer_id" => $chatMeeting->astrologer_id,
                    "total_amount" => $payment->debits,
                    "source" => 'chat',
                ];
            }
            $newRequest = Request::create('walletManagement', 'POST', $arrayData);
            $walletInfo = new WalletManagementController();
            $response = $walletInfo->walletManagement($newRequest);
            return response()->json([
                'status' => 'success',
                'message' => 'Chat amount saved successfully',
                'response' => $response
            ]);

        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
      
    }

    public function appRatingSave(Request $request){
        $request->validate([
            'type' => 'required',
            'user_id' => 'required|exists:users,id',
            'astrologer_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
        ]);
        $type = $request->input('type');
        $userId = $request->input('user_id');
        $astrologerId = $request->input('astrologer_id');
        $ratingValue = $request->input('rating');
        $reviewText = $request->input('review', '');

        $rating = new Rating();
        $rating->user_id = $userId;
        $rating->astrologer_id = $astrologerId;
        $rating->rating = $ratingValue;
        $rating->feedback = $reviewText;
        $rating->type = $type;
        $rating->save();
        return response()->json(['status' => true, 'message' => 'Rating saved successfully.']);
    }
   
    public function appGetRatings(Request $request)
    {
        $request->validate([
            'astrologer_id' => 'required|exists:users,id',
        ]);

        $astrologerId = $request->input('astrologer_id');

        $ratings = Rating::with('getUser:id,name,avtar')
            ->where('astrologer_id', $astrologerId)
            ->orderBy('id', 'desc')
            ->get();

        $averageRating = Rating::where('astrologer_id', $astrologerId)->avg('rating');
        $totalRatings = $ratings->count();

        if ($totalRatings === 0) {
            $fakeUsers = [
                ['name' => 'Ravi Sharma', 'avtar' => 'https://randomuser.me/api/portraits/men/32.jpg'],
                ['name' => 'Priya Singh', 'avtar' => 'https://randomuser.me/api/portraits/women/45.jpg'],
                ['name' => 'Amit Verma', 'avtar' => 'https://randomuser.me/api/portraits/men/28.jpg'],
                ['name' => 'Sneha Patel', 'avtar' => 'https://randomuser.me/api/portraits/women/55.jpg'],
                ['name' => 'Rahul Mehta', 'avtar' => 'https://randomuser.me/api/portraits/men/61.jpg'],
            ];

            $fakeFeedbacks = [
                'Very knowledgeable and helpful session!',
                'The astrologer provided accurate insights about my career.',
                'Amazing experience, would definitely recommend.',
                'Felt really positive after the consultation.',
                'Good predictions and polite behavior.',
            ];

            $randomCount = rand(3, 5); 
            $fakeRatings = collect();

            for ($i = 0; $i < $randomCount; $i++) {
                $user = $fakeUsers[array_rand($fakeUsers)];
                $fakeRatings->push([
                    'id' => $i + 1,
                    'rating' => rand(4, 5),
                    'feedback' => $fakeFeedbacks[array_rand($fakeFeedbacks)],
                    'get_user' => $user,
                ]);
            }

            $ratings = $fakeRatings;
            $averageRating = $fakeRatings->avg('rating');
            $totalRatings = $fakeRatings->count();
        }

        return response()->json([
            'status' => 'success',
            'data' => [
                'ratings' => $ratings,
                'averageRating' => round($averageRating ?? 0, 2),
                'totalRatings' => $totalRatings
            ]
        ]);
    }
    public function appAllUsersIds(Request $request){
        $request->validate([
            'type' => 'required'
        ]);
        $userIds = User::where('type', $request->type)->pluck('id');
        return response()->json([
            'status' => 'success',
            'data' => $userIds
        ]);
    }

    public function  appDeviceIdCheck(Request $request){
        $request->validate([
            'user_id' => 'required|numeric',
            'device_id' => 'required|string',
        ]);
        $userId = $request->input('user_id');
        $deviceId = $request->input('device_id');
        $user = User::where('id', $userId)->where('app_device_id', $deviceId)->first();
        if($user){
            return response()->json([
                'status' => 'true',
                'message' => 'Device ID matches.'
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'Device ID does not match.Please login again.'
            ], 403);
        }
    }

    public function appLatLonApi(Request $request)
    {
        $placeName = $request->input('city');
        $apiKey = env('VEDIC_ASTRO_API_KEY');
        $url = "https://api.vedicastroapi.com/v3-json/utilities/geo-search?city=" . urlencode($placeName) . "&api_key=" . $apiKey;
        $response = Http::get($url);
        $data = $response->json();
        return response()->json($data);
    }

    public function appExtendCallAmountSave(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required',
            'calling_time' => 'required',
        ]);
        $appointmentId = $request->appointment_id;
        $callingTime = $request->calling_time;
        $appointment = Appointment::find($appointmentId);
        $astrologer = User::find($appointment->astrologer_id);
        $chargePerMin = $astrologer->astrologerDetail->charge_per_min;
        $amountToDecrease = $chargePerMin * $callingTime;
        if (!$appointment) {
            return response()->json(['error' => 'Appointment  not found for this call'], 404);
        }
        if ($callingTime > 0 && $appointment->status != 4) {
            $payment = new Payment();
            $payment->appointment_id = $appointmentId;
            $payment->user_id = $appointment->user_id;
            $payment->astrologer_id = $appointment->astrologer_id;
            $payment->name = $appointment->userDetails->name;
            $payment->date = now();
            $payment->debits = $amountToDecrease;
            $payment->extend_duration_amount = $amountToDecrease;
            $payment->status = 'completed';
            $payment->save();
        }
        else {
            return response()->json(['error' => 'Appointment  is already completed']);
        }

        if ($payment->status == 'completed') {
            $appointment->amount_paid = $amountToDecrease + $appointment->amount_paid;
            $appointment->status = 4; //4 == completed
            $appointment->is_completed = 1;
            $appointment->save();
        }
        if ($payment->status == 'completed') {
            $arrayData = [
                "user_id" => $appointment->user_id,
                "astrologer_id" => $appointment->astrologer_id,
                "total_amount" => $payment->extend_duration_amount,
                "source" => $appointment->way_to_reach,
            ];
        }
        $newRequest = Request::create('walletManagement', 'POST', $arrayData);
        $walletInfo = new WalletManagementController();
        $response = $walletInfo->walletManagement($newRequest);
        return response()->json([
            'status' => 'success',
            'message' => 'call amount saved successfully',
            'response' => $response
        ]);

    }

    public function appMeetingKundli(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'meeting_id' => 'required',
        ]);
        $meetingId = $request->meeting_id;
        if ($request->type == 'chat') {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } elseif ($request->type == 'appointment') {
            $chatMeeting = Appointment::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        }
        $full_name = $chatMeeting->name;
        $gender = $chatMeeting->gender;
        $place = $chatMeeting->place;
        $tob = $chatMeeting->tob;
        $lat = $chatMeeting->lat ?? '23.1686';
        $lon = $chatMeeting->lon ?? '79.9339';
        $tz = '5.5';
        $lang = 'hi';
        App::setLocale($lang);
            try {
           if(isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/extended-horoscope/extended-kundli-details";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $planetaryPositionsData = $response->json();
                if (isset($planetaryPositionsData['status']) && $planetaryPositionsData['status'] === 200) {
                    return response()->json([
                        'basicKundliDetails' => $planetaryPositionsData['response'], 
                        'basicUserDetails' => compact('full_name', 'gender', 'place', 'dob', 'tob', 'lat', 'lon', 'tz', 'lang'),
                        'meeting' => $chatMeeting,
                        'meeting_id' => $chatMeeting->id,
                        'type' => $request->type,
                    ]);
                    // return view('website.kundli_app_view', [
                    //     'basicKundliDetails' => $planetaryPositionsData['response'], 
                    //     'basicUserDetails' => compact('full_name', 'gender', 'place', 'dob', 'tob', 'lat', 'lon', 'tz', 'lang'),
                    //     'meeting' => $chatMeeting,
                    //     'meeting_id' => $chatMeeting->id,
                    //     'type' => $request->type,
                    // ]);
                    
                } elseif (isset($planetaryPositionsData['status']) && $planetaryPositionsData['status'] === 402) {
                    return "Out of api calls please renew suscription";
                } else {
                    return response()->json(['error' => 'Failed to fetch data from the API.'], $planetaryPositionsData['status']);
                }
            } else {
                return response()->json(['error' => 'No Kundli details found for the user.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function totalDuration(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);
        $userId = $request->input('user_id');
        $totalChatDuration = ChatMeeting::where('astrologer_id', $userId)->sum('app_time');
        $totalAppointmentDuration = Appointment::where('astrologer_id', $userId)->sum('duration');
        return response()->json([
            'status' => 'success',
            'totalChatDuration' => $totalChatDuration,
            'totalAppointmentDuration' => $totalAppointmentDuration
        ]);
    }

    public function appointmentDetails(Request $request){
        $appointments = Appointment::find($request->appointment_id);
        return response()->json([
            'status' => 'success',
            'data' => $appointments
        ]);
    }

    public function registerWithEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'mobile' => 'required'
        ]);
        // $storedPhone = session()->get('mobile');
        // if (User::where('email', $request->email)->exists() && !null()) {
        //     return back()->withErrors(['email' => 'Email already registered.']);
        // }
        if (User::where('mobile', $request->mobile)->exists()) {
            return response()->json([
                'status' => false,
                'message' => 'Mobile number already registered.'
            ], 400);
           
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
        return response()->json([
            'status' => true,
            'message' => 'OTP sent to email',
            'otp' => $otp,
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
            'user_id' => $user->id]);
    }

    public function registerAppUser(Request $request)
    {
        $request->validate([
            // 'email' => 'required|email',
            'mobile' => 'required',
            'name' => 'required',
            'password' => 'required|min:6',
            'gender' => 'required',
            'country_code' => 'nullable|string',
            'currency' => 'nullable|string',
            'dob' => 'nullable|date',
            'tob' => 'nullable',
            'pob' => 'nullable|string',
        ]);

        // if (User::where('mobile', $request->mobile)->exists()) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Mobile number already registered.'
        //     ], 400);
        // }

        if (User::where('mobile', $request->mobile)->exists()) {
            return response()->json([
                'status' => false,
                'message' => 'Mobile number already registered.'
            ], 400);
        }

        $user = User::create([
            'name' => $request->name,
            // 'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'country_code' => $request->country_code ?? '91',
            'currency' => $request->currency ?? 'INR',
            
        ]);
        UserDetails::create([
            'user_id' => $user->id,
            'dob' => $request->dob
                ? Carbon::createFromFormat('d/m/Y', $request->dob)->format('Y-m-d')
                : null,
            'tob' => $request->tob,
            'pob' => $request->pob,
        ]);
     
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
            'user_id' => $user,
            'token' => $token
        ]);
    }
}
