<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Http\Controllers\WalletManagementController;
use App\Models\Payment;

class PhoneCallController extends Controller
{
    public function initiateCall(Request $request)
{
    try {
        // HTTP request to external API
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => env('KNOWLARITY_Authorization_KEY'),
            'x-api-key' => env('KNOWLARITY_x_api_key'),
        ])->post('https://kpi.knowlarity.com/Basic/v1/account/call/makecall', [
            'k_number' => "+918044131867",
            'agent_number' => $request->agent_number,
            'customer_number' => $request->customer_number,
            'caller_id' => "+918044131867",
            'additional_params' => [
                'timeout' => $request->timeout * 60,
        ]
    ],0);
        // Return the response as JSON
        return response()->json( $response->json(), 200);

    } catch (\Throwable $e) {
        \Log::error('API call failed: ' . $e->getMessage());
        return response()->json($e->getMessage(), 500);
    }
}
    public function initiateCallAstrologerEnd($id){
        try{
            $appointment = Appointment::find($id);
            $data = [
                'agent_number' =>"+91"."8225911608",
                'customer_number' => "+91".$appointment->phone,
                'timeout' => explode(':', $appointment->duration)[0],
            ];
            $request = new Request($data);
            $response =$this->initiateCall($request);
            // return $response;
            $data =  $response->getData(true);
            if($data["success"]){
                $appointment->attempt_call = 1;
                $appointment->attempt_call_count +=1;
                $appointment->save();
                // if($appointment->attempt_call_count == 1){
                //     $payment_id = $appointment->payment_id;
                //     // $payment = Payment::find($payment_id);
                //     $arrayData = ["user_id" =>$appointment->user_id,
                //     "astrologer_id"=> $appointment->astrologer_id,
                //     "total_amount" => $appointment->amount_paid,
                //     "source" => "phone"
                //     ];
                //     $newRequest = Request::create('walletManagement', 'POST', $arrayData);
                //     $rating = new WalletManagementController();
                //     $response = $rating->walletManagement($newRequest);
                // }
                return back()->with("success","Call Connected to user successfully , Please wait and Recive call first");
            }
            else{
                return back()->with("error",$data["error"]);
            }
        }
        catch(\Exception $e){
            return back()->with("error",$e->getMessage());
        }

    }

}
