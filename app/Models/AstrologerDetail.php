<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AstrologerDetail extends Model
{

    protected  $table =  'astrologer_details';

    public function getTag(){
        return $this->belongsTo('App\Models\Tag', 'tag_id');
    }
    public function getUser(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function getEnquiryDetails(){
        return $this->belongsTo('App\Models\UserEnquiry', 'enquiry_id');
    }
    
}
