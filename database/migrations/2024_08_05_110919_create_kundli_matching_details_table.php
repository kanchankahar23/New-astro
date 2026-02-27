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
        Schema::create('kundli_matching_details', function (Blueprint $table) {
            $table->id();
            $table->string('user_login_id')->nullable();
            $table->string('male_name')->nullable();
            $table->string('male_dob')->nullable();
            $table->string('male_tob')->nullable();
            $table->string('male_place')->nullable();
            $table->string('male_lat')->nullable();
            $table->string('male_lon')->nullable();
            $table->string('female_name')->nullable();
            $table->string('female_dob')->nullable();
            $table->string('female_tob')->nullable();
            $table->string('female_place')->nullable();
            $table->string('female_lat')->nullable();
            $table->string('female_lon')->nullable();
            $table->string('language')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kundli_matching_details');
    }
};
