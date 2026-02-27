<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class AppointmentRequestNotification extends Notification
{
    use Queueable;

    protected $appointment;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast']; 
    }

    public function toArray($notifiable)
    {
        return [
            'user_id' => $this->appointment->user_id,
            'user_name' => $this->appointment->name,
            'message' => 'New appointment request from ' . $this->appointment->name,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'user_id' => $this->appointment->user_id,
            'user_name' => $this->appointment->name,
            'message' => 'New appointment request from ' . $this->appointment->name,
        ]);
    }
}
