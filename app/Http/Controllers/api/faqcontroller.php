<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class faqcontroller extends Controller
{
    public function index($id)
        {
        $faq=DB::table('faqs')
            ->where('trip_id', $id)
            ->get();

        return response()->json($faq);

        }
}
