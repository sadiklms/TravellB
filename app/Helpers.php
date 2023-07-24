<?php

namespace App\Helpers;
use App\Models\type;
use DB;

class Helper {

     public static function gettype($type){
       
        if($type==1)
        {
            $type = "Type";
            return $type;
        }
        elseif($type==2)
        {
            $type = "Area Type";
            return $type;
        }
        elseif($type==3)
        {
            $type = "Location Type";
            return $type;
        }
        elseif($type==4)
        {
            $type = "Special Feature";
            return $type;
        }
      
    }


    public static function getsection($type,$section)

    {
        
        if($type==1)
        {
            $type=DB::table('types')->where('id', $section)->first();
            return $type->title;
        }
        elseif($type==2)
        {
            $type=DB::table('areatypes')->where('id', $section)->first();
            return $type->title;
        }
        elseif($type==3)
        {
            $type=DB::table('locationtypes')->where('id', $section)->first();
            return $type->title;
        }
        elseif($type==4)
        {
            $type=DB::table('specialfeatures')->where('id', $section)->first();
            return $type->title;
        }

    }


    public static function choosebanner($choosetype)

    {
          if($choosetype==1)
          {
            $type='<option value="1">Type</option>
            <option value="2">Area Type</option>
            <option value="3">Location Type</option> 
            <option value="4">Special Feature</option>';

            echo $type;
          }
          
          if($choosetype==2)
          {
            $type='
            <option value="2">Area Type</option>
            <option value="1">Type</option>
            <option value="3">Location Type</option> 
            <option value="4">Special Feature</option>';

            echo $type;
          } 

          if($choosetype==3)
          {
            $type='
            <option value="3">Location Type</option> 
            <option value="1">Type</option>
            <option value="2">Area Type</option>
           
            <option value="4">Special Feature</option>';

            echo $type;
          }

          if($choosetype==4)
          {
            $type='
            <option value="4">Special Feature</option>
            <option value="1">Type</option>
            <option value="2">Area Type</option>
            <option value="3">Location Type</option>' 
           ;

            echo $type;
          }
    }

    public static function choosesection($choosetype,$choosesection)
    {
        if($choosetype==1)
        {
        $type=DB::table('types')->get();
         foreach($type as $key=>$row)
         {
            echo'<option value="'.$row->id.'"';if ($row->id==$choosesection){echo 'selected';}echo '>'.$row->title.'</option>';
         }
        }
        elseif($choosetype==2)
        {
        $type=DB::table('areatypes')->get();
         foreach($type as $key=>$row)
         {
            echo'<option value="'.$row->id.'"';if ($row->id==$choosesection){echo 'selected';}echo '>'.$row->title.'</option>';
         }
        }
        elseif($choosetype==3)
        {
        $type=DB::table('locationtypes')->get();
         foreach($type as $key=>$row)
         {
            echo'<option value="'.$row->id.'"';if ($row->id==$choosesection){echo 'selected';}echo '>'.$row->title.'</option>';
         }
        }
        elseif($choosetype==4)
        {
        $type=DB::table('specialfeatures')->get();
         foreach($type as $key=>$row)
         {
            echo'<option value="'.$row->id.'"';if ($row->id==$choosesection){echo 'selected';}echo '>'.$row->title.'</option>';
         }
        }


    }
    
}

