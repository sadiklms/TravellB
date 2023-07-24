
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
                                   
                                        <div class="nav-link">
                                            <a class="btn btn-info" href="{{url('add-day')}}" role="button"><i class="fas fa-plus me-2"></i>Add New Day</a>
                                        </div>                                
                         
                                        
                                    </div><!--end col-->  
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div>

              <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
                
              <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">View Day</h6>
                                    
                                </div><!--end card-header-->
                                <div class="card-body">  
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Trip Name</th>
                                             <th>Day</th>
                                           
                                           <th>Action</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($itenary as $key=>$itenarys)
                                            <tr>
                                               
                                                <td>{{++$key}}</td>
                                                <td>{{$itenarys->name}}</td>
                                                <td>{{$itenarys->day}}</td>
                                               
                                             <td> 
                                            
                                             <form action="{{ route('day-destory',$itenarys->id) }}" method="POST">
                                                <a href="{{ route('day-edit',$itenarys->id) }}"class="btn btn-info">Edit</a>
                                                    @csrf
                                                @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            </td>
                                            </tr>
                                        @endforeach
                                     </tbody>
                                    </table>      
                                </div>
                            </div>

                            </main>
             @endsection
 