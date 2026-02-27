<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PhonepeController extends Controller
{

    public function initiatePayment(Request $request)
    {
        $merchantId = 'M22MBXL2T7FMF';
        $apiKey = "291e0728-76f0-4ec1-9ea0-89f4b833069f";
        $order_id = uniqid('T2501');
        $redirectUrl = url('api/app-payment-status');
        $callbackUrl = 'https://astro-buddy.com';
        $payment = new Payment();
        $payment->user_id = $request->user_id;
        $payment->amount = $request->input('amount');
        $payment->credits = $request->input('without_gst_ammount') ?? $request->input('amount');
        $payment->status = 'initiated';
        $payment->bonus = $request->input('bonus') ?? 0;
        $payment->pkg_id = $request->input('pkg_id') ?? 0;
        $payment->name = $request->input('name');
        $payment->email = $request->input('email');
        $payment->order_id = $order_id;
        $payment->date = now();
        $payment->save();

        $paymentData = array(
            'merchantId' => $merchantId,
            'merchantTransactionId' => $order_id,
            'merchantUserId' => "MUID123",
            'amount' => $payment->amount * 100,
            'redirectUrl' => $redirectUrl,
            'redirectMode' => "POST",
            'callbackUrl' => $callbackUrl,
            'paymentInstrument' => array(
                'type' => 'PAY_PAGE',
            ),
        );

        $payloadMain = base64_encode(json_encode($paymentData));
        $salt_index = 1;
        $payload = $payloadMain . "/pg/v1/pay" . $apiKey;
        $sha256 = hash("sha256", $payload);
        $final_x_header = $sha256 . '###' . $salt_index;
        $requestPayload = json_encode(array('request' => $payloadMain));

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.phonepe.com/apis/hermes/pg/v1/pay',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $requestPayload,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'X-VERIFY: ' . $final_x_header,
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return response()->json(['error' => 'cURL Error #: ' . $err], 500);
        } else {
            $responseData = json_decode($response);
            if (isset($responseData->code) && $responseData->code == 'PAYMENT_INITIATED') {
                $payPageUrl = $responseData->data->instrumentResponse->redirectInfo->url;
                $payment->status = 'pending';
                $payment->save();
                return redirect($payPageUrl);
            } else {
                return response()->json(['error' => $responseData->message], 400);
            }
        }
    }
    public function handlePaymentStatus(Request $request)
    {
        $response = $request->all();
        \Log::info('Payment status request:', ['response' => $response]);
        if (!isset($response['code'])) {
            return response()->json(['error' => 'Invalid response from payment gateway.'], 400);
        }
        if ($response['code'] === 'PAYMENT_SUCCESS') {
            if (isset($request['providerReferenceId']) && isset($request['amount'])) {
                $order_id = $request['transactionId'];
                $amount = $request['amount'] / 100; // Convert amount from paise to actual currency
                $payment = Payment::where('order_id', $order_id)->first();
                if ($payment) {
                    $payment->status = 'completed';
                    $payment->amount = $amount; // Update amount if necessary
                    $payment->save();
                } else {
                    return response()->json(['error' => 'Payment record not found.'], 404);
                }
                return redirect('wallet')->with('success', 'Payment successfully completed!');
            } else {
                return response()->json(['error' => 'Transaction ID or amount missing in response data.'], 400);
            }
        } else {
            if (isset($request['providerReferenceId'])) {
                $order_id = $request['transactionId'];
                $payment = Payment::where('order_id', $order_id)->first();
                if ($payment) {
                    $payment->status = 'failed';
                    $payment->save();
                }
            }
            return response()->json(['error' => 'Payment failed!'], 400);
        }
    }
}
