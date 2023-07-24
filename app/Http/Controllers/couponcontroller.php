<?php

namespace App\Http\Controllers;
use App\Models\coupon;
use Illuminate\Http\Request;

class couponcontroller extends Controller
{
    public function index()
    {
        $coupon = coupon::orderByDesc('id')->get();
        return view('backend.page.coupon.index')
            ->with('coupon',$coupon);

    }

    public function create()
    {
        return view('backend.page.coupon.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'backend/image/coupon';
            $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $picture);
            $input['image'] = "$picture";
        }
        
        coupon::create($input);

    return redirect('admin/coupon');
    }

    public function edit(coupon $coupon)
    {
    
      return view('backend.page.coupon.edit',compact('coupon'));
    }

    public function update(Request $request ,coupon $coupon)
    {
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'backend/image/coupon';
            $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $picture);
            $input['image'] = "$picture";
        }
        else{
            unset($input['image']);
        }
        
      

        $coupon->update($input);

    return redirect('admin/coupon');
    }

    public function destroy(coupon $coupon)
        {
            $coupon->delete();
            return back();
        }

    
}
