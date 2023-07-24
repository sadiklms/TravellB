
@extends('frontend.layout.index')
@section('content')
<!-- <link href="http://127.0.0.1:8000/backend/plugins/dropify/css/dropify.min.css" rel="stylesheet">
 
<link href="http://127.0.0.1:8000/backend/plugins/datatables/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="http://127.0.0.1:8000/backend/plugins/datatables/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
     
<link href="http://127.0.0.1:8000/backend/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  -->

        <!-- App css -->
        
        
<!-- Responsive datatable examples -->
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
                      <a class="rlr-sidebar-menu__link" href="{{url('user/profile')}}">
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
                                    <div class="col">
                                      
                                       
                                    </div><!--end col-->
                                    <div class="col-auto align-self-center">
                                   
                                   
                                        
                                    </div><!--end col-->  
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div>

              <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
                
              <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">@php $type= Auth::user()->type; @endphp
                      @if($type==1)  Booking @else View Order  @endif</h6>
                                    
                                </div><!--end card-header-->
                                <div class="card-body">  
                                <table id="" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Booking Id</th>
                                            <th>Name</th>
                                            <th>Trip Name</th>
                                            <th>Date</th>
                                           <th>Action</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($booking as $key=>$bookings)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$bookings->bookingid}}</td>
                                                <td>{{$bookings->username}}</td>
                                                <td>{{$bookings->tripname}}</td>
                                                <td>{{$bookings->bookingdate}}</td>
                                               
                                             <td> 
                                             @php $bookingid = Crypt::encrypt($bookings->id); @endphp
                                               <a href="{{ url('booking-details',$bookingid) }}"class="btn btn-info ">View</a>
                                               <?php 
                                                 $booking_fordate=$bookings->bookingfordate;
                                                 date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
                                                 $curent_date = date('Y-m-d');
                                                 if($booking_fordate>$curent_date)
                                                 {
                                                ?>
                                                 @php $type= Auth::user()->type; @endphp
                                                 @if($type==0)
                                                 @php $bookingid = Crypt::encrypt($bookings->id); @endphp
                                                 <a href="{{ url('manage-companion',$bookingid) }}"class="btn btn-info ">Manage companion</a>
                                                 @endif
                                                <?php
                                                 }
                                                ?>

                                                @php $type= Auth::user()->type; @endphp
                                                @if($type==1)
                                                @php $bookingid = Crypt::encrypt($bookings->id); @endphp
                                                <a href="{{ url('booking-delete',$bookingid) }}"class="btn btn-danger">Delete</a>
                                                @endif
                                            </td>
                                            </tr>
                                        @endforeach
                                     </tbody>
                                    </table>      
                                </div>
                            </div>
                            </main>

             @endsection
    
