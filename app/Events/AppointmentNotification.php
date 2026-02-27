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
// class AppointmentNotification
// {
//     use Dispatchable, InteractsWithSockets, SerializesModels;

//     /**
//      * Create a new event instance.
//      */
//     public function __construct()
//     {
//         //
//     }

//     /**
//      * Get the channels the event should broadcast on.
//      *
//      * @return array<int, \Illuminate\Broadcasting\Channel>
//      */
//     public function broadcastOn(): array
//     {
//         return [
//             new PrivateChannel('channel-name'),
//         ];
//     }
// }
class AppointmentNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $appointment;
    public $astro_id;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
        $this->astro_id = $appointment->astrologer_id;
    }

    public function broadcastOn()
    {
        return new Channel('astrologer-notification.' . $this->astro_id);
    }

    public function broadcastAs()
    {
        return 'appointment.notification';
    }
}

