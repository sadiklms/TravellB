<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class reviewstripcontroller extends Controller
{
    public function store(Request $request)
        {
        $data = array();
        $data['travelgroupid'] = $request->travelgroupid;
        $data['rating'] = $request->rating;
        $data['reviews'] = $request->reviews;
        $data['userid'] = $request->userid;

        DB::table('reveiwstrips')
            ->insert($data);


        return response()->json(['success' => 'Data insert successfully']);
        }

   

    //     public function view($id)
    //   {
    //     $travel = DB::table('reveiwstrips')
    //         ->where('tripid', $id)
    //         ->get();

    //     $travelcount = count($travel);
    //     foreach ($travel as $key => $travels) {
    //         $userinfo = DB::table('travellers')
    //             ->where('id', $travels->userid)
    //             ->get(['id','name','photo']);
    //     }
    //     if ($travelcount == 0) {

    //         return response()->json(['success' => 'Data not found']);

    //     } else {
    //         $response = [
    //             'travel' => $travel,
    //             'userdetails' => $userinfo,
    //         ];

    //         return response($response, 201);


    //     }


        public function view($id)
        {
            $travel=DB::table('reveiwstrips')
            ->join('users', 'users.id', '=', 'reveiwstrips.userid')
            ->where('reveiwstrips.travelgroupid',$id)
            ->select('reveiwstrips.*','users.name','users.photo','users.id AS user_id')
            ->get();

        return response()->json($travel);

        }
    
}
