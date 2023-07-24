
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
                                        <h4 class="page-title">View Booking</h4>
                                       
                                    </div><!--end col-->
                                    <div class="col-auto align-self-center">
                                   
                                                                     
                         
                                        
                                    </div><!--end col-->  
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <div class="row">
                        <div class="col-12">
                        <div class="card">
                                <div class="card-header">
                                   <h6 class="card-title">Person Details</h6>   
                                </div><!--end card-header-->
                                <div class="card-body"> 

                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class=""> 
                                            <label>Name: {{$booking->username}}</label>
                                            
                                        </div>

                                        <div class="trip-detail"> 
                                            <label>Email: {{$booking->email}}</label>
                                            
                                        </div>
                                        </div>


                                        <div class="col-md-6">
                                       

                                        <div class="trip-detail"> 
                                            <label>City :{{$booking->username}}</label>
                                            
                                        </div>

                                        <div class="trip-detail"> 
                                            <label>Address : {{$booking->username}}</label>
                                            
                                        </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <div class="card mt-4">
                                <div class="card-header">
                                   <h6 class="card-title">Trip Details</h6>   
                                </div><!--end card-header-->
                                <div class="card-body"> 

                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="trip-detail"> 
                                            <label>Trip Name: {{$booking->tripname}}</label>
                                            
                                        </div>

                                        <div class="trip-detail"> 
                                            <label>Price: {{$booking->pricing}}</label>
                                            
                                        </div>

                                        <div class="trip-detail"> 
                                            <label>Duration : {{$booking->duration}}</label>
                                            
                                        </div>

                                        <div class="trip-detail"> 

                                        @php $specialfeature=json_decode($booking->specialfeature); @endphp

                                        <label>Special Feature :
                                            
                                        @foreach($specialfeature as $specialfeatures) 
                                       @php $special_feature=DB::table('specialfeatures')->where('id',$specialfeature)->first(); @endphp
                                        {{$special_feature->title}}
                                        @endforeach</label>
                                            
                                        </div>
                                        </div>


                                        <div class="col-md-6">

                                        <div class="trip-detail"> 
                                            <label>Booking id : {{$booking->location}}</label>
                                            
                                        </div>

                                        <div class="trip-detail"> 
                                            <label>Booking Date: {{$booking->bookingdate}}</label>
                                        </div>

                                        <div class="trip-detail"> 
                                            <label>Booking Fordate: {{$booking->bookingfordate}}</label>
                                        </div>

                                        <div class="trip-detail"> 
                                            <label>Region : {{$booking->region}}</label>
                                            
                                        </div>
                                        
                                        <div class="trip-detail"> 
                                            <label>Location : {{$booking->location}}</label>
                                            
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                <div class="card mt-4">
                                <div class="card-header">
                                   <h6 class="card-title">companion Details</h6>   
                                </div><!--end card-header-->
                                <div class="card-body"> 
                                  <div class="row">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                       
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Document</th>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @php  $companyinfo=DB::table('companyinfos')->where('bookingid',$booking->id)->get(); @endphp
                                      @foreach($companyinfo as $companyinfos)
                                      <tr>
                                        
                                       
                                        <td>{{$companyinfos->name}}</td>
                                        <td>{{$companyinfos->email}}</td>
                                        <td>{{$companyinfos->phone}}</td>
                                        <td>{{$companyinfos->age}}</td>
                                        <td>{{$companyinfos->gender}}</td>
                                        <td><a href="{{url('backend/image/companion',$companyinfos->document)}}"><i class="fa-solid fa-file"></i></a></td>
                                      </tr>
                                      @endforeach
                                     
                                    </tbody>
                                  </table>
                                   </div>
                                  </div>
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