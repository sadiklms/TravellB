<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\itenary;
 
class daycontroller extends Controller
{
    public function index()
        {
        
        $itenary = itenary::join('trips','trips.id','=','itenaries.trip_id')
        ->get(['itenaries.*','trips.name']);

        return view('backend.page.day.index')
        ->with('itenary',$itenary);
        }

    public function create()
        {
        return view('backend.page.day.create');
        }

    public function store(Request $request)
        {
        ;
        $trip=DB::table('trips')->where('id',$request->trip_id)->first();

        $data=array();
        $data['day']=$request->day;
        $data['description']=$request->description;
        $data['trip_id']=$request->trip_id;
        $data['travelgroup_id']=$trip->travelgroupname;
        
        DB::table('itenaries')
        ->insert($data);


        return redirect('admin/itenary');

        }

        public function edit(itenary $itenary)
        {
      
          return view('backend.page.day.edit',compact('itenary'));
        }

    public function update(Request $request ,itenary $itenary)
        {
            $input = $request->all();
           
            
            $itenary->update($input);
    
        return redirect('admin/itenary');
        }


        public function destroy(itenary $itenary)
            {
                $itenary->delete();

               
                
                return back();
            }
}
