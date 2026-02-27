<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AstrologerDetail;

class UserEnquiry extends Model
{
    use HasFactory;
    protected $table= 'user_enquiry';
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'gender',
        'education',
        'specialization',
        'expertise',
        'type',
        'status_id',
        'source',
        'lead_source',
        'created_by'
    ];

    public function GetStatus(){
        return $this->belongsTo(EnquiryStatus::class, 'status_id');
    }
    public function getRemark()
    {
        return $this->hasOne(Remark::class, 'enquiry_id', 'id')->latestOfMany();
    }

    // public function GetRemark(){
    //     return $this->belongsTo(related: Remark::class, 'id', 'enquiry_id');
    // }


}
