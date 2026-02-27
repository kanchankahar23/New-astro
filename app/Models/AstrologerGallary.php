<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AstrologerGallary extends Model
{
   protected $table = "astrologers_gallary";
   protected $fillable = ['astrologer_id'];

   public function getUser()
   {
       return $this->belongsTo(User::class, 'user_id','id');
   }
}
