
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
                                    <h4 class="card-title">Add Banner</h4>
                                    
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <form method="post"action="{{route('admin.banner.store')}}"enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Type</label>
                                                <select name="type"id="type"class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;"required>
                                                <option value="">Choose </option>
                                                <option value="1">Type</option>
                                                <option value="2">Area Type</option>
                                                <option value="3">Location Type</option> 
                                                
                                                <option value="4">Special Feature</option>                                                                         
                                               </select>
                                                
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Title</label>
                                                <select name="section"id="section"class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;"required>
                                                
                                               
                                                                                                                      
                                               </select>
                                            </div>

                                        
                                        </div>

                                        
                                        <div class="col-xl-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Image</h4>
                                   
                                                </div><!--end card-header-->
                                                <div class="card-body">
                                                    <input type="file" id="input-file-now" name="image" class="dropify" /required>                                                   
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

                @push('script_3')
                <script>
                $(document).ready(function(){
                $('#type').on('change',function(){
                var type= $(this).val();
                $.ajax({
                url:"{{route('admin.banner-type')}}",
                type: "POST",
                data: {
                type: type,
                _token: '{{csrf_token()}}' 
                },
                dataType : 'json',
                success: function (result) {
                console.log(result);
                $('#section').html('<option value="">Choose Section</option>'); 
                $.each(result.type,function(key,value){
                $("#section").append('<option value="'+value.id+'">'+value.title+'</option>');
                });
                }
                });
                });
                });
                </script>
                @endpush

           