<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Payment;
use App\Models\User;
class DecreaseAmountJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;
    protected $amountToDecrease;

    public function __construct($userId, $amountToDecrease)
    {
        $this->userId = $userId;
        $this->amountToDecrease = $amountToDecrease;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        try {
            // Fetch the user or relevant entity
            $user = User::find($this->userId);

            if ($user) {
                $payment = new Payment();
                // Decrease the amount
                $payment->user_id = $this->userId;
                $payment->name = $user->name;
                if($user->type == 'user'){
                    $payment->debits = $this->amountToDecrease;
                }else{
                    $payment->credits = $this->amountToDecrease;
                }

                $payment->save();
            } else {
                Log::warning("User not found with ID: {$this->userId}");
            }
        } catch (\Exception $e) {
            Log::error("Error in DecreaseAmountJob: " . $e->getMessage());
            throw $e; // Let the exception propagate so the caller can catch it
        }
    }
}
