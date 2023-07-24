<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class reviewtravelcontroller extends Controller
{
    public function store(Request $request)
        {
        $data = array();

        $travelgoup=DB::table('trips')
            ->where('id',$request->tripid)
            ->first();

        $data['rating'] = $request->rating;
        $data['reviews'] = $request->reviews;
        $data['userid'] = $request->userid;

        $data['tripid']=$request->tripid;
        $data['rating']=$request->rating;
        $data['title']=$request->title;
       
        $data['travelgroupid']=$travelgoup->travelgroupname;
        $data['date']=carbon::now();
        DB::table('reviewtravels')
            ->insert($data);

        return response()->json(['success'=>'Data insert successfully']);

        }

    public function view($id)
    {
        // $travel = DB::table('reviewtravels')
        //     ->where('travelgroupid', $id)
        //     ->get();

        // $travelcount = count($travel);
        // foreach ($travel as $key => $travels) {
        //     $userinfo = DB::table('travellers')
        //         ->where('id', $travels->userid)
        //         ->get(['id','name','photo']);
        // }
        // if ($travelcount == 0) {

        //     return response()->json(['success' => 'Data not found']);

        // } else {
        //     $response = [
        //         'travel' => $travel,
        //         'userdetails' => $userinfo,
        //     ];

        //     return response($response, 201);


        // }

        $travel=DB::table('reviewtravels')
        ->join('users', 'users.id', '=', 'reviewtravels.userid')
        ->where('reviewtravels.travelgroupid',$id)
        ->select('reviewtravels.*','users.name','users.photo','users.id AS user_id')
        ->get();

    
        
        return response()->json($travel);

    }
}
