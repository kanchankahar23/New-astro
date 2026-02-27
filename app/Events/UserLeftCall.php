<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

// app/Events/UserLeftCall.php
class UserLeftCall implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $roomId;
    public $leaver;
    public $target;

    public function __construct($roomId, $leaver, $target)
    {
        $this->roomId = $roomId;
        $this->leaver = $leaver;
        $this->target = $target;
    }

    public function broadcastOn()
    {
        return new Channel('video-call.' . $this->target);
    }



    public function broadcastAs()
    {
        return 'user.left.call';
    }

    public function broadcastWith()
    {
        return [
            'roomId' => $this->roomId,
            'leaver' => $this->leaver,
            'target' => $this->target
        ];
    }
}


