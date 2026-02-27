<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WalletUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $walletBalance;

    public function __construct($userId, $walletBalance)
    {
        $this->userId = $userId;
        $this->walletBalance = $walletBalance;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('wallet-updated.' . $this->userId);
    }
}
