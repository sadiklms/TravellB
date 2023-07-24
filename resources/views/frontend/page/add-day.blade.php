
  @extends('frontend.layout.index')
@section('content')
 <link href="http://127.0.0.1:8000/backend/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
        
<link href="http://127.0.0.1:8000/backend/plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
        
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

              <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>

              <form method="post"action="{{route('day-store')}}"enctype="multipart/form-data">
                                        @csrf
                                         <div class="row mb-3">

                                                   <div class="col-md-6">
                                                       <label>Trip Name</label>

                                                       <select name="trip_id" class="form-control"required>
                                                           <option value="">Choose  Trip</option>
                                                           @php $trip=DB::table('trips')->where('travelgroupname',auth()->user()->id)->get(); @endphp
                                                           @foreach($trip as $trips)
                                                           <option value="{{$trips->id}}">{{$trips->name}}</option>
                                                           @endforeach
                                                        
                                                       </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label>Day</label>
                                                        <input type="text"name="day"class="form-control"required>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label>Description</label>
                                                        <textarea type="text"name="description"id="editor1"class="form-control"required></textarea>
                                                    </div>
                                                   
                                                  
                                                                
                                                    </div>
                                                
                                              <button type="submit" class="btn btn-primary">Submit</button>
                                       
                                    </form>   

           </div>


              </div>
            </div>
          </div>
        </div>
     
    </main>


    @endsection

    @push('script_3')


    <script src="http://127.0.0.1:8000/backend/assets/js/jquery.min.js"></script>
        
   
        
        <script src="http://127.0.0.1:8000/backend/assets/js/moment.js"></script>
        <script src="http://127.0.0.1:8000/backend/plugins/daterangepicker/daterangepicker.js"></script>

       
        <!-- App js -->
        
        <script src="http://127.0.0.1:8000/backend/plugins/select2/select2.min.js"></script>
       
        <script src="http://127.0.0.1:8000/backend/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
        
       

        <script src="http://127.0.0.1:8000/backend/assets/pages/jquery.forms-advanced.js"></script>


        <script src="http://127.0.0.1:8000/backend/assets/js/app.js"></script>

        <script>
                CKEDITOR.replace( 'editor1' );
        </script>
        
@endpush
