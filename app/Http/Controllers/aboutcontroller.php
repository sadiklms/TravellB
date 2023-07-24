<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class aboutcontroller extends Controller
{
    public function index()
        {
            $about=DB::table('aboutuses')
            ->first();

            return view('backend.page.about.index')
            ->With('about',$about);
        }

    public function store(Request $request)
        {
           
            $data=array();
            if ($image=$request->file('picture')){
                
                $destinationPath ='backend/image/about';
                $randomNumber = random_int(100000, 9999999999999999);
                $name=$image->getClientOriginalName();
                $picture=$randomNumber.$name;
                $image->move($destinationPath, $picture);
                $data['image'] = "$picture";
            }


            if ($image=$request->file('bannerpicture')){
                
                $destinationPath ='backend/image/about';
                $randomNumber = random_int(100000, 9999999999999999);
                $name=$image->getClientOriginalName();
                $picture=$randomNumber.$name;
                $image->move($destinationPath, $picture);
                $data['bannerimage'] = "$picture";
            }

            $data['title']=$request->title;

            DB::table('aboutuses')
            ->update($data);

            return back();
             
        }
}
