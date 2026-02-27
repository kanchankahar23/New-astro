<?php

namespace App\Http\Controllers;

use App\Models\ParasarKundliDetail;
use Illuminate\Http\Request;
use App\PDF\CustomPdf;
use Illuminate\Support\Facades\Http;
use Redirect;
use setasign\Fpdi\Fpdi;
use setasign\Fpdf\Fpdf;
use Auth;
use File;
use Twilio\Rest\Client;
use App\Models\Payment;

class PdfController extends Controller
{
    public function createParasarPdf(){
        return view('parasar_kundli.pdf_form');
    }
    public function replaceWordInPdf(Request $request)
    {
        if (!$request->hasFile('file') || !$request->file('file')->isValid()) {
            return response()->json(['error' => 'Invalid file upload'], 400);
        }
        $file = $request->file('file');
        $filePath = $file->getPathname();
        $pdf = new CustomPdf();
        $pageCount = $pdf->setSourceFile($filePath);
        for ($pageNo = 2; $pageNo <= $pageCount; $pageNo++) {
            $templateId = $pdf->importPage($pageNo);
            $size = $pdf->getTemplateSize($templateId);
            $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
            $pdf->useTemplate($templateId);
        }
       $name =  Auth::user()->name;
        $newFilePath = storage_path('app/public/' . $name . '_kundli.pdf');
        $pdf->Output($newFilePath, 'F');
        try {
            if (!$request->hasFile('file') || !$request->file('file')->isValid()) {
                return response()->json(['error' => 'Invalid file upload'], 400);
            }
            $updatefile = $newFilePath;
            // $pdfFiles = [
            //     public_path('pdf/newHeaderPage.pdf'),
            //     $updatefile,
            //     public_path('pdf/newServicesPage.pdf'),
            //     public_path('pdf/kundli_tq_page.pdf'),
            // ];
            $pdfFiles = [
                public_path('images/premiumKundli/header_page.pdf'),
                $newFilePath,
                public_path('pdf/newServicesPage.pdf'),
                public_path('images/premiumKundli/thank_you_page.pdf'),
            ];
            $name = Auth::user()->name;
            $outputPdfPath = storage_path('app/public/' . $name . '_kundli.pdf');
            $pdf = new Fpdi();
            foreach ($pdfFiles as $filePath) {
                if (!file_exists($filePath)) {
                    return response()->json(['error' => "File not found: $filePath"], 404);
                }
                $pageCount = $pdf->setSourceFile($filePath);
                for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                    $templateId = $pdf->importPage($pageNo);
                    $size = $pdf->getTemplateSize($templateId);

                    $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                    $pdf->useTemplate($templateId);
                }
            }
            $pdf->Output($outputPdfPath, 'F');
            return response()->download($outputPdfPath);
        } catch (\Exception $e) {
            \Log::error('PDF merging error: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function kundliPdfPayment(){
        return view('parasar_kundli.parasar_pdf_payment');
    }
    public function initiateKundaliPdfPayment(Request $request)
    {
     
        $merchantId = 'M22MBXL2T7FMF';
        $apiKey = "291e0728-76f0-4ec1-9ea0-89f4b833069f";
        $order_id = uniqid('T2501');
        $redirectUrl = url('api/app-payment-status');
        $callbackUrl = 'https://astro-buddy.com';

        $paymentk = new ParasarKundliDetail();
        $paymentk->name = $request->name;
        $paymentk->mobile = $request->input('mobile');
        $paymentk->payment_status = 'initiated';
        $paymentk->dob = $request->input('dob');
        $paymentk->tob = $request->input('tob');
        $paymentk->place = $request->input('place');
        $paymentk->gender = $request->input('gender');
        $paymentk->payble_amount = $request->input('payble_amount');
        $paymentk->lang = $request->input('lang');
        $paymentk->order_id = $order_id;
        $paymentk->user_id = Auth::user()->id;
        $paymentk->save();
        
        $payment = new Payment();
        $payment->user_id = Auth::user()->id;
        $payment->amount = 500;
        $payment->credits = 500;
        $payment->status = 'initiated';
        $payment->bonus = $request->input('bonus') ?? 0;
        $payment->pkg_id = $request->input('pkg_id') ?? 0;
        $payment->name = $request->input(key: 'name');
        $payment->email = $request->input('email') ?? '';
        $payment->order_id = $order_id;
        $payment->date = now();
        $payment->save();

        $paymentData = array(
            'merchantId' => $merchantId,
            'merchantTransactionId' => $order_id,
            'merchantUserId' => "MUID123",
            'amount' => $paymentk->payble_amount * 100,
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
                $paymentk->payment_status = 'pending';
                $paymentk->save();
                return redirect($payPageUrl);
            } else {
                return response()->json(['error' => $responseData->message], 400);
            }
        }
    }
    // public function initiateKundaliPdfPayment(Request $request)
    // {
    //     $merchantId = 'M22MBXL2T7FMF'; // sandbox or test merchantId
    //     $apiKey = "291e0728-76f0-4ec1-9ea0-89f4b833069f"; // sandbox or test APIKEY
    //     $order_id = uniqid('MT_');
    //     $redirectUrl = url('api/payment-status');
    //     $callbackUrl = 'https://astro-buddy.com';
    //     $payment = new ParasarKundliDetail();
    //     $payment->name = $request->name;
    //     $payment->mobile = $request->input('mobile');
    //     $payment->payment_status = 'initiated';
    //     $payment->dob = $request->input('dob');
    //     $payment->tob = $request->input('tob');
    //     $payment->place = $request->input('place');
    //     $payment->gender = $request->input('gender');
    //     $payment->payble_amount = $request->input('payble_amount');
    //     $payment->lang = $request->input('lang');
    //     $payment->order_id = $order_id;
    //     $payment->user_id = Auth::user()->id;
    //     $payment->save();
    //     $paymentData = array(
    //         'merchantId' => $merchantId,
    //         'merchantTransactionId' => $order_id,
    //         'merchantUserId' => "MUID123",
    //         'amount' => $payment->payble_amount * 100,
    //         'redirectUrl' => $redirectUrl,
    //         'redirectMode' => "POST",
    //         'callbackUrl' => $callbackUrl,
    //         'paymentInstrument' => array(
    //             'type' => 'PAY_PAGE',
    //         ),
    //     );
    //     $payloadMain = base64_encode(json_encode($paymentData));
    //     $salt_index = 1;
    //     $payload = $payloadMain . "/pg/v1/pay" . $apiKey;
    //     $sha256 = hash("sha256", $payload);
    //     $final_x_header = $sha256 . '###' . $salt_index;
    //     $requestPayload = json_encode(array('request' => $payloadMain));
    //     $curl = curl_init();
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS => $requestPayload,
    //         CURLOPT_HTTPHEADER => array(
    //             'Content-Type: application/json',
    //             'X-VERIFY: ' . $final_x_header,
    //         ),
    //     ));
    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);
    //     curl_close($curl);
    //     if ($err) {
    //         return response()->json(['error' => 'cURL Error #: ' . $err], 500);
    //     } else {
    //         $responseData = json_decode($response);
    //         if (isset($responseData->code) && $responseData->code == 'PAYMENT_INITIATED') {
    //             $payPageUrl = $responseData->data->instrumentResponse->redirectInfo->url;
    //             $payment->payment_status = 'pending';
    //             $payment->save();
    //             return redirect($payPageUrl);
    //         } else {
    //             return response()->json(['error' => $responseData->message], 400);
    //         }
    //     }
    // }

    public function handlePaymentStatus(Request $request)
    {
        $response = $request->all();
        if (!isset($response['code'])) {
            return response()->json(['error' => 'Invalid response from payment gateway.'], 400);
        }
        if ($response['code'] === 'PAYMENT_SUCCESS') {
            if (isset($request['providerReferenceId']) && isset($request['amount'])) {
                $order_id = $request['transactionId'];
                $amount = $request['amount'] / 100; // Convert amount from paise to actual currency
                $paymentK = ParasarKundliDetail::where('order_id', $order_id)->first();
                $payment = Payment::where('order_id', $order_id)->first();
                if ($paymentK) {
                    $paymentK->payment_status = 'completed';
                    $paymentK->payble_amount = $amount; // Update amount if necessary
                    $paymentK->save();
                    $payment->status = 'completed';
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
                  $paymentK = ParasarKundliDetail::where('order_id', $order_id)->first();
                $payment = Payment::where('order_id', $order_id)->first();
                if ($paymentK) {
                    $paymentK->payment_status = 'failed';
                    $paymentK->save();
                    $payment->status = 'failed';
                    $payment->save();
                }
            }
            return response()->json(['error' => 'Payment failed!'], 400);
        }
    }

    public function premiumKundliUsers(Request $request){

        try {
            $premiumUsers = ParasarKundliDetail::orderBy('id', 'desc');
            $name = $request->name;
            $phone = $request->phone;
            if (!empty($name)) {
                $premiumUsers = $premiumUsers->where('name', 'like', '%' . $name . '%');
            }
            if (!empty($phone)) {
                $premiumUsers = $premiumUsers->where('mobile', 'like', '%' . $phone . '%');
            }
            $premiumUsers = $premiumUsers->paginate(15);
            $premiumUserCount = $premiumUsers->count();
            return view('parasar_kundli.premium_user_list', compact('premiumUsers', 'name', 'phone', 'premiumUserCount'));
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }

    }
    public function premium_kundli()
    {
        $premiumKundli = ParasarKundliDetail::where('user_id', Auth::user()->id)->where('payment_status', 'completed')->get();
        return view('parasar_kundli.premium_kundli_details', compact('premiumKundli'));
    }
    public function addPremiumKundli($id){
        $premiumUser = decrypt($id);
        return view('parasar_kundli.add_premium_kundli', compact('premiumUser'));
    }
    public function storePremiumKundli(Request $request)
    {

        //appent header - footer in pdf
        if (!$request->hasFile('file') || !$request->file('file')->isValid()) {
            return response()->json(['error' => 'Invalid file upload'], 400);
        }
        $file = $request->file('file');
        $filePath = $file->getPathname();
        $pdf = new CustomPdf();
        $pageCount = $pdf->setSourceFile($filePath);
        for ($pageNo = 2; $pageNo <= $pageCount; $pageNo++) {
            $templateId = $pdf->importPage($pageNo);
            $size = $pdf->getTemplateSize($templateId);
            $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
            $pdf->useTemplate($templateId);
        }
        $premiumUsers = ParasarKundliDetail::find($request->premiumUser);
        $name = $premiumUsers->name;
        $newFilePath = storage_path('app/public/' . $name . '_kundli.pdf');
        $pdf->Output($newFilePath, 'F');

        try {
            //append pages in pdf
            // $pdfFiles = [
            //     public_path('pdf/newHeaderPage.pdf'),
            //     $newFilePath,
            //     public_path('pdf/newServicesPage.pdf'),
            //     public_path('pdf/kundli_tq_page.pdf'),
            // ];
            $pdfFiles = [
                public_path('images/premiumKundli/header_page.pdf'),
                $newFilePath,
                public_path('pdf/newServicesPage.pdf'),
                public_path('images/premiumKundli/thank_you_page.pdf'),
            ];
            $outputPdfPath = storage_path('app/public/' . $name . '_kundli.pdf');
            $pdf = new Fpdi();
            foreach ($pdfFiles as $filePath) {
                if (!file_exists($filePath)) {
                    return response()->json(['error' => "File not found: $filePath"], 404);
                }
                $pageCount = $pdf->setSourceFile($filePath);
                for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                    $templateId = $pdf->importPage($pageNo);
                    $size = $pdf->getTemplateSize($templateId);
                    $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                    $pdf->useTemplate($templateId);
                }
            }
            $pdf->Output($outputPdfPath, 'F');
            // $premiumUsers = ParasarKundliDetail::find($request->premiumUser);
            if ($premiumUsers) {
                $destinationPath = 'premium_kundli';
                $fileName = time() . '-' . basename($outputPdfPath);
                File::move($outputPdfPath, public_path($destinationPath . '/' . $fileName));
                $premiumUsers->premium_kundli_pdf = $destinationPath . '/' . $fileName;
                $message = ' Your premium Kundali has been successfully generated. Please log in to your Astrobuddy account to download it. Team ASTROBUDDY';
                // if (!empty($premiumUsers->mobile)) {
                //     $receiverNumber = '+91' . $premiumUsers->mobile;
                //     $message =  'Dear ' . $premiumUsers->name . $message;
                //     $sid = env("TWILIO_SID");
                //     $token = env("TWILIO_AUTH_TOKEN");
                //     $twilio_number = env("TWILIO_PHONE_NUMBER");
                //     $client = new Client($sid, $token);
                //     try {
                //         $client->messages->create($receiverNumber, [
                //             'from' => $twilio_number,
                //             'body' => $message
                //         ]);
                //         // return "OTP Sent Successfully!";
                //     } catch (\Exception $e) {
                //         return "Error: " . $e->getMessage();
                //     }
                //         // $response = Http::post('https://astro-buddy.com/api/test-otp', $data);
                //         // if ($response->successful()) {
                //         //         return response()->json([
                //         //             'message' => 'OTP sent successfully!',
                //         //             'data' => $response->json(),
                //         //         ]);
                //         // }
                // }
                $premiumUsers->save();
            }
            return Redirect('premium-kundli-users');
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

}
