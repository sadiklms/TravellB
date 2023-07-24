<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\type;
use DB;
use Illuminate\Support\Facades\Response;

class apitypecontroller extends Controller
{
    public function index()
        {
            $type = type::get();

            return Response::json($type, 200);
        }

    public function single($id)
        {
         $singleview=DB::table('types')
            ->where('id', $id)
            ->first();
        
            return response()->json($singleview);

        }
}
