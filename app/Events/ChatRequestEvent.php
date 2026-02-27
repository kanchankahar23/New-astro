<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\ChatMeeting;

class ChatRequestEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chatMeeting;
    public $receiverId;
    public $sender;

    public function __construct(ChatMeeting $chatMeeting, User $sender, $receiverId)
    {
        $this->chatMeeting = $chatMeeting;
        $this->receiverId = $receiverId; // Assign astrologer_id
        $this->sender = $sender;
    }

    public function broadcastOn()
    {
        return new Channel('astrologer-notification.' . $this->receiverId);
    }

    public function broadcastAs()
    {
        return 'chat.request';
    }

    public function broadcastWith()
    {
        return [
            'chatMeeting' => [
                'id' => $this->chatMeeting->id,
                'astro_encrypt' => $this->chatMeeting->astro_encrypt,
                'user_encrypt' => $this->chatMeeting->user_encrypt,
            ],
            'sender' => [
                'id' => $this->sender->id,
                'name' => $this->sender->name,
            ],
        ];
    }
}
