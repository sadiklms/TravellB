<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\information;
use Illuminate\Support\Facades\Response;
class inforamationcontroller extends Controller
{
    public function index()
    {
        $information = information::all();

        return Response::json($information, 200);
    }
}
