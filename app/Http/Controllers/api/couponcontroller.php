<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\banner;
use Illuminate\Support\Facades\Response;
class couponcontroller extends Controller
{
    public function index()
        {
            $banner = banner::all();
            return Response::json($banner, 200);
        
        }

    public function singleview($id)
        {
        $banner::where('id', $id)->first();
        return Response::json($banner, 200);
        }
}
