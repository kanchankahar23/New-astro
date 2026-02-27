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
        Schema::create('kundli_details', function (Blueprint $table) {
            $table->id();
            $table->string('user_login_id')->nullable();
            $table->string('name')->nullable();
            $table->string('dob')->nullable();
            $table->string('tob')->nullable();
            $table->string('gender')->nullable();
            $table->string('place')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('language')->nullable();
            $table->longText('panchang_details')->nullable();
            $table->longText('planetary_positions_data')->nullable();
            $table->longText('personal_characteristics_data')->nullable();
            $table->longText('ascendant_report_data')->nullable();
            $table->longText('mahadasha_data')->nullable();
            $table->longText('antardasha_data')->nullable();
            $table->longText('pratyantardasha_data')->nullable();
            $table->longText('mahadasha_prediction_data')->nullable();
            $table->longText('sadesati_data')->nullable();
            $table->longText('sadesati_table_data')->nullable();
            $table->longText('friendship_table_data')->nullable();
            $table->longText('kp_house_data')->nullable();
            $table->longText('kp_houses_planet_data')->nullable();
            $table->longText('gem_suggestion_data')->nullable();
            $table->longText('rudraksh_suggestion_data')->nullable();
            $table->longText('mangal_dosha_data')->nullable();
            $table->longText('kaalsharp_dosha_data')->nullable();
            $table->longText('pitra_dosha_data')->nullable();
            $table->longText('papasamaya_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kundli_details');
    }
};
