<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VideoCallAccepted implements ShouldBroadcast
{
    use SerializesModels;

    public $meeting;

    public function __construct($meeting)
    {
        $this->meeting = $meeting;
    }

    public function broadcastOn()
    {
        return [
            new Channel('video-call-accept.' . $this->meeting->user_id),
            new Channel('video-call-accept.' . $this->meeting->astrologer_id),
        ];
    }

    public function broadcastWith()
    {
        return [
            'meeting_url' => $this->meeting->url
        ];
    }
}
