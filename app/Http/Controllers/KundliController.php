<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\ChatMeeting;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\KundliDetailsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\Kundli_Matching_Detail;
use App\Models\DailyHoroscope;

class KundliController extends Controller
{
    public function get_basic_kundli(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'gender' => 'required',
            'place' => 'required',
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
        $lang = $request->input('lang') ?? 'hi';
        App::setLocale($lang);
        $details = KundliDetailsModel::where('user_login_id', Auth::user()->id)
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

                if ($response->successful()){
                    $basicKundliDetails = $response->json();
                    if (isset($basicKundliDetails['response'])) {
                        $details = new KundliDetailsModel();
                        $details->user_login_id = Auth::user()->id;
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
                } else {
                    return response()->json(['error' => 'Failed to fetch data from the API.'], $response->status());
                }

            } catch (Exception $e) {
                return response()->json(['error' => $e->getMessage()], 400);
            }
        }
        return view('website.kundli_details', [
            'basicKundliDetails' => $basicKundliDetails['response'],
            'basicUserDetails' => compact('full_name', 'gender', 'place', 'dob', 'tob', 'lat', 'lon', 'tz', 'lang'),
            'lang' => $lang,
        ]);
    }

        public function getPlanetoryPositions(Request $request)
        {
            $chatMeeting = null;
            $payload = null;
            $meetingId =  $request->meetingId;
            $vcMeetingId = $request->vcMeetingId;
            if (isset($meetingId)) {
                $chatMeeting = ChatMeeting::find($meetingId);
                $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
                App::setLocale('hi');

            }
            elseif (isset($vcMeetingId)) {
                $chatMeeting = Appointment::find($vcMeetingId);
                $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
                App::setLocale('hi');
            } else {
                $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
                App::setLocale($payload->language);
            }
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
                    if (isset($planetaryPositions['status']) && $planetaryPositions['status'] === 200) {
                        $payload->planetary_positions_data = json_encode($planetaryPositions);
                        $payload->save();
                        $planetaryPositionsData = $planetaryPositions;
                    } elseif (isset($planetaryPositions['status']) && $planetaryPositions['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    }
                    else{
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $planetaryPositions['status']);
                    }

                    }
                    return view('kundli_pages.planetary_positions', [
                        'planetaryPositions' => $planetaryPositionsData['response']
                    ]);
                }
                elseif(isset($chatMeeting)){
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
                    if (isset($planetaryPositionsData['status']) && $planetaryPositionsData['status'] === 200) {
                        return view('kundli_pages.planetary_positions', [
                            'planetaryPositions' => $planetaryPositionsData['response']
                        ]);
                    } elseif (isset($planetaryPositionsData['status']) && $planetaryPositionsData['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $planetaryPositionsData['status']);
                    }

                }
                else {
                    return response()->json(['error' => 'No Kundli details found for the user.'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['error' => $e->getMessage()], 400);
            }
        }

    public function get_kundli_chart(Request $request, $chartName = null)
    {
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
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
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
                    'color' => '#fbe216',
                    'style' => 'north',
                    'font_size' => 10,
                    'font_style' => 'roboto',
                    'colorful_planets' => 0,
                    'size' => 190,
                    'stroke' => 1,
                    'format' => 'base64'
                ]);
                if ($response->successful()) {
                    $kundliChartSvg = $response->body();
                    return view('kundli_pages.kundli_chart', [
                        'kundliChartSvg' => $kundliChartSvg,
                        'chartName' => $chartName,
                    ]);
                }
            }elseif (isset($chatMeeting)) {
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
                    'color' => '#fbe216',
                    'style' => 'north',
                    'font_size' => 10,
                    'font_style' => 'roboto',
                    'colorful_planets' => 0,
                    'size' => 190,
                    'stroke' => 1,
                    'format' => 'base64'
                ]);
                if ($response->successful()) {
                    $kundliChartSvg = $response->body();
                    return view('kundli_pages.kundli_chart', [
                        'kundliChartSvg' => $kundliChartSvg,
                        'chartName' => $chartName
                    ]);
                }
            }
             else {
                return response()->json(['error' => 'No Kundli data found for the user.'], 400);
            }
        } catch (\Exception $e) {
            Log::error('Error retrieving Kundli data: ', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Exception: ' . $e->getMessage()], 400);
        }
    }
    public function get_chart(Request $request, $chartName = null)
    {
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        $vcMeetingId = $request->vcMeetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
            $type  = 'chat';
            $meeting_id = $chatMeeting->id;
        } elseif (isset($vcMeetingId)) {
            $chatMeeting = Appointment::find($vcMeetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
            $type = $chatMeeting->way_to_reach ?? 'video';
            $meeting_id = $chatMeeting->id;
        } else {
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
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
                    'color' => '#fbe216',
                    'style' => 'north',
                    'font_size' => 10,
                    'font_style' => 'roboto',
                    'colorful_planets' => 0,
                    'size' => 190,
                    'stroke' => 1,
                    'format' => 'base64'
                ]);
                if ($response->successful()) {
                    $kundliChartSvg = $response->body();
                    return view('kundli_pages.kundli_charts', [
                        'kundliChartSvg' => $kundliChartSvg,
                        'chartName' => $chartName,
                        'type' => $type,
                        'meeting_id' => $meeting_id,
                        'vcMeetingId' => $vcMeetingId,
                    ]);
                }
            }elseif (isset($chatMeeting)) {
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
                    'color' => '#fbe216',
                    'style' => 'north',
                    'font_size' => 10,
                    'font_style' => 'roboto',
                    'colorful_planets' => 0,
                    'size' => 190,
                    'stroke' => 1,
                    'format' => 'base64'
                ]);
                if ($response->successful()) {
                    $kundliChartSvg = $response->body();
                    return view('kundli_pages.kundli_charts', [
                        'kundliChartSvg' => $kundliChartSvg,
                        'chartName' => $chartName,
                        'type' => $type,
                        'meeting_id' => $meeting_id,
                        'vcMeetingId' => $vcMeetingId,
                    ]);
                }
            }
             else {
                return response()->json(['error' => 'No Kundli data found for the user.'], 400);
            }
        } catch (\Exception $e) {
            Log::error('Error retrieving Kundli data: ', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Exception: ' . $e->getMessage()], 400);
        }
    }

    public function get_maha_dasha(Request $request)
    {
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
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
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
                    if (isset($mahadsha['status']) && $mahadsha['status'] === 200) {
                        $payload->mahadasha_data = json_encode($mahadsha);
                        $payload->save();
                        $mahadshaData = $mahadsha;
                    } elseif (isset($mahadsha['status']) && $mahadsha['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $mahadsha['status']);
                    }
                }
                return view('kundli_pages.kundli_maha_dasha', ['data' => $mahadshaData, 'lang' => $payload->language]);
            }
            elseif (isset($chatMeeting)) {
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
                if (isset($mahadshaData['status']) && $mahadshaData['status'] === 200) {
                    return view('kundli_pages.kundli_maha_dasha', ['data' => $mahadshaData, 'meetingId' => $meetingId]);
                } elseif (isset($mahadshaData['status']) && $mahadshaData['status'] === 402) {
                    return "Out of api calls please renew suscription";
                } else {
                    return response()->json(['error' => 'Failed to fetch data from the API.'], $mahadshaData['status']);
                }
            }
            else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

    }

    public function get_antar_dasha(Request $request)
    {
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
        $dashaType = $request->input('dashaType');
        $planetType = $request->input('planetType');
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
                    if (isset($antardasha['status']) && $antardasha['status'] === 200) {
                        $payload->antardasha_data = json_encode($antardasha);
                        $payload->save();
                        $antardashaData = $antardasha;
                    } elseif (isset($antardasha['status']) && $antardasha['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $antardasha['status']);
                    }
                }
                return view('kundli_pages.kundli_antar_dasha', ['response' => $antardashaData, 'dashaType' => $dashaType, 'planetType' => $planetType, 'lang' => $payload->language]);
            }
            elseif (isset($chatMeeting)) {
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
                if (isset($antardashaData['status']) && $antardashaData['status'] === 200) {
                   return view('kundli_pages.kundli_antar_dasha', ['response' => $antardashaData, 'dashaType' => $dashaType, 'planetType' => $planetType, 'meetingId' => $meetingId]);
                } elseif (isset($antardashaData['status']) && $antardashaData['status'] === 402) {
                    return "Out of api calls please renew suscription";
                } else {
                    return response()->json(['error' => 'Failed to fetch data from the API.'], $antardashaData['status']);
                }
            }
            else {
                return response()->json([
                    'error' => 'Failed to retrieve Kundli data from the
                    astrology API.'
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function get_paryantar_dasha(Request $request)
    {
        $chatMeeting = null;
        $payload = null;
        $meetingId = $request->meetingId;
        if (isset($meetingId)) {
            $chatMeeting = ChatMeeting::find($meetingId);
            $dob = Carbon::parse($chatMeeting->dob)->format('d/m/Y');
            App::setLocale('hi');
        } else {
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
          $dashaType = $request->input('dashaType');
         $planetType = $request->input('planetType');
        try {
            if (isset($payload)) {
                if (!empty($payload->pratyantardasha_data)) {

                    $pratyantardashaData = json_decode($payload->pratyantardasha_data, true);
                }
                else{
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
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $pratyantardasha['status']);
                    }

                }
                return view('kundli_pages.kundli_pratyantar_dasha', ['response' => $pratyantardashaData['response'], 'dashaType' => $dashaType, 'planetType' => $planetType, 'lang' => $payload->language]);
            }
            elseif (isset($chatMeeting)) {
                $url = "https://api.vedicastroapi.com/v3-json/dashas/paryantar-dasha";
                $response = Http::get($url, [
                    'dob' => $dob,
                    'tob' => $chatMeeting->tob,
                    'lat' => $chatMeeting->lat,
                    'lon' => $chatMeeting->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => 'hi',
                ]);
                $pratyantardashaData = $response->json();
                if (isset($pratyantardashaData['status']) && $pratyantardashaData['status'] === 200) {
                    return view('kundli_pages.kundli_antar_dasha', ['response' => $antardashaData, 'dashaType' => $dashaType, 'planetType' => $planetType, 'meetingId' => $meetingId]);
                } elseif (isset($pratyantardashaData['status']) && $pratyantardashaData['status'] === 402) {
                    return "Out of api calls please renew suscription";
                } else {
                    return response()->json(['error' => 'Failed to fetch data from the API.'], $pratyantardashaData['status']);
                }
                return view('kundli_pages.kundli_pratyantar_dasha', ['response' => $pratyantardashaData['response'], 'dashaType' => $dashaType, 'planetType' => $planetType]);
            }
            else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function get_mahadasha_prediction(Request $request)
    {
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
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
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
                    if (isset($mahadashaPrediction['status']) && $mahadashaPrediction['status'] === 200) {
                        $payload->mahadasha_prediction_data = json_encode($mahadashaPrediction);
                        $payload->save();
                        $mahadashaPredictionData = $mahadashaPrediction;
                    } elseif (isset($mahadashaPrediction['status']) && $mahadashaPrediction['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $mahadashaPrediction['status']);
                    }

                }
                return view('kundli_pages.kundli_mahadasha_prediction', ['response' => $mahadashaPredictionData['response'], 'lang' => $payload->language]);
            }
            elseif (isset($chatMeeting)) {
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
                return view('kundli_pages.kundli_mahadasha_prediction', ['response' => $mahadashaPredictionData['response']]);
            }
            else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function get_mangal_dosha(Request $request)
    {
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
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
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
                    if (isset($mangalDosha['status']) && $mangalDosha['status'] === 200) {
                        $payload->mangal_dosha_data = json_encode($mangalDosha);
                        $payload->save();
                        $mangalDoshaData = $mangalDosha;
                    } elseif (isset($mangalDosha['status']) && $mangalDosha['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $mangalDosha['status']);
                    }

                }
                    return view('kundli_pages.dosha.mangal_dosha', ['response' => $mangalDoshaData['response'], 'lang' => $payload->language]);
            }
            elseif (isset($chatMeeting)) {
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
                return view('kundli_pages.dosha.mangal_dosha', ['response' => $mangalDoshaData['response']]);
            }
            else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function get_kaalsharp_dosha(Request $request)
    {
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
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
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
                    if (isset($kaalsharpDosha['status']) && $kaalsharpDosha['status'] === 200) {
                        $payload->kaalsharp_dosha_data = json_encode($kaalsharpDosha);
                        $payload->save();
                        $kaalsharpDoshaData = $kaalsharpDosha;
                    } elseif (isset($kaalsharpDosha['status']) && $kaalsharpDosha['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $kaalsharpDosha['status']);
                    }
                }
                    return view('kundli_pages.dosha.kal_sharp_dosha', ['response' => $kaalsharpDoshaData['response'], 'lang' => $payload->language]);
            }
            elseif (isset($chatMeeting)) {
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
                return view('kundli_pages.dosha.kal_sharp_dosha', ['response' => $kaalsharpDoshaData['response']]);
            }
             else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function get_pitra_dosha(Request $request)
    {
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
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
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
                    if (isset($pitraDosha['status']) && $pitraDosha['status'] === 200) {
                        $payload->pitra_dosha_data = json_encode($pitraDosha);
                        $payload->save();
                        $pitraDoshaData = $pitraDosha;
                    } elseif (isset($pitraDosha['status']) && $pitraDosha['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $pitraDosha['status']);
                    }

                }
                    return view('kundli_pages.dosha.pitra_dosha', ['data' => $pitraDoshaData, 'lang' => $payload->language]);

            }
            elseif (isset($chatMeeting)) {
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
                if (isset($pitraDoshaData['status']) && $pitraDoshaData['status'] === 200) {
                    return view('kundli_pages.dosha.pitra_dosha', ['data' => $pitraDoshaData]);
                } elseif (isset($pitraDoshaData['status']) && $pitraDoshaData['status'] === 402) {
                    return "Out of api calls please renew suscription";
                } else {
                    return response()->json(['error' => 'Failed to fetch data from the API.'], $pitraDoshaData['status']);
                }

            }
             else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function get_papasamaya(Request $request)
    {
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
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
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
                    if (isset($papasamaya['status']) && $papasamaya['status'] === 200) {
                        $payload->papasamaya_data = $papasamaya;
                        $payload->save();
                        $papasamayaData = $papasamaya;
                    } elseif (isset($papasamaya['status']) && $papasamaya['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $papasamaya['status']);
                    }

                }
                    return view('kundli_pages.dosha.papsamya_dosha', ['response' => $papasamayaData['response'], 'lang' => $payload->language]);
            }
            elseif (isset($chatMeeting)) {
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
                if (isset($papasamayaData['status']) && $papasamayaData['status'] === 200) {
                    return view('kundli_pages.dosha.papsamya_dosha', ['response' => $papasamayaData['response']]);
                } elseif (isset($papasamayaData['status']) && $papasamayaData['status'] === 402) {
                    return "Out of api calls please renew suscription";
                } else {
                    return response()->json(['error' => 'Failed to fetch data from the API.'], $papasamayaData['status']);
                }

            }
            else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function get_sade_sati(Request $request)
    {
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
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
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
                    if (isset($sadeSati['status']) && $sadeSati['status'] === 200) {
                        $payload->sadesati_data = json_encode($sadeSati);
                        $payload->save();
                        $sadeSatiData = $sadeSati;
                    } elseif (isset($sadeSati['status']) && $sadeSati['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $sadeSati['status']);
                    }

                }
                return view('kundli_pages.extended_horoscope.sade_sati', ['sadeSati' => $sadeSatiData['response'], 'lang' => $payload->language]);
            }
            elseif (isset($chatMeeting)) {
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
                if (isset($sadeSatiData['status']) && $sadeSatiData['status'] === 200) {
                    return view('kundli_pages.extended_horoscope.sade_sati', ['sadeSati' => $sadeSatiData['response']]);
                } elseif (isset($sadeSatiData['status']) && $sadeSatiData['status'] === 402) {
                    return "Out of api calls please renew suscription";
                } else {
                    return response()->json(['error' => 'Failed to fetch data from the API.'], $sadeSatiData['status']);
                }

            }
            else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function get_sade_sati_table(Request $request)
    {
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
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
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
                    if (isset($sadeSatiTable['status']) && $sadeSatiTable['status'] === 200) {
                        $payload->sadesati_table_data = json_encode($sadeSatiTable);
                        $payload->save();
                        $sadeSatiTableData = $sadeSatiTable;
                    } elseif (isset($sadeSatiTable['status']) && $sadeSatiTable['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $sadeSatiTable['status']);
                    }

                }
                return view('kundli_pages.extended_horoscope.sade_sati_table', ['sadeSatiTable' => $sadeSatiTableData['response'], 'lang' => $payload->language]);
            }
            elseif (isset($chatMeeting)) {
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
                if (isset($sadeSatiTableData['status']) && $sadeSatiTableData['status'] === 200) {
                    return view('kundli_pages.extended_horoscope.sade_sati_table', ['sadeSatiTable' => $sadeSatiTableData['response']]);
                } elseif (isset($sadeSatiTableData['status']) && $sadeSatiTableData['status'] === 402) {
                    return "Out of api calls please renew suscription";
                } else {
                    return response()->json(['error' => 'Failed to fetch data from the API.'], $sadeSatiTableData['status']);
                }

            }
            else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function get_friendship_table(Request $request)
    {
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
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
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
                    if (isset($friendshipTable['status']) && $friendshipTable['status'] === 200) {
                        $payload->friendship_table_data = json_encode($friendshipTable);
                        $payload->save();
                        $friendshipTableData = $friendshipTable;
                    } elseif (isset($friendshipTable['status']) && $friendshipTable['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $friendshipTable['status']);
                    }

                }
                return view('kundli_pages.friendship_composite', ['response' => $friendshipTableData, 'lang' => $payload->language]);
            }
            elseif (isset($chatMeeting)) {
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
                if (isset($friendshipTableData['status']) && $friendshipTableData['status'] === 200) {
                    return view('kundli_pages.friendship_composite', ['response' => $friendshipTableData]);
                } elseif (isset($friendshipTableData['status']) && $friendshipTableData['status'] === 402) {
                    return "Out of api calls please renew suscription";
                } else {
                    return response()->json(['error' => 'Failed to fetch data from the API.'], $friendshipTableData['status']);
                }
            }
            else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function get_kp_houses(Request $request)
    {
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
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
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
                    if (isset($kpHouses['status']) && $kpHouses['status'] === 200) {
                        $payload->kp_house_data = json_encode($kpHouses);
                        $payload->save();
                        $kpHousesData = $kpHouses;
                    } elseif (isset($kpHouses['status']) && $kpHouses['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(data: ['error' => 'Failed to fetch data from the API.']);
                    }

                }
                return view('kundli_pages.kp_houses.kp_houses', ['response' => $kpHousesData, 'lang' => $payload->language]);
            }
            elseif (isset($chatMeeting)) {
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
                if (isset($kpHousesData['status']) && $kpHousesData['status'] === 200) {
                    return view('kundli_pages.kp_houses.kp_houses', ['response' => $kpHousesData]);
                } elseif (isset($kpHousesData['status']) && $kpHousesData['status'] === 402) {
                    return "Out of api calls please renew suscription";
                } else {
                    return response()->json(['error' => 'Failed to fetch data from the API.'], $kpHousesData['status']);
                }

            }
            else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function get_kp_houses_planet(Request $request)
    {
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
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
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
                    if (isset($kpHousesPlanet['status']) && $kpHousesPlanet['status'] === 200) {
                        $payload->kp_houses_planet_data = json_encode($kpHousesPlanet);
                        $payload->save();
                        $kpHousesPlanetData = $kpHousesPlanet;
                    } elseif (isset($kpHousesPlanet['status']) && $kpHousesPlanet['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(data: ['error' => 'Failed to fetch data from the API.']);
                    }

                }
                return view('kundli_pages.kp_houses.kp_houses_planet', ['response' => $kpHousesPlanetData, 'lang' => $payload->language]);
            }
            elseif (isset($chatMeeting)) {
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
                if (isset($kpHousesPlanetData['status']) && $kpHousesPlanetData['status'] === 200) {
                    return view('kundli_pages.kp_houses.kp_houses_planet', ['response' => $kpHousesPlanetData]);
                } elseif (isset($kpHousesPlanetData['status']) && $kpHousesPlanetData['status'] === 402) {
                    return "Out of api calls please renew suscription";
                } else {
                    return response()->json(['error' => 'Failed to fetch data from the API.'], $kpHousesPlanetData['status']);
                }

            }
             else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function get_gem_suggestion(Request $request)
    {
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
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
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
                    if (isset($gemSuggestion['status']) && $gemSuggestion['status'] === 200) {
                        $payload->gem_suggestion_data = json_encode($gemSuggestion);
                        $payload->save();
                        $gemSuggestionData = $gemSuggestion;
                    } elseif (isset($gemSuggestion['status']) && $gemSuggestion['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $gemSuggestion['status']);
                    }

                }
                //  return   $kundli = $planetaryPositions;
                return view('kundli_pages.gem_suggestion', ['response' => $gemSuggestionData, 'lang' => $payload->language]);
            }
            elseif (isset($chatMeeting)) {
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
                if (isset($gemSuggestionData['status']) && $gemSuggestionData['status'] === 200) {
                    return view('kundli_pages.gem_suggestion', ['response' => $gemSuggestionData]);
                } elseif (isset($gemSuggestionData['status']) && $gemSuggestionData['status'] === 402) {
                    return "Out of api calls please renew suscription";
                } else {
                    return response()->json(['error' => 'Failed to fetch data from the API.'], $gemSuggestionData['status']);
                }

            }
            else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function get_rudraksh_suggestion(Request $request)
    {
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
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
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
                    if (isset($rudrakshSuggestion['status']) && $rudrakshSuggestion['status'] === 200) {
                        $payload->rudraksh_suggestion_data = json_encode($rudrakshSuggestion);
                        $payload->save();
                        $rudrakshSuggestionData = $rudrakshSuggestion;
                    } elseif (isset($rudrakshSuggestion['status']) && $rudrakshSuggestion['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $rudrakshSuggestion['status']);
                    }

                }
                return view('kundli_pages.rudraksh_seggestion', ['response' => $rudrakshSuggestionData, 'lang' => $payload->language]);
            }
            elseif (isset($chatMeeting)) {
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
                if (isset($rudrakshSuggestionData['status']) && $rudrakshSuggestionData['status'] === 200) {
                    return view('kundli_pages.rudraksh_seggestion', ['response' => $rudrakshSuggestionData]);
                } elseif (isset($rudrakshSuggestionData['status']) && $rudrakshSuggestionData['status'] === 402) {
                    return "Out of api calls please renew suscription";
                } else {
                    return response()->json(['error' => 'Failed to fetch data from the API.'], $rudrakshSuggestionData['status']);
                }

            }
            else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function get_personal_characterstics(Request $request)
    {
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
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
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
                    if (isset($personalCharacteristics['status']) && $personalCharacteristics['status'] === 200) {
                        $payload->personal_characteristics_data = json_encode($personalCharacteristics);
                        $payload->save();
                        $personalCharacteristicsData = $personalCharacteristics;
                    } elseif (isset($personalCharacteristics['status']) && $personalCharacteristics['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $personalCharacteristics['status']);
                    }

                }
                return view('kundli_pages.general_prediction.personal_characteristics', [
                    'response' => $personalCharacteristicsData,
                    'lang' => $payload->language
                ]);
            }
            elseif (isset($chatMeeting)) {
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
                if (isset($personalCharacteristicsData['status']) && $personalCharacteristicsData['status'] === 200) {
                    return view('kundli_pages.general_prediction.personal_characteristics', [
                        'response' => $personalCharacteristicsData
                    ]);
                } elseif (isset($personalCharacteristicsData['status']) && $personalCharacteristicsData['status'] === 402) {
                    return "Out of api calls please renew suscription";
                } else {
                    return response()->json(['error' => 'Failed to fetch data from the API.'], $personalCharacteristicsData['status']);
                }

            }
            else {
                return response()->json(['error' => 'No Kundli details found for the user.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function get_ascendant_report(Request $request)
    {
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
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
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
                    if (isset($ascendantReport['status']) && $ascendantReport['status'] === 200) {
                        $payload->ascendant_report_data = json_encode($ascendantReport);
                        $payload->save();
                        $ascendantReportData = $ascendantReport;
                    } elseif (isset($ascendantReport['status']) && $ascendantReport['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $ascendantReport['status']);
                    }

                }
                return view('kundli_pages.general_prediction.ascendant_report', [
                    'response' => $ascendantReportData,
                    'lang' => $payload->language
                ]);
            }
            elseif (isset($chatMeeting)) {
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
                if (isset($ascendantReportData['status']) && $ascendantReportData['status'] === 200) {
                    return view('kundli_pages.general_prediction.ascendant_report', [
                        'response' => $ascendantReportData
                    ]);
                } elseif (isset($ascendantReportData['status']) && $ascendantReportData['status'] === 402) {
                    return "Out of api calls please renew suscription";
                } else {
                    return response()->json(['error' => 'Failed to fetch data from the API.'], $ascendantReportData['status']);
                }

            }
            else {
                return response()->json(['error' => 'No Kundli details found for the user.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function getSuggestions(Request $request)
    {
        $placeName = $request->input('city');
        $apiKey = env('VEDIC_ASTRO_API_KEY');
        $url = "https://api.vedicastroapi.com/v3-json/utilities/geo-search?city=" . urlencode($placeName) . "&api_key=" . $apiKey;
        $response = Http::get($url);
        $data = $response->json();
        return response()->json($data);
    }

    // public function get_ascendant_report()
    // {
    //     try {
    //         $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
    //         if ($payload) {
    //             $url = "https://api.vedicastroapi.com/v3-json/horoscope/ascendant-report";
    //             $response = Http::get($url, [
    //                 'dob' => $payload->dob,
    //                 'tob' => $payload->tob,
    //                 'lat' => $payload->lat,
    //                 'lon' => $payload->lon,
    //                 'tz' => '5.5',
    //                 'api_key' => env('VEDIC_ASTRO_API_KEY'),
    //                 'lang' => $payload->language,
    //             ]);
    //             $rudrakshSuggestion = $response->json();
    //             if (isset($rudrakshSuggestion)) {
    //                 //  return   $kundli = $planetaryPositions;
    //                 return view('kundli_pages.general_prediction.ascendant_report', ['response' => $rudrakshSuggestion, 'lang' => $payload->language]);
    //             } else {
    //                 return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
    //             }
    //         }
    //     } catch (Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 400);
    //     }
    // }

    public function get_planet_report(Request $request)
    {

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
            $payload = KundliDetailsModel::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
        }
        try {
            if ($payload) {
                $url = "https://api.vedicastroapi.com/v3-json/horoscope/planet-report";
                $response = Http::get($url, [
                    'dob' => $payload->dob,
                    'tob' => $payload->tob,
                    'lat' => $payload->lat,
                    'lon' => $payload->lon,
                    'tz' => '5.5',
                    'api_key' => env('VEDIC_ASTRO_API_KEY'),
                    'lang' => $payload->language,
                    'planet' => 'Jupiter',
                ]);
               return $rudrakshSuggestion = $response;
                if (isset($rudrakshSuggestion)) {
                    //  return   $kundli = $planetaryPositions;
                    return view('kundli_pages.rudraksh_seggestion', ['response' => $rudrakshSuggestion]);
                } else {
                    return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
                }
            }
            elseif (isset($chatMeeting)) {
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
                $rudrakshSuggestion = $response->json();
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function KundliMatching()
    {
        return view('kundli_matching.kundli_matching');
    }

    public function KundliMatchingDetails(Request $request)
    {
    //    return $request->all();
        // Validation
        $request->validate([
            'groom_name' => 'required|string',
            'male_dob' => 'required',
            'male_tob' => 'required',
            'groom_birth_place' => 'required|string',
            'bride_name' => 'required|string',
            'female_dob' => 'required',
            'female_tob' => 'required',
            'bride_birth_place' => 'required|string',
        ]);
        try {

            // Groom details
            $groom_name = $request->input('groom_name');
            $male_dob = Carbon::parse($request->input('male_dob'))->format('d/m/Y');
            $male_tob = $request->input('male_tob');

            $groom_birth_place = $request->input('groom_birth_place');
            $groom_lat = $request->input('groom_lat') ?? '23.1686';
            $groom_lon = $request->input('groom_lon') ?? '79.9339';

            // Bride details
            $bride_name = $request->input('bride_name');
            $female_dob = Carbon::parse($request->input('female_dob'))->format('d/m/Y');
            $female_tob = $request->input('female_tob');

            $bride_birth_place = $request->input('bride_birth_place');
            $bride_lat = $request->input('bride_lat') ?? '23.1686';
            $bride_lon = $request->input('bride_lon') ?? '79.9339';

            $lang = $request->input('lang', 'en');
            App::setLocale($lang);

            $kundliMatchingDetail = new Kundli_Matching_Detail();
            // Assign values
            $kundliMatchingDetail->male_name = $groom_name;
            $kundliMatchingDetail->male_dob = $male_dob;
            $kundliMatchingDetail->male_tob = $male_tob;
            $kundliMatchingDetail->male_place = $groom_birth_place;
            $kundliMatchingDetail->male_lat = $groom_lat;
            $kundliMatchingDetail->male_lon = $groom_lon;

            $kundliMatchingDetail->female_name = $bride_name;
            $kundliMatchingDetail->female_dob = $female_dob;
            $kundliMatchingDetail->female_tob = $female_tob;
            $kundliMatchingDetail->female_place = $bride_birth_place;
            $kundliMatchingDetail->female_lat = $bride_lat;
            $kundliMatchingDetail->female_lon = $bride_lon;
            $kundliMatchingDetail->language = $lang;
            $kundliMatchingDetail->user_login_id = Auth::user()->id;
            $kundliMatchingDetail->save();
            $apiKey = env('VEDIC_ASTRO_API_KEY');
            $url = "https://api.vedicastroapi.com/v3-json/matching/ashtakoot";
            $params = [
                'boy_dob' => $male_dob,
                'boy_tob' => $male_tob,
                'boy_tz' => 5.5,
                'boy_lat' => $groom_lat,
                'boy_lon' => $groom_lon,
                'girl_dob' => $female_dob,
                'girl_tob' => $female_tob,
                'girl_tz' => 5.5,
                'girl_lat' => $bride_lat,
                'girl_lon' => $bride_lon,
                'api_key' => $apiKey,
                'lang' => $lang,

            ];
            // return $kundliMatchingDetail;
            $response = Http::get($url, $params);
            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['status']) && $data['status'] === 200) {
                    return view('kundli_matching.kundli_matching_details', ['response' => $data, 'kundliMatchingDetail' => $kundliMatchingDetail, 'lang' => $lang]);
                } elseif (isset($data['status']) && $data['status'] === 402) {
                    return "Out of api calls please renew suscription";
                } else {
                    return response()->json(['error' => 'Failed to fetch data from the API.'], $data['status']);
                }

            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function get_dashakoot_matching(Request $request)
    {
        try {
            $payload = Kundli_Matching_Detail::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
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
                    if (isset($data['status']) && $data['status'] === 200) {
                        return view('kundli_matching.dashakoot_matching', ['data' => $data, 'payload' => $payload, 'lang' => $payload->language]);
                    } elseif (isset($data['status']) && $data['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $data['status']);
                    }

                }
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function get_aggregate_matching(Request $request)
    {
        try {
            $payload = Kundli_Matching_Detail::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
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
                    if (isset($data['status']) && $data['status'] === 200) {
                        return view('kundli_matching.aggregate', ['data' => $data, 'payload' => $payload, 'lang' => $payload->language]);
                    } elseif (isset($data['status']) && $data['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $data['status']);
                    }
                }
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function get_rajju_vedha_matching(Request $request)
    {
        try {
            $payload = Kundli_Matching_Detail::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
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
                    if (isset($data['status']) && $data['status'] === 200) {
                        return view('kundli_matching.rajju_vedha_matching', ['data' => $data, 'payload' => $payload, 'lang' => $payload->language]);
                    } elseif (isset($data['status']) && $data['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $data['status']);
                    }

                }
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function get_papasamaya_matching(Request $request)
    {
        try {
            $payload = Kundli_Matching_Detail::where('user_login_id', Auth::user()->id)->latest()->first();
            App::setLocale($payload->language);
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
                    if (isset($data['status']) && $data['status'] === 200) {
                        return view('kundli_matching.papasamaya_matching', ['data' => $data, 'payload' => $payload, 'lang' => $payload->language]);
                    } elseif (isset($data['status']) && $data['status'] === 402) {
                        return "Out of api calls please renew suscription";
                    } else {
                        return response()->json(['error' => 'Failed to fetch data from the API.'], $data['status']);
                    }

                }
            } else {
                return response()->json(['error' => 'Failed to retrieve Kundli data from the astrology API.'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function getPanchangDetails(Request $request)
    {
        // return $request->all();
        $request->validate([
            'place' => 'required',
            'date' => 'required',
            'time' => 'required',
            'lang' => 'required',
        ]);
        $place = $request->input('place');
        $date = Carbon::parse($request->input('date'))->format('d/m/Y');
        $time = $request->input('time');
        $lat = $request->input('lat') ?? '23.1686';
        $lon = $request->input('lon') ?? '79.9339';
        $tz = '5.5';
        $apiKey = env('VEDIC_ASTRO_API_KEY');
        $lang = $request->input('lang');
        App::setLocale($lang);
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
            if (isset($panchangDetails['status']) && $panchangDetails['status'] === 200) {
                return view('website.panchang_details', [
                    'response' => $panchangDetails['response'],
                    'lang' => $lang,
                ]);
            } elseif (isset($panchangDetails['status']) && $panchangDetails['status'] === 402) {
                return "Out of api calls please renew suscription";
            } else {
                return response()->json(['error' => 'Failed to fetch data from the API.'], $panchangDetails['status']);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

    }
    public function getYogasForm()
    {
        return view('yogas.yagas');
    }
    public function getYogasDetails(Request $request)
    {
        // return $request->all();
        $request->validate([
            'full_name' => 'required',
            'gender' => 'required',
            'place' => 'required',
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
            if (isset($numerology['status']) && $numerology['status'] === 200) {
                return view('yogas.yogas_details', ['yogas' => $numerology['response']['yogas_list'], 'lang' => $lang, 'basicUserDetails' => $basicUserDetails,]);
            } elseif (isset($numerology['status']) && $numerology['status'] === 402) {
                return "Out of api calls please renew suscription";
            } else {
                return response()->json(['error' => 'Failed to fetch data from the API.'], $numerology['status']);
            }

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

    }

    public function numerology()
    {

        return view('numerology.numerology_form');
    }
    public function get_numerology_details(Request $request)
    {
        //    return $request->all();
        $request->validate([
            'full_name' => 'required',
            'gender' => 'required',
            'place' => 'required',
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
        $details = new KundliDetailsModel();
        $details->user_login_id = Auth::user()->id;
        $details->name = $full_name;
        $details->dob = $dob;
        $details->tob = $tob;
        $details->gender = $gender;
        $details->place = $place;
        $details->lat = $lat;
        $details->lon = $lon;
        $details->language = $lang;
        $details->save();
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
            if (isset($numerology['status']) && $numerology['status'] === 200) {
                return view('numerology.numerology_details', ['data' => $numerology, 'basicUserDetails' => $basicUserDetails, 'lang' => $lang]);
            } elseif (isset($numerology['status']) && $numerology['status'] === 402) {
                return "Out of api calls please renew suscription";
            } else {
                return response()->json(['error' => 'Failed to fetch data from the API.'], $numerology['status']);
            }

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function dailyHoroscopeSign($id, $signNumber)
    {
        $apiKey = env('VEDIC_ASTRO_API_KEY');
        $report_type = $id;
        $zodiac = $signNumber ?? 1;
        $HoroscopeData = DailyHoroscope::find($zodiac);
        $date = Carbon::parse(Carbon::now())->format('d/m/Y');
        $year = Carbon::parse(Carbon::now())->format('Y');
        $lang = request()->input('lang', 'hi');
        App::setLocale($lang);
        if ($report_type == 'daily') {
            $Data = json_decode($HoroscopeData->daily_zodiac_data, true);
            if (!$Data) {
                $response = Http::get("https://api.vedicastroapi.com/v3-json/prediction/daily-sun", [
                    'zodiac' => $zodiac,
                    'date' => $date,
                    'show_same' => 'true',
                    'api_key' => $apiKey,
                    'lang' => $lang,
                    'split' => 'true',
                    'type' => 'big'
                ]);
                $response = $response->json();
                if (isset($response)) {
                    $HoroscopeData->daily_zodiac_data = json_encode($response);
                    $HoroscopeData->date = now();
                    $HoroscopeData->save();
                    $Data = $response;
                } else {
                    return response()->json(['error' => 'Failed to retrieve planetary positions data from the astrology API.'], 400);
                }
            }
        } elseif ($report_type == 'weekly') {
            $Data = json_decode($HoroscopeData->weekly_zodiac_data, true);
            if (!$Data) {
                $response = Http::get("https://api.vedicastroapi.com/v3-json/prediction/weekly-sun", [
                    'zodiac' => $zodiac,
                    'week' => 'thisweek',
                    'show_same' => 'true',
                    'api_key' => $apiKey,
                    'lang' => $lang,
                    'split' => 'true',
                    'type' => 'big'
                ]);
                $response = $response->json();
                if (isset($response)) {
                    $HoroscopeData->weekly_zodiac_data = json_encode($response);
                    $HoroscopeData->date = now();
                    $HoroscopeData->save();
                    $Data = $response;
                } else {
                    return response()->json(['error' => 'Failed to retrieve planetary positions data from the astrology API.'], 400);
                }
            }
        } elseif ($report_type == 'yearly') {
            $Data = json_decode($HoroscopeData->yearly_zodiac_data, true);
            if (!$Data) {
                $response = Http::get("https://api.vedicastroapi.com/v3-json/prediction/yearly", [
                    'year' => $year,
                    'zodiac' => $zodiac,
                    'api_key' => $apiKey,
                    'lang' => $lang,
                ]);
                $response = $response->json();
                if (isset($response)) {
                    $HoroscopeData->yearly_zodiac_data = json_encode($response);
                    $HoroscopeData->date = now();
                    $HoroscopeData->save();
                    $Data = $response;
                } else {
                    return response()->json(['error' => 'Failed to retrieve planetary positions data from the astrology API.'], 400);
                }
            }
        }
        return view('website.horoscope', ['data' => $Data['response'], 'zodiac' => $zodiac, 'report_type' => $report_type, 'lang' => $lang]);
    }

    public function horoscopeResponse($id, $signNumber)
    {
        $apiKey = env('VEDIC_ASTRO_API_KEY');
        $report_type = $id;
        $zodiac = $signNumber ;
        $HoroscopeData = DailyHoroscope::find($zodiac);
        $date = Carbon::parse(Carbon::now())->format('d/m/Y');
        $year = Carbon::parse(Carbon::now())->format('Y');
        $lang = request()->input('lang', 'hi');
        App::setLocale($lang);
        if ($report_type == 'daily') {
            if ($lang === 'en') {
                $Data = json_decode($HoroscopeData->english_daily, true);
            } elseif ($lang === 'ta') {
                 $Data = json_decode($HoroscopeData->tamil_daily, true);
            } elseif ($lang === 'ka') {
                 $Data = json_decode($HoroscopeData->kannad_daily, true);
            } elseif ($lang === 'te') {
                 $Data = json_decode($HoroscopeData->telegu_daily, true);
            } elseif ($lang === 'ml') {
                 $Data = json_decode($HoroscopeData->malayalam_daily, true);
            } elseif ($lang === 'sp') {
                 $Data = json_decode($HoroscopeData->spanish_daily, true);
            } elseif ($lang === 'fr') {
                 $Data = json_decode($HoroscopeData->french_daily, true);
            }else{
                $Data = json_decode($HoroscopeData->daily_zodiac_data, true);
            }
            if (!$Data) {
                $response = Http::get("https://api.vedicastroapi.com/v3-json/prediction/daily-sun", [
                    'zodiac' => $zodiac,
                    'date' => $date,
                    'show_same' => 'true',
                    'api_key' => $apiKey,
                    'lang' => $lang,
                    'split' => 'true',
                    'type' => 'big'
                ]);
                $response = $response->json();
                if (isset($response)) {
                    if ($lang === 'en') {
                       $HoroscopeData->english_daily = json_encode($response);
                    }elseif($lang === 'ta'){
                        $HoroscopeData->tamil_daily = json_encode($response);
                    } elseif ($lang === 'ka') {
                        $HoroscopeData->kannad_daily = json_encode($response);
                    } elseif ($lang === 'te') {
                        $HoroscopeData->telegu_daily = json_encode($response);
                    } elseif ($lang === 'ml') {
                        $HoroscopeData->malayalam_daily = json_encode($response);
                    } elseif ($lang === 'sp') {
                        $HoroscopeData->spanish_daily = json_encode($response);
                    } elseif ($lang === 'fr') {
                        $HoroscopeData->french_daily = json_encode($response);
                    }
                    $HoroscopeData->save();
                    $Data = $response;
                } else {
                    return response()->json(['error' => 'Failed to retrieve planetary positions data from the astrology API.'], 400);
                }
            }
        } elseif ($report_type == 'weekly') {
            if ($lang === 'en') {
                $Data = json_decode($HoroscopeData->english_weekly, true);
            } elseif ($lang === 'ta') {
                $Data = json_decode($HoroscopeData->tamil_weekly, true);
            } elseif ($lang === 'ka') {
                $Data = json_decode($HoroscopeData->kannad_weekly, true);
            } elseif ($lang === 'te') {
                $Data = json_decode($HoroscopeData->telegu_weekly, true);
            } elseif ($lang === 'ml') {
                $Data = json_decode($HoroscopeData->malayalam_weekly, true);
            } elseif ($lang === 'sp') {
                $Data = json_decode($HoroscopeData->spanish_weekly, true);
            } elseif ($lang === 'fr') {
                $Data = json_decode($HoroscopeData->french_weekly, true);
            } else {
                $Data = json_decode($HoroscopeData->weekly_zodiac_data, true);
            }
            if (!$Data) {
                $response = Http::get("https://api.vedicastroapi.com/v3-json/prediction/weekly-sun", [
                    'zodiac' => $zodiac,
                    'week' => 'thisweek',
                    'show_same' => 'true',
                    'api_key' => $apiKey,
                    'lang' => $lang,
                    'split' => 'true',
                    'type' => 'big'
                ]);
                $response = $response->json();
                if (isset($response)) {
                    if ($lang === 'en') {
                        $HoroscopeData->english_weekly = json_encode($response);
                    } elseif ($lang === 'ta') {
                        $HoroscopeData->tamil_weekly = json_encode($response);
                    } elseif ($lang === 'ka') {
                        $HoroscopeData->kannad_weekly = json_encode($response);
                    } elseif ($lang === 'te') {
                        $HoroscopeData->telegu_weekly = json_encode($response);
                    } elseif ($lang === 'ml') {
                        $HoroscopeData->malayalam_weekly = json_encode($response);
                    } elseif ($lang === 'sp') {
                        $HoroscopeData->spanish_weekly = json_encode($response);
                    } elseif ($lang === 'fr') {
                        $HoroscopeData->french_weekly = json_encode($response);
                    }
                    $HoroscopeData->save();
                    $Data = $response;
                } else {
                    return response()->json(['error' => 'Failed to retrieve planetary positions data from the astrology API.'], 400);
                }
            }
        } elseif ($report_type == 'yearly') {
            if ($lang === 'en') {
                $Data = json_decode($HoroscopeData->english_yearly, true);
            } elseif ($lang === 'ta') {
                $Data = json_decode($HoroscopeData->tamil_yearly, true);
            } elseif ($lang === 'ka') {
                $Data = json_decode($HoroscopeData->kannad_yearly, true);
            } elseif ($lang === 'te') {
                $Data = json_decode($HoroscopeData->telegu_yearly, true);
            } elseif ($lang === 'ml') {
                $Data = json_decode($HoroscopeData->malayalam_yearly, true);
            } elseif ($lang === 'sp') {
                $Data = json_decode($HoroscopeData->spanish_yearly, true);
            } elseif ($lang === 'fr') {
                $Data = json_decode($HoroscopeData->french_yearly, true);
            } else {
                $Data = json_decode($HoroscopeData->yearly_zodiac_data, true);
            }
            if (!$Data) {
                $response = Http::get("https://api.vedicastroapi.com/v3-json/prediction/yearly", [
                    'year' => $year,
                    'zodiac' => $zodiac,
                    'api_key' => $apiKey,
                    'lang' => $lang,
                ]);
                $response = $response->json();
                if (isset($response)) {
                    if ($lang === 'en') {
                        $HoroscopeData->english_yearly = json_encode($response);
                    } elseif ($lang === 'ta') {
                        $HoroscopeData->tamil_yearly = json_encode($response);
                    } elseif ($lang === 'ka') {
                        $HoroscopeData->kannad_yearly = json_encode($response);
                    } elseif ($lang === 'te') {
                        $HoroscopeData->telegu_yearly = json_encode($response);
                    } elseif ($lang === 'ml') {
                        $HoroscopeData->malayalam_yearly = json_encode($response);
                    } elseif ($lang === 'sp') {
                        $HoroscopeData->spanish_yearly = json_encode($response);
                    } elseif ($lang === 'fr') {
                        $HoroscopeData->french_yearly = json_encode($response);
                    }
                    $HoroscopeData->save();
                    $Data = $response;
                } else {
                    return response()->json(['error' => 'Failed to retrieve planetary positions data from the astrology API.'], 400);
                }
            }
        }
        return view('horoscope.daily_weekly_yearly_horoscope', ['data' => $Data['response'], 'zodiac' => $zodiac, 'report_type' => $report_type, 'lang' => $lang]);
        // if (isset($dailyHoroscopeData)) {

        // } elseif (isset($weeklyHoroscopeData)) {
        //     return view('horoscope.daily_weekly_yearly_horoscope', ['data' => $weeklyHoroscopeData['response'], 'zodiac' => $zodiac, 'report_type' => $report_type, 'lang' => $lang]);
        // } elseif (isset($yearlyHoroscopeData)) {
        //     return view('horoscope.daily_weekly_yearly_horoscope', ['data' => $yearlyHoroscopeData['response'], 'zodiac' => $zodiac, 'report_type' => $report_type, 'lang' => $lang]);
        // }
    }
    public function kundliUser()
    {
        $kundliUsers = KundliDetailsModel::orderBy('id', 'desc')->paginate(10);
        $kundliUserCount = KundliDetailsModel::count();
        return view('users.kundli_user', compact('kundliUsers', 'kundliUserCount'));
    }
    public function kundliMatchingUser()
    {
        $kundliMatchingUsers = Kundli_Matching_Detail::orderBy('id', 'desc')->paginate(10);
        $kundliMatchingUserCount = Kundli_Matching_Detail::count();
        return view('users.kundli_matching_user', compact('kundliMatchingUsers', 'kundliMatchingUserCount'));
    }

}
