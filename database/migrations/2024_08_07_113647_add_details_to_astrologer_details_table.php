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
        Schema::table('astrologer_details', function (Blueprint $table) {
            $table->integer('charge_per_min')->nullable();
            $table->integer('rating_count')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('astrologer_details', function (Blueprint $table) {
            //
        });
    }
};
