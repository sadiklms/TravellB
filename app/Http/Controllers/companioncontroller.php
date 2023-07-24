<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
use \Crypt;
class companioncontroller extends Controller
{
    public function index($id)
        {
            $decrypted = Crypt::decrypt($id); 
            $companion=DB::table('companyinfos')
            ->where('bookingid',$decrypted)
            ->get();
            
            $booking_id=$decrypted;
            
            return view('frontend.page.companion')
            ->with('booking_id',$booking_id)
            ->with('companion',$companion);
        }

    public function create($id)
        {
            $id = Crypt::decrypt($id); 
            return view('frontend.page.companion-create')
            ->with('id',$id);
        }

    public function store(Request $request)
        {
            $data=array();
            if($file=$request->file('image'))
            {
                $name=$file->getClientOriginalName();
                $random=random_int('1000000000',99999999999999);
                $image_name=$random.$name;
                $file->move('backend/image/companion',$image_name);
                $data['document']=$image_name;
            }
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['age']=$request->age;
            $data['gender']=$request->gender;
            $data['bookingid']=$request->bookingid;
            $data['phone']=$request->phone;

            DB::table('companyinfos')
            ->insert($data);
            
            Alert::info('success', 'Add companion successfully');
            return back();

        }
}
