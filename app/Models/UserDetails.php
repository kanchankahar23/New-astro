<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $table = 'user_details';
    protected $fillable = ['user_id', 'dob', 'pob', 'tob', 'languages', 'rashi', 'about','wallet','created_at','updated_at'];
}
