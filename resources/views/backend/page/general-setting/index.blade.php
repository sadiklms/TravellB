
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
                                    <h4 class="card-title">Genearal Setting</h4>
                                    
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <form method="post"action="{{route('admin.general-setting.store')}}"enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                        <div class="col-xl-6 mb-4">
                                            <label class="form-label" for="exampleInputEmail1">Website Name</label>
                                            <input type="text"name="website_title"value="{{@$genralsetting->website_title}}"class="form-control">
                                            
                                        </div>

                                        <div class="col-xl-6 mb-4">
                                            <label class="form-label" for="exampleInputEmail1">Phone</label>
                                            <input type="text"name="phone"value="{{@$genralsetting->phone}}"class="form-control">
                                            
                                        </div>
                                     </div>

                                     <div class="row">
                                        <div class="col-xl-6 mb-4">
                                            <label class="form-label" for="exampleInputEmail1">Email</label>
                                            <input type="text"name="email"value="{{@$genralsetting->email}}"class="form-control">
                                            
                                        </div>

                                        <div class="col-xl-6 mb-4">
                                            <label class="form-label" for="exampleInputEmail1">Address</label>
                                            <input type="text"name="address"value="{{@$genralsetting->address}}"class="form-control">
                                            
                                        </div>

                                      </div>

                                      <div class="row">

                                        <div class="col-xl-6 mb-4">
                                            <label class="form-label" for="exampleInputEmail1">Help Phone</label>
                                            <input type="text"name="help_phone"value="{{@$genralsetting->help_phone}}"class="form-control">
                                            
                                        </div>


                                        <div class="col-xl-6 mb-4">
                                            <label class="form-label" for="exampleInputEmail1">Help Email</label>
                                            <input type="text"name="help_email"value="{{@$genralsetting->help_email}}"class="form-control">
                                            
                                        </div>

                                        </div>


                                       
                                        <div class="col-xl-6S mb-4">
                                            <label class="form-label" for="exampleInputEmail1">Help Address</label>
                                            <input type="text"name="help_address"value="{{@$genralsetting->help_address}}"class="form-control">
                                            
                                        </div>

                                      <div class="row">
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Logo</h4>
                                   
                                                </div><!--end card-header-->
                                                <div class="card-body">
                                                <input type="file" id="input-file-now"name="logo" class="dropify" data-default-file="{{URL::to('/')}}/backend/image/general-setting/{{@$genralsetting->logo}}" />                                                     
                                                </div><!--end card-body-->
                                            </div><!--end card-->
                                        </div><!--end col-->


                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Favicone</h4>
                                   
                                                </div><!--end card-header-->
                                                <div class="card-body">
                                                <input type="file" id="input-file-now"name="favicon" class="dropify" data-default-file="{{URL::to('/')}}/backend/image/general-setting/{{@$genralsetting->favicon}}" />                                                     
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

           