<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class socialmediacontroller extends Controller
{
    public function store(Request $request)
    {
      

    $data['userid'] = $request->userid;
    $data['type'] = $request->type;
        $data['socialmedialink'] = $request->socialmedialink;
    DB::table('socialmedialinks')
    ->insert($data);
    return response()->json(['Data'=>'Data Udate successfully']);
    } 

    public function update(Request $request,$id)
        {
        $data = array();
        $data['userid']=$request->userid;
        $data['type']=$request->type;
        $data['socialmedialink'] = $request->socialmedialink;

        DB::table('socialmedialinks')
            ->where('id', $id)
            ->update($data);

        return response()->json(['success'=>'Data update successfully']);
        }


    public function  delete($id)
        {
        DB::table('socialmedialinks')
            ->where('id', $id)
            ->delete();

        return response()->json(['success'=>'Data Delete sucessfully']);
        }

    public function view($id)
        {
        $socialmedialink=DB::table('socialmedialinks')
            ->where('userid', $id)
            ->get();

        return response()->json($socialmedialink);
        }
}
