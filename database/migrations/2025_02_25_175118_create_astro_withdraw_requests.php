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
        Schema::create('astro_withdraw_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('astrologer_id')->nullable();
            $table->integer('bank_id')->nullable();
            $table->integer('withdraw_amount')->nullable();
            $table->integer('status')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('astro_withdraw_requests');
    }
};
