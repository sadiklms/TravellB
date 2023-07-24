<?php

namespace App\Http\Controllers;
use App\Models\specialfeature;
use DB;

use Illuminate\Http\Request;

class specialfeaturecontroller extends Controller
{
    public function index()
    {
        $specialfeature = specialfeature::orderByDesc('id')->get();
        return view('backend.page.specialfeature.index')
            ->with('specialfeature',$specialfeature);

    }

    
    public function create()
    {
        return view('backend.page.specialfeature.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if ($image = $request->file('picture')) {
            $destinationPath = 'backend/image/specialfeature';
            $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $picture);
            $input['picture'] = "$picture";
        }
        specialfeature::create($input);

    return redirect('admin/specialfeature');
    }

    public function edit(specialfeature $specialfeature)
        {
        
          return view('backend.page.specialfeature.edit',compact('specialfeature'));
        }

    public function update(Request $request ,specialfeature $specialfeature)
        {
            $input = $request->all();
            if ($image = $request->file('picture')) {
                $destinationPath = 'backend/image/specialfeature';
                $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $picture);
                $input['picture'] = "$picture";
            }
            else{
                unset($input['image']);
            }
              
            $specialfeature->update($input);
           return redirect('admin/specialfeature'); 
        }

    public function destroy(specialfeature $specialfeature)
        {
            $specialfeature->delete();

            $trip=DB::table('trips')->get();

            foreach ($trip as $key => $trips) {
                $trips_data = json_decode($trips->specialfeature);
                foreach ($trips_data as $key => $trips_datas) {
                    if ($trips_datas == $specialfeature->id) {
                        $tripid = DB::table('trips')->where('id', $trips->id)->delete();
                    }
                 }
                }
               
            DB::table('banners')->where('type',$specialfeature->id)->delete();
            return back();
        }
}
