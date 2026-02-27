<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Appointment;

class Payment extends Model
{
    protected $table = 'payments';
    protected $guarded = ['id'];

    public function GetTransection() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getPackage() {
        return $this->belongsTo('App\Models\Package', 'pkg_id');
    }

    public function getUser() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
     public function getAstrologer() {
        return $this->belongsTo('App\Models\User', 'astrologer_id');
    }

    public function getAppointment() {
        return $this->belongsTo('App\Models\Appointment', 'user_id', 'user_id');
    }

}
