<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\Candidate;
use App\Models\AiCallLog;
use Illuminate\Support\Facades\Log;



class AiCallController extends Controller
{



    public function start()
    {
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));

        $call = $twilio->calls->create(
            '+918269417032',
            env('TWILIO_NUMBER'),
            [
                'url' => 'https://handler.twilio.com/twiml/AP00d1464deabc07f4b042e882bc044e99',
                'method' => 'POST'
            ]
        );


        return response()->json([
            'status' => 'call_started',
            'call_sid' => $call->sid
        ]);
    }



    public function flow()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>'
            . '<Response>'
            . '<Gather input="speech" '
            . 'speechTimeout="auto" '
            . 'action="https://astro-buddy.com/ai-call-response" '
            . 'method="POST" '
            . 'language="en-IN">'
            . '<Say voice="alice" language="en-IN">'
            . 'Are you interested in this job? Please say yes or no.'
            . '</Say>'
            . '</Gather>'
            . '<Say voice="alice" language="en-IN">'
            . 'We did not receive your response. Goodbye.'
            . '</Say>'
            . '</Response>';

        return response($xml, 200)
            ->header('Content-Type', 'text/xml');
    }





    public function response(Request $request)
    {
        $speech = strtolower($request->input('SpeechResult', ''));

        if (str_contains($speech, 'yes')) {
            $status = 'Interested';
            $reply = 'Thank you. You have been marked as interested. Our team will contact you shortly.';
        } else {
            $status = 'Not Interested';
            $reply = 'Thank you for your time. Have a great day.';
        }

        AiCallLog::create([
            'response' => $speech,
            'status' => $status
        ]);

        return response(
            '<?xml version="1.0" encoding="UTF-8"?>
        <Response>
            <Say voice="alice" language="en-IN">
                ' . $reply . '
            </Say>
        </Response>',
            200,
            ['Content-Type' => 'text/xml']
        );
    }



}
