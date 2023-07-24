
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
                                    <h4 class="card-title">information</h4>
                                    
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <form method="post"action="{{route('admin.information.update',@$information->id)}}"enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            

                                        <div class="col-xl-12 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Support Email</label>
                                                
                                                <input type="text"class="form-control"value="{{@$information->supportemail}}"name="supportemail">
                                                
                                        </div>

                                        <div class="col-xl-12 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">About Us</label>
                                                
                                                <textarea class="form-control"name="aboutus"id="editor1" rows="5" id="message">{{@$information->aboutus}}</textarea>
                                                
                                        </div>

                                        <div class="col-xl-12 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Terms & Condition</label>
                                                
                                                <textarea class="form-control"name="termscondition"id="editor2" rows="5" id="message">{{@$information->termscondition}}</textarea>
                                                
                                        </div>

                                        <div class="col-xl-12 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Privacy Policy</label>
                                                
                                                <textarea class="form-control"name="privacypolicy" id="editor3"rows="5" id="message"> {{@$information->privacypolicy}}</textarea>
                                                
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
                <script>
                        CKEDITOR.replace( 'editor2' );
                </script>
                <script>
                        CKEDITOR.replace( 'editor3' );
                </script>
                <script>
                        CKEDITOR.replace( 'editor4' );
                </script>
                @endsection

              
      
           