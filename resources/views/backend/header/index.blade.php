<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from mannatthemes.com/dastone/default/forms-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Jan 2023 02:53:26 GMT -->
<head>
        <meta charset="utf-8" />
        <title>TravelB</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="{{url('backend/plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('backend/plugins/huebee/huebee.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('backend/plugins/timepicker/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
        <link href="{{url('backend/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />

        <link href="{{url('backend/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">

          <!-- DataTables -->
          <link href="{{url('backend/plugins/datatables/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('backend/plugins/datatables/buttons.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{url('backend/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" /> 

        <!-- App css -->
        <link href="{{url('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('backend/assets/css/metisMenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('backend/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <!-- Left Sidenav -->
        <div class="left-sidenav">
            <!-- LOGO -->
            <div class="brand">
                <a href="{{url('admin')}}" class="logo">
                    <span>
                        <img src="{{url('backend/assets/images/logo-sm.png')}}" alt="logo-small" class="logo-sm">
                    </span>
                    <span>
                        <img src="{{url('backend/assets/images/logo.png')}}" alt="logo-large" class="logo-lg logo-light">
                        <img src="{{url('backend/assets/images/logo-dark.png')}}" alt="logo-large" class="logo-lg logo-dark">
                    </span>
                </a>
            </div>
            <!--end logo-->
            <div class="menu-content h-100" data-simplebar>
                <ul class="metismenu left-sidenav-menu">
                    <li class="menu-label mt-0">Main</li>
                    <li>
                        <a href="{{url('admin')}}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span><span class="menu-arrow"></span></a>
                    </li>
                    <li>
                        <a href="{{route('admin.type.index')}}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Manage Type</span><span class="menu-arrow"></span></a>
                        
                    </li>
                    <li>
                        <a href="{{route('admin.locationtype.index')}}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Manage Location Type</span><span class="menu-arrow"></span></a>
                        
                    </li>
                    <li>
                        <a href="{{route('admin.areatype.index')}}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Manage Area Type</span><span class="menu-arrow"></span></a>
                        
                    </li>
                    <li>
                        <a href="{{route('admin.specialfeature.index')}}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Manage Special Feature</span><span class="menu-arrow"></span></a>
                        
                    </li>
                    <li>
                        <a href="{{route('admin.coupon.index')}}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Manage Coupon</span><span class="menu-arrow"></span></a>
                        
                    </li>
                    <li>
                        <a href="{{route('admin.banner.index')}}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Manage Banner</span><span class="menu-arrow"></span></a>
                        
                    </li>
                    <li>
                        <a href="{{route('admin.trip.index')}}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Manage Trip</span><span class="menu-arrow"></span></a>
                        
                    </li>

                    <li>
                        <a href="{{route('admin.itenary.index')}}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Manage Day</span><span class="menu-arrow"></span></a>
                        
                    </li>

                    <li>
                        <a href="{{route('admin.information.create')}}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Manage Information</span><span class="menu-arrow"></span></a>
                        
                    </li>

                    <li>
                        <a href="{{route('admin.booking')}}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Manage booking</span><span class="menu-arrow"></span></a>
                        
                    </li>

                    <li>
                        <a href="{{route('admin.about.index')}}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Manage About</span><span class="menu-arrow"></span></a>
                        
                    </li>

                  

                   

                    <li>
                        <a href="javascript: void(0);"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Manage Content</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                        <li>
                        <a href="{{route('admin.privacy-policy.index')}}"><span>Manage Privacy Policy</span><span class="menu-arrow"></span></a>
                        
                    </li>

                    <li>
                        <a href="{{route('admin.return-policy.index')}}"> <span>Manage Return Policy</span><span class="menu-arrow"></span></a>
                        
                    </li>
                            <li>
                            <a href="{{route('admin.term-condition.index')}}"> <span>Manage Term & Condition</span><span class="menu-arrow"></span></a>
                             </li>

                   <li>
                        <a href="{{route('admin.general-setting.index')}}"> <span>Manage General Setting</span><span class="menu-arrow"></span></a>
                        
                    </li>
                        </ul>
                    </li>
                    

                    <li>
                        <a href="{{route('admin.logo-partner.index')}}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Manage Logo partner</span><span class="menu-arrow"></span></a>
                        
                    </li>

                  

                    <li>
                        <a href="{{route('admin.newsletter.index')}}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Manage Newsletter</span><span class="menu-arrow"></span></a>
                        
                    </li>
                </ul>
    
            </div>
        </div>

        8699814427
        <!-- end left-sidenav-->
        

        <div class="page-wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">            
                <!-- Navbar -->
                <nav class="navbar-custom">    
                    <ul class="list-unstyled topbar-nav float-end mb-0">  

                    {{--
                        <li class="dropdown hide-phone">
                            <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-bs-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i data-feather="search" class="topbar-icon"></i>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-end dropdown-lg p-0">
                                <!-- Top Search Bar -->
                                <div class="app-search-topbar">
                                    <form action="#" method="get">
                                        <input type="search" name="search" class="from-control top-search mb-0" placeholder="Type text...">
                                        <button type="submit"><i class="ti-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </li>                      
                        
                        
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-bs-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i data-feather="bell" class="align-self-center topbar-icon"></i>
                                <span class="badge bg-danger rounded-pill noti-icon-badge">2</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">
                            
                                <h6 class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                                    Notifications <span class="badge bg-primary rounded-pill">2</span>
                                </h6> 
                                <div class="notification-menu" data-simplebar>
                                    <!-- item-->
                                    <a href="#" class="dropdown-item py-3">
                                        <small class="float-end text-muted ps-2">2 min ago</small>
                                        <div class="media">
                                            <div class="avatar-md bg-soft-primary">
                                                <i data-feather="shopping-cart" class="align-self-center icon-xs"></i>
                                            </div>
                                            <div class="media-body align-self-center ms-2 text-truncate">
                                                <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                                                <small class="text-muted mb-0">Dummy text of the printing and industry.</small>
                                            </div><!--end media-body-->
                                        </div><!--end media-->
                                    </a><!--end-item-->
                                    <!-- item-->
                                    <a href="#" class="dropdown-item py-3">
                                        <small class="float-end text-muted ps-2">10 min ago</small>
                                        <div class="media">
                                            <div class="avatar-md bg-soft-primary">
                                                <img src="assets/images/users/user-4.jpg" alt="" class="thumb-sm rounded-circle">
                                            </div>
                                            <div class="media-body align-self-center ms-2 text-truncate">
                                                <h6 class="my-0 fw-normal text-dark">Meeting with designers</h6>
                                                <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                            </div><!--end media-body-->
                                        </div><!--end media-->
                                    </a><!--end-item-->
                                    <!-- item-->
                                    <a href="#" class="dropdown-item py-3">
                                        <small class="float-end text-muted ps-2">40 min ago</small>
                                        <div class="media">
                                            <div class="avatar-md bg-soft-primary">                                                    
                                                <i data-feather="users" class="align-self-center icon-xs"></i>
                                            </div>
                                            <div class="media-body align-self-center ms-2 text-truncate">
                                                <h6 class="my-0 fw-normal text-dark">UX 3 Task complete.</h6>
                                                <small class="text-muted mb-0">Dummy text of the printing.</small>
                                            </div><!--end media-body-->
                                        </div><!--end media-->
                                    </a><!--end-item-->
                                    <!-- item-->
                                    <a href="#" class="dropdown-item py-3">
                                        <small class="float-end text-muted ps-2">1 hr ago</small>
                                        <div class="media">
                                            <div class="avatar-md bg-soft-primary">
                                                <img src="assets/images/users/user-5.jpg" alt="" class="thumb-sm rounded-circle">
                                            </div>
                                            <div class="media-body align-self-center ms-2 text-truncate">
                                                <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                                                <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                            </div><!--end media-body-->
                                        </div><!--end media-->
                                    </a><!--end-item-->
                                    <!-- item-->
                                    <a href="#" class="dropdown-item py-3">
                                        <small class="float-end text-muted ps-2">2 hrs ago</small>
                                        <div class="media">
                                            <div class="avatar-md bg-soft-primary">
                                                <i data-feather="check-circle" class="align-self-center icon-xs"></i>
                                            </div>
                                            <div class="media-body align-self-center ms-2 text-truncate">
                                                <h6 class="my-0 fw-normal text-dark">Payment Successfull</h6>
                                                <small class="text-muted mb-0">Dummy text of the printing.</small>
                                            </div><!--end media-body-->
                                        </div><!--end media-->
                                    </a><!--end-item-->
                                </div>
                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                    View all <i class="fi-arrow-right"></i>
                                </a>
                            </div>
                        </li>

                        --}}
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-bs-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <span class="ms-1 nav-user-name hidden-sm">Administrator</span>
                                <img src="{{url('backend/assets/images/users/user-5.jpg')}}" alt="profile-user" class="rounded-circle thumb-xs" />                                 
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- <a class="dropdown-item" href="pages-profile.html"><i data-feather="user" class="align-self-center icon-xs icon-dual me-1"></i> Profile</a>
                                <a class="dropdown-item" href="apps-contact-list.html"><i data-feather="users" class="align-self-center icon-xs icon-dual me-1"></i> Contacts</a> -->
                                <div class="dropdown-divider mb-0"></div>
                                

                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>

                                

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </li>
                    </ul><!--end topbar-nav-->
        
                    <ul class="list-unstyled topbar-nav mb-0">                        
                        <li>
                            <button class="nav-link button-menu-mobile">
                                <i data-feather="menu" class="align-self-center topbar-icon"></i>
                            </button>
                        </li> 
                                                 
                    </ul>
                </nav>
                <!-- end navbar-->
            </div>
            <!-- Top Bar End -->