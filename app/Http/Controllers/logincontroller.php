<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;
use DB;
use Alert;

class logincontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function register()
        {
        return view('frontend.page.register');
        }
    public function index()
        {
          return view('frontend.page.login');
        }
    public function store(Request $request)
    {
        
        // $email = $request->email;
        // $password = $request->password;
        // $user = User::where('email',$email)->first();

        // if(!$user || !Hash::check($password,$user->password))
        //  {
        //     return back();
        //  }
        //  else
        //  {
        //     return redirect('user/profile');
        //  }

         $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // return redirect()->intended('dashboard')
            //             ->withSuccess('Signed in');
            return redirect('user/profile');
        }
        Alert::info('Warning','Login details are not valid');
        return redirect("user-login");
    }

 

  
}
