<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\locationtype;
use DB;
use Illuminate\Support\Facades\Response;

class locationtypecontroller extends Controller
{
    public function index()
    {
        $locationtype = locationtype::all();

        return Response::json($locationtype, 200);
    }

    public function single($id)
        {
            $singleview=DB::table('locationtypes')
            ->where('id', $id)
            ->first();
        
            return response()->json($singleview);
        }
}
