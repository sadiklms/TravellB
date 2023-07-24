<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\banner;
use App\Models\type;
use App\Models\areatype;
use App\Models\locationtype;
use App\Models\specialfeature;

class bannercontroller extends Controller
{
    public function index()
        {
        $banner = banner::orderByDesc('id')->get();   
        return view('backend.page.banner.index',compact('banner'));
        }

    public function create()
        {
        return view('backend.page.banner.create');
        }

    public function store(Request $request)
        {
            
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'backend/image/banner';
            $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $picture);
            $input['image'] = "$picture";
        }
        banner::create($input);
        return redirect('admin/banner');
        }

        
    public function edit(banner $banner)
    {
    return view('backend.page.banner.edit',compact('banner'));
    }

    public function update(Request $request ,banner $banner)
    {
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'backend/image/banner';
            $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $picture);
            $input['image'] = "$picture";
        }
        else{
            unset($input['image']);
        }
        $banner->update($input);
        return redirect('admin/banner');
    }


    public function destroy(banner $banner)
        {
            $banner->delete();
            return back();
        }

    public function banner_type(Request $request)
    {
        $type = $request->type;
       if($type==1)
       {
        $data['type'] = type::get(['id','title']);
        return response()->json($data);
       }
       elseif($type==2)
       {
        $data['type'] = areatype::get(['id','title']);
        return response()->json($data);
       }
       elseif($type==3)
       {
        $data['type'] = locationtype::get(['id','title']);
        return response()->json($data);
       }
       elseif($type==4)
       {
        $data['type'] = specialfeature::get(['id','title']);
        return response()->json($data);
       }
      }

}
