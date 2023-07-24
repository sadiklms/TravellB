<?php

namespace App\Http\Controllers;

use DB;
use App\Models\areatype;

use Illuminate\Http\Request;

class areatypecontroller extends Controller
{
    public function index()
    {
        $areatype = areatype::orderByDesc('id')->get();
        return view('backend.page.areatype.index')
            ->with('areatype',$areatype);

    }

    public function create()
    {
        return view('backend.page.areatype.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if ($image = $request->file('picture')) {
            $destinationPath = 'backend/image/areatype';
            $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $picture);
            $input['picture'] = "$picture";
        }
        areatype::create($input);

    return redirect('admin/areatype');
    }


    public function edit(areatype $areatype)
    {
      return view('backend.page.areatype.edit',compact('areatype'));
    }

    public function update(Request $request ,areatype $areatype)
    {
        $input = $request->all();
        if ($image = $request->file('picture')) {
            $destinationPath = 'backend/image/areatype';
            $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $picture);
            $input['picture'] = "$picture";
        }
        else{
            unset($input['image']);
        }
          
        $areatype->update($input);
       return redirect('admin/areatype'); 
    }

public function destroy(areatype $areatype)
    {
        $areatype->delete();

        DB::table('trips')->where('areatype',$areatype->id)->delete();
        DB::table('banners')->where('type',$areatype->id)->delete();
        return back();
    }
}
