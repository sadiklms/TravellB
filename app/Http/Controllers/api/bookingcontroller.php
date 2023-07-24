<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class bookingcontroller extends Controller
{
    public function store(Request $request)
    {

       
        $data = array();

        $data['bookingid'] = $request->bookingid;
        $data['userid'] = $request->userid;
        $data['tripid'] = $request->tripid;
        $data['travelgroupid'] = $request->travelgroupid;
        $data['bookingfordate'] = $request->bookingfordate;
        $data['bookingdate'] = $request->bookingdate;

        DB::table('bookings')
            ->insert($data);

      return response()->json(['Data'=>'Data insert successfully']);
        

    }

    public function view()
    {
      $booking = DB::table('bookings')
      ->join('trips','trips.id','=','bookings.tripid')
    //   ->join('users','users.id','=','bookings.userid')
      ->join('users','users.id','=','bookings.travelgroupid')
      ->select('bookings.id AS bookingid','trips.id As tripid','trips.featureimage As tripimage','trips.name As tripname','users.name As username','users.id As user_id','users.photo As usersphoto')
      ->get();

     return response($booking, 201);
     }

     public function travelgroup($id)
      {
              $booking=DB::table('bookings')
              ->where('travelgroupid',$id)
              ->get();

              return response($booking,200);
      }

      public function travel($id)
      {
              $booking=DB::table('bookings')
              ->where('userid',$id)
              ->get();

              return response($booking,200);
      }
  }

