<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
Use Alert;


class registercontroller extends Controller
{
    public function index()
        {
        return view('frontend.page.register');
        }

    public function store(Request $request)
        {
        
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);

        $data = array();

     
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['type'] = $request->type;
        

        $insert=DB::table('users')
        ->insert($data);
        $email=$request->email;
          
        Alert::info('success', 'Register Successfully');
        Session::put('email',$email);


        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
           
            return redirect('userdeatail');
        }
    }

       public function userdeatail()
       {
          return view('frontend.page.user-details');
       }
            
        public function userdetailstore(Request $request)
            {
               
                $emailid = Session::get('email');

                if(empty($emailid))
                {
                  return back();
                }
                else
                {
                $email=DB::table('users')
                ->where('email',$emailid)
                ->first();


                $data=array();
                if($file=$request->file('photo'))
                {
                $name=$file->getClientOriginalName();
                $random = random_int('10000000', 9999999999999);
                $image_name = $random.$name;
                $file->move('backend/image/userprofile',$image_name );
                $data['photo'] = $image_name;
                }
                $data['city'] = $request->city;
                $data['zipcode'] = $request->zipcode;
                $data['state'] = $request->state;
                $data['address'] = $request->address;

                DB::table('users')
                ->where('id',$email->id)
                ->update($data);
               
                Session::forget('email'); 
                Alert::info('success','User details add successfully');
                return back();
               }
               }
         
}
