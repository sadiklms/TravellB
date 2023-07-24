<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class travelgroupcontroller extends Controller
{
    public function update(Request $request ,$id)  
        {
            
    
           
            $data['travel_interest'] = $request->travel_interest;
            $data['only_women_travel_supportive'] = $request->only_women_travel_supportive;
            $data['mostly_organized_location_type'] = $request->mostly_organized_location_type;
            $data['website_link'] = $request->website_link;
    
            DB::table('travelgroups')
            ->where('userid', $id)
            ->update($data);  
            return response()->json(['Data'=>'Data Udate successfully']);             
        }

    public function view()
        {
        //    $travelgroup=DB::table('travelgroups')
        //    ->get();


           $travelgroup=DB::table('travelgroups')
            ->join('users','users.id','travelgroups.userid')
            ->select('travelgroups.*','users.name','users.email','users.address','users.city','users.zipcode','users.photo','users.state','users.id As user_id')
            ->get();

            return response()->json($travelgroup);
        }

        public function singleview($id)
        {
        //    $travelgroup=DB::table('travelgroups')
        //    ->where('id',$id)
        //     ->get();

            $travelgroup=DB::table('travelgroups')
            ->join('users','users.id','travelgroups.userid')
            ->where('travelgroups.userid',$id)
            ->select('travelgroups.*','users.name','users.email','users.address','users.city','users.zipcode','users.photo','users.state','users.id As user_id')
            ->get();

            return response()->json($travelgroup);
        }

        public function delete($id)
        {
            DB::table('travelgroups')
            ->where('id',$id)
            ->delete();

            DB::table('trips')
            ->where('travelgroupname',$id)
            ->delete();

            DB::table('bookings')
            ->where('travelgroupid',$id)
            ->delete();

            DB::table('bookings')
            ->where('travelgroupid',$id)
            ->delete();

            return response()->json(['Data'=>'Data delete successfully']);

        }
}
