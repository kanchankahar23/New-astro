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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('location', 255)->nullable();
            $table->date('dob')->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('status', 10)->nullable();
            $table->string('day_time', 20)->nullable();
            $table->string('way_to_reach', 20)->nullable();
            $table->string('address', 255)->nullable();
            $table->text('message')->nullable();
            $table->date('preferred_date')->nullable();
            $table->time('preferred_time')->nullable();
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
        Schema::dropIfExists('enquiries');
    }
};
