<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class daycontroller extends Controller
{
    public function add(Request $request )
        {
        
       
        $trip=DB::table('trips')->where('id',$request->trip_id)->first();

        $data=array();
        $data['day']=$request->day;
        $data['description']=$request->description;
        $data['trip_id']=$request->trip_id;
        $data['travelgroup_id']=$trip->travelgroupname;
        
        DB::table('itenaries')
        ->insert($data);


        return response()->json(['success'=>'Data insert Successfully']);
        }
}
