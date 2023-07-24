<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
class frontendcontroller extends Controller
{
    public function index()
        {
        return view('frontend.page.home');
        }

    public function locationtype($id,$trip)
        {
           $trip_detail=DB::table('trips')
           ->whereJsonContains('locationtype', $id)
          ->get();


          $tripcount=DB::table('trips')
          ->whereJsonContains('locationtype', $id)
         ->count();

    

            return view('frontend.page.trip')
            ->with('id',$id)
            ->with('trip',$trip)
            ->with('tripcount',$tripcount)
            ->with('trip_detail', $trip_detail);
          
        }


        public function type($id,$trip)
        {
        

            $trip_detail=DB::table('trips')
           ->whereJsonContains('type', $id)
          ->get();

         


          $tripcount=DB::table('trips')
          ->whereJsonContains('type', $id)
         ->count();

       

            return view('frontend.page.trip')
            ->with('id',$id)
            ->with('trip',$trip)
            ->with('tripcount',$tripcount)
            ->with('trip_detail', $trip_detail);
          
        }


    
        public function specialfeature($id,$trip)
        {
        //    $specialfeature=DB::table('trips')
        //     ->get();

        $trip_detail=DB::table('trips')
        ->whereJsonContains('specialfeature', $id)
       ->get();


       $tripcount=DB::table('trips')
       ->whereJsonContains('specialfeature', $id)
      ->count();


            return view('frontend.page.trip')
            ->with('id',$id)
            ->with('trip',$trip)
            ->with('tripcount',$tripcount)
            ->with('trip_detail', $trip_detail);
          
        }


        public function areatype($id,$trip)
        {
           $trip_detail=DB::table('trips')
           ->where('areatype',$id)
           ->get();

         

           $tripcount=DB::table('trips')
           ->where('areatype',$id)
           ->count();

           

            return view('frontend.page.trip')
            ->with('id',$id)
            ->with('trip',$trip)
            ->with('tripcount',$tripcount)
            ->with('trip_detail', $trip_detail);
          
        }

    public function trip($id)
        {
            $trip=DB::table('trips')
            ->get();

        return view('frontend.page.trip')
            ->with('id',$id)
            ->with('trip', $trip);
        }

    public function trip_details($id)
        {
        $trip=DB::table('trips')
            ->where('id', $id)
            ->first();

        return view('frontend.page.trip-details')
        
        ->with('trip', $trip);
        }

    public function news_letter(Request $request)
        {
            $data=array();
            $data['email']=$request->email;
            DB::table('newsletter')
            ->insert($data);
             
            Alert::info('success', 'Add successfully');
            return back();
        }

    public function about()
        {
            $aboutuses=DB::table('aboutuses')
            ->first();

            return view('frontend.page.about')
            ->with('aboutuses',$aboutuses);
        }

    public function privacy_policy()
        {
            return view('frontend.page.privacy-policy');
        }

    public function  return_policy()
        {
           return view('frontend.page.return-policy');

        }

    public function terms_condition()
        {
            return view('frontend.page.terms-condition');
        }
}
