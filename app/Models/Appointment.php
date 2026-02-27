<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointments';
    protected $fillable = [
        'user_id',
        'astrologer_id',
    ];
    public function astroDetails()
    {
        return $this->belongsTo(User::class, 'astrologer_id');
    }

    public function userDetails()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getAstrologer()
    {
        return $this->belongsTo(User::class, 'astrologer_id');
    }
    public function getPayments()
    {
        return $this->hasOne(Payment::class, 'user_id', 'user_id');
    }

    public function getAstrologerDetail()
    {
        return $this->hasOne(AstrologerDetail::class, 'user_id', 'astrologer_id');
    }
    public function getChatlogs()
    {
        return $this->hasOne(ChatLog::class, 'user_id', 'user_id');
    }
}
