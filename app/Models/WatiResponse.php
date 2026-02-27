<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatiResponse extends Model
{
    protected $table = 'wati_response';
    protected $fillable = [
        'number',
        'status',
        'message',
        'response',
        'source',
        'sent_by',
    ];
}
