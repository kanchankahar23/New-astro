<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KundliDetailsModel extends Model
{
    protected $table = 'kundli_details';

    public function getUser(){
      return  $this->belongsTo(User::class, 'user_login_id');
    }
}
