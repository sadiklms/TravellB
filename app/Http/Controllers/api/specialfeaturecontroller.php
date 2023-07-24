<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Models\specialfeature;
use Illuminate\Support\Facades\Response;

class specialfeaturecontroller extends Controller
{
    public function index()
    {
        $specialfeature = specialfeature::all();

        return Response::json($specialfeature, 200);
    }

    public function single($id)
    {
        $specialfeature = DB::table('specialfeatures')
            ->where('id', $id)
            ->get();
        return response()->json($specialfeature);

    }
}