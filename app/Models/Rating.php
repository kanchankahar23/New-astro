<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'astrologer_id',
        'type',
        'feedback',
        'rating',
    ];
    public function  getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
