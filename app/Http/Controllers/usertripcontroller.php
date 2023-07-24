<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\trip;
use Auth;

class usertripcontroller extends Controller
{
    public function add_trip()
        {  
            return view('frontend.page.add-trip');
        }

    public function addtrip(Request $request)
        {

            
            $this->validate($request,[
                'meals'=>'required',
                'stay'=>'required',
                'whocanparticipate'=>'required',
                'how_to_reach_pickup'=>'required',
                'how_to_reach_dropoff'=>'required',
                'how_toreach_notes'=>'required',
                'cost_terms_inclusion'=>'required',
                'cost_terms_exclusion'=>'required',
                'cost_terms_notes'=>'required',
                'cost_terms_cancellation_policy'=>'required',
                'documents_needed'=>'required',
                'terms_condition'=>'required',
                'gear_cloths'=>'required',
                'fitness'=>'required'
    
             ]);
            $input = $request->all();
    
    
            if ($image=$request->file('featureimage')) {
                
                    $destinationPath ='backend/image/trip';
                    $randomNumber = random_int(100000, 9999999999999999);
                    // $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $name=$image->getClientOriginalName();
                    $picture=$randomNumber.$name;
                    $image->move($destinationPath, $picture);
                    $input['featureimage'] = "$picture";
            }
    
    
            if ($request->file('maps')) {
                foreach ($request->file('maps') as $image) {
                    $destinationPath = 'backend/image/trip';
                    $randomNumber = random_int(100000, 9999999999999999);
                    // $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $name=$image->getClientOriginalName();
                    $picture=$randomNumber.$name;
                    $image->move($destinationPath, $picture);
                    $maps[] = $picture;
                }
            }
    
            if ($request->file('imagegallery')) {
                foreach ($request->file('imagegallery') as $image) {
                    $destinationPath = 'backend/image/trip';
                    $randomNumber = random_int(100000, 9999999999999999);
                    $name=$image->getClientOriginalName();
                    $picture=$randomNumber.$name;
                    $image->move($destinationPath, $picture);
                    $imagegallery[] = $picture;
                }
            }
    
            if ($request->file('uploadcocument')) {
                foreach ($request->file('uploadcocument') as $image) {
                    $destinationPath = 'backend/image/trip';
                    $randomNumber = random_int(100000, 9999999999999999);
                    $name=$image->getClientOriginalName();
                    $picture=$randomNumber.$name;
                    $image->move($destinationPath, $picture);
                    $uploadcocument[] = $picture;
                }
            }
    
             if ($request->file('galleryviedo')) {
                foreach ($request->file('galleryviedo') as $image) {
                    $destinationPath = 'backend/image/trip';
                    $randomNumber = random_int(100000, 9999999999999999);
                    $name=$image->getClientOriginalName();
                    $picture=$randomNumber.$name;
                    $image->move($destinationPath, $picture);
                    $galleryviedo[] = $picture;
                }
            }
    
                $input['maps'] = json_encode($maps);
                $input['travelgroupname'] = auth()->user()->id;
                $input['imagegallery'] = json_encode($imagegallery);
                $input['uploadcocument'] = json_encode($uploadcocument);
                $input['galleryviedo'] = json_encode($galleryviedo);
                $input['type'] = json_encode($request->type);
                $input['locationtype'] = json_encode($request->locationtype);
                $input['specialfeature'] = json_encode($request->specialfeature);
                trip::create($input);
    
                $tripsid=DB::table('trips')->orderBy('id', 'DESC')->first();
    
                $question=$request->question;
                $answer=$request->answer;
                foreach($question as $index1=>$questions)
                { 
                   $data1['question']=$question[$index1];
                   $data1['answer']=$answer[$index1];
                   $data1['trip_id']=$tripsid->id;
                   DB::table('faqs')
                   ->insert($data1);
         
                }

                return back();
        }
 
    public function viewtrip()
        {   
            $trip=DB::table('trips')->where('travelgroupname',Auth::user()->id)->get(); 
            return view('frontend.page.view-trip')
            ->with('trip',$trip);  
        }

    public function edit($id)
        {
           $trip=DB::table('trips')->where('id',$id)->first();

           $type=DB::table('types')->get();

           $areatype=DB::table('areatypes')->get();

           $locationtype=DB::table('locationtypes')->get();

           $specialfeature=DB::table('specialfeatures')->get();

            return view('frontend.page.edit-trip')
            ->with('type',$type)
            ->with('areatype',$areatype)
            ->with('locationtype',$locationtype)
            ->with('specialfeature',$specialfeature)
             ->with('trip',$trip);
        }

        public function update(Request $request ,trip $id)
        {
           
            $input = $request->all();

            if ($image=$request->file('featureimage')) {
                
                $destinationPath ='backend/image/trip';
                $randomNumber = random_int(100000, 9999999999999999);
                // $picture = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $name=$image->getClientOriginalName();
                $picture=$randomNumber.$name;
                $image->move($destinationPath, $picture);
                $input['featureimage'] = "$picture";
             }

            if ($request->file('maps')) {
                foreach ($request->file('maps') as $image) {
                    $destinationPath = 'backend/image/trip';
                    $randomNumber = random_int(100000, 9999999999999999);
                    $name=$image->getClientOriginalName();
                    $picture=$randomNumber.$name;
                    $image->move($destinationPath, $picture);
                    $maps[] = $picture;
                }
                $input['maps'] = json_encode($maps);
            }
            else{
                unset($input['image']);
            }
    
            if ($request->file('imagegallery')) {
                foreach ($request->file('imagegallery') as $image) {
                    $destinationPath = 'backend/image/trip';
                    $randomNumber = random_int(100000, 9999999999999999);
                    $name=$image->getClientOriginalName();
                    $picture=$randomNumber.$name;
                    $image->move($destinationPath, $picture);
                    $imagegallery[] = $picture;
                }
                $input['imagegallery'] = json_encode($imagegallery);
            }
            else{
                unset($input['image']);
            }
    
            if ($request->file('uploadcocument')) {
                foreach ($request->file('uploadcocument') as $image) {
                    $destinationPath = 'backend/image/trip';
                    $randomNumber = random_int(100000, 9999999999999999);
                    $name=$image->getClientOriginalName();
                    $picture=$randomNumber.$name;
                    $image->move($destinationPath, $picture);
                    $uploadcocument[] = $picture;
                }
                $input['uploadcocument'] = json_encode($uploadcocument);
            }
            else{
                unset($input['image']);
            }
    
             if ($request->file('galleryviedo')) {
                foreach ($request->file('galleryviedo') as $image) {
                    $destinationPath = 'backend/image/trip';
                    $randomNumber = random_int(100000, 9999999999999999);
                    $name=$image->getClientOriginalName();
                    $picture=$randomNumber.$name;
                    $image->move($destinationPath, $picture);
                    $galleryviedo[] = $picture;
                }
                $input['galleryviedo'] = json_encode($galleryviedo);
            }
            else{
                unset($input['image']);
            }
    
               
                $input['type'] = json_encode($request->type);
                $input['locationtype'] = json_encode($request->locationtype);
                $input['specialfeature'] = json_encode($request->specialfeature);
               
                $id->update($input);
    
                $tripsid=DB::table('trips')->orderBy('id', 'DESC')->first();
    
                
              

                $question=$request->question;
                $answer=$request->answer;

                DB::table('faqs')
                ->where('trip_id',$tripsid->id)
                ->delete();

                foreach($question as $index1=>$questions)
                { 
                   $data1['question']=$question[$index1];
                   $data1['answer']=$answer[$index1];
                   $data1['trip_id']=$tripsid->id;
                   DB::table('faqs')
                   ->insert($data1);
         
                }
                return redirect('viewtrip');
        }


        public function destroy(trip $id)
        {
            $id->delete();
            DB::table('itenaries')->where('trip_id',$id->id)->delete();
            DB::table('faqs')->where('trip_id',$id->id)->delete();
            return back();
        }
}
