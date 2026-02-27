<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsappResponse extends Model
{
    use HasFactory;
    protected $fillable = ['number', 'status_code', 'response_body'];

    protected $casts = [
        'response_body' => 'array',
    ];

    protected $table = 'whatsapp_response';

    public function contact()
    {
        return $this->hasOne(Contact::class, 'phone', 'number'); // assuming both use same number field
    }
}
