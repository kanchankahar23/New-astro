<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiCallLog extends Model
{
use HasFactory;
protected $table = 'ai_call_logs';
protected $fillable = [
'response',
'status',
];
}