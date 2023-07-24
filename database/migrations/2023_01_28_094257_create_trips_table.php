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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('aratype');
            $table->string('locationtype');
            $table->string('specialfeature');
            $table->string('pricing');
            $table->string('pricingdescription');
            $table->string('offer');
            $table->string('discounts');
            $table->string('discounttype');
            $table->string('region');
            $table->string('location');
            $table->string('duration');
            $table->string('descriptionwhythis');
            $table->string('descriptionshort');
            $table->string('descriptionlong');
            $table->string('airport');
            $table->string('railway');
            $table->string('meals');
            $table->string('stay');
            $table->string('whocanparticipate');
            $table->string('how_to_reach_pickup');
            $table->string('how_to_reach_dropoff');
            $table->string('how_toreach_notes');
            $table->string('cost_terms_inclusion');
            $table->string('cost_terms_exclusion');
            $table->string('cost_terms_notes');
            $table->string('cost_terms_cancellation_policy');
            $table->string('documents_needed');
            $table->string('terms_condition');
            $table->string('gear_cloths');
            $table->string('fitness');
            $table->string('maps');
            $table->string('image_gallery');
            $table->string('video_gallery');
            $table->string('start_date');
            $table->string('booking_end_date');
            $table->string('number_of_booking_available');
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
        Schema::dropIfExists('trips');
    }
};
