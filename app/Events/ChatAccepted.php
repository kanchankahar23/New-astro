<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatAccepted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chatMeeting;
    public $receiver;

    public function __construct($chatMeeting, $receiver)
    {
        $this->chatMeeting = $chatMeeting;
        $this->receiver = $receiver;
    }

    public function broadcastOn()
    {
        return ['chat.accept.' . $this->receiver ];
    }

    public function broadcastWith()
    {
        return [
            'chatMeeting' => [
                'id' => $this->chatMeeting->id,
                'astrologer_encrypt' => encrypt($this->chatMeeting->astrologer_id),
                'user_encrypt' => encrypt($this->chatMeeting->user_id),
            ]
        ];
    }

    public function broadcastAs()
    {
        return 'chat.accepted';
    }
}

