
@extends('backend.layout.index')
@section('content')
<style>
    ul li {
        display:inline;

    }
</style>
 <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="page-title">View Trip</h4>
                                       
                                    </div><!--end col-->
                                    <div class="col-auto align-self-center">
                                   
                                        <div class="nav-link">
                                            <a class=" btn btn-sm btn-soft-primary" href="{{url('admin/trip/create')}}" role="button"><i class="fas fa-plus me-2"></i>Add New Trip</a>
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
                                    <h4 class="card-title">View Trip</h4>
                                    
                                </div><!--end card-header-->
                                <div class="card-body">  
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Trip </th>
                                            <th>Region</th>
                                            <th>Location</th>
                                            <th>Pricing</th>
                                            <th>Offer</th>
                                           
                                            <th>Recommended</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($trip as $key=>$trips)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>
                                                <ul>
                                                    <li><img src="{{URL::to('/')}}/backend/image/trip/{{$trips->featureimage}}"width="50px"class="rounded-circle"></li>    
                                                <li>{{$trips->name}}</li>
                                               </ul>
                                                
                                            </td>
                                                <td>{{$trips->region}}</td>
                                                <td>{{$trips->location}}</td>
                                                <td>{{$trips->pricing}}</td>
                                                <td>{{$trips->offer}}</td>
                                                
                                              @php  $recommended = array("Not Recommended"=>"0","Recommended"=>"1"); @endphp
                                                    <!-- <select class="form-control"id="recommended"> -->
                                                    <select  name="recommended" class="form-control recommended"dataa-id="{{$trips->id}}">

                                                        @foreach($recommended as $key=>$recommendeds)
                                                        <option value="{{$recommendeds}}"@if($recommendeds==$trips->recommended) selected @endif >{{$key}}</option>
                                                       
                                                        @endforeach
                                                    </select>
                                                </td>
                                                </td>
                                               
                                                <td>
                                                <form action="{{ route('admin.trip.destroy',$trips->id) }}" method="POST">
                                                      <a href="{{ route('admin.trip.edit',$trips->id) }}"class="btn btn-info"><i class="dripicons-document-edit"style="font-size:20px;"></i></a>
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

<script>
  $( document ).ready(function(){
  $('.recommended').on('change',function(){
  var id=$(this).attr('dataa-id');
  var recommended = this.value;
  $.ajax({
  url:"{{route('admin.trip-recommended')}}",
        type: "POST",
        data: {
            id: id,
            recommended: recommended,
            _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            success: function (response) {
            window.location.reload();
            }
        });
  });
  });
</script>
@endpush