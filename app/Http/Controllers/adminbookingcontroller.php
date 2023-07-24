<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class adminbookingcontroller extends Controller
{
    public function index()
        {
            $booking=DB::table('bookings')
            ->join('users','users.id','=','bookings.id')
            ->join('trips','trips.id','=','bookings.tripid')
            ->select('bookings.*','users.name AS username','trips.name As tripname')
            ->get();

             return view('backend.page.booking.index')
             ->with('booking',$booking);
        }

        public function booking_view($id)
        {
            $booking=DB::table('bookings')
            ->join('users','users.id','=','bookings.userid')
            ->join('trips','trips.id','=','bookings.tripid')
            ->where('bookings.id',$id)
            ->select('bookings.*','users.name As username','trips.name As tripname','users.email','trips.pricing','trips.location','trips.duration','trips.specialfeature','trips.region')
            ->first();

            return view('backend.page.booking.view')
            ->with('booking',$booking);

        }
}
