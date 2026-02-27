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
        Schema::create('chatbot_responses', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('service_selected')->nullable();
            $table->longText('conversation')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chatbot_responses');
    }
};
