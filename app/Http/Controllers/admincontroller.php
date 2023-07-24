<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
class admincontroller extends Controller
{
    public function register()
        { 
            $password='12345678';
            $data['name']='sadik';
            $data['email']='sadikalam@gmail.com';
            $data['password']=hash::make($password);
            $user=DB::table('admins')->insert($data);
        }

    
}
