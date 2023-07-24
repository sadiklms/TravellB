
           @extends('backend.layout.index')
           @section('content')
           <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Day</h4>
                                    
                                </div><!--end card-header--> 
                                <div class="card-body">
                                    <form method="POST"action="{{route('admin.itenary.update',$itenary->id)}}"enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mb-3">

                                    <div class="col-md-6">
                                        <label>Trip</label>
                                        <select name="trip_id" class="form-control"required>
                                           
                                            <option value="">Choose  Trip</option>
                                            @php $trip=DB::table('trips')->get(); @endphp
                                            @foreach($trip as $trips)
                                            <option value="{{$trips->id}}"@if($trips->id==$itenary->trip_id) Selected  @endif>{{$trips->name}}</option>
                                            @endforeach
                                        
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Day</label>
                                        <input type="text"name="day"value="{{$itenary->day}}"class="form-control"required>
                                    </div>

                                    <div class="col-md-12">
                                        <label>Description</label>
                        <textarea type="text"name="description"id="editor1"class="form-control"required>{{$itenary->description}}</textarea>
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

                @push('script_3')
                <script>
                CKEDITOR.replace( 'editor1' );
                 </script>

                @endpush



            