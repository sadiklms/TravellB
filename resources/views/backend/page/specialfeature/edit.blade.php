
           @extends('backend.layout.index')
           @section('content')
            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Special Feature</h4>
                                    
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <form method="POST"action="{{route('admin.specialfeature.update',$specialfeature->id)}}"enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-xl-6 mb-4">
                                            <label class="form-label" for="exampleInputEmail1">Title</label>
                                            <input type="text"name="title"value="{{$specialfeature->title}}" class="form-control">
                                            
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Picture Upload</h4>
                                   
                                                </div><!--end card-header-->
                                                <div class="card-body">
                                                <input type="file" id="input-file-now"name="picture" class="dropify" data-default-file="{{URL::to('/')}}/backend/image/specialfeature/{{$specialfeature->picture}}" />
                                                    <!-- <input type="file" id="input-file-now" name="picture" class="dropify" />                                                    -->
                                                </div><!--end card-body-->
                                            </div><!--end card-->
                                        </div><!--end col-->

                                         
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                       
                                    </form>                                           
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!-- container -->
                @endsection

           