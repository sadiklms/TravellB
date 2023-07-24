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

                <div class="woocommerce-MyAccount-content"id="section2">
                  <h3>Edit Profile</h3>
                  <div class="rlr-myaccount__wrapper">
                    <div class="woocommerce-MyAccount-content">
                    <form method="post"action="{{route('update-profile')}}"enctype="multipart/form-data">
                      @csrf
                <div class="row">
                  
                  <div class="col-md-6">
                    <div class="rlr-authforms__inputgroup"><label class="rlr-form-label rlr-form-label--light required"> Name </label> <input type="text" name="name" value="{{$edit->name}}"class="form-control form-control--light" /></div>
                 </div>

                 <div class="col-md-6">
                 <div class="rlr-authforms__inputgroup"><label class="rlr-form-label rlr-form-label--light required"> Email </label> <input type="text"name="email" value="{{$edit->email}}" class="form-control form-control--light" /></div>
                 </div>


                 <div class="col-md-6">
                 <div class="rlr-authforms__inputgroup">
                      <label class="rlr-form-label rlr-form-label--light required">state</label> <input type="text" name="state" value="{{$edit->state}}" class="form-control form-control--light" />
                </div>
                </div>

                 <div class="col-md-6">
                 <div class="rlr-authforms__inputgroup">
                      <label class="rlr-form-label rlr-form-label--light required">City</label> <input type="text" name="city" value="{{$edit->city}}" class="form-control form-control--light" />
                </div>
                </div>


                <div class="col-md-6">
                <div class="rlr-authforms__inputgroup">
                      <label class="rlr-form-label rlr-form-label--light required">Zipcode</label> <input type="text" name="zipcode" value="{{$edit->zipcode}}" class="form-control form-control--light" />
                     
                    </div>
                </div>


                <div class="col-md-6">
                   <div class="rlr-authforms__inputgroup">
                      <label class="rlr-form-label rlr-form-label--light required">Addresses</label> <input type="text" name="address" value="{{$edit->address}}"  class="form-control form-control--light" />
                    </div>
                </div>

                <div class="col-md-6">
                <div class="rlr-authforms__inputgroup">
                      <label class="rlr-form-label rlr-form-label--light required">Profile picture</label> 
                      <input type="file" name="photo" autocomplete="off" class=" form-control" />
                     
                    </div>
                </div>

                <div class="col-md-6">
                <div class="rlr-authforms__inputgroup">
                    <img src="{{URL::to('/')}}/backend/image/userprofile/{{$edit->photo}}"style="width:100px;height:100px;">  
                </div>
                </div>
               </div>
                    <button type="submit" class="btn rlr-button rlr-button--fullwidth rlr-button--primary">Edit Profile</button>
                    
                </div>
                </form>
                </div>
                </div>
                </div>

               


              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    @include('sweetalert::alert') 
    @endsection


