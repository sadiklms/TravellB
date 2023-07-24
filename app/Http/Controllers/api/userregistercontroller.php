<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
class userregistercontroller extends Controller
{
    public function store(Request $request)
        {
             
        $count=DB::table('users')
            ->where('email', $request->email)
            ->count();
        if($count==1)
        {
            return response()->json(['success' => 'Email id already Exit']); 
        } else {

            $data = array();
            // if ($image = $request->file('photo')) {
            //     $destinationPath = 'backend/image/userprofile';
            //     $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
            //     $image->move($destinationPath, $picture);
            //     $data['photo'] = "$picture";
            // }
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['type'] = $request->type;
            $data['password'] = hash::make($request->get('password'));
            // $data['address'] = $request->address;
            // $data['city'] = $request->city;
            // $data['state'] = $request->state;
            // $data['zipcode'] = $request->zipcode;
            // $data['type'] = $request->type;

            $user = DB::table('users')->insert($data);

            return response()->json(['success' => 'Register Sucessfully']);
        }
        }


    public function update(Request $request,$id)
        {
            $data=array();
            if ($image = $request->file('photo')) {
                $destinationPath = 'backend/image/userprofile';
                $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $picture);
                $data['photo'] = "$picture";
            }
            $data['name'] = $request->name;
            $data['email']=$request->email;
            // $data['password']=hash::make($request->get('password'));
            $data['address']=$request->address;
            $data['city']=$request->city;
            $data['state']=$request->state;
            $data['zipcode']=$request->zipcode;
            $data['type']=$request->type;
            
            $user=DB::table('users')
            ->where('id',$id)
            ->update($data); 
        }

    public function resetpassword(Request $request)
        {
        $oldpassword=hash::make($request->get('oldpassword'));
          $count=DB::table('users')
            ->where('email',$request->email)
            ->where('password',$oldpassword)
            ->count();

        echo $count;

        exit();

        if ($count>0) {

            $data = array();
            $data['password'] = $request->newpassword;
            DB::table('users')
                ->where('id', )
                ->update($data);

                return response()->json(['success'=>'password update sucessfully']);
        }

        else{
            return response()->json(['success'=>'password does not match']);
        }
    }
}
