<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class logopartner extends Controller
{
    public function index()
    {   
        $logo=DB::table('logopartners')
        ->get();
        return view('backend.page.logo-partner.index')
        ->with('logo',$logo);
    }

    public function create()
        {
            return view('backend.page.logo-partner.create');
        }

    public function store(Request $request)
        {
            $data=array();
            if($image=$request->file('picture'))
            {
                $destinationPath ='backend/image/logo';
                $randomNumber = random_int(100000, 9999999999999999);
                $name=$image->getClientOriginalName();
                $picture=$randomNumber.$name;
                $image->move($destinationPath, $picture);
                $data['image'] = "$picture";
    
            }
           
           

            DB::table('logopartners')
            ->insert($data);

           return redirect('admin/logo-partner');
        }

    public function edit($id)
        {
            $edit=DB::table('logopartners')
            ->where('id',$id)
            ->first();

            return view('backend.page.logo-partner.edit')
            ->with('edit',$edit);
        }

    public function update(Request $request ,$id)
        {
        
            $data=array();
         
            if($image=$request->file('picture'))
            {
                $destinationPath ='backend/image/logo';
                $randomNumber = random_int(100000, 9999999999999999);
                $name=$image->getClientOriginalName();
                $picture=$randomNumber.$name;
                $image->move($destinationPath, $picture);
                $data['image'] = "$picture";
    
            }
           
            DB::table('logopartners')
            ->where('id',$id)
            ->update($data);

            return redirect('admin/logo-partner');
        }

    public function delete($id)
        {
            DB::table('logopartners')
            ->where('id',$id)
            ->delete();

            return back();
        }

}
