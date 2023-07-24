<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use carbon\carbon;
class tripcontroller extends Controller
{
    public function view() 
        {
        $trip=DB::table('trips')
        ->join('areatypes','areatypes.id','=','trips.areatype')
        ->join('users','users.id','=','trips.travelgroupname')
        ->select('trips.*','areatypes.id As areatypeid','areatypes.title As Areaname','users.name AS Travelgroupname','users.photo AS Travelphoto')
        ->get();


        // $booking = DB::table('bookings')
        // ->join('trips','trips.id','=','bookings.tripid')
        // ->select('bookings.id AS bookingid','trips.id As tripid','trips.imagegallery As tripimage')
        // ->get();

        return response()->json($trip);
        }

    public function singleview($id)
        {
            $trip=DB::table('trips')
            ->join('areatypes','areatypes.id','=','trips.areatype')
            ->join('users','users.id','=','trips.travelgroupname')
            ->select('trips.*','areatypes.id As areatypeid','areatypes.title As Areaname','users.name AS Travelgroupname','users.photo AS Travelphoto')
            ->where('trips.id',$id)
            ->get();

            return response()->json($trip);
        }


    public function add(Request $request)
        {
            $this->validate($request,[
                'meals'=>'required',
                'stay'=>'required',
                'whocanparticipate'=>'required',
                'how_to_reach_pickup'=>'required',
                'how_to_reach_dropoff'=>'required',
                'how_toreach_notes'=>'required',
                'cost_terms_inclusion'=>'required',
                'cost_terms_exclusion'=>'required',
                'cost_terms_notes'=>'required',
                'cost_terms_cancellation_policy'=>'required',
                'documents_needed'=>'required',
                'terms_condition'=>'required',
                'gear_cloths'=>'required',
                'fitness'=>'required'
    
             ]);
             $data=array();
    
    
            if ($image=$request->file('featureimage')) {
                
                    $destinationPath ='backend/image/trip';
                    $randomNumber = random_int(100000, 9999999999999999);
                    // $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $name=$image->getClientOriginalName();
                    $picture=$randomNumber.$name;
                    $image->move($destinationPath, $picture);
                    $data['featureimage'] = "$picture";
            }
    
    
            if ($request->file('maps')) {
                foreach ($request->file('maps') as $image) {
                    $destinationPath = 'backend/image/trip';
                    $randomNumber = random_int(100000, 9999999999999999);
                    // $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $name=$image->getClientOriginalName();
                    $picture=$randomNumber.$name;
                    $image->move($destinationPath, $picture);
                    $maps[] = $picture;
                }
            }
    
            if ($request->file('imagegallery')) {
                foreach ($request->file('imagegallery') as $image) {
                    $destinationPath = 'backend/image/trip';
                    $randomNumber = random_int(100000, 9999999999999999);
                    $name=$image->getClientOriginalName();
                    $picture=$randomNumber.$name;
                    $image->move($destinationPath, $picture);
                    $imagegallery[] = $picture;
                }
            }
    
            if ($request->file('uploadcocument')) {
                foreach ($request->file('uploadcocument') as $image) {
                    $destinationPath = 'backend/image/trip';
                    $randomNumber = random_int(100000, 9999999999999999);
                    $name=$image->getClientOriginalName();
                    $picture=$randomNumber.$name;
                    $image->move($destinationPath, $picture);
                    $uploadcocument[] = $picture;
                }
            }
    
             if ($request->file('galleryviedo')) {
                foreach ($request->file('galleryviedo') as $image) {
                    $destinationPath = 'backend/image/trip';
                    $randomNumber = random_int(100000, 9999999999999999);
                    $name=$image->getClientOriginalName();
                    $picture=$randomNumber.$name;
                    $image->move($destinationPath, $picture);
                    $galleryviedo[] = $picture;
                }
            }
    
                   $data['maps'] = json_encode($maps);
                   $data['imagegallery'] = json_encode($imagegallery);
                   $data['uploadcocument'] = json_encode($uploadcocument);
                   $data['galleryviedo'] = json_encode($galleryviedo);
                   $data['type'] = json_encode($request->type);
                   $data['locationtype'] = json_encode($request->locationtype);
                   $data['specialfeature'] = json_encode($request->specialfeature);
                // trip::create($input);

                $data['pricing']=$request->pricing;
                $data['name']=$request->name;
                $data['travelgroupname']=$request->travelgroupname;
                $data['areatype']=$request->areatype;
                $data['pricingdescription']=$request->pricingdescription;
                $data['offer']=$request->offer;
                $data['discount']=$request->discount;
                $data['discounttype']=$request->discounttype;
                $data['region']=$request->region;
                $data['location']=$request->location;
                $data['duration']=$request->duration;
                $data['descriptionshort']=$request->descriptionshort;
                $data['airport']=$request->airport;
                $data['railway']=$request->railway;
                $data['meals']=$request->meals;
                $data['stay']=$request->stay;
                $data['whocanparticipate']=$request->whocanparticipate;
                $data['how_to_reach_pickup']=$request->how_to_reach_pickup;
                $data['how_to_reach_dropoff']=$request->how_to_reach_dropoff;
                $data['descriptionlong']=$request->descriptionlong;
                $data['descriptionwhythis']=$request->descriptionwhythis;
                $data['how_toreach_notes']=$request->how_toreach_notes;
                $data['cost_terms_inclusion']=$request->cost_terms_inclusion;
                $data['cost_terms_exclusion']=$request->cost_terms_exclusion;
                $data['booking_start_date']=$request->booking_start_date;
                $data['cost_terms_notes']=$request->cost_terms_notes;
                $data['bestseason']=$request->bestseason;
                $data['cost_terms_cancellation_policy']=$request->cost_terms_cancellation_policy;
                $data['documents_needed']=$request->documents_needed;
                $data['terms_condition']=$request->terms_condition;
                $data['fitness']=$request->fitness;
                $data['start_date']=$request->start_date;
                $data['booking_end_date']=$request->booking_end_date;
                $data['number_of_booking_available']=$request->number_of_booking_available;
                $data['gear_cloths']=$request->gear_cloths;
                $data['created_at']=carbon::now();
                $data['updated_at']=carbon::now();

                DB::table('trips')
                ->insert($data);
    
                $tripsid=DB::table('trips')->orderBy('id', 'DESC')->first();
    
                $question=$request->question;
                $answer=$request->answer;
                foreach($question as $index1=>$questions)
                { 
                   $data1['question']=$question[$index1];
                   $data1['answer']=$answer[$index1];
                   $data1['trip_id']=$tripsid->id;
                   DB::table('faqs')
                   ->insert($data1);
         
                }

            return response()->json(['success'=>'Data insert Successfully']);
        }


        public function triplist($id)
            {
                $trip=DB::table('trips')
                ->where('travelgroupname',$id)
                ->get();

                return response()->json($trip);
            }

   
}
