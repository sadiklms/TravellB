<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class apilogincontroller extends Controller
{
    public function apilogin(Request $request)
    {
        
        // $data=$request->validate([
           
        //     'email'=>'required|email|max:191',
        //     'password'=>'required|string',
        // ]);

        $email = $request->email;
        $password = $request->password;
        $user = User::where('email',$email)->first();

        if(!$user || !Hash::check($password,$user->password))
         {
             return response(['message'=>'Invalid Credentials'],401);
         }
         else
         {
            $token =$user->createToken('fundaProjectTokenLogin')->plainTextToken;
            $response =[
            'user'=>$user,
            'token'=>$token,
        ];

        return response($response, 201); 
         }

    }


    public function abc()
    {
        
           $user="hello";
            $response =[
            'user'=>$user,
            
        ];

        return response($response, 201); 
         }

    }

