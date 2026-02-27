<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AstroWithdrawRequest extends Model
{
    use HasFactory;
    protected $table = 'astro_withdraw_requests';

    public function getAstrologer(){
        return $this->belongsTo(User::class, 'astrologer_id');
    }
    public function getBankDetails(){
        return $this->belongsTo(AstroBankDetail::class, 'bank_id');
    }

}
