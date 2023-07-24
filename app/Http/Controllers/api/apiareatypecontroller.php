<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\areatype;
use Illuminate\Support\Facades\Response;
use DB;
class apiareatypecontroller extends Controller
{
    public function index()
        {
             $areatype = areatype::all();

            return Response::json($areatype, 200);
        }

    public function single($id)
        {
         $singleview=DB::table('areatypes')
            ->where('id', $id)
            ->first();
        
            return response()->json($singleview);

        }
}
