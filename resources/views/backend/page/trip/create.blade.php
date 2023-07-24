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
                                    <h4 class="card-title">Add Trip</h4>
                                    
                                </div><!--end card-header-->
                                <div class="card-body">
                                       
                                @if (count($errors) > 0)
                                    <div class = "alert alert-danger">
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                    <form method="post"action="{{route('admin.trip.store')}}"enctype="multipart/form-data">
                                        @csrf
                                         <div class="row">

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Travel Group</label>
                                                <select class="form-control" style="width: 100%" name="travelgroupname" data-placeholder="Choose"required>
                                                <option value="">Travel Group</option>
                                                @php $travelgroup=DB::table('users')->where('type',1)->get(); @endphp
                                                @foreach($travelgroup as $key=>$travelgroups)
                                                <option value="{{$travelgroups->id}}">{{$travelgroups->name}}</option>
                                                @endforeach
                                               </select>
                                                
                                            </div>
                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Type</label>
                                                <select class="select2 mb-3 select2-multiple" style="width: 100%" multiple="multiple"name="type[]" data-placeholder="Choose"required>
                                                <option value="">Choose Type</option>
                                                @foreach($type as $key=>$types)
                                                <option value="{{$types->id}}">{{$types->title}}</option>
                                                @endforeach
                                               </select>
                                                
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Area Type</label>
                                                <select class="select2 mb-3"name="areatype" style="width: 100%" data-placeholder="Choose"required>
                                                <option value="">Choose Area Type</option>
                                                @foreach($areatype as $key=>$areatypes)
                                                <option value="{{$areatypes->id}}">{{$areatypes->title}}</option>
                                                @endforeach
                                                </select>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Location Type</label>
                                                <select class="select2 mb-3 select2-multiple" style="width: 100%" multiple="multiple" name="locationtype[]" data-placeholder="Choose"required>
                                                <option value="">Choose Location Type</option>
                                                @foreach($locationtype as $key=>$locationtypes)
                                                <option value="{{$locationtypes->id}}">{{$locationtypes->title}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Special Feature</label>
                                                <select class="select2 mb-3 select2-multiple"name="specialfeature[]" style="width: 100%" multiple="multiple" data-placeholder="Choose"required>
                                                <option value="">Choose Special Feature</option>
                                                @foreach($specialfeature as $key=>$specialfeatures)
                                                <option value="{{$specialfeatures->id}}">{{$specialfeatures->title}}</option>
                                                @endforeach
                                                                                                                        
                                               </select>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Pricing</label>
                                                <input type="number"name="pricing"value="{{ old('pricing')}}"class="form-control"required>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Name</label>
                                                <input type="text"name="name"value="{{ old('name')}}"class="form-control"required>
                                            </div>


 
                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Pricing Description</label>
                                               <textarea name="pricingdescription"class="form-control"required></textarea>
                                            </div>

                                           <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Discounts Type</label>
                                                <select class="form-control"name="discounttype"required>
                                                    <option value="">Choose Discounts Type</option>
                                                    <option value="Flat">Flat</option>
                                                    <option value="Percentage">Percentage</option>
                                                </select>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Discounts</label>
                                                <input type="text"name="discount"value="{{ old('discount')}}"class="form-control"required>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Offer</label>
                                                <input type="text"name="offer"value="{{ old('offer')}}"class="form-control"required>
                                            </div>
                                           
                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Region</label>
                                                <input type="text"name="region"value="{{ old('region')}}"class="form-control"required>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Location</label>
                                                <input type="text"name="location"value="{{ old('location')}}"class="form-control"required>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Duration</label>
                                                <input type="text"name="duration"value="{{ old('duration')}}"class="form-control"required>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Description (Why this)</label>
                                                <textarea name="descriptionwhythis"class="form-control"required></textarea>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Description (Short)</label>
                                                <textarea name="descriptionshort"class="form-control"required></textarea>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Description (Long)</label>
                                                <textarea name="descriptionlong"class="form-control"required></textarea>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Airport</label>
                                                <input type="text"name="airport"value="{{ old('airport')}}"class="form-control"required>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Railway</label>
                                                <input type="text"name="railway"value="{{ old('railway')}}"class="form-control"required>
                                            </div> 

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Best Season</label>
                                                <input type="text"name="bestseason"value="{{ old('bestseason')}}"class="form-control"required>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                 <label class="form-label" for="exampleInputEmail1">Meals</label>
                                                <textarea class="form-control"id="editor1"name="meals"required></textarea>
                                            </div>
 
                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Stay</label>
                                                <textarea class="form-control"id="editor2"name="stay"required></textarea>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Who Can Participate</label>
                                                <textarea class="form-control"id="editor3"name="whocanparticipate"required></textarea>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">How to reach (Pick Up)</label>
                                                <textarea class="form-control"id="editor4"name="how_to_reach_pickup"required></textarea>
                                               
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">How to Reach  (Drop Off)</label>
                                               <textarea class="form-control"id="editor5"name="how_to_reach_dropoff"required></textarea>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">How to Reach (Notes)</label>
                                               
                                                <textarea class="form-control"id="editor6"name="how_toreach_notes"required></textarea>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Cost Terms (Inclusion)</label>
                                                <textarea class="form-control"id="editor7"name="cost_terms_inclusion"required></textarea>
                                              
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Cost Terms (Exclusion)</label>
                                                <textarea class="form-control"id="editor8"name="cost_terms_exclusion"required></textarea>
                                               
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Cost Terms (Notes)</label>
                                                <textarea class="form-control"id="editor9"name="cost_terms_notes"required></textarea>
                                               
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Cost Terms (Cancellation Policy)</label>
                                                <textarea class="form-control"id="editor10"name="cost_terms_cancellation_policy"required></textarea>
                                                
                                            </div>
                                            
                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Documents Needed</label>
                                                <textarea class="form-control"id="editor11"name="documents_needed"required></textarea>
                                               
                                            </div>
                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Terms & Condition</label>
                                                <textarea class="form-control"id="editor12"name="terms_condition"required></textarea>
                                             
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Gear & Cloths</label>
                                               
                                                <textarea class="form-control"id="editor13"name="gear_cloths"required></textarea>
                                            </div> 

                                          <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Fitness</label>
                                                <textarea class="form-control"id="editor14"name="fitness"required></textarea>
                                               
                                            </div>

                                            <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Trip Slot</h4>
                                   
                                </div>
                                <div class="card-body">
                                    <div class="form-material">
                                       
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="my-3">Start Date</label>
                                                <input type="date"name="start_date" class="form-control"required>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="my-3">Booking Start Date</label>
                                                <input type="date"name="booking_start_date" class="form-control"required>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="my-3">Booking End Date</label>
                                                <input type="date"class="form-control"name="booking_end_date"required>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="my-3">Number of Booking Available</label>
                                                <input type="text" name="number_of_booking_available" class="form-control"  required>
                                            </div>
                                        </div>
                                    </div>       
                                </div>
                            </div>                               
                        </div> 

                                           <div class="form-group col-12">
                                                <label for="product">Feature Image</label>
                                                <div class="input-group hdtuto control-group lst increment" >
                                                    <input type="file" name="featureimage"accept="image/*" class="myfrm form-control"required>
                                                </div>
                                            </div>


                                            <div class="form-group col-12">
                                                <label for="product">Map Image</label>
                                                <div class="input-group hdtuto control-group lst increment" >
                                                    <input type="file" name="maps[]"accept="image/*" class="myfrm form-control"required>
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
                                                    <input type="file" name="imagegallery[]" accept="image/*" class="myfrm form-control"required>
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
                                                    <input type="file" name="uploadcocument[]" accept="application/pdf"class="myfrm form-control"required>
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
                                                    <input type="file" name="galleryviedo[]"accept="video/mp4,video/x-m4v,video/*" class="myfrm form-control"required>
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
                                                            <tr>  
                                                                    <td>
                                                                        <textarea type="text"name="question[]"class="form-control"required></textarea>
                                                                    </td>  
                                                                    <td>
                                                                        
                                                                        <textarea class="form-control"name="answer[]"></textarea>
                                                                    </td>
                                                              
                                                
                                                                    <td><button type="button" name="add" id="addfaq" style="background-color:#9d27b1!important; color:white;" class="btn btn-success" >Add More</button></td>  
                                                                </tr>  
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
            $("#dynamicTable").append('<tr><td><input type="text"name="day[]"class="form-control"required></td><td><textarea type="text"name="description[]"id="editor17"class="form-control"required></textarea></td><td><button type="button" data-id="'+i+'" class="btn btn-danger remove-tr">Remove</button></td></tr>');
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
          var lsthmtl = $(".clonei").html();
          $(".incrementt").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtutoo").remove();
      });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
      $(".galleryviedo").click(function(){ 
          var lsthmtl = $(".clonev").html();
          $(".incrementv").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtutov").remove();
      });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
      $(".upload-document").click(function(){ 
          var lsthmtl = $(".cloned").html();
          $(".incrementd").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtutod").remove();
      });
    });
</script>
@endpush
    
