<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class retrurnpolicycontroller extends Controller
{
    public function index()
        {
            $returnpolicy=DB::table('returnpolicies')
            ->first();

            return view('backend.page.returnpolicy.index')
            ->with('returnpolicy',$returnpolicy);
        }

    public function store(Request $request)
        {
            $data=array();
            $data['returnpolicy']=$request->title;

            DB::table('returnpolicies')
            ->update($data);

            return back();
        }
}
