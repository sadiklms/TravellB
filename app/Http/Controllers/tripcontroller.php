<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\type;
use App\Models\areatype;
use App\Models\locationtype;
use App\Models\specialfeature;
use App\Models\trip;
class tripcontroller extends Controller
{

    public function index()
    {
        $trip = trip::orderByDesc('id')->get();
        return view('backend.page.trip.index')
            ->with('trip',$trip);

    }
    public function create()
    { 
        $type = type::get();   
        $areatype= areatype::get();
        $locationtype= locationtype::get();
        $travelgroup = DB::table('travelgroups')->get();
        $specialfeature = specialfeature::get();
        return view('backend.page.trip.create',compact('type','areatype','locationtype','specialfeature','travelgroup'));
    }

    public function store(Request $request)
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
            $input['imagegallery'] = json_encode($imagegallery);
            $input['uploadcocument'] = json_encode($uploadcocument);
            $input['galleryviedo'] = json_encode($galleryviedo);
            $input['type'] = json_encode($request->type);
            $input['locationtype'] = json_encode($request->locationtype);
            $input['specialfeature'] = json_encode($request->specialfeature);
            trip::create($input);

            $tripsid=DB::table('trips')->orderBy('id', 'DESC')->first();

            
            // $day=$request->day;
            // $description=$request->description;
            // foreach($day as $index=>$days)
            // { 
            //    $data['day']=$day[$index];
            //    $data['description']=$description[$index];
            //    $data['trip_id']=$tripsid->id;
            //    DB::table('itenaries')
            //    ->insert($data);
     
            // }


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
            return redirect('admin/trip');
        
    }  
    
    public function edit(trip $trip)
        {
            $type = type::get();
            $areatype= areatype::get();
            $travelgroup = DB::table('travelgroups')->get();
            $locationtype= locationtype::get();
            $specialfeature = specialfeature::get();
          return view('backend.page.trip.edit',compact('type','areatype','locationtype','specialfeature','trip','travelgroup'));
        }

    
    public function update(Request $request ,trip $trip)
        {
            $input = $request->all();

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
               
                $trip->update($input);
    
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
                return redirect('admin/trip');
        }


        public function destroy(trip $trip)
        {
            $trip->delete();
            DB::table('itenaries')->where('trip_id',$trip->id)->delete();
            DB::table('faqs')->where('trip_id',$trip->id)->delete();
            return back();
        }

        public function recommended(Request $request)
            {
               
                $data=array();
                
                $data['recommended']=$request->recommended;
                DB::table('trips')
                ->where('id',$request->id)
                ->update($data);


                return response()->json(['success' => 'update success']);
            }
}
  
