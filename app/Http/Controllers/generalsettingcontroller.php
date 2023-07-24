<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class generalsettingcontroller extends Controller
{
    public function index()
    {
        $genralsetting=DB::table('generalsettings')
        ->first();

         return view('backend.page.general-setting.index')
         ->with('genralsetting',$genralsetting);
    }

    public function store(Request $request)
    {
        if($image=$request->file('logo'))
        {
            $destinationPath ='backend/image/general-setting';
            $randomNumber = random_int(100000, 9999999999999999);
            $name=$image->getClientOriginalName();
            $picture=$randomNumber.$name;
            $image->move($destinationPath, $picture);
            $data['logo'] = "$picture";

        }

        if($image=$request->file('favicon'))
        {
            $destinationPath ='backend/image/general-setting';
            $randomNumber = random_int(100000, 9999999999999999);
            $name=$image->getClientOriginalName();
            $picture=$randomNumber.$name;
            $image->move($destinationPath, $picture);
            $data['favicon'] = "$picture";

        }

          $data['website_title']=$request->website_title;
          $data['phone']=$request->phone;
          $data['email']=$request->email;
          $data['address']=$request->address;
          $data['help_phone']=$request->help_phone;
          $data['help_email']=$request->help_email;
          $data['help_address']=$request->help_address;

          DB::table('generalsettings')
          ->update($data);

          return back();
    }
}
