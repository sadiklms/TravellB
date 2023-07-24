<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use carbon\carbon;

class reviewcontroller extends Controller
{
    public function store(Request $request)
        {
            $travelgoup=DB::table('trips')
            ->where('id',$request->tripid)
            ->first();


            $data=array();
            $data['userid']=auth()->user()->id;
            $data['tripid']=$request->tripid;
            $data['rating']=$request->rating;
            $data['title']=$request->title;
            $data['reviews']=$request->reviews;
            $data['travelgroupid']=$travelgoup->travelgroupname;
            $data['date']=carbon::now();
           
            DB::table('reviewtravels')
            ->insert($data);

            return back();
        }
}
