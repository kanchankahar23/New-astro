<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    protected $fillable = [
        'remark',
        'enquiry_id',
        'user_id',
    ];
}
