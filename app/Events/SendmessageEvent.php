<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendmessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;


    public function __construct($message)
    {
        $this->message = $message;


    }

    public function broadcastWith()
    {
        Log::info('Broadcasting with data: ', ['message' => $this->message]);
        return [
            'message' => $this->message,
        ];
    }

    public function broadcastOn()
    {
        Log::info('Broadcasting on channel: my-channel');
        return new Channel('my-channel');
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}
