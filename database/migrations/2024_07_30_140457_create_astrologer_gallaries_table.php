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
        Schema::create('astrologers_gallary', function (Blueprint $table) {
            $table->id();
            $table->integer('astrologer_id')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('about_image')->nullable();
            $table->string('gallary_image')->nullable();
            $table->string('sequence')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('astrologers_gallary');
    }
};
