<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class termconditioncontroller extends Controller
{
    public function index()
        {
            $termcondition=DB::table('termconditions')
            ->first();

            return view('backend.page.term-condition.index')
            ->with('termcondition',$termcondition);
        }

    public function store(Request $request)
        {
            $data=array();
            $data['title']=$request->title;

            DB::table('termconditions')
            ->update($data);

            return back();
        }
}
