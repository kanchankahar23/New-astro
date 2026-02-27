<?php

namespace App\Http\Controllers;

use App\Models\WatiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
class RejectedCandidateController extends Controller
{
    // public function rejectedCandidate(Request $request)
    // {
    //     $response = Http::get('https://white-force.com/plus/api/rejected-candidates', [
    //         'per_page' => 25,
    //         'page' => $request->get('page', 1),
    //     ]);

    //     if ($response->successful()) {
    //         $data = $response->json()['data'];

    //         $candidates = $data['data'] ?? [];

    //         $pagination = [
    //             'current_page' => $data['current_page'],
    //             'last_page' => $data['last_page'],
    //             'next_page_url' => $data['next_page_url'],
    //             'prev_page_url' => $data['prev_page_url'],
    //         ];
    //         // return $candidates;

    //         return view('whatsapp.rejected-candidates', compact('candidates', 'pagination'));
    //     } else {
    //         // Define default empty values
    //         $candidates = [];
    //         $pagination = [
    //             'current_page' => 1,
    //             'last_page' => 1,
    //             'next_page_url' => null,
    //             'prev_page_url' => null,
    //         ];

    //         return view('whatsapp.rejected-candidates', compact('candidates', 'pagination'))
    //             ->withErrors(['msg' => 'Failed to fetch data']);
    //     }
    // }


    public function rejectedCandidate(Request $request)
    {
        $response = Http::get('https://white-force.com/plus/api/rejected-candidates', [
            'per_page' => 25,
            'page' => $request->get('page', 1),
        ]);

        if ($response->successful()) {
            $json = $response->json();

            if (!isset($json['data']) || !is_array($json['data'])) {
                \Log::error('Rejected Candidates API returned unexpected response', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);

                return view('whatsapp.rejected-candidates', [
                    'candidates' => [],
                    'pagination' => [
                        'current_page' => 1,
                        'last_page' => 1,
                        'next_page_url' => null,
                        'prev_page_url' => null,
                    ]
                ])->withErrors(['msg' => 'Unexpected API response.']);
            }

            $data = $json['data'];
            $candidates = $data['data'] ?? [];

            $sentCandidateIds = WatiResponse::pluck('candidate_id')->toArray();
            $filteredCandidates = array_filter($candidates, function ($candidate) use ($sentCandidateIds) {
                return !in_array($candidate['id'], $sentCandidateIds);
            });

            $pagination = [
                'current_page' => $data['current_page'] ?? 1,
                'last_page' => $data['last_page'] ?? 1,
                'next_page_url' => $data['next_page_url'] ?? null,
                'prev_page_url' => $data['prev_page_url'] ?? null,
            ];

            return view('whatsapp.rejected-candidates', [
                'candidates' => $filteredCandidates,
                'pagination' => $pagination,
            ]);
        } else {
            \Log::error('Rejected Candidates API failed', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            return view('whatsapp.rejected-candidates', [
                'candidates' => [],
                'pagination' => [
                    'current_page' => 1,
                    'last_page' => 1,
                    'next_page_url' => null,
                    'prev_page_url' => null,
                ]
            ])->withErrors(['msg' => 'Failed to fetch data from API']);
        }
    }
    public function rejectedCandidateMessage(Request $request)
    {
        $whatsappNumbers = $request->input('whatsappNumbers');

        $source = Auth::user()->name;
        $phone = Auth::user()->mobile;

        if (!$whatsappNumbers || !$source) {
            return response()->json(['status' => 'error', 'message' => 'Missing whatsapp numbers or source'], 400);
        }

        $authToken =
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiJmN2Q4ZjE4OC0wZjk2LTRiNDgtOGUyZi03MjYyMDNiZDY2MzEiLCJ1bmlxdWVfbmFtZSI6ImFzdHJvYnVkZHkyMDI1QGdtYWlsLmNvbSIsIm5hbWVpZCI6ImFzdHJvYnVkZHkyMDI1QGdtYWlsLmNvbSIsImVtYWlsIjoiYXN0cm9idWRkeTIwMjVAZ21haWwuY29tIiwiYXV0aF90aW1lIjoiMDYvMjQvMjAyNSAwNDozMTo0OSIsInRlbmFudF9pZCI6IjQ0MjMyNyIsImRiX25hbWUiOiJtdC1wcm9kLVRlbmFudHMiLCJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL3dzLzIwMDgvMDYvaWRlbnRpdHkvY2xhaW1zL3JvbGUiOiJBRE1JTklTVFJBVE9SIiwiZXhwIjoyNTM0MDIzMDA4MDAsImlzcyI6IkNsYXJlX0FJIiwiYXVkIjoiQ2xhcmVfQUkifQ.iXhE7k18zbfy2FwAlKdjQNgjEvgebLuZU8ayBHRwBQQ";
        if (!$authToken) {
            return response()->json(['status' => 'error', 'message' => 'API key missing'], 500);
        }
        $results = [];

        foreach ($whatsappNumbers as $whatsappNumber) {
            if (substr_count($whatsappNumber, '|') !== 2) {
                $results[] = [
                    'number' => null,
                    'status' => 'error',
                    'message' => 'Invalid data format. Expected mobile|name|candidateId',
                    'result' => 'No'
                ];
                continue;
            }

            [$mobile, $name, $candidateId] = explode('|', $whatsappNumber);
            $formattedNumber = '91' . $mobile;

            $postData = [
                "template_name" => "rejected_candidate_temp",
                "broadcast_name" => "rejected_candidate_temp",
                "parameters" => [
                    ["name" => "name", "value" => $name],
                    ["name" => "number", "value" => 9294549294]
                ]
            ];

            $apiUrl = "https://live-mt-server.wati.io/442327/api/v2/sendTemplateMessage?whatsappNumber={$formattedNumber}";

            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => $apiUrl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($postData),
                CURLOPT_HTTPHEADER => [
                    "Authorization: Bearer $authToken",
                    'Content-Type: application/json'
                ],
            ]);

             $response = curl_exec($curl);
            $error = curl_error($curl);
            $httpStatusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);
            if ($error) {
                $results[] = [
                    'number' => $formattedNumber,
                    'status' => 'error',
                    'message' => $error,
                    'result' => 'No'
                ];

                WatiResponse::create([
                    'number' => $formattedNumber,
                    'name' => $name,
                    'status' => 'error',
                    'message' => $error,
                    'response' => null,
                    'source' => $source,
                    'sent_by' => $source,
                    'candidate_id' => $candidateId,
                ]);
                continue;
            }

            if ($httpStatusCode !== 200) {
                $results[] = [
                    'number' => $formattedNumber,
                    'status' => 'error',
                    'message' => "HTTP Error: $httpStatusCode",
                    'result' => 'No'
                ];


                WatiResponse::create([
                    'number' => $formattedNumber,
                    'name' => $name,
                    'status' => 'error',
                    'message' => "HTTP Error: $httpStatusCode",
                    'response' => $response,
                    'source' => $source,
                    'sent_by' => $source,
                    'candidate_id' => $candidateId,
                ]);
                continue;
            }

            $decodedResponse = json_decode($response, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                $results[] = [
                    'number' => $formattedNumber,
                    'status' => 'error',
                    'message' => 'Invalid JSON response',
                    'result' => 'No'
                ];
                WatiResponse::create([
                    'number' => $formattedNumber,
                    'name' => $name,
                    'status' => 'error',
                    'message' => 'Invalid JSON response',
                    'response' => null,
                    'source' => $source,
                    'sent_by' => $source,
                    'candidate_id' => $candidateId,
                ]);
                continue;
            }

            $results[] = [
                'number' => $formattedNumber,
                'status' => 'success',
                'response' => $decodedResponse,
                'result' => 'Yes'
            ];
            // if ($httpStatusCode == 200) {
            //     $updateResponse = Http::post('https://localhost/whiteforceplussrc/api/update-sms-status', [
            //         'candidate_id' => $candidateId,
            //     ]);
            // }

            $res = new WatiResponse();
            $res->number = $formattedNumber;
            $res->name = $name;
            $res->status = 'success';
            $res->message = 'Message sent successfully';
            $res->response = json_encode($decodedResponse);
            $res->source = $source;
            $res->sent_by = $source;
            $res->candidate_id = $candidateId;
            $res->save();
        }
        return back()->with('success', 'Sms send successfully!');
    }
}
