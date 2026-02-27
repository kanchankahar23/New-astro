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
        // Schema::create('astrologer_details', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('user_id')->nullable();
        //     $table->json('expertise')->nullable();
        //     $table->json('languages')->nullable();
        //     $table->float('total_experience', 5, 2)->nullable();
        //     $table->float('rating', 5, 2)->nullable();
        //     $table->longText('about')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('astrologer_details');
    }
};
