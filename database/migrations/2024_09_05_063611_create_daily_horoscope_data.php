<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daily_horoscope_data', function (Blueprint $table) {
            $table->id();
            $table->string('zodiac_type')->nullable();
            $table->longText('daily_zodiac_data')->nullable();
            $table->longText('weekly_zodiac_data')->nullable();
            $table->longText('yearly_zodiac_data')->nullable();
            $table->string('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_horoscope_data');
    }
};
