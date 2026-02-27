<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Appointment;

class PaymentHappiest extends Model
{
  protected $table = 'payments_from_happiest';
  protected $guarded = ['id'];

}
