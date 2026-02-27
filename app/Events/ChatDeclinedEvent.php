<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use App\Models\ChatMeeting;

class ChatDeclinedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chatMeeting;
    public $decliner;

    public function __construct(ChatMeeting $chatMeeting, $decliner)
    {
        $this->chatMeeting = $chatMeeting;
        $this->decliner = $decliner;
    }

    public function broadcastOn()
    {
        $userId = ($this->decliner->id === $this->chatMeeting->astrologer_id)
            ? $this->chatMeeting->user_id
            : $this->chatMeeting->astrologer_id;

        return new Channel('chat.decline.' . $userId);
    }

    public function broadcastAs()
    {
        return 'chat.declined';
    }

    public function broadcastWith()
    {
        return [
            'chatMeeting' => $this->chatMeeting,
            'decliner' => [
                'id' => $this->decliner->id,
                'name' => $this->decliner->name,
            ]
        ];
    }
}
