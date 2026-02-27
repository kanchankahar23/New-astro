<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('astrologer_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('enquiry_id')->nullable(); // Assuming it's a numeric identifier
            $table->json('expertise')->nullable();
            $table->json('languages')->nullable();
            $table->decimal('total_experience', 5, 2)->nullable(); // Use decimal instead of float
            $table->decimal('rating', 5, 2)->nullable(); // Use decimal instead of float
            $table->longText('about')->nullable();
            $table->string('conversation_type')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('astrolger_details');
    }
};
