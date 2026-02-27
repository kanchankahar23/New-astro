<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kundli_Matching_Detail extends Model
{
    use HasFactory;
   protected $table  = 'kundli_matching_details';
    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_login_id');
    }
}
