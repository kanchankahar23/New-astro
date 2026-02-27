<?php

// use GuzzleHttp\Client;

use App\Models\Payment;
use App\Models\User;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Appointment;
use Carbon\Carbon;
use Twilio\Rest\Client;
function saveBase64Image($base64Image)
{
    // Extract file extension
    preg_match("/^data:image\/(png|jpg|jpeg);base64,/", $base64Image, $match);
    $extension = $match[1] ?? 'png'; // default to png if not matched

    // Remove the base64 header
    $imageData = preg_replace('/^data:image\/(png|jpg|jpeg);base64,/', '', $base64Image);
    $imageData = str_replace(' ', '+', $imageData); // Replace spaces if any

    // Decode and save the image
    $imageName = 'profile_' . uniqid() . '.' . $extension;
    $imagePath = 'user_image/' . $imageName;

    // Ensure directory exists
    if (!file_exists(public_path('uploads/profile'))) {
        mkdir(public_path('uploads/profile'), 0755, true);
    }

    file_put_contents(public_path($imagePath), base64_decode($imageData));

    return $imagePath; // return the relative path to store in DB
}
function saveUserImage($image)
{
    if ($image) {
        $imageFileName = rand() . "_" . time() . ".png";
        $imagePath = "user_image/" . $imageFileName;
        $thumbPath = "user_image/thumb/" . $imageFileName;
        // Use the ImageManager to load the image
        $manager = new ImageManager(new Driver());
        $thumbnail = $manager->read($image);
        $thumbnail = $thumbnail->resize(150, 150);
        // Save the image (Corrected)
        $thumbnail->save(public_path($imagePath));
        $thumbnail->save(public_path("user_image/thumb/" . $imageFileName));
        return $imagePath;
    } else {
        return '';
    }
}

function saveImage($image, $path)
{
    if ($image) {
        $imageFileName = rand() . "_" . time() . ".png";
        $imagePath = $path . $imageFileName;
        $thumbPath = $path . "thumb/" . $imageFileName;
        // Save original image
        file_put_contents(public_path($imagePath), file_get_contents($image));
        $manager = new ImageManager(new Driver());
        $thumbnail = $manager->read($imagePath);
        $thumbnail = $thumbnail->resize(150, 150);
        $thumbnail->toJpeg(80)->save(public_path($thumbPath));
        $thumbnail->save(public_path($thumbPath));
        return $imagePath;
    } else {
        // Return default image if no image is uploaded
        return '';
    }
}

function sendOtp($template_id, $contacts, $from, $sms_text)
{
    try {
        $api_key = "46066D0E0C9185" ?? env('otp_key');
        if (!$api_key) {
            \Log::error('SMS API Key is missing.');
            return 'API key is missing.';
        }
        $api_url = "https://webmsg.smsbharti.com/app/smsapi/index.php?key=" . $api_key .
            "&campaign=0&routeid=9&type=text&contacts=" . $contacts .
            "&senderid=" . $from . "&msg=" . $sms_text . "&template_id=" . $template_id;
        // Use cURL to avoid redirection issues
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if ($error) {
            \Log::error('SMS API cURL Error: ' . $error);
            return 'SMS API Error: ' . $error;
        }
        \Log::info('SMS API Response:', ['response' => $response]);
        return $response;
    } catch (Exception $e) {
        \Log::error('SMS API Exception: ' . $e->getMessage());
        return 'Error: ' . $e->getMessage();
    }
}


function




createProject($name)
{
    $customerKey = env('CustomerKey');
    $customerSecret = env('CustomerSecret');
    $credentials = $customerKey . ":" . $customerSecret;
    $base64Credentials = base64_encode($credentials);
    $arr_header = "Authorization: Basic " . $base64Credentials;
    $curl = curl_init();

    $postFields = json_encode([
        'name' => $name,
        'enable_sign_key' => true,
    ]);

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.agora.io/dev/v1/project',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $postFields,
        CURLOPT_HTTPHEADER => array(
            $arr_header,
            'Content-Type: application/json',
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response);
    return $result;
}

function createToken($appId, $appCertificate, $channelName)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://white-force.com/agora/vc/sample/RtcTokenBuilderSample.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query(array(
            'appId' => $appId,
            'appCertificate' => $appCertificate,
            'channelName' => $channelName,
        )),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    return $response;
}

function generateRandomString($length = 7)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getPackages()
{
    $packages = DB::table('packages')->orderBy('price', 'ASC')->select('id', 'price', 'extra', 'total')->get();
    return $packages;
}

function balanceEnquiry($user_id)
{
    $payment = Payment::where('user_id', $user_id)->where('status', 'completed')->get();
    $sumOfAmount = $payment->sum('amount');
    $deductedAmount = $payment->sum('debits');
    $balance = $sumOfAmount - $deductedAmount;
    return $balance;
}

function balanceEnquiryBonus($user_id)
{
    $payment = Payment::where('user_id', $user_id)->where('status', 'completed')->get();
    $balance = $payment->sum('bonus');
    return $balance;
}

function totalBalance($user_id)
{
    $payment = Payment::where('user_id', $user_id)->where('status', 'completed')->get();
    $balance = $payment->sum('amount');
    return $balance;
}

function getBalanceAffterAppointment($user_id, $preferred_date)
{
    $payment = Payment::where('user_id', $user_id)->where('date', $preferred_date)->where('status', 'completed')->get();
    $sumOfAmount = $payment->sum('amount');
    $deductedAmount = $payment->sum('debits');
    $balance = $sumOfAmount - $deductedAmount;
    return $balance;
}

function upcomingDate($date)
{
    $upcomingDate = Appointment::where('preferred_date', '>', Carbon::today())
        ->select('preferred_date', 'preferred_time', 'astrologer_id')
        ->first();
    if ($upcomingDate) {
        $astroName = User::where('id', $upcomingDate->astrologer_id)->value('name');
        $astroDetails = [
            'astro_name' => $astroName,
            'appointment' => $upcomingDate,
        ];


        return $astroDetails;
    }
}

function getBalanceAmount($sumOfAddedBalance = 0.00, $deductedAmount = 0.00)
{
    // $sumOfAddedBalance = Auth::user()->getWalletInfo->where('status', 'completed')->sum('amount');
    // $credits = Auth::user()->getWalletInfo->where('status', 'completed')->sum('credits');
    // $sumOfAddedBalance = $sumOfAddedBalance + $credits;
    // $deductedAmount = Auth::user()->getWalletInfo->sum('debits');
    // $balance = $sumOfAddedBalance - $deductedAmount;
    // return number_format($balance, 2);
    $credits = Auth::user()->getWalletInfo->where('status', 'completed')->sum('credits');
    $bonus = Auth::user()->getWalletInfo->where('status', 'completed')->sum('bonus');
    $sumOfAddedBalance = $credits + $bonus;
    $deductedAmount = Auth::user()->getWalletInfo->where('status', 'completed')->sum('debits');
    $balance = $sumOfAddedBalance - $deductedAmount;
    return number_format($balance, 2);
}

//created by shainki
function getWalletAmount($sumOfAddedBalance = 0.00, $deductedAmount = 0.00)
{
    $credits = Auth::user()->getWalletInfo->where('status', 'completed')->sum('credits');
    $bonus = Auth::user()->getWalletInfo->where('status', 'completed')->sum('bonus');
    $sumOfAddedBalance = $credits + $bonus;
    $deductedAmount = Auth::user()->getWalletInfo->where('status', 'completed')->sum('debits');
    $balance = $sumOfAddedBalance - $deductedAmount;
    return number_format($balance, 2);
}

function getUserWalletAmount($user_id)
{
    $payment = Payment::where('user_id', $user_id)->where('status', 'completed')->get();
      $sumOfAmount = $payment->sum('amount');
    $sumOfCredit = $payment->sum('credits');
    $sumOfAmount = $sumOfAmount + $sumOfCredit;
    $sumOfDebit = $payment->sum('debits');
    $balance = $sumOfAmount - $sumOfDebit;
     $balance;
}
function getBalanceAmountUser($user_id, $preferred_date)
{
    $payment = Payment::where('user_id', $user_id)->where('date', $preferred_date)->where('status', 'completed')->get();
    $sumOfAmount = $payment->sum('amount');
    $deductedAmount = $payment->sum('debits');
    $balance = $sumOfAmount - $deductedAmount;
    return $balance;
}
function getUserBalance($user_id)
{
    $payment = Payment::where('user_id', $user_id)->where('status', 'completed')->get();
    $credits = $payment->sum('credits');
    $bonus = $payment->sum('bonus');
    $sumOfAddedBalance = $credits + $bonus;
    $deductedAmount = $payment->sum('debits');
    $balance = $sumOfAddedBalance - $deductedAmount;
    return number_format($balance, 2);
}

function convertTimeToSeconds($time)
{
    // Split the time string into hours and minutes
    list($minutes, $seconds) = explode(':', $time);

    // Convert the time to seconds
    $totalSeconds = ($minutes * 60) + $seconds;

    return $totalSeconds;
}

function startAgoraRecording($channelName, $uid)
{
    $client = new Client();
    $appId = "2e50faf815c644ae9b0b629458fb68e4";
    $appCertificate = env('AGORA_APP_CERTIFICATE');
    $customerId = env('CustomerKey');
    $customerCertificate = env('AGORA_CUSTOMER_CERTIFICATE');

    $url = "https://api.agora.io/v1/apps/{$appId}/cloud_recording/acquire";

    $response = $client->post($url, [
        'auth' => [$customerId, $customerCertificate],
        'json' => [
            'cname' => $channelName,
            'uid' => $uid,
            'clientRequest' => []
        ]
    ]);

    $result = json_decode($response->getBody()->getContents(), true);
    return $result['resourceId'];
}

function getAstrologerWalletBalance($astrologer_id)
{
    $walletDetails = DB::table('wallet_management')->where('astrologer_id', $astrologer_id);
    $astroAmount = $walletDetails->sum('astrologer_amount');
    $withdrawalAmount = $walletDetails->sum('astro_withdraw_amount');
    $payment = $astroAmount - $withdrawalAmount;
    return number_format($payment, 2);
}

function convertTimeToMinutes($seconds)
{
    $minutes = floor($seconds / 60);
    $remainingSeconds = $seconds % 60;
    return sprintf("%02d:%02d", $minutes, $remainingSeconds);
}

function sendMessage($data)
{
    if (!isset($data['otp']) || !isset($data['mobile'])) {
        return "Missing OTP or mobile number.";
    }
    $receiverNumber = '+91' . $data['mobile'];
    $message = $data['message'] . $data['otp'];
    $sid = env("TWILIO_SID");
    $token = env("TWILIO_AUTH_TOKEN");
    $twilio_number = env("TWILIO_PHONE_NUMBER");
    $client = new Client($sid, $token);
    try {
        $client->messages->create($receiverNumber, [
            'from' => $twilio_number,
            'body' => $message
        ]);
        return "OTP Sent Successfully!";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
}



