
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
                                    <h4 class="card-title">Add Coupon</h4>
                                    
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <form method="post"action="{{route('admin.coupon.store')}}"enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Code</label>
                                                <input type="text"name="code" class="form-control"placeholder="Enter code"required>
                                                
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Title</label>
                                                <input type="text"name="title"class="form-control"placeholder="Enter title"required>
                                                
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Discount Type</label>
                                                <select name="discount_type"class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;"required>
                                                   <option value="">Choose Coupon Type</option>
                                                    <option value="Flat">Flat</option>
                                                    <option value="Percentage">Percentage</option>
                                               </select>
                                            </div>

                                            <div class="col-xl-6 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Discount</label>
                                                <input type="text"name="discount" class="form-control"placeholder="Enter discount"required>
                                                
                                            </div>
                                        </div>

                                        <div class="col-xl-12 mb-4">
                                                <label class="form-label" for="exampleInputEmail1">Description</label>
                                                
                                                <textarea class="form-control"name="description" rows="5" id="message"required></textarea>
                                                
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

           