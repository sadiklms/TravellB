<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Lexer\TokenEmulator\ReadonlyFunctionTokenEmulator;
use DB;

class supportticketcontroller extends Controller
{
    public function store(Request $request)
        {

        
        $data = array();

       if($image=$request->file('attachment'))
        {
            $destinationpath = 'backend/image/supportticket';
            $randomNumber = random_int(100000, 999999999999999);
            $name = $image->getClientOriginalName();
            $picture = $randomNumber . $name;
            $image->move($destinationpath, $picture);
            $data['attachment'] = $picture;

        }
        $data['title'] = $request->title;
        $data['priority'] = $request->priority;
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['userid'] = $request->userid;


        DB::table('supporttickets')
            ->insert($data);

        return response()->json(['success' => 'Data insert successfully']);
        }


    public function update(Request $request,$id)
        {
        $data = array();
        if ($image = $request->file('attachment')) {
            $destinationpath = 'backend\image\supportticket';
            $randomNumber = random_int(100000, 999999999999999);
            $picture = $randomNumber . $destinationpath;
            $image->move($destinationpath, $picture);
            $data['attachment'] = $picture;
        }
            $data['title'] = $request->title;
            $data['priority'] = $request->priority;
            $data['description'] = $request->description;
            $data['status'] = $request->status;
            $data['userid'] = $request->userid;

            DB::table('supporttickets')
                ->where('id', $id)
                ->update($data);

            return response()->json(['success' => 'Data update Successfully']);

        

        }

    public function delete($id)
        {
             $count=DB::table('supporttickets')
            ->where('id', $id)
            ->delete();

            if($count==1)
            {
            return response()->json(['sucess'=>'Data delete sucessfully']);
            }
        }

    public function view($id)
        {
        $supportticket=DB::table('supporttickets')
        ->join('users','users.id','supporttickets.userid')
        ->where('userid', $id)
        ->select('supporttickets.*','users.name')
        ->get();

        return response()->json($supportticket);
        }
}
