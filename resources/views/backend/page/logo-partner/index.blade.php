
@extends('backend.layout.index')
@section('content')
 <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="page-title">Logo Partner</h4>
                                       
                                    </div><!--end col-->
                                    <div class="col-auto align-self-center">
                                   
                                        <div class="nav-link">
                                            <a class=" btn btn-sm btn-soft-primary" href="{{url('admin/logo-partner/create')}}" role="button"><i class="fas fa-plus me-2"></i>Add Logo Partner</a>
                                        </div>                                
                         
                                        
                                    </div><!--end col-->  
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">View Banner</h4>
                                    
                                </div><!--end card-header-->
                                <div class="card-body">  
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Picture</th>
                                           <th>Action</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($logo as $key=>$logos)
                                            <tr>
                                                <td>{{++$key}}</td>
                                               
                                                <td><img src="{{URL::to('/')}}/backend/image/logo/{{$logos->image}}"style="width:50px;height:50px;"></td>
                                                <td>
                                                <a href="{{url('admin/logo-partner/edit',$logos->id)}}"class="btn btn-info">
                                                    <i class="dripicons-document-edit" style="font-size:20px;"></i>
                                                </a>

                                                <a href="{{url('admin/logo-partner/delete',$logos->id)}}"class="btn btn-danger">
                                                    <i class="dripicons-trash" style="font-size:20px;"></i>
                                                </a>
                                                     
                                                 </td>
                                            </tr>
                                        @endforeach
                                     </tbody>
                                    </table>        
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div><!-- container -->

@endsection
