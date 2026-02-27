<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\UserMeeting;
use App\Models\User;
use App\Models\Payment;
use App\Models\MeetingEntry;
use App\Models\Appointment;
use App\Events\sendNotification;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\WalletManagementController;
use App\Events\VideoCallRequested;
use App\Events\VideoCallDeclined;
use App\Events\VideoCallAccepted;
use App\Models\Notification;
use App\Events\CallExtended;
use App\Events\UserLeftCall;

class VideoCallController extends Controller
{

    public function create(){
        $data = Auth::User()->with('getMeetings')->get();
        return view('createMeeting.create_meeting',get_defined_vars());
    }

    public function create_meeting(){
        $meeting = Auth::User()->getUserMeetingInfo()->first();

        if(!isset($meeting->id)){
            $name       =   'AstroBuddy'. rand(1111,9999);
            $meetingData = createProject($name);
            if(isset($meetingData->project->id)){
                $meeting            =    new UserMeeting();
                $meeting->user_id   =   Auth::User()->id;
                $meeting->app_id    =   $meetingData->project->vendor_key;
                $meeting->appCertificate   =   $meetingData->project->sign_key;
                $meeting->channel   =    $meetingData->project->name;
                $meeting->uid       =   rand(11111,99999);
                $meeting->save();

            }else{
                echo"Project not created";
            }
        }
        $meeting    =   Auth::User()->getUserMeetingInfo()->first();
        $token      =   createToken($meeting->app_id , $meeting->appCertificate ,$meeting->channel ) ;
        $meeting->token = $token ;
        $meeting->url = generateRandomString();
        $meeting->event = generateRandomString(5);
        $meeting->save();

        // Meeting HOst
        if(Auth::User()->id == $meeting->user_id){
            Session::put('meeting',$meeting->url);

        }
        return redirect('join-meeting/'.$meeting->url);
    }

//     public function join_meeting($url=''){
//         $meeting = UserMeeting::where('url',$url)->first();

//         if(isset($meeting->id)){
// // Meeting exist
//             $meeting->app_id = trim($meeting->app_id);
//             $meeting->appCertificate = trim($meeting->appCertificate);
//             $meeting->channel = trim($meeting->channel);
//             $meeting->token = trim($meeting->token);

//             if(Auth::User() && Auth::User()->id == $meeting->user_id){
//                 // meeting create
//                 $channel =  $meeting->channel;
//                 $event   = $meeting->event;
//                 $users = User::where('id','!=',Auth::User()->id)->get();
//             }else{
//                 if(!Auth::User()){
//                 $random_user = rand(111111,999999);
//                 Session::put('random_user',$random_user);
//                 $event = generateRandomString(5);

//                     $this->createEntry($meeting->user_id , $random_user , $meeting->url,$event , $meeting->channel);
//                     $channel =  $meeting->channel;
//                 }else{
//                     $event = generateRandomString(5);
//                     $this->createEntry($meeting->user_id , Auth::User()->id , $meeting->url,$event ,$meeting->channel);
//                     $channel =  $meeting->channel;
//                     Session::put('random_user',Auth::User()->id);
//                 }

//             }
//             // prx(get_defined_vars());
//             return view('createMeeting.join_meeting',get_defined_vars());
//         }else{
//             // meeting not exist
//         }
//     }

public function join_meeting($url=''){
    // return $url;
     $meeting = UserMeeting::where('url',$url)->first();

    if(isset($meeting->id)){
// Meeting exist
        $meeting->app_id = trim($meeting->app_id);
        $meeting->appCertificate = trim($meeting->appCertificate);
        $meeting->channel = trim($meeting->channel);
        $meeting->token = trim($meeting->token);

        if(Auth::User() && Auth::User()->id == $meeting->user_id){
            // meeting create
            $channel =  $meeting->channel;
            $event   = $meeting->event;
            $users = User::where('id','!=',Auth::User()->id)->get();
        }else{
            if(!Auth::User()){
            $random_user = rand(111111,999999);
            Session::put('random_user',$random_user);
            $event = generateRandomString(5);
                $this->createEntry($meeting->user_id , $random_user , $meeting->url,$event , $meeting->channel);
                $channel =  $meeting->channel;
            }else{
                $event = generateRandomString(5);
                $this->createEntry($meeting->user_id , Auth::User()->id , $meeting->url,$event ,$meeting->channel);
                $channel =  $meeting->channel;
                Session::put('random_user',Auth::User()->id);
            }
        }
        // $appointment = Appointment::where('user_id',Auth::User()->id)->orWhere('astrologer_id',Auth::User()->id)->select('id','name','dob','tob','place','duration', 'user_id', 'astrologer_id', 'url')->latest()->first();
        $appointment = Appointment::where('url', $url)->select('id','name','dob','tob','place','duration', 'user_id', 'astrologer_id', 'url', 'way_to_reach')->first();
        // $appointment["type"] = "video";
        $appointment["type"] = $appointment["way_to_reach"];
        $appointment["duration"] = convertTimeToSeconds($appointment["duration"]);
        // prx(get_defined_vars());
        // return get_defined_vars();
        // return 1;
        $roomId = $appointment->url;
        $sender = Auth::User()->id;

        if (Auth::User()->type == 'astrologer') {
            $receiver =  $appointment->user_id;
             $remoteUserImage = User::where('id', $appointment->user_id)->value('avtar');
        }
        elseif (Auth::User()->type == 'user') {
             $receiver = $appointment->astrologer_id;
                $remoteUserImage = User::where('id', $appointment->astrologer_id)->value('avtar');
        }
        //  return view('video.video_call',get_defined_vars());
         return view('video.video_call_new',get_defined_vars());
    //   return view('createMeeting.join_meeting',get_defined_vars());
    }else{
        // meeting not exist
        return  abort(403, 'Meeting Not Created');;
    }
}

    public function createEntry($user_id , $random_user , $url ,$event ,$channel)

    {
        $entry = new MeetingEntry();
        $entry->user_id = $user_id;
        $entry->random_user = $random_user;
        $entry->url = $url;
        $entry->status = 0;
        $entry->channel = $channel;
        $entry->event = $event;
        $entry->save();
    }

    public function saveUserName(Request $request)
    {
        $saveName = MeetingEntry::where(['random_user'=>$request->random , 'url'=>$request->url])->first();
        if($saveName->status == 3){
            // Host reject

        }else{
            $saveName->name = $request->name;
            $saveName->status = 1;
            $saveName->save();

            $meeting = UserMeeting::where('url',$request->url)->first();
            $data = ['random_user'=>$request->random , 'title'=> $saveName->name .' wants to enter in the meeting'];
            event(new sendNotification($data,$meeting->channel , $meeting->event));
        }

    }

    public function meetingApprove(Request $request)
    {
        $saveName = MeetingEntry::where(['random_user'=>$request->random , 'url'=>$request->url])->first();

            $saveName->status = $request->type;
            if($request->type == 2){
                $saveName->created_at = date("Y-m-d h:i:s");
                $saveName->updated_at = date("Y-m-d h:i:s");
            }
            $saveName->save();

            $data = ['status'=>$request->type ];
            event(new sendNotification($data,$saveName->channel , $saveName->event));

    }

    public function recording(){
        return startAgoraRecording('AstroBuddy5633','65784');
    }

    public function store_video_rating(Request $request){
        // return $request->all();
        try{

            $astrologer_id = Appointment::where('id',$request->id)->select('astrologer_id')->first();
            // $appoiintment = Appointment::find($request->id);
            // $appoiintment->status = 4; // completed
            // $appoiintment->is_completed = 1;
            // $appoiintment->save();
            // $durationParts = explode(':', $astrologer_id->duration);
            // $hours = (int) $durationParts[0];
            // $minutes = (int) $durationParts[1];
            // $totalMinutes = ($hours * 60) + $minutes;
            // if ($totalMinutes > 0) {
            //     $astrologer_id->status = 3; // remaining
            // } else {
            //     $astrologer_id->status = 4; // completed
            //     $astrologer_id->is_completed = 1;
            // }
            // $astrologer_id->save();
            $arrayData = ["astrologer_id" =>$astrologer_id->astrologer_id,
            "rating"=> $request->rating,
            "feedback" => $request->feedback,
            "type" => "video"
        ];
            $newRequest = Request::create('setRating', 'POST', $arrayData);
            $rating = new UtilityController();
            $response = $rating->setRating($newRequest);
            return response()->json(["message" => $response], 200);
        }catch(\Exception $e){
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

    public function save_video_time(Request $request){
        try{
            if ($request->time >= 0) {
                $meeting_id = $request->meeting_id;
                $meeting = Appointment::find($meeting_id);
                $meeting->duration = convertTimeToMinutes($request->time);
                // if (!empty($meeting->remain_extended_duration) && !empty($meeting->deduct_extend_duration)) {
                //   $extendedMinutes =   $meeting->duration;
                //   $remainExtendedMinutes =   $meeting->remain_extended_duration;
                //   $diffMinutes = $extendedMinutes - $remainExtendedMinutes;
                //   $deductionMinutes = $meeting->deduct_extend_duration;
                //   $newMinutes =  $diffMinutes - $deductionMinutes;
                //   $updatedNewMinutes =  $deductionMinutes - $newMinutes;
                //   $newDeductionMinutes = $meeting->duration - $newMinutes;
                // }
                $meeting->save();
            }
            return response()->json(['success' => $meeting_id,
        ],200);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function complete_video_stream(Request $request){
        try{
            $meeting_id = $request->meeting_id;
            $meeting =  Appointment::find($meeting_id);
            // $payment_id = $meeting->payment_id;
            // $payment = Payment::find($payment_id);
            // $arrayData = ["user_id" =>$meeting->user_id,
            // "astrologer_id"=> $meeting->astrologer_id,
            // "total_amount" => $payment->debits,
            // "source" => "video"
            // ];
            if (!empty($meeting)) {
                $meeting->status = 3; // Completed
                $meeting->save();
            }
            // $newRequest = Request::create('walletManagement', 'POST', $arrayData);
            // $rating = new WalletManagementController();
            // $response = $rating->walletManagement($newRequest);
            return response()->json(['success' => $meeting_id,
        ],200);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function request(Request $request, $id)
    {
        //   if (Auth::user()->type == 'astrologer') {
        //     $this->create_astro_meeting($id);
        // }
        $this->create_astro_meeting($id);
        // $this->validate($request, [
        //     'user_id' => 'required|integer',
        // ]);
        $sender = Auth::user();
        $userId = $request->user_id;
        $meeting = Appointment::findOrFail(id: $id);
         if (!empty($userId)) {
            $notification = new Notification();
            $notification->sender = $sender->id;
            $notification->receiver = $userId;
            $notification->appointment_id = $meeting->id;
            if ($meeting->way_to_reach == 'phone') {
                $notification->appointment_type = $meeting->way_to_reach;
            }
            else{
                $notification->appointment_type = $meeting->way_to_reach;
            }
            $notification->save();
        }
        broadcast(new VideoCallRequested($meeting, $userId, $sender))->toOthers();
        return response()->json(['success' => true]);
    }

    // public function accept($id)
    // {
    //    return $meeting = Appointment::findOrFail($id);
    //     // Assuming authenticated user is receiver
    //     event(new VideoCallAccepted($meeting->caller_id, $meeting->url));
    //     event(new VideoCallAccepted($meeting->receiver_id, $meeting->url));

    //     return response()->json(['status' => 'accepted']);
    // }
    // VideoCallController.php
    public function accept($id)
    {
        $meeting = Appointment::where('url', $id)->first();
        $receiverId = $meeting->user_id;
        broadcast(new VideoCallAccepted($meeting))->toOthers();
        return response()->json(['success' => true]);
    }

    public function decline($id)
    {
        $meeting = Appointment::findOrFail($id);
        if (Auth::user()->type == 'user') {
            $userId = $meeting->astrologer_id;
        }elseif (Auth::user()->type == 'astrologer') {
            $userId = $meeting->user_id;
        }
        $declinerName = auth()->user()->name;
        broadcast(new VideoCallDeclined($userId, $declinerName));
        return response()->json(['success' => true, 'message' => 'Call declined']);
    }
    public function create_astro_meeting($id)
    {
        $meeting = Auth::User()->getUserMeetingInfo()->first();
        if (!isset($meeting->id)) {
            $meeting = new UserMeeting();
            $meeting->user_id = Auth::User()->id;
            // $meeting->app_id = $meeting->project->vendor_key;
            // $meeting->appCertificate = $meeting->project->sign_key;
            // $meeting->channel = $meeting->project->name;
            $meeting->uid = rand(11111, 99999);
            $meeting->save();
        }
        // $meeting = Auth::User()->getUserMeetingInfo()->first();
        $token = createToken($meeting->app_id, $meeting->appCertificate, $meeting->channel);
        $meeting->token = $token;
        $meeting->url = generateRandomString();
        $meeting->event = generateRandomString(5);
        $meeting->save();
        // Meeting HOst
        if (Auth::User()->id == $meeting->user_id) {
            Session::put('meeting', $meeting->url);
            $latestAppointment = Appointment::find($id);
            $latestAppointment->url = $meeting->url;
            $latestAppointment->save();
        }
        return 1;
    }
        public function completeVideoCall(Request $request)
    {
        $appointment = Appointment::find($request->id);
        if (!$appointment) {
            return response()->json(['status' => false, 'message' => 'Appointment not found.']);
        }
        if (!empty($appointment->extended_duration)) {
            $minutes = round((int) ($appointment->extended_duration ?? 0) - (int) ($appointment->duration ?? 0));
            $amountToDecrease = $minutes * $appointment->getAstrologerDetail->charge_per_min;
            if ($amountToDecrease > 0){
                     $payment = Payment::where('appointment_id', $appointment->id)->first();
            $payment->debits = $payment->debits + $amountToDecrease;
            $payment->extend_duration_amount = $amountToDecrease;
            $payment->save();
            if (isset($payment)) {
                $appointment->amount_paid = $payment->debits;
                $appointment->status = 4; //4 == completed
                $appointment->is_completed = 1;
                // $appointment->extended_duration = null;
                $appointment->save();
            }
            $arrayData = [
                "user_id" => $appointment->user_id,
                "astrologer_id" => $appointment->astrologer_id,
                "total_amount" => $amountToDecrease,
                "source" => $appointment->way_to_reach,
            ];
            $newRequest = Request::create('walletManagement', 'POST', $arrayData);
            $rating = new WalletManagementController();
            $response = $rating->walletManagement($newRequest);
            }
        }
        else {
            $appointment->status = 4;
            $appointment->is_completed = 1;
            $appointment->save();
        }
        return response()->json(['success' => true]);
    }

    public function checkWallet(Request $request)
    {
        $appointment = Appointment::find($request->appointment_id);
        $user = Auth::user();
        if (!$appointment || !$user) {
            return response()->json(['success' => false, 'message' => 'Invalid appointment or user.']);
        }
        $formattedBalance = getBalanceAmount();
        $cleanedBalance = str_replace(',', '', $formattedBalance);
        $walletBalance = (float) $cleanedBalance;
        $chargePerMin = (float) $appointment->getAstrologerDetail->charge_per_min;
        $currentDuration = (int) $appointment->duration;
        if ($walletBalance >= $chargePerMin) {
            if ($chargePerMin > 0) {
                $additionalMinutes = floor($walletBalance / $chargePerMin);
                $newDuration = $currentDuration + $additionalMinutes;
            } else {
                $additionalMinutes = 0;
                $newDuration = $currentDuration;
            }
            // $additionalMinutes = floor($walletBalance / $chargePerMin);
            // $newDuration = $appointment->duration + $additionalMinutes;

            // Optionally, update the appointment duration here or in a separate request
            // $appointment->duration = $newDuration;
            // $appointment->save();

            return response()->json([
                'success' => true,
                'can_extend' => true,
                'wallet_balance' => $walletBalance,
                'additional_minutes' => $additionalMinutes,
                'charge_per_min' => $chargePerMin,
                'new_duration' => $newDuration,
                'currentDuration' => $currentDuration,

            ]);
        } else {
            return response()->json([
                'success' => true,
                'can_extend' => false,
                'wallet_balance' => $walletBalance
            ]);
        }
    }

        public function updateDuration(Request $request)
    {
        // return $request->all();
        $request->validate([
            'appointment_id' => 'required',
            'new_duration' => 'required',
        ]);
        $appointment = Appointment::find($request->appointment_id);
        if (!$appointment) {
            return response()->json(['success' => false, 'message' => 'Appointment not found.']);
        }
        if ($request->new_duration) {
            $astrologer = User::find($appointment->astrologer_id);
            $price_per_min = (int) $astrologer->astrologerDetail->charge_per_min;
            $formattedBalance = getUserBalance($appointment->user_id);
            $cleanedBalance = str_replace(',', '', $formattedBalance);
            $walletAmount = (float) $cleanedBalance;
             $totalCharge = $price_per_min * (int) $request->new_duration;

            if (isset($appointment)) {
                // $appointment->amount_paid = $payment->debits;
                $appointment->status = 1; //1 == accept
                $appointment->duration = $request->new_duration;
                $appointment->extended_duration = $request->new_duration;
                $appointment->save();
            }
            //  $price_per_min = $astrologer->astrologerDetail->charge_per_min;
            // $getWalletAmount =  (int) getUserWalletAmount($latestAppointment->user_id);
            // if ( $getWalletAmount > $price_per_min * (int) $latestAppointment->duration) {
        //     if ($walletAmount > $totalCharge) {
        //     $payment = new Payment();
        //     $payment->user_id = $appointment->user_id;
        //     $payment->astrologer_id = $appointment->astrologer_id;
        //     $payment->name = Auth::user()->name;
        //     $payment->date = now();
        //     $payment->debits = $price_per_min * (int) $request->new_duration;
        //     $payment->status = 'completed';
        //     $payment->save();
        //     // WhatsAppController::sendMessageForAppointment($latestAppointment);
        //     if (isset($payment)) {
        //         $appointment->amount_paid = $payment->debits;
        //          $appointment->status = 1; //1 == accept
        //          $appointment->duration = $request->new_duration;
        //        $appointment->save();
        //     }
        // }
    }
        broadcast(new CallExtended($appointment))->toOthers();
        // event(new CallExtended($appointment));
        return response()->json(['success' => true]);
    }
    // public function updateDuration(Request $request)
    // {
    //     $appointment = Appointment::find($request->appointment_id);

    //     // Extract old duration from HH:MM format
    //     [$oldHours, $oldMinutes] = explode(':', $appointment->duration);
    //     $oldDurationInMinutes = ((int) $oldHours * 60) + (int) $oldMinutes;

    //     // New duration in minutes (passed from frontend)
    //     $newDurationInMinutes = (int) $request->new_duration;

    //     // Calculate extension
    //     $extendedMinutes = $newDurationInMinutes - $oldDurationInMinutes;
    //     $extendedBySeconds = $extendedMinutes * 60;

    //     // Save new duration in HH:MM format
    //     $newHours = floor($newDurationInMinutes / 60);
    //     $newMinutes = $newDurationInMinutes % 60;
    //     $appointment->duration = sprintf('%02d:%02d', $newHours, $newMinutes);
    //     $appointment->save();

    //     // Broadcast updated info
    //     broadcast(new CallExtended($appointment, $extendedBySeconds))->toOthers();

    //     return response()->json(['success' => true]);
    // }

    public function userLeftCall(Request $request)
    {
            // return $request->all();
        $validated = $request->validate([
            'roomId' => 'required',
            'leaver' => 'required',
            'target' => 'required',
        ]);
        $appointment = Appointment::where('url', $validated['roomId'])->first();
        if (!$appointment) {
            return response()->json(['status' => false, 'message' => 'Appointment not found.']);
        }
        if (!empty($appointment->extended_duration)) {
            $minutes = round((int) ($appointment->extended_duration ?? 0) - (int) ($appointment->duration ?? 0));
            $amountToDecrease = $minutes * $appointment->getAstrologerDetail->charge_per_min;
            if ($amountToDecrease > 0) {
                $payment = Payment::where('appointment_id', $appointment->id)->first();
                $payment->debits = $payment->debits + $amountToDecrease;
                $payment->extend_duration_amount = $amountToDecrease;
                $payment->save();
                if (isset($payment)) {
                    $appointment->amount_paid = $payment->debits;
                    $appointment->status = 4; //4 == completed
                    $appointment->is_completed = 1;
                    // $appointment->extended_duration = null;
                    $appointment->save();
                }
                $arrayData = [
                    "user_id" => $appointment->user_id,
                    "astrologer_id" => $appointment->astrologer_id,
                    "total_amount" => $amountToDecrease,
                    "source" => $appointment->way_to_reach,
                ];
                $newRequest = Request::create('walletManagement', 'POST', $arrayData);
                $rating = new WalletManagementController();
                $response = $rating->walletManagement($newRequest);
            }
        }
        broadcast(new UserLeftCall(
            $validated['roomId'],
            $validated['leaver'],
            $validated['target']
        ));

         response()->json(['status' => true, 'message' => 'User left call event broadcasted.']);
    }

    public function deductWalletPerMinute(Request $request)
    {
        $appointment = Appointment::find($request->appointment_id);
        if (!$appointment) {
            return response()->json(['success' => false, 'message' => 'Appointment not found.']);
        }
        $user = $appointment->user;
        $pricePerMin = $appointment->price_per_min ?? 10;
        if ($user->wallet_balance < $pricePerMin) {
            return response()->json(['success' => false, 'message' => 'Insufficient wallet balance.']);
        }
        $user->wallet_balance -= $pricePerMin;
        $user->save();
        Payment::create([
            'user_id' => $user->id,
            'astrologer_id' => $appointment->astrologer_id,
            'name' => $user->name,
            'date' => now(),
            'debits' => $pricePerMin,
            'status' => 'completed'
        ]);
        return response()->json(['success' => true, 'message' => 'Wallet deducted successfully.']);
    }

}
