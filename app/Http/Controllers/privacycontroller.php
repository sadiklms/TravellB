<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class privacycontroller extends Controller
{
    public function index()
        {
            $privacypolicy=DB::table('privacypolicies')
            ->first();
            
             return view('backend.page.privacy-policy.index')
            ->with('privacypolicy',$privacypolicy);
        }

    public function store(Request $request)
        {
            $data=array();
            $data['privacypolicy']=$request->title;
            DB::table('privacypolicies')
            ->update($data);
        
              return back();
        }
}
