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
        Schema::create('parasar_kundli_details', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('dob')->nullable();
            $table->string('tob')->nullable();
            $table->string('place')->nullable();
            $table->string('gender')->nullable();
            $table->string('lang')->nullable();
            $table->string('order_id')->nullable();
            $table->string('payble_amount')->nullable();
            $table->string('payment_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parasar_kundli_details');
    }
};
