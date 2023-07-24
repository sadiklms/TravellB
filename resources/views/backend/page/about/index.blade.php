
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
                                    <h4 class="card-title">About</h4>
                                    
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <form method="post"action="{{route('admin.about.store')}}"enctype="multipart/form-data">
                                        @csrf
                                        
                                        <div class="col-xl-12 mb-12">
                                            <label class="form-label" for="exampleInputEmail1">Title</label>
                                            <textarea name="title"id="editor1"class="form-control "required>{{$about->title}}</textarea>
                                            
                                        </div>

                                        <div class="row mt-4">
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Sidebar image</h4>
                                   
                                                </div><!--end card-header-->
                                                <div class="card-body">
                                                <input type="file" id="input-file-now"name="picture" class="dropify" data-default-file="{{URL::to('/')}}/backend/image/about/{{$about->image}}" />                                                     
                                                </div><!--end card-body-->
                                            </div><!--end card-->
                                        </div><!--end col-->

                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Banner image</h4>
                                   
                                                </div><!--end card-header-->
                                                <div class="card-body">
                                                <input type="file" id="input-file-now"name="bannerpicture" class="dropify" data-default-file="{{URL::to('/')}}/backend/image/about/{{$about->bannerimage}}" />                                                     
                                                </div><!--end card-body-->
                                            </div><!--end card-->
                                        </div><!--end col-->
                                          </div>

                                          
                                         
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                       
                                    </form>                                           
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!-- container -->

                <script>
                CKEDITOR.replace( 'editor1' );
                </script>
                @endsection

           