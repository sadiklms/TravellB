<?php

namespace App\Http\Controllers;
use App\Models\locationtype;
use Illuminate\Http\Request;
use DB;

class locationtypecontroller extends Controller
{
    public function index()
    {
        $locationtype = locationtype::orderByDesc('id')->get();
        return view('backend.page.locationtype.index')
            ->with('locationtype',$locationtype);

    }


    public function create()
    {
        return view('backend.page.locationtype.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if ($image = $request->file('picture')) {
            $destinationPath = 'backend/image/locationtype';
            $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $picture);
            $input['picture'] = "$picture";
        }
        locationtype::create($input);

    return redirect('admin/locationtype');
    }

    public function edit(locationtype $locationtype)
        {
        
          return view('backend.page.locationtype.edit',compact('locationtype'));
        }

    public function update(Request $request ,locationtype $locationtype)
        {
            $input = $request->all();
            if ($image = $request->file('picture')) {
                $destinationPath = 'backend/image/locationtype';
                $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $picture);
                $input['picture'] = "$picture";
            }
            else{
                unset($input['image']);
            }
              
            $locationtype->update($input);
           return redirect('admin/locationtype'); 
        }

    public function destroy(locationtype $locationtype)
        {
            $locationtype->delete();
            $trip=DB::table('trips')->get();

            foreach ($trip as $key => $trips) {
                $trips_data = json_decode($trips->locationtype);
                foreach ($trips_data as $key => $trips_datas) {
                    if ($trips_datas == $locationtype->id) {
                        $tripid = DB::table('trips')->where('id', $trips->id)->delete();
                    }
                 }
                }
            DB::table('banners')->where('type',$locationtype->id)->delete();
            return back();
        }
}
