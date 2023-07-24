<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class filltercontroller extends Controller
{
    public function sortbyfilter(Request $request)
        {
         $triptype=$request->triptype;
         $sortyby=$request->sortyby;
         if($triptype=='type-trip')
         {
         if($sortyby==1) 
         {   
         $trip_detail=DB::table('trips')
         ->where('recommended',1)
         ->whereJsonContains('type',$request->id)
        ->get();

        $tripcount=DB::table('trips')
         ->where('recommended',1)
         ->whereJsonContains('type',$request->id)
        ->count();

            $trip=$request->triptype;
            $id=$request->id;
          
            return response()->json([
                'view'=>view('frontend.page.trip-filter',compact('trip_detail','trip','id','tripcount'))->render(),
                'datavalue'=>view('frontend.page.trip-count',compact('trip_detail','trip','id','tripcount'))->render(),
            ]);
         }
         elseif($sortyby==2)
         {
       

           $trip_detail=DB::table('trips')
           ->orderBy('pricing','ASC')
           ->whereJsonContains('type',$request->id)
           ->get();

           $tripcount=DB::table('trips')
           ->whereJsonContains('type',$request->id)
            ->count();
   
               $trip=$request->triptype;
               $id=$request->id;
                
               return response()->json([
                'view'=>view('frontend.page.trip-filter',compact('trip_detail','trip','id','tripcount'))->render(),
                'datavalue'=>view('frontend.page.trip-count',compact('trip_detail','trip','id','tripcount'))->render(),
               ]);
         }
         else
         {
            
            $trip_detail=DB::table('trips')
            ->orderBy('pricing','DESC')
            ->whereJsonContains('type',$request->id)
            ->get();
 
            $tripcount=DB::table('trips')
            ->whereJsonContains('type',$request->id)
             ->count();

               $trip=$request->triptype;
               $id=$request->id;
                
               return response()->json([
                'view'=>view('frontend.page.trip-filter',compact('trip_detail','trip','id','tripcount'))->render(),
                'datavalue'=>view('frontend.page.trip-count',compact('trip_detail','trip','id','tripcount'))->render(),
            ]);
         }

        }
        elseif($triptype=='location-trip')
        {
            if($sortyby==1)
            {   
            
                $trip_detail=DB::table('trips')
                ->where('recommended',1)
                ->whereJsonContains('locationtype',$request->id)
               ->get();
       
               $tripcount=DB::table('trips')
                ->where('recommended',1)
                ->whereJsonContains('locationtype',$request->id)
               ->count();

               $trip=$request->triptype;
               $id=$request->id;
             
               return response()->json([
                'view'=>view('frontend.page.trip-filter',compact('trip_detail','trip','id','tripcount'))->render(),
                'datavalue'=>view('frontend.page.trip-count',compact('trip_detail','trip','id','tripcount'))->render(),
            ]);
            }
            elseif($sortyby==2)
            {

                $trip_detail=DB::table('trips')
                ->orderBy('pricing','ASC')
                ->whereJsonContains('locationtype',$request->id)
                 ->get();
 
                $tripcount=DB::table('trips')
                ->whereJsonContains('locationtype',$request->id)
                ->count();
               
                  $trip=$request->triptype;
                  $id=$request->id;
                
                  return response()->json([
                    'view'=>view('frontend.page.trip-filter',compact('trip_detail','trip','id','tripcount'))->render(),
                    'datavalue'=>view('frontend.page.trip-count',compact('trip_detail','trip','id','tripcount'))->render(),
                ]);
            }
            else
            {
                $trip_detail=DB::table('trips')
                ->orderBy('pricing','DESC')
                ->whereJsonContains('locationtype',$request->id)
                 ->get();
 
                $tripcount=DB::table('trips')
                ->whereJsonContains('locationtype',$request->id)
                ->count(); 

                  $trip=$request->triptype;
                  $id=$request->id;
                
                  return response()->json([
                    'view'=>view('frontend.page.trip-filter',compact('trip_detail','trip','id','tripcount'))->render(),
                    'datavalue'=>view('frontend.page.trip-count',compact('trip_detail','trip','id','tripcount'))->render(),
                ]);
            }
    
        }

        elseif($triptype=='specialfeature-trip')
        {
            if($sortyby==1)
            {   
           
                $trip_detail=DB::table('trips')
                ->where('recommended',1)
                ->whereJsonContains('specialfeature',$request->id)
               ->get();
       
               $tripcount=DB::table('trips')
                ->where('recommended',1)
                ->whereJsonContains('specialfeature',$request->id)
               ->count();

               $trip=$request->triptype;
               $id=$request->id;
             
               return response()->json([
                'view'=>view('frontend.page.trip-filter',compact('trip_detail','trip','id','tripcount'))->render(),
                'datavalue'=>view('frontend.page.trip-count',compact('trip_detail','trip','id','tripcount'))->render(),
            ]);
            }
            elseif($sortyby==2)
            {
                 
                $trip_detail=DB::table('trips')
                ->orderBy('pricing','ASC')
                ->whereJsonContains('specialfeature',$request->id)
                 ->get();
 
                $tripcount=DB::table('trips')
                ->whereJsonContains('specialfeature',$request->id)
                ->count();
                  $trip=$request->triptype;
                  $id=$request->id;
                
                  return response()->json([
                    'view'=>view('frontend.page.trip-filter',compact('trip_detail','trip','id','tripcount'))->render(),
                    'datavalue'=>view('frontend.page.trip-count',compact('trip_detail','trip','id','tripcount'))->render(),
                ]);
            }
            else
            {
                  
                $trip_detail=DB::table('trips')
                ->orderBy('pricing','DESC')
                ->whereJsonContains('specialfeature',$request->id)
                 ->get();
 
                $tripcount=DB::table('trips')
                ->whereJsonContains('specialfeature',$request->id)
                ->count();

                  $trip=$request->triptype;
                  $id=$request->id;
                
                  return response()->json([
                    'view'=>view('frontend.page.trip-filter',compact('trip_detail','trip','id','tripcount'))->render(),
                    'datavalue'=>view('frontend.page.trip-count',compact('trip_detail','trip','id','tripcount'))->render(),
                ]);
            }
    
        }

        elseif($triptype=='areatype-trip')
        {
            if($sortyby==1) 
            {   
              
                $trip_detail=DB::table('trips')
                ->where('recommended',1)
                ->where('areatype',$request->id)
                ->get();
     
                $tripcount=DB::table('trips')
                ->where('recommended',1)
                ->where('areatype',$request->id)
                ->count();
     
               $trip=$request->triptype;
               $id=$request->id;
             
               return response()->json([
                'view'=>view('frontend.page.trip-filter',compact('trip_detail','trip','id','tripcount'))->render(),
                'datavalue'=>view('frontend.page.trip-count',compact('trip_detail','trip','id','tripcount'))->render(),
            ]);
            }
            elseif($sortyby==2)
            {
               $trip_detail=DB::table('trips')
               ->where('areatype',$request->id)
               ->orderBy('pricing','ASC')
              ->get();

              $tripcount=DB::table('trips')
              ->where('areatype',$request->id)
              ->count();
      
               
                  $trip=$request->triptype;
                  $id=$request->id;
                
                  return response()->json([
                    'view'=>view('frontend.page.trip-filter',compact('trip_detail','trip','id','tripcount'))->render(),
                    'datavalue'=>view('frontend.page.trip-count',compact('trip_detail','trip','id','tripcount'))->render(),
                ]);
            }
            else
            {
                $trip_detail=DB::table('trips')
               ->where('areatype',$request->id)
               ->orderBy('pricing','DESC')
              ->get();
      
              $tripcount=DB::table('trips')
              ->where('areatype',$request->id)
              ->count();
                 
                  $trip=$request->triptype;
                  $id=$request->id;
                
                  return response()->json([
                    'view'=>view('frontend.page.trip-filter',compact('trip_detail','trip','id','tripcount'))->render(),
                    'datavalue'=>view('frontend.page.trip-count',compact('trip_detail','trip','id','tripcount'))->render(),
                ]);
            }
    
        }
    }


     public function typebyfilter(Request $request)
     {
           $type= $request->type;

           
           
           foreach($type as $types )
           {
               
           $trip_detail['abc']=DB::table('trips')
            ->orderBy('pricing','ASC')
            ->whereJsonContains('type',$types)
            ->get();
           }

          
             
           return view('frontend.page.typebyfilter-trip',compact('trip_detail'));
          
     }

    }
