
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
                                    <h4 class="card-title">Term Condition</h4>
                                    
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <form method="post"action="{{route('admin.term-condition.store')}}"enctype="multipart/form-data">
                                        @csrf
                                        
                                        <div class="col-xl-12 mb-4">
                                            <label class="form-label" for="exampleInputEmail1">Description</label>
                                            <textarea name="title"id="editor1"class="form-control"required>{{@$termcondition->title}}</textarea>
                                            
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

           