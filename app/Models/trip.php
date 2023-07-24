<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trip extends Model
{ 
    use HasFactory; 

    protected $fillable = [
        'type','areatype','locationtype','specialfeature','pricing','pricingdescription','offer','discount','discounttype','region','location','duration','descriptionwhythis','descriptionshort','descriptionlong','airport','railway','bestseason','meals','stay','whocanparticipate','how_to_reach_pickup','how_to_reach_dropoff','how_toreach_notes','cost_terms_inclusion','cost_terms_exclusion','cost_terms_exclusion','cost_terms_notes','cost_terms_cancellation_policy','documents_needed','terms_condition','gear_cloths','fitness','maps','imagegallery','booking_start_date','uploadcocument','start_date','booking_end_date','number_of_booking_available','galleryviedo','travelgroupname','featureimage','name'
    ];

    // public function setCategoryAttribute($value)
    // {
    //     $this->attributes['type'] = json_encode($value);
    // }
}
