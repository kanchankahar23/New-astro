<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class ChatMeeting extends Model
{
   protected $table = 'chat_meetings';
   protected $fillable = [
    'user_id',
    'astrologer_id',
    'charge_per_min',
    // Add other fillable fields as needed
];

    public function userDetails()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function astrologerDetails()
    {
        return $this->hasOne(User::class,'id','astrologer_id');
    }



}
