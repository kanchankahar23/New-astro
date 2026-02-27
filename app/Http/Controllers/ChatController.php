<?php

namespace App\Http\Controllers;

use App\Jobs\DecreaseAmountJob;
use App\Models\ChatMeeting;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\PrivateChatEvent;
use App\Events\ChatingEvent;
use Carbon\Carbon;
use App\Events\SendmessageEvent;
use App\Models\AstroStatus;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\WalletManagementController;
use App\Events\AppointmentNotification;

class ChatController extends Controller
{
    public function goto_chat($id, Request $request)
    {
        $astrologer = User::find($id);
        $user = User::find(Auth::user()->id);
        $user_id = Auth::user()->id;
        $price_per_min = $astrologer->astrologerDetail->charge_per_min;
        $formattedBalance = getBalanceAmount();
        $cleanedBalance = str_replace(',', '', $formattedBalance);
        $balance = (float) $cleanedBalance;
        if ($price_per_min < $balance) {
            if (isset($astrologer)) {
                $meeting = ChatMeeting::firstOrNew(['user_id' => $user_id, 'astrologer_id' => $astrologer->id]);
                $meeting->user_id = $user_id;
                $meeting->astrologer_id = $astrologer->id;
                $meeting->user_encrypt = generateRandomString();
                $meeting->astro_encrypt = generateRandomString();
                $meeting->name = $request->name;
                $meeting->dob = date('Y-m-d', strtotime($request->dob));
                $meeting->tob = date('H:i', strtotime($request->dob));
                $meeting->place = $request->location;
                $meeting->lat = $request->lat ?? '23.1686';
                $meeting->lon = $request->lon ?? '79.9339';
                $meeting->wallet = getBalanceAmount();
                $meeting->gender = $request->gender;
                $meeting->charge_per_min = $astrologer->astrologerDetail->charge_per_min;
                $meeting->is_stop = 0;
                $meeting->is_complete = 2;
                $meeting->timer = floor(($balance / $astrologer->astrologerDetail->charge_per_min) * 60);
                $meeting->balance_time = $meeting->timer;
                $meeting->save();
                event(new AppointmentNotification($meeting));
            }
            // return redirect('chatify/' . $meeting->astro_encrypt);
            return redirect('chat-list/');
        }else
        {
            return redirect()->back()->with('error', 'Insufficient balance');
        }
    }
    // public function goto_chat($id, Request $request)
    // {
    //     $astrologer = User::find($id);
    //     $user = User::find(Auth::user()->id);
    //     $user_id = Auth::user()->id;
    //     if ($astrologer->astrologerDetail->charge_per_min < getBalanceAmount()) {
    //         if (isset($astrologer)) {
    //             $meeting = ChatMeeting::firstOrNew(['user_id' => $user_id, 'astrologer_id' => $astrologer->id]);
    //             $meeting->user_id = $user_id;
    //             $meeting->astrologer_id = $astrologer->id;
    //             $meeting->user_encrypt = generateRandomString();
    //             $meeting->astro_encrypt = generateRandomString();
    //             $meeting->name = $request->name;
    //             $meeting->dob = date('Y-m-d', strtotime($request->dob));
    //             $meeting->tob = date('H:i', strtotime($request->dob));
    //             $meeting->place = $request->location;
    //             $meeting->lat = $request->lat ?? '23.1686';
    //             $meeting->lon = $request->lon ?? '79.9339';
    //             $meeting->wallet = getBalanceAmount();
    //             $meeting->gender = $request->gender;
    //             $meeting->charge_per_min = $astrologer->astrologerDetail->charge_per_min;
    //             $meeting->is_stop = 1;
    //             $meeting->is_complete = 2;
    //             $meeting->timer = floor((getBalanceAmount() / $astrologer->astrologerDetail->charge_per_min) * 60);
    //             $meeting->balance_time = $meeting->timer;
    //             $meeting->save();
    //         }
    //         return redirect('real-time-chat/' . $astrologer->id);
    //         // return redirect('real-time-chat/');
    //     } else {
    //         return redirect()->back()->with('error', 'Insufficient balance');
    //     }


    // }

    public function save_chat_time(Request $request)
    {
        try {
            // return $request->all();
            $meeting_id = $request->meeting_id;
            $meeting = ChatMeeting::find($meeting_id);
            $meeting->timer = $request->time;
            $meeting->save();
            return response()->json([
                'success' => $meeting_id,
                'is_stop' => $meeting->is_stop
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function startTime(Request $request)
    {
        $meeting = ChatMeeting::where('user_encrypt', $request->meeting_id)->orWhere('astro_encrypt', $request->meeting_id)->first();
        $meeting->is_stop = $request->action;
        $meeting->is_complete = $request->complete;
        $meeting->save();
        if (Auth::user()->type == 'astrologer') {
            $activity = AstroStatus::firstOrNew(['astrologer_id' => $meeting->astrologer_id]);
            $activity->status = "busy";
            $activity->save();
        }
        if ($meeting->is_complete == "1") {
            $info = [
                "user_id" => $meeting->user_id,
                "astrologer_id" => $meeting->astrologer_id,
                "balance" => $meeting->balance_time,
                "chat" => $meeting->timer,
                "amount" => $meeting->charge_per_min,
                "chat_id" => $meeting->id
            ];
            $amount = $this->deduct_amount($info);
            $activity = AstroStatus::firstOrNew(['astrologer_id' => $meeting->astrologer_id]);
            $activity->status = "available";
            $activity->save();
            DB::table('chat_logs')->insert([
                'user_id' => $meeting->user_id,
                'astrologer_id' => $meeting->astrologer_id,
                'duration' => $meeting->balance_time - $meeting->timer,
                'deduct_amount' => $amount,
                'date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        
        }
        return response()->json(['time' => $meeting->timer], 200);
    }


    public function deduct_amount(array $info)
    {
        $user = User::find($info["user_id"]);
        $process_time = round($info["balance"] - $info["chat"]);
        $minutes = round($process_time / 60);
        $amountToDecrease = $minutes * $info["amount"];
        if ($user && $amountToDecrease > 0) {
            $payment = new Payment();
            $payment->user_id = $user->id;
            $payment->astrologer_id = $info["astrologer_id"];
            $payment->name = $user->name;
            $process_time = round($info["balance"] - $info["chat"]);
            $minutes = round($process_time / 60);
            $amountToDecrease = $minutes * $info["amount"];
            $payment->status = 'completed';
            $payment->debits = $amountToDecrease;
            $payment->save();
            $meeting = ChatMeeting::find($info["chat_id"]);
            $meeting->timer = $info["chat"];
            $meeting->balance_time = $info["chat"];
            $meeting->save();
            $activity = User::find( $info["astrologer_id"]);
            $activity->active_status = 1;
            $activity->save();
            return $amountToDecrease;
        }
        $arrayData = [
            "user_id" => $info["user_id"],
            "astrologer_id" => $info["astrologer_id"],
            "total_amount" => $amountToDecrease,
            "source" => 'chat',
        ];
        $newRequest = Request::create('walletManagement', 'POST', $arrayData);
        $rating = new WalletManagementController();
        $response = $rating->walletManagement($newRequest);
        return true;
    }

    public function instant_recharge(Request $request)
    {
        try {
            $meeting = ChatMeeting::where('user_encrypt', $request->meeting)
                ->orWhere('astro_encrypt', $request->meeting)
                ->first();

            $timeToAdd = floor(((int) $request->payment["value"] / $meeting->charge_per_min) * 60);
            $updated = $meeting->timer + $timeToAdd;
            $meeting->timer = $updated;
            $meeting->balance_time = $updated;
            $meeting->save();
            return response()->json([
                "message" => "Recharge successful",
                "meeting" => $timeToAdd,
                "payment" => $request->payment
            ], 200);

        } catch (\Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

    public function store_rating(Request $request)
    {
        try {
            $astrologer_id = ChatMeeting::where('id', $request->id)->select('astrologer_id')->first();
            $arrayData = [
                "astrologer_id" => $astrologer_id->astrologer_id,
                "rating" => $request->rating,
                "feedback" => $request->feedback,
                "type" => "chat"
            ];
            $newRequest = Request::create('setRating', 'POST', $arrayData);
            $rating = new UtilityController();
            $response = $rating->setRating($newRequest);
            return response()->json(["message" => $response], 200);
        } catch (\Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

}
