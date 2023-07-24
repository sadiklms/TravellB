<?php

namespace App\Http\Controllers;
use App\Models\information;
use Illuminate\Http\Request;

class informationcontroller extends Controller
{
    public function create()
    {
     $information = information::first();
      return view('backend.page.information.create',compact('information'));
    }

    public function update(Request $request ,information $information)
    {
        $input = $request->all();
       
        
        $information->update($input);

    return redirect('admin/information/create');
    }
}
