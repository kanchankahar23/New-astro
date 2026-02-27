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
        Schema::table('daily_horoscope_data', function (Blueprint $table) {
            $table->longText('english_daily')->nullable();
            $table->longText('malayalam_daily')->nullable();
            $table->longText('tamil_daily')->nullable();
            $table->longText('kannad_daily')->nullable();
            $table->longText('telegu_daily')->nullable();
            $table->longText('spanish_daily')->nullable();
            $table->longText('french_daily')->nullable();

            $table->longText('english_weekly')->nullable();
            $table->longText('malayalam_weekly')->nullable();
            $table->longText('tamil_weekly')->nullable();
            $table->longText('kannad_weekly')->nullable();
            $table->longText('telegu_weekly')->nullable();
            $table->longText('spanish_weekly')->nullable();
            $table->longText('french_weekly')->nullable();

            $table->longText('english_yearly')->nullable();
            $table->longText('malayalam_yearly')->nullable();
            $table->longText('tamil_yearly')->nullable();
            $table->longText('kannad_yearly')->nullable();
            $table->longText('telegu_yearly')->nullable();
            $table->longText('spanish_yearly')->nullable();
            $table->longText('french_yearly')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daily_horoscope_data', function (Blueprint $table) {

        });
    }
};
