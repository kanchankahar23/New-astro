<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\ChatMeeting;
use App\Models\User;
use App\Events\ChatRequestEvent;
use Illuminate\Support\Facades\DB;
use App\Events\ChatDeclinedEvent;
use App\Events\ChatAccepted;
use App\Models\Notification;


class RealTimeChatController extends Controller
{
    public function realTimeChat($id)
    {
        $user = Auth::user();
        if ($user->type == 'user' && getBalanceAmount() <= 0) {
            return back()->with('error', "Don't have Enough Balance");
        }

        if (Auth::user()->type == 'user') {
            $chatMeeting = ChatMeeting::where('astro_encrypt', $id)->latest()->first();
             $receiver = $chatMeeting->astrologer_id;
        } elseif (Auth::user()->type == 'astrologer') {
            $chatMeeting = ChatMeeting::where('user_encrypt', $id)->latest()->first();
            $receiver = $chatMeeting->user_id;
            $status = User::find($user->id);
            $status->active_status = 2 ; // busy = 2
            $status->save();
        }
        $sender = $user->id;
        $messageResponse = Http::get('https://astro-buddy.in/messages', [
            'sender' => $sender,
            'receiver' => $receiver,
        ]);
        $receiverUser = User::find($receiver);
        $messageResponse = $messageResponse->json();
           $amount = DB::table('chat_meetings')
            ->where(function ($query) use ($receiver) {
                $query->where('astrologer_id', $receiver)
                    ->where('user_id', Auth::user()->id);
            })
            ->orWhere(function ($query) use ($receiver) {
                $query->where('astrologer_id', Auth::user()->id)
                    ->where('user_id', $receiver);
            })
            ->latest()
            ->first();
        $messenger_color = Auth::user()->messenger_color;
        broadcast(new ChatAccepted($chatMeeting, $receiver));
        // event(new ChatRequestEvent($chatMeeting, $user));
        // return $amount->timer;
        return view('real_time_chat.chat', [
            'id' => $id ?? 0,
            'amount' => $amount->charge_per_min ?? 5,
            'meeting_id' => $amount->id ?? null,
            'timer' => $amount->timer ?? 0,
            'complete' => $amount->is_complete ?? 2,
            'name' => $amount->name ?? null,
            'dob' => $amount->dob ?? null,
            'tob' => $amount->tob ?? null,
            'place' => $amount->place ?? null,
            'type' => "chat",
            'messageResponse' => $messageResponse,
            'receiver' => $receiver,
            'receiverUser' => $receiverUser,
            'chatMeeting' => $chatMeeting
        ]);

    }


    public function triggerAccept($id)
    {
         $chatMeeting = ChatMeeting::findOrFail($id);
         $user = Auth::user();
        if (Auth::user()->type == 'user') {
            $receiverId = $chatMeeting->astrologer_id;
        } elseif (Auth::user()->type == 'astrologer') {
             $receiverId = $chatMeeting->user_id;
        }
        if (!empty($receiverId)) {
            $notification = new Notification();
            $notification->sender = $user->id;
            $notification->receiver = $receiverId;
            $notification->appointment_id = $chatMeeting->id;
            $notification->appointment_type = 'chat';
            $notification->save();
        }
        event(new ChatRequestEvent($chatMeeting, $user, $receiverId));
        return response()->json(['status' => 'broadcasted']);
    }

    public function acceptChat(Request $request)
    {
        $chatMeeting = ChatMeeting::find($request->meeting_id);
        if ($chatMeeting) {
            return response()->json([
                'status' => 'accepted',
                'chat_url' => $chatMeeting->astro_encrypt
            ]);
        }
        return response()->json(['status' => 'error']);
    }


    public function declineChat($id)
    {
        $chatMeeting = ChatMeeting::findOrFail($id);
        $decliner = auth()->user();

        event(new ChatDeclinedEvent($chatMeeting, $decliner));

        return redirect()->back()->with('info', 'Chat request declined.');
    }

    public function getMessages(Request $request)
    {
        $sender = $request->query('user_id');
        $receiver = $request->query('receiver_id');

        // Validate input
        if (!$sender || !$receiver) {
            return response()->json(['error' => 'Sender and receiver are required'], 400);
        }
        try {
            $response = Http::get('http://62.72.58.63:3000/messages', [
                'query' => [
                    'sender' => $sender,
                    'receiver' => $receiver,
                ]
            ]);
            return response()->json($response->json());
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch messages'], 500);
        }
    }

    public function userChatList()
    {
        $chats = ChatMeeting::with('userDetails')->where('astrologer_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(3);
        return view('real_time_chat.user_chat_list', compact('chats'));
    }

    public function chat(){
        return view('real_time_chat.chat');
    }
    public function fetchMessages(Request $request)
    {
        $sender = $request->input('sender');
        $receiver = $request->input('receiver');
        $response = Http::get('http://62.72.58.63:3000/messages', [
            'sender' => $sender ?? 20,
            'receiver' => $receiver ?? 21,
        ]);
        return $response->json();
    }

    public function deductWallet(Request $request)
    {
        $userId = $request->user_id;
        $astrologerId = $request->astrologer_id;
        $perMinuteCharge = $request->per_minute_charge;
        // Get user's wallet balance
        $user = getBalanceAmount();

        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'User not found']);
        }

        if ($user < $perMinuteCharge) {
            return response()->json(['status' => 'insufficient', 'message' => 'Insufficient balance']);
        }
        // Deduct wallet balance
        $newBalance = $user - $perMinuteCharge;
        DB::table('ChatMeeting')->where('user_id', $userId)->update(['wallet' => $newBalance]);
        // Emit the updated wallet balance to the frontend using Socket.IO
        event(new \App\Events\WalletUpdated($userId, $newBalance));
        return response()->json(['status' => 'success', 'wallet_balance' => $newBalance]);
    }
}
