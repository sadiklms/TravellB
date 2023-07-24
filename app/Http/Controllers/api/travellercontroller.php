<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\traveller;
use DB;
class travellercontroller extends Controller
{
    public function update(Request $request,$id)
    {
        $data['gender'] = $request->gender;
        $data['age'] = $request->age;
        $data['travel_interest'] = $request->travel_interst;
        $data['location_type_interest'] = $request->location_type_interest;
        $data['type_of_traveler'] = $request->type_of_traveler;
        $data['what_is_the_highest_altitude_your_have_traveled'] = $request->what_is_the_highest_altitude_your_have_traveled;
        $data['whats_the_deepest_drive_you_have_done'] = $request->whats_the_deepest_drive_you_have_done;
        $data['what_was_the_duration_of_your_longest_trip'] = $request->what_was_the_duration_of_your_longest_trip;
        $data['what_your_preferred_time_for_the_trek'] = $request->what_your_preferred_time_for_the_trek;
        $data['what_is_your_fitness_level'] = $request->what_is_your_fitness_level;

        DB::table('travellers')
        ->where('userid', $id)
        ->update($data);

        return response()->json(['Data'=>'Data Udate successfully']);
          
        // $traveller->update($input);
        // return Response::json($traveller, 200);

    }

    public function view()
        {
            $travel=DB::table('travellers')
            ->join('users','users.id','travellers.userid')
            ->select('travellers.*','users.name','users.email','users.address','users.city','users.zipcode','users.photo','users.state','users.id As user_id')
            ->get();

        return response()->json($travel);
        } 

    public function singleview($id)
        { 
            
            $travel=DB::table('travellers')
            ->join('users','users.id','travellers.userid')
            ->where('travellers.userid',$id)
            ->select('travellers.*','users.name','users.email','users.address','users.city','users.zipcode','users.photo','users.state','users.id As user_id')
            ->get();

            return response()->json($travel);
        }


    public function delete($id)
        {
            DB::table('travellers')
            ->where('id',$id)
            ->delete();

            DB::table('travellers')
            ->where('id',$id)
            ->delete();

            DB::table('travellers')
            ->where('id',$id)
            ->delete();

            DB::table('travellers')
            ->where('id',$id)
            ->delete();

            return response()->json(['Data'=>'Data delete successfully']);

        }

}
