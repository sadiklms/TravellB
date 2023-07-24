
@extends('frontend.layout.index')
@section('content')
   <!-- Main Content -->
    <main id="rlr-main" class="rlr-main--fixed-top">
      <div class="rlr-section__content--md-top">
        <div class="rlr-section rlr-section__my">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 rlr-sidebar-menu__mobile">
                <select class="rlr-sidebar-menu__sub-menu rlr-form-select" id="rlr-js-sub-menu" name="rlr-sub-menu">
                <option value="{{url('user/profile')}}">Dashboard</option>
                    @php $type= Auth::user()->type; @endphp
                      @if($type==1)
                    <option value="{{url('viewtrip')}}">Manage Trip</option>
                    @endif

                    @php $type= Auth::user()->type; @endphp
                      @if($type==1)
                    <option value="{{url('day')}}">Manage Day</option>
                    @endif

                    @php $type= Auth::user()->type; @endphp
                      @if($type==1)
                    <option value="{{url('booking')}}">Manage Booking</option>
                    @endif

                    @php $type= Auth::user()->type; @endphp
                      @if($type==0)
                    <option value="{{url('booking')}}">Manage Order</option>
                    @endif
                    <option value="{{url('user/logout')}}">Logout</option>
                </select>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <aside class="rlr-sidebar-menu col-lg-3 col-xs-12 mb-5">
                <div class="rlr-sidebar-menu__wrapper">
                  <nav class="rlr-sidebar-menu">
                    <ul class="rlr-sidebar-menu__desktop">
                      <li>
                        <a class="rlr-sidebar-menu__link" href="my-account-pages--dashboard.html">
                          <span class="rlr-sidebar-menu__link-icon"><i class="rlr-icon-font flaticon-carbon-dashboard"> </i></span>
                          Dashboard
                        </a>
                      </li>
              
                      @php $type= Auth::user()->type; @endphp
                      @if($type==1)
                      <li>
                        <a class="rlr-sidebar-menu__link" href="{{url('viewtrip')}}">
                          <span class="rlr-sidebar-menu__link-icon"><i class="rlr-icon-font flaticon-carbon-user"> </i></span>
                          Manage Trip
                        </a>
                      </li>
                      @endif

                      @php $type= Auth::user()->type; @endphp
                      @if($type==1)
                      <li>
                        <a class="rlr-sidebar-menu__link" href="{{url('day')}}">
                          <span class="rlr-sidebar-menu__link-icon"><i class="rlr-icon-font flaticon-carbon-user"> </i></span>
                          Manage Day
                        </a>
                      </li>
                      @endif

                      @php $type= Auth::user()->type; @endphp
                      @if($type==1)
                      <li>
                        <a class="rlr-sidebar-menu__link" href="{{url('booking')}}">
                          <span class="rlr-sidebar-menu__link-icon"><i class="rlr-icon-font flaticon-carbon-user"> </i></span>
                          Manage Booking
                        </a>
                      </li>
                      @endif

                      @php $type= Auth::user()->type; @endphp
                      @if($type==0)
                      <li>
                        <a class="rlr-sidebar-menu__link" href="{{url('booking')}}">
                          <span class="rlr-sidebar-menu__link-icon"><i class="rlr-icon-font flaticon-carbon-user"> </i></span>
                          Manage order
                        </a>
                      </li>
                      @endif

                     
                      <li>
                        <a class="rlr-sidebar-menu__link" href="{{url('user/logout')}}">
                          <span class="rlr-sidebar-menu__link-icon"><i class="rlr-icon-font flaticon-carbon-logout"> </i></span>
                          Logout
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </aside>
              <div class="content col-lg-9 col-xs-12">

              <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                   
                                    <div class="col-auto align-self-center">
                                   
                                   
                                        
                                    </div><!--end col-->  
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div>

              <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
                
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
                                        <td><a href="{{url('backend/image/companion',$companyinfos->document)}}"><img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg"width="30px;"></a></td>
                                      </tr>
                                      @endforeach

                                    
                                   
                                    </tbody>
                                  </table>
                                   </div>
                                  </div>
                                  </div>
                                </div>
            @endsection
