<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class adminlogincontroller extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin',['except'=>['logout']]);
    }
    public function store(Request $request)
        {
        $email = $request->email;
        $password = $request->password;
        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
            return redirect('admin');
        }
        else
        {
            return back();
        }
        }

}
