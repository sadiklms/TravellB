<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class companyinfocontroller extends Controller
{
    public function store(Request $request)
    {
        $data = array();
        if ($image = $request->file('document')) {
            $destinationPath = 'backend/image/booking';
            $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $picture);
            $data['document'] = "$picture";
        }
        $data['bookingid'] = $request->bookingid;
        $data['name'] = $request->name;
        $data['age'] = $request->age;
        $data['gender'] = $request->gender;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;

        DB::table('companyinfos')
            ->insert($data);

      return response()->json(['Data'=>'Data insert successfully']);
        

    }

    public function view($id)
    {
       $companyinfo=DB::table('companyinfos')
        ->where('bookingid',$id)
        ->get();

      return response()->json($companyinfo);
        

    }
}
