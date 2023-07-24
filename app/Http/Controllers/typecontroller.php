<?php

namespace App\Http\Controllers;

use DB;
use App\Models\type;

use Illuminate\Http\Request;

class typecontroller extends Controller
{
    public function index(areatypecontroller $areatypecontroller)
    {
        $type = type::orderByDesc('id')->get();
        return view('backend.page.type.index')
            ->with('type',$type);

    }

    public function create()
        {
            return view('backend.page.type.create');
        }

    public function store(Request $request)
        {
            $input = $request->all();
            if ($image = $request->file('picture')) {
                $destinationPath = 'backend/image/type';
                $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $picture);
                $input['picture'] = "$picture";
            }
           type::create($input);

        return redirect('admin/type');
        }

    public function edit(type $type)
        {
          return view('backend.page.type.edit',compact('type'));
        }

    public function update(Request $request ,type $type)
        {
            $input = $request->all();
            if ($image = $request->file('picture')) {
                $destinationPath = 'backend/image/type';
                $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $picture);
                $input['picture'] = "$picture";
            }
            else{
                unset($input['image']);
            }
              
            $type->update($input);

        
           return redirect('admin/type'); 
        }

    public function destroy(type $type)
        {
            $type->delete();

            $trip=DB::table('trips')->get();

            foreach ($trip as $key => $trips) {
            $trips_data = json_decode($trips->type);
            foreach ($trips_data as $key => $trips_datas) {
                if ($trips_datas == $type->id) {
                    $tripid = DB::table('trips')->where('id', $trips->id)->delete();
                }
             }
            }
           
            DB::table('banners')->where('type',$type->id)->delete();
            return back();
        }
}
