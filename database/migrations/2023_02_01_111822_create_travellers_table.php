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
        Schema::create('travellers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('photo');
            $table->string('gender');
            $table->string('age');
            $table->string('travel_interest');
            $table->string('location_type_interest');
            $table->string('type_of_traveler');
            $table->string('what_is_the_highest_altitude_your_have_traveled');
            $table->string('whats_the_deepest_drive_you_have_done');
            $table->string('what_was_the_duration_of_your_longest_trip');
            $table->string('what_your_preferred_time_for_the_trek');
            $table->string('what_is_your_fitness_level');
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
        Schema::dropIfExists('travellers');
    }
};
