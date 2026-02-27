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
        Schema::table('chat_meetings', function (Blueprint $table) {
            $table->string('astro_encrypt')->nullable();
            $table->string('user_encrypt')->nullable();
            $table->string('is_stop')->nullable();
            $table->string('is_busy')->nullable();
            $table->string('wallet')->nullable();
            $table->string('name')->nullable();
            $table->string('dob')->nullable();
            $table->string('tob')->nullable();
            $table->string('place')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chat_meetings', function (Blueprint $table) {
            //
        });
    }
};
