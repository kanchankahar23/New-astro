<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VideoCallDeclined implements ShouldBroadcast
{
    use SerializesModels;

    public $userId; // the user who requested the appointment
    public $declinerName; // astrologer or other participant
    public $redirectUrl;

    public function __construct($userId, $declinerName, $redirectUrl = '/dashboard')
    {
        $this->userId = $userId;
        $this->declinerName = $declinerName;
        $this->redirectUrl = $redirectUrl;
    }

    public function broadcastOn()
    {
        return new Channel('video-call-decline.' . $this->userId);
    }

    public function broadcastWith()
    {
        return [
            'decliner_name' => $this->declinerName,
            'redirect_url' => $this->redirectUrl
        ];
    }
}

