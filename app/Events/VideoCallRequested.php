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

class VideoCallRequested implements ShouldBroadcast
{
    public $meeting;
    public $userId;

    public $sender;

    public function __construct($meeting, $userId, User $sender)
    {
        $this->meeting = $meeting;
        $this->userId = $userId;
        $this->sender = $sender;
    }

    public function broadcastOn()
    {
        return new Channel('video-call-request.' . $this->userId);
    }

    public function broadcastWith()
    {
        return [
            'meeting' => [
                'meeting' => $this->meeting
            ],
            'sender' => [
                'id' => $this->sender->id,
                'name' => $this->sender->name,
            ],
        ];
    }
}

