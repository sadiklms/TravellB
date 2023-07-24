@extends('backend.layout.index')
@section('content')
<!-- Page Content-->
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->  
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Trip</h4>
                                    
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <form method="post"action="{{route('admin.trip.update',$trip->id)}}"enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                           <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Travel Group</label>
                                                <!-- <select class="form-control" style="width: 100%" name="travelgroupname" data-placeholder="Choose"required>
                                                @php $travelgroup=DB::table('users')->where('type',1)->get(); @endphp
                                                @foreach($travelgroup as $key=>$travelgroups)
                                                

                                                <option value="{{$travelgroups->id}}"@if($travelgroups->id==$trip->travelgroupname) Selected  @endif)>{{$travelgroups->name}}</option>
                                                @endforeach
                                               </select> -->
                                               @php $travelgroup=DB::table('users')->where('id',$trip->travelgroupname)->first(); @endphp
                                               <input type="text"name=""value="{{$travelgroup->name}}"class="form-control"readonly>
                                                 
                                               <input type="hidden"name="travelgroupname"value="{{$travelgroup->id}}"class="form-control">
                                            </div>
                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Type</label>
                                                <select class="select2 mb-3 select2-multiple" style="width: 100%" multiple="multiple"name="type[]" required>
                                               @php $editarea=json_decode($trip->type); @endphp
                                                @foreach($type as $key=>$types)
                                               
                                                <option value="{{$types->id}}" @foreach($editarea as $key=>$editareas)@if($types->id==$editareas) Selected  @endif  @endforeach>{{$types->title}}</option>
                                                @endforeach
                                               
                                               </select>
                                                
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Area Type</label>
                                                <select class="form-control mb-3"name="areatype"required>
                                               
                                                @foreach($areatype as $key=>$areatypes)
                                                <option value="{{$areatypes->id}}"@if($areatypes->id==$trip->areatype) Selected  @endif)>{{$areatypes->title}}</option>
                                                @endforeach
                                                </select>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Location Type</label>
                                                <select class="select2 mb-3 select2-multiple" style="width: 100%" multiple="multiple" name="locationtype[]" data-placeholder="Choose">
                                                @php $editlocationtype=json_decode($trip->locationtype); @endphp
                                                @foreach($locationtype as $key=>$locationtypes)
                                               
                                                <option value="{{$locationtypes->id}}" @foreach($editlocationtype as $key=>$editlocationtypes)@if($locationtypes->id==$editlocationtypes) Selected  @endif @endforeach>{{$locationtypes->title}}</option>
                                               
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Special Feature</label>
                                                <select class="select2 mb-3 select2-multiple"name="specialfeature[]" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                                @php $editspecialfeature=json_decode($trip->specialfeature); @endphp
                                                @foreach($specialfeature as $key=>$specialfeatures)
                                               
                                            <option value="{{$specialfeatures->id}}" @foreach($editspecialfeature as $key=>$editspecialfeatures)@if($specialfeatures->id==$editspecialfeatures) Selected  @endif @endforeach>{{$specialfeatures->title}}</option>
                                                @endforeach
                                               
                                                                                                                        
                                               </select>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Pricing</label>
                                                <input type="text"name="pricing"value="{{$trip->pricing}}"class="form-control"required>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Name</label>
                                                <input type="text"name="name"value="{{$trip->name}}"class="form-control"required>
                                            </div>
 
                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Pricing Description</label>
                                            <textarea name="pricingdescription"class="form-control"required>{{$trip->pricingdescription}}</textarea>
                                            </div>

                                           <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Discounts Type</label>
                                                <select class="form-control"name="discounttype"required>
                                                    @if($trip->discounttype=="Flat")
                                                    <option value="Flat">Flat</option>
                                                    <option value="Percentage">Percentage</option>
                                                    @elseif($trip->discounttype=="Percentage")
                                                    <option value="Percentage">Percentage</option>
                                                    <option value="Flat">Flat</option>
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label"name="discounts" for="exampleInputEmail1">Discounts</label>
                                                <input type="text"name="discount"value="{{$trip->discount}}"class="form-control"required>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Offer</label>
                                                <input type="text"name="offer"value="{{$trip->offer}}"class="form-control"required>
                                            </div>
                                           
                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Region</label>
                                                <input type="text"name="region"value="{{$trip->region}}"class="form-control"required>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Location</label>
                                                <input type="text"name="location"value="{{$trip->location}}"class="form-control"required>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Duration</label>
                                                <input type="text"name="duration"value="{{$trip->duration}}"class="form-control"required>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Description (Why this)</label>
                                                <textarea name="descriptionwhythis"class="form-control"required>{{$trip->descriptionwhythis}}</textarea>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Description (Short)</label>
                                                <textarea name="descriptionshort"class="form-control"required>{{$trip->descriptionshort}}</textarea>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Description (Long)</label>
                                                <textarea name="descriptionlong"class="form-control"required>{{$trip->descriptionlong}}</textarea>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Airport</label>
                                                <input type="text"name="airport"value="{{$trip->airport}}"class="form-control"required>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Railway</label>
                                                <input type="text"name="railway"value="{{$trip->railway}}"class="form-control"required>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Best Season</label>
                                                <input type="text"name="bestseason"value="{{$trip->bestseason}}"class="form-control"required>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Meals</label>
                                             
                                                <textarea class="form-control"id="editor1"name="meals"required>{{$trip->meals}}</textarea>
                                            </div>
 
                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Stay</label>
                                                <textarea class="form-control"id="editor2"name="stay"required>{{$trip->stay}}</textarea>
                                            </div>
  
                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Who Can Participate</label>
                                               <textarea class="form-control"id="editor3"name="whocanparticipate"required>{{$trip->whocanparticipate}}</textarea>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">How to reach (Pick Up)</label>
                                               
                                                <textarea class="form-control"id="editor4"name="how_to_reach_pickup"required>
                                                    {{$trip->how_to_reach_pickup}}
                                                </textarea>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">How to Reach  (Drop Off)</label>
                                                <textarea class="form-control"id="editor5"name="how_to_reach_dropoff"required>{{$trip->how_to_reach_dropoff}}</textarea>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">How to Reach (Notes)</label>
                                                
                                                <textarea class="form-control"id="editor6"name="how_toreach_notes"required>{{$trip->how_toreach_notes}}</textarea>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Cost Terms (Inclusion)</label>

                                                <textarea class="form-control"id="editor7"name="cost_terms_inclusion"required>{{$trip->cost_terms_inclusion}}</textarea>
                                                
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Cost Terms (Exclusion)</label>

                                                
                                                <textarea class="form-control"id="editor8"name="cost_terms_exclusion"required>{{$trip->cost_terms_exclusion}}</textarea>
                                                
                                                
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Cost Terms (Notes)</label>

                                                <textarea class="form-control"id="editor9"name="cost_terms_notes"required>{{$trip->cost_terms_notes}}</textarea>
                                               
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Cost Terms (Cancellation Policy)</label>

                                                <textarea class="form-control"id="editor10"name="cost_terms_cancellation_policy"required>{{$trip->cost_terms_cancellation_policy}}</textarea>

                                                
                                            </div>
                                            
                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Documents Needed</label>

                                                <textarea class="form-control"id="editor11"name="documents_needed"required>{{$trip->documents_needed}}</textarea>
                                              
                                            </div>
                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Terms & Condition</label>

                                                <textarea class="form-control"id="editor12"name="terms_condition"required>{{$trip->terms_condition}}</textarea>
                                               
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Gear & Cloths</label>

                                                <textarea class="form-control"id="editor13"name="gear_cloths"required>{{$trip->gear_cloths}}</textarea>
                                                
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Fitness</label>

                                                <textarea class="form-control"id="editor14"name="fitness"required>{{$trip->fitness}}</textarea>
                                               
                                            </div>

                                            <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                <h4 class="card-title">Trip Slot</h4>
                                   
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <div class="form-material">
                                       
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="my-3">Start Date</label>
                                                <input type="date"name="start_date" class="form-control"value="<?php echo $trip->start_date ?>">
                                            </div><!--end col-->
                                            <div class="col-md-3">
                                                <label class="my-3">Booking Start Date</label>
                                               
                                                <input type="date"name="booking_start_date" value="{{$trip->booking_start_date}}"class="form-control" placeholder="End date">
                                            </div><!--end col-->

                                            <div class="col-md-3">
                                                <label class="my-3">Booking End Date</label>
                                               
                                                <input type="date" value="{{$trip->booking_end_date}}" class="form-control"name="booking_end_date">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="my-3">Number of Booking Available</label>
                                                <input type="text" name="number_of_booking_available" value="{{$trip->number_of_booking_available}}" class="form-control" placeholder="End date" id="date-end">
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div>       
                                </div><!--end card-body-->
                            </div><!--end card-->                                
                        </div> <!-- end col -->

                        
                                            <div class="form-group col-12">
                                                <label for="product">Feature Image</label>
                                                <div class="input-group hdtuto control-group lst increment" >
                                                    <input type="file" name="featureimage"accept="image/*" class="myfrm form-control">
                                                   
                                                </div>
                                                <img src="{{URL::to('/')}}/backend/image/trip/{{$trip->featureimage}}" width="200px;"class="mt-4">
                                            </div>
                        <div class="form-group col-12">
                                                <label for="product">Map Image</label>
                                                <div class="input-group hdtuto control-group lst increment" >
                                                    <input type="file" name="maps[]"accept="image/*" class="myfrm form-control">
                                                    <div class="input-group-btn"> 
                                                        <button class="btn btn-success map" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="clone hide col-12">
                                                <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                                    <input type="file" name="maps[]"accept="image/*" class="myfrm form-control">
                                                    <div class="input-group-btn"> 
                                                    <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-12 mt-4">
                                                <label for="product">Image Gallery</label>
                                                <div class="input-group hdtutoo control-group lst incrementt" >
                                                    <input type="file" name="imagegallery[]" accept="image/*" class="myfrm form-control">
                                                    <div class="input-group-btn"> 
                                                        <button class="btn btn-success  image-galley" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="clonei hide col-12">
                                                <div class="hdtutoo control-group lst input-group" style="margin-top:10px">
                                                    <input type="file" name="imagegallery[]" accept="image/*"class="myfrm form-control">
                                                    <div class="input-group-btn"> 
                                                    <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i>Remove</button>
                                                </div>
                                                </div>
                                            </div>


                                            <div class="form-group col-12 mt-4">
                                                <label for="product">Upload Document</label>
                                                <div class="input-group hdtutoo control-group lst incrementd" >
                                                    <input type="file" name="uploadcocument[]" accept="application/pdf"class="myfrm form-control">
                                                    <div class="input-group-btn"> 
                                                        <button class="btn btn-success  upload-document" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cloned hide col-12">
                                                <div class="hdtutoo control-group lst input-group" style="margin-top:10px">
                                                    <input type="file" name="uploadcocument[]"accept="application/pdf" class="myfrm form-control">
                                                    <div class="input-group-btn"> 
                                                    <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i>Remove</button>
                                                </div>
                                                </div>
                                            </div>


                                            <div class="form-group col-12 mt-4">
                                                <label for="product">Video Gallery</label>
                                                <div class="input-group hdtutoo control-group lst incrementv" >
                                                    <input type="file" name="galleryviedo[]"accept="video/mp4,video/x-m4v,video/*" class="myfrm form-control">
                                                    <div class="input-group-btn"> 
                                                        <button class="btn btn-success  galleryviedo" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="clonev hide col-12">
                                                <div class="hdtutoo control-group lst input-group" style="margin-top:10px">
                                                    <input type="file" name="galleryviedo[]"accept="video/mp4,video/x-m4v,video/*" class="myfrm form-control">
                                                    <div class="input-group-btn"> 
                                                    <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i>Remove</button>
                                                </div>
                                                </div>
                                            </div>
                                           


                                       

                                                <div class="row mb-3">
                                                   <div class="col-md-12">
                                                       <h5>Faq</h5>
                                                   <table class="table table-bordered" id="dynamicTablefaq">  
                                                    <tr>
                                                                    <th>Question</th>
                                                                    <th>Answer </th>
                                                                   
                                                                    
                                                                </tr>
                                                                @php $tenary=DB::table('faqs')->where('trip_id',$trip->id)->get(); @endphp
                                                                @php $k=1; @endphp
                                                                @foreach($tenary as $key=>$tenarys)
                                                                @if($k==1)
                                                                <tr>  
                                                                    <td>
                                                                        <textarea type="text"name="question[]"class="form-control"required>{{$tenarys->question}}</textarea>
                                                                    </td>  
                                                                    <td>
                                                                        <textarea type="text"name="answer[]"class="form-control"required>{{$tenarys->answer}}</textarea>
                                                                    </td>
                                                              
                                                
                                                                    <td><button type="button" name="add" id="addfaq" style="background-color:#9d27b1!important; color:white;" class="btn btn-success" >Add More</button></td>  
                                                                </tr>  

                                                                @else
                                                                <tr>  
                                                                    <td>
                                                                        <textarea type="text"name="question[]"class="form-control"required>{{$tenarys->question}}</textarea>
                                                                    </td>  
                                                                    <td>
                                                                        <textarea type="text"name="answer[]"class="form-control"required>{{$tenarys->answer}}</textarea>
                                                                    </td>
                                                              
                                                
                                                                    <td><button type="button" data-id="{{$k}}" class="btn btn-danger remove-tr">Remove</button></td> 
                                                                </tr>  
                                                                
                                                                
                                                                </tr> 
                                                                @endif
                                                                @php $k++; @endphp

                                                                @endforeach 
                                                            </table> 
                                                    </div>
                                                </div>
                                        
                                        </div>

                                        
                                      

                                         
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                       
                                    </form>                                           
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!-- container -->
                @endsection
    <!-- jQuery -->
    @push('script_4')
        <!-- <script type="text/javascript">
            $(document).ready(function() {
            $(".btn-success").click(function(){ 
                var lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
            });
            $("body").on("click",".btn-danger",function(){ 
                $(this).parents(".hdtuto").remove();
            });
            });
        </script> -->
        <script>
                CKEDITOR.replace( 'editor1' );
        </script>
        <script>
                CKEDITOR.replace( 'editor2' );
        </script>
         <script>
                CKEDITOR.replace( 'editor3' );
        </script>
         <script>
                CKEDITOR.replace( 'editor4' );
        </script>
         <script>
                CKEDITOR.replace( 'editor5' );
        </script>
         <script>
                CKEDITOR.replace( 'editor6' );
        </script>
         <script>
                CKEDITOR.replace( 'editor7' );
        </script>
         <script>
                CKEDITOR.replace( 'editor8' );
        </script>
         <script>
                CKEDITOR.replace( 'editor9' );
        </script>
        <script>
                CKEDITOR.replace( 'editor10' );
        </script>
        <script>
                CKEDITOR.replace( 'editor11' );
        </script>
        <script>
                CKEDITOR.replace( 'editor12' );
        </script>
        <script>
                CKEDITOR.replace( 'editor13' );
        </script>
         <script>
                CKEDITOR.replace( 'editor14' );
        </script>
        <script>
                CKEDITOR.replace( 'editor15' );
        </script>
        <script>
                CKEDITOR.replace( 'editor16' );
        </script>

<script type="text/javascript">
        var i=1;
       
        $("#add").click(function(){
            ++i;
            $("#dynamicTable").append('<tr><td><input type="text"name="day[]"class="form-control"required></td><td><input type="text"name="description[]"class="form-control"required></td><td><button type="button" data-id="'+i+'" class="btn btn-danger remove-tr">Remove</button></td></tr>');
            });
        
            $(document).on('click', '.remove-tr', function(){  
            $(this).parents('tr').remove();
            });  
   
</script>


<script type="text/javascript">
        var i=1;
       
        $("#addfaq").click(function(){
            ++i;
            $("#dynamicTablefaq").append('<tr><td><textarea type="text"name="question[]"class="form-control"required></textarea></td><td><textarea type="text"name="answer[]"class="form-control"required></textarea></td><td><button type="button" data-id="'+i+'" class="btn btn-danger remove-trfaq">Remove</button></td></tr>');
            });
        
            $(document).on('click', '.remove-trfaq', function(){  
            $(this).parents('tr').remove();
            });  
   
</script>

<script type="text/javascript">
    $(document).ready(function() {
      $(".map").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto").remove();
      });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
      $(".image-galley").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".incrementt").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtutoo").remove();
      });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
      $(".image-video").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".incrementv").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtutov").remove();
      });
    });
</script>
@endpush
    
