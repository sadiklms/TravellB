<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use Alert;
class userprofilecontroller extends Controller
{
    public function index()
        {
        return view('frontend.page.user-profile');
        }

    public function signOut() {
            Session::flush();
            Auth::logout();
       
            return Redirect('user-login');
    }

    public function edit()
        {
             $edit=DB::table('users')
             ->where('id',Auth::user()->id)
             ->first();

             return view('frontend.page.edit-profile')
             ->With('edit',$edit);


        }

    public function update(Request $request)
        {


            $email=DB::table('users')
            ->where('email',$request->email)
            ->where('id',Auth::user()->id)
            ->count();

            if($email==1)
            {

            $data=array();

            if($file=$request->file('photo'))
            {
                $name=$file->getClientOriginalName();
                $random = random_int('10000000', 9999999999999);
                $image_name = $random.$name;
                $file->move('backend/image/userprofile',$image_name );
                
                $data['photo'] = $image_name;
    
            }
            
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['address']=$request->address;
            $data['city']=$request->city;
            $data['state']=$request->state;
            $data['zipcode']=$request->zipcode;

            DB::table('users')
            ->where('id',Auth::user()->id)
            ->update($data);
            Alert::info('success','User Profile Update Successfully');
            return back();
        }
        else
        {
            $email=DB::table('users')
            ->where('email',$request->email)
             ->count();

             if($email==1)
             { 
                Alert::info('warning','Email id already exit');
                 return back();
             }
             else
             {
                $data=array();

                if($file=$request->file('photo'))
                {
                    $name=$file->getClientOriginalName();
                    $random = random_int('10000000', 9999999999999);
                    $image_name = $random.$name;
                    $file->move('backend/image/userprofile',$image_name );
                    
                    $data['photo'] = $image_name;
        
                }
                
                $data['name']=$request->name;
                $data['email']=$request->email;
                $data['address']=$request->address;
                $data['city']=$request->city;
                $data['state']=$request->state;
                $data['zipcode']=$request->zipcode;
    
                DB::table('users')
                ->where('id',Auth::user()->id)
                ->update($data);
                Alert::info('success','User Profile Update Successfully');
                return back();
             }
        }
        }
}
