<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use Auth;
use \Crypt;

class bookingcontroller extends Controller
{
    public function booking(Request $request)
        {
        
           
        $travelgroup=DB::table('trips')->Where('id',$request->tripid)->first();
        $data = array();
        $random = random_int('10000000', 9999999999999);
        $data['tripid'] = $request->tripid;
        $data['travelgroupid'] =$travelgroup->travelgroupname;
        $data['bookingfordate'] = $request->bookingforcedate;
        $data['bookingdate'] = carbon::Now();
        $data['bookingid'] = $random;
        $data['userid']=Auth::user()->id;

        DB::table('bookings')
            ->insert($data);
        Alert::info('success', 'Booking Successfully');
        return back();
        
        }  

    public function index()
        {
             $usertype=Auth::user()->type;
             if($usertype==1)
             {
            $booking=DB::table('bookings')
            ->join('users','users.id','=','bookings.userid')
            ->join('trips','trips.id','=','bookings.tripid')
            ->select('bookings.*','users.name As username','trips.name As tripname')
            ->where('travelgroupid',Auth::user()->id)
            ->get();
             }
             else
             {

             $booking=DB::table('bookings')
            ->join('users','users.id','=','bookings.userid')
            ->join('trips','trips.id','=','bookings.tripid')
            ->select('bookings.*','users.name As username','trips.name As tripname')
            ->where('userid',Auth::user()->id)
            ->get();
             }

         

            return view('frontend.page.view-booking')
            ->with('booking',$booking);
        }

    public function details($id)
        {
            $decrypted = Crypt::decrypt($id); 
            $booking=DB::table('bookings')
            ->join('users','users.id','=','bookings.userid')
            ->join('trips','trips.id','=','bookings.tripid')
            ->where('bookings.id',$decrypted)
            ->select('bookings.*','users.name As username','trips.name As tripname','users.email','trips.pricing','trips.location','trips.duration','trips.specialfeature','trips.region')
            ->first();

           
            return view('frontend.page.booking-details')
            ->with('booking',$booking);
        }

    public function booking_delete($id)
        {
          
            DB::table('bookings')
            ->where('id',$id)
            ->delete();
            return back();
        }

    
}
