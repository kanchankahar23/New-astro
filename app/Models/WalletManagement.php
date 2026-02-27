<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletManagement extends Model
{
    use HasFactory;
    protected $table = 'wallet_management';

    public function getUser(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getAstrologer(){
        return $this->belongsTo(User::class, 'astrologer_id');
    }
    public function getAstrologerDetails(){
        return $this->belongsTo(AstrologerDetail::class, 'astrologer_id', 'user_id');
    }
}
