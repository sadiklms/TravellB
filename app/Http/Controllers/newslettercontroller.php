<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class newslettercontroller extends Controller
{
    public function index()
    {
        $newsletter=DB::table('newsletter')
        ->get();

        return view('backend.page.newsletter.index')
        ->with('newsletter',$newsletter);
    }

    public function delete($id)
        {
            DB::table('newsletter')
            ->where('id',$id)
            ->delete();

            return back();
        }
}
