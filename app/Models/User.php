<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\AstrologerDetail;
use App\Models\UserDetails;
use App\Models\UserMeeting;
use App\Models\MeetingEntry;
use App\Models\Payment;
use App\Models\AstroStatus;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public function receivesBroadcastNotificationsOn()
    {
        return 'App.Models.User.' . $this->id;
    }
    protected $fillable = ['name', 'email', 'password', 'avtar', 'type', 'sub_type', 'gender', 'mobile', 'active_status', 'email_otp', 'email_otp_expires_at', 'country_code', 'currency'];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avtar(){
        $image = $this->avtar;
        if(file_exists($image)){
             return url($image);
        }else{
         return 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png';
        }
     }

     public function thumb(){
        $image = $this->avtar;
        if(file_exists($image)){
             $path = str_replace('user_image/', 'user_image/thumb/', $image);
             return url($path);
        }else{
         return 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png';
        }
     }

     public function astrologerDetail()
    {
        return $this->hasOne(AstrologerDetail::class, 'user_id');
    }

    public function userDetails()
    {
        return $this->hasOne(UserDetails::class, 'user_id');
    }

    public function getAppointment()
    {
        return $this->hasOne(Appointment::class, 'user_id','id');
    }



    public function getUserMeetingInfo()
    {
        return $this->hasOne(UserMeeting::class, 'user_id','id');
    }

    public function getMeetings()
    {
         return $this->hasMany(MeetingEntry::class,'user_id','id');
    }

    public function getWalletInfo()
    {
        return $this->hasMany(Payment::class, 'user_id','id');
    }
    public function astroChat(){
        return $this->hasOne(ChatMeeting::class,'astrologer_id','id');
    }

    public function userChat(){
        return $this->hasOne(ChatMeeting::class,'user_id','id');
    }
    public function getPaymentInfo()
    {
        return $this->hasOne(Payment::class, 'user_id','id');
    }


    public function isActive(){
        return $this->hasOne(AstroStatus::class,'astrologer_id','id');
    }
    public function astrologerGallery()
    {
        return $this->hasMany(AstrologerGallary::class, 'astrologer_id', 'id');
    }

    public function GetRating(){
        return $this->hasMany(Rating::class, 'astrologer_id');
    }


    // public function isOnline()
    // {
    //     return $this->last_seen && $this->last_seen->gt(Carbon::now()->subMinutes(5));
    // }
}
