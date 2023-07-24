
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
                                        <h4 class="page-title">View Special Feature</h4>
                                       
                                    </div><!--end col-->
                                    <div class="col-auto align-self-center">
                                   
                                        <div class="nav-link">
                                            <a class=" btn btn-sm btn-soft-primary" href="{{url('admin/specialfeature/create')}}" role="button"><i class="fas fa-plus me-2"></i>Add Special Feature</a>
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
                                    <h4 class="card-title">View Special Feature</h4>
                                    
                                </div><!--end card-header-->
                                <div class="card-body">  
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Picture</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($specialfeature as $key=>$specialfeatures)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$specialfeatures->title}}</td>
                                                <td><img src="{{URL::to('/')}}/backend/image/specialfeature/{{$specialfeatures->picture}}"style="width:50px;height:50px;"></td>
                                                <td> 
                                                <form action="{{ route('admin.specialfeature.destroy',$specialfeatures->id) }}" method="POST">
                                                      <a href="{{ route('admin.specialfeature.edit',$specialfeatures->id) }}"class="btn btn-info"><i class="dripicons-document-edit"style="font-size:20px;"></i></a>
                                                    @csrf
                                                @method('DELETE')
        
                                            <button type="submit" class="btn btn-danger"><i class="dripicons-trash"style="font-size:20px;"></i></button>
                                            </form>
                                                     
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




@push('script_2')
 <!-- Required datatable js -->
 <script src="{{url('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('backend/plugins/datatables/dataTables.bootstrap5.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{url('backend/plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('backend/plugins/datatables/buttons.bootstrap5.min.js')}}"></script>
        <script src="{{url('backend/plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{url('backend/plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{url('backend/plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{url('backend/plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{url('backend/plugins/datatables/buttons.print.min.js')}}"></script>
        <script src="{{url('backend/plugins/datatables/buttons.colVis.min.js')}}"></script>
        <!-- Responsive examples -->
        <script src="{{url('backend/plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{url('backend/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{url('backend/assets/pages/jquery.datatable.init.js')}}"></script>
@endpush