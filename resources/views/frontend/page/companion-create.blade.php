
  @extends('frontend.layout.index')
@section('content')

        
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

              <form method="post"action="{{route('add-companion')}}"enctype="multipart/form-data">
                                        @csrf
                                         <div class="row mb-3">

                                                    <div class="col-md-6">
                                                        <label>Name</label>
                                                        <input type="text"name="name"class="form-control"required>
                                                    </div>
                                                    <input type="hidden"name="bookingid"value="{{$id}}">

                                                    <div class="col-md-6">
                                                        <label>Email</label>
                                                        <input type="text"name="email"class="form-control"required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label>Age</label>
                                                        <input type="text"name="age"class="form-control"required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label>phone</label>
                                                        <input type="text"name="phone"class="form-control"required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label>Gender</label>
                                                        <select class="form-control"name="gender">
                                                            <option value="Male">Male</option>
                                                            <option value="Femaile">Female</option>
                                                        </select>
                                                    </div>
                                                   
                                                    <div class="col-md-6">
                                                        <label>File</label>
                                                        <input type="file"name="image"accept=".doc, .docx,.ppt, .pptx,.txt,.pdf" / class="form-control">
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

    @include('sweetalert::alert')
    @endsection

   
