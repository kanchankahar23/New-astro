<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CallExtended implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $appointment;
    public $astro_id;
    // public $extended_by_seconds;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
        $this->astro_id = $appointment->astrologer_id;
        // $this->extended_by_seconds = $extended_by_seconds;
    }

    public function broadcastOn()
    {
        return new Channel('update-astrologer-timer.' . $this->astro_id);
    }

    public function broadcastAs()
    {
        return 'appointment.timer.update';
    }

    public function broadcastWith()
    {
        return [
            'appointment' => [
                'id' => $this->appointment->id,
                'new_duration' => $this->appointment->duration,
                // 'extended_by_seconds' => $this->extended_by_seconds,
            ]
        ];
    }
}
