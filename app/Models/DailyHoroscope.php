<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyHoroscope extends Model
{
    use HasFactory;
    protected $table = 'daily_horoscope_data';
    protected $fillable = [
        'Aries_daily',
        'Taurus_daily',
        'Gemini_daily',
        'Cancer_daily',
        'Leo_daily',
        'Virgo_daily',
        'Libra_daily',
        'Scorpio_daily',
        'Sagittarius_daily',
        'Capricorn_daily',
        'Aquarius_daily',
        'Pisces_daily'
    ];
}
