<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class proofidentitiecontroller extends Controller
{
     public function store(Request $request)
        {
            if ($image = $request->file('photo')) {
                $destinationPath = 'backend/image/locationtype';
                $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $picture);
                $data['photo'] = "$picture";
            }

        $data['userid'] = $request->userid;
        $data['type'] = $request->type;

        DB::table('proofidentities')
        ->insert($data);
         
        return response()->json(['Data'=>'Data Insert successfully']);
        } 


        public function update(Request $request,$id)
        {
            if ($image = $request->file('photo')) {
                $destinationPath = 'backend/image/locationtype';
                $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $picture);
                $data['photo'] = "$picture";
            }

            $data['userid'] = $request->userid;
            $data['type'] = $request->type;

            DB::table('proofidentities')
            ->where('id',$id)
            ->update($data);
            return response()->json(['Data'=>'Data Udate successfully']);
        }

    public function delete($id)
        {
           DB::table('proofidentities')
            ->where('id', $id)
            ->delete();
          

        return response()->json(['Data'=>'Data delete successfully']);
        }

    public function view($id)
        {
        $proofidentify=DB::table('proofidentities')
            ->where('userid', $id)
            ->get();

        return response()->json($proofidentify);
        }
}
