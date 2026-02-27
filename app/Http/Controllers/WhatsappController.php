<?php

namespace App\Http\Controllers;

use App\Jobs\SendAppointmentReminder;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use App\Models\WatiResponse;
use App\Models\WhatsappResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\Remark;
use Auth;
use App\Models\UtilitesTools;


class WhatsAppController extends Controller
{
    public function whatsappMessage()
    {
        $candidatesSendedSms = WatiResponse::orderby('id', 'DESC')->paginate(25);
        return view('whatsapp.sms-sended-candidate', compact('candidatesSendedSms'));
    }


    public function whatsappResponseList()
    {
        $responses = WhatsappResponse::with('contact')->orderBy('id', 'desc')->paginate(25);
        return view('whatsapp.whatsapp-response', compact('responses'));
    }


    public function addContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:15'
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->contact;
        $contact->save();

        return back()->with('success', 'New contact added successfully');
    }
    // wati code


    public static function sendMessageForAppointment($latestAppointment)
    {
        $whatsappNumber = $latestAppointment->phone ? '91' . $latestAppointment->phone : null;
        if (!$whatsappNumber) {
            return response()->json(['status' => 'error', 'message' => 'Invalid phone number'], 400);
        }

        $user = User::find($latestAppointment->astrologer_id);
        if (!$user || !$user->mobile) {
            return response()->json(['status' => 'error', 'message' => 'Astrologer or astrologer number not found'], 404);
        }

        $authToken = env('WATI_API_KEY');
        if (!$authToken) {
            return response()->json(['status' => 'error', 'message' => 'API key missing'], 500);
        }

        // === USER MESSAGE ===
        $userPayload = [
            "template_name" => "user_appointment_temp",
            "broadcast_name" => "user_appointment_temp",
            "parameters" => [
                ["name" => "name", "value" => $latestAppointment->name ?? 'Customer'],
                ["name" => "astroName", "value" => $user->name ?? 'Pandit Ji'],
                ["name" => "date", "value" => $latestAppointment->preferred_date ?? '30-05-2025'],
                ["name" => "time", "value" => $latestAppointment->preferred_time ?? '4:30PM'],
                ["name" => "phone", "value" => $user->mobile ?? '9898989898']
            ]
        ];
        $userApiUrl = "https://live-mt-server.wati.io/442327/api/v2/sendTemplateMessage?whatsappNumber={$whatsappNumber}";
        $userResponse = self::sendWatiMessage($userApiUrl, $userPayload, $authToken);
        if ($userResponse['status'] === 'error') {
            return response()->json($userResponse, 500);
        }

        // === ASTROLOGER MESSAGE ===
        $astrologerNumber = '91' . $user->mobile;

        $astrologerPayload = [
            "template_name" => "astrologer_appointment_templates",
            "broadcast_name" => "astrologer_appointment_templates",
            "parameters" => [
                ["name" => "name", "value" => $user->name ?? 'Pandit Ji'],
                ["name" => "astroName", "value" => $latestAppointment->name ?? 'Customer'],
                ["name" => "date", "value" => $latestAppointment->preferred_date ?? '30-05-2025'],
                ["name" => "time", "value" => $latestAppointment->preferred_time ?? '4:30PM'],
            ]
        ];
        $astrologerApiUrl = "https://live-mt-server.wati.io/442327/api/v2/sendTemplateMessage?whatsappNumber={$astrologerNumber}";
        $astroResponse = self::sendWatiMessage($astrologerApiUrl, $astrologerPayload, $authToken);
        if ($astroResponse['status'] === 'error') {
            return response()->json($astroResponse, 500);
        }

        // === SCHEDULE REMINDER ===
        if (!empty($latestAppointment->preferred_date) && !empty($latestAppointment->preferred_time)) {
            try {
                $appointmentDateTime = Carbon::parse($latestAppointment->preferred_date . ' ' . $latestAppointment->preferred_time);
                $reminderTime = $appointmentDateTime->subHour();
                SendAppointmentReminder::dispatch($latestAppointment->id)->delay($reminderTime);
            } catch (\Exception $e) {
                // Log error if needed
            }
        }

        return response()->json(['status' => 'success', 'message' => 'Messages sent and reminder scheduled']);
    }

    private static function sendWatiMessage($url, $payload, $authToken)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $authToken",
                'Content-Type: application/json'
            ],
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            return ['status' => 'error', 'message' => "cURL Error: $error"];
        }

        $decoded = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return ['status' => 'error', 'message' => 'Invalid JSON response from WATI'];
        }

        return ['status' => 'success', 'data' => $decoded];
    }



    public static function sendReminderMessage($appointment, $user)
    {
        $userMobile = $appointment->phone;
        $astrologerMobile = $user->mobile;
        $whatsappNumbers = mergeArray([$userMobile], [$astrologerMobile]); // Merges arrays

        $name = $appointment->name ?? 'User';
        $number = $appointment->phone ?? 'N/A';

        $authToken = env('WATI_API_KEY');
        if (!$authToken) {
            return response()->json(['status' => 'error', 'message' => 'API key missing'], 500);
        }

        $results = [];

        foreach ($whatsappNumbers as $whatsappNumber) {
            $url = "https://live-mt-server.wati.io/442327/api/v2/sendTemplateMessage?whatsappNumber={$whatsappNumber}";

            $payload = [
                "template_name" => "user_remainder",
                "broadcast_name" => "user_remainder",
                "parameters" => [
                    ["name" => "name", "value" => $name],
                    ["name" => "number", "value" => $number]
                ]
            ];

            $response = self::sendWhatsAppMessage($url, $payload, $authToken);
            $results[] = ['number' => $whatsappNumber, 'response' => $response];
        }

        return response()->json($results);
    }

    private static function sendWhatsAppMessage($url, $payload, $authToken)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $authToken",
                'Content-Type: application/json'
            ],
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($error) {
            return [
                'status' => 'error',
                'message' => $error,
                'http_code' => $httpCode
            ];
        }

        $decodedResponse = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return [
                'status' => 'error',
                'message' => 'Invalid JSON response',
                'raw_response' => $response,
                'http_code' => $httpCode
            ];
        }

        return [
            'status' => 'success',
            'response' => $decodedResponse,
            'http_code' => $httpCode
        ];
    }

    public function smsRemark(request $request)
    {
        $remarks = Remark::where('enquiry_id', $request->id)->get();
        // $name = WatiResponse::where('enquiry_id', $enquiry_id->id)->first();
        return view('whatsapp.remark', compact('remarks'));
    }

    public function smsRemarkSave(request $request)
    {
        // return $request->all();
        if (!is_null($request->remark)) {
            $rmk = new Remark();
            $rmk->enquiry_id = $request->enquiry_id;
            $rmk->user_id = Auth::user()->id;
            $rmk->remark = $request->remark;
            if ($request->hasFile('imagess')) {
                $imagePaths = [];
                foreach ($request->file('imagess') as $image) {
                    $ISSave = UtilitesTools::ProccedToSaveImage($image, "public/assets/remark_image/");
                    if ($ISSave['success'] === true) {
                        $imagePaths[] = $ISSave['data'];
                    }
                }
                $imageUrls = $rmk->image = json_encode($imagePaths);
                $url = url('public/assets/remark_image/');
                $imageUrls = array_map(function ($path) use ($url) {
                    return $url . '/' . basename($path);
                }, $imagePaths);
            }
            $rmk->save();
            $response = $request->input('remark');
            // return $response;
            return response()->json([
                'name' => $remark->getUser->name ?? '-',
                'remark' => $request->remark,
                'created_at' => $rmk->created_at->format('d M, Y / h:i A'),
                'ss_image' => $imageUrls ?? [],
            ]);
        } else {
            return "Remark are required.";
        }

        // $request->validate([
        //     'remark' => 'required|string',
        //     'candidate_id' => 'required|integer|exists:candidates,id',
        // ]);

        // $remark = new Remark();
        // $remark->candidate_id = $request->candidate_id;
        // $remark->user_id = auth()->id();
        // $remark->remark = $request->remark;
        // $remark->save();

        // return response()->json([
        //     'name' => $remark->getUser->name ?? '-',
        //     'remark' => $remark->remark,
        //     'created_at' => $remark->created_at->format('d M, Y / h:i A'),
        // ]);
    }
}
