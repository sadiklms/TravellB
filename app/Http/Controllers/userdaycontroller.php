<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\itenary;
use Auth;

class userdaycontroller extends Controller
{
    public function index()
    {
    
    
    $itenary = itenary::join('trips','trips.id','=','itenaries.trip_id')
    ->where('travelgroup_id',Auth::user()->id)
    
    ->get(['itenaries.*','trips.name']);

    return view('frontend.page.view-day')
    ->with('itenary',$itenary);
    }

   public function create()
    {
        return view('frontend.page.add-day');
    }

    public function store(Request $request)
        {
            // $input = $request->all();
            // $input['travelgroup_id']=Auth::user()->id;
            // itenary::create($input);

            // return redirect('day');

            $data=array();
            $data['trip_id']=$request->trip_id;
            $data['day']=$request->day;
            $data['description']=$request->description;
            $data['travelgroup_id']=Auth::user()->id;
            DB::table('itenaries')
            ->insert($data);
            
            return redirect('day');
        }

    
    public function edit($id)
        {
            $itenary=DB::table('itenaries')->where('id',$id)->first();
            return view('frontend.page.edit-day')
            ->with('itenary',$itenary);
        }

    public function update(Request $request, $id)
        {
           
        $data=array();
        $data['trip_id']=$request->trip_id;
        $data['day']=$request->day;
        $data['description']=$request->description;
        $data['travelgroup_id']=Auth::user()->id;
        DB::table('itenaries')
        ->where('id',$id)
        ->update($data);
    
        return redirect('day');
        }
    public function day_destory(itenary $id)
    {
        $id->delete();
        return back();
    }
}
