
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from ux.emprise.tours/home-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Feb 2023 19:12:10 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Your vacation, tours and travel theme needs are all met at emprise." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tour Travel Website Template | Emprise</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/favicon.ico" />
    <!-- Plugins CSS -->
    <link href="{{url('backend/css/d33wubrfki0l68.cloudfront.net/css/f31e5e19e0c12c7fed6b9a194c2c8eb75f114a7f/styles/plugins.css')}}" rel='stylesheet'/>
    <!-- Main CSS -->
    <link href="{{url('backend/css/d33wubrfki0l68.cloudfront.net/css/b83f5ef38c54f38e9309c992e724b1caa950e172/styles/main.css')}}" rel='stylesheet'/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QT65KT9DNB"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "G-QT65KT9DNB");
    </script>

<link href="http://127.0.0.1:8000/backend/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
  </head>

  <body class="rlr-body">
    <!-- Header -->
    <header>
      <nav id="navigation" class="navigation rlr-navigation default-nav fixed-top">
        <!-- Logo -->
        <div class="navigation-header">
          <div class="navigation-brand-text">
            <div class="rlr-logo rlr-logo__navbar-brand rlr-logo--default">
              <a href='index.html'>
                <img src="https://d33wubrfki0l68.cloudfront.net/aaa02010f488894526f43081dfa4f60df6242acd/439cb/assets/svg/emprise-logo-dark.svg" alt="#" class="" />
              </a>
            </div>
          </div>
          <div class="navigation-button-toggler">
            <span class="rlr-sVGIcon"> <i class="rlr-icon-font rlr-icon-font--megamenu flaticon-menu"> </i> </span>
          </div>
        </div>
        <div class="navigation-body rlr-navigation__body container">
          <div class="navigation-body-header rlr-navigation__body-header">
            <div class="navigation-brand-text">
              <div class="rlr-logo rlr-logo__navbar-brand rlr-logo--default">
                <a href='{{url('/')}}'>
                @php  $generalsetting=DB::table('generalsettings')->first();  @endphp
                <img src="{{URL::to('/')}}/backend/image/general-setting/{{$generalsetting->logo}}"style="width:150px;height:100px;" alt="#" class="" />
                </a>
              </div>
            </div>
            <span class="rlr-sVGIcon navigation-body-close-button"> <i class="rlr-icon-font rlr-icon-font--megamenu flaticon-close"> </i> </span>
          </div>

          <!-- Main menu -->
          <ul class="navigation-menu rlr-navigation__menu rlr-navigation__menu--main-links">
            <!-- Dropdown menu 1 -->
            <li class="navigation-item is-active">
              <a class='navigation-link' href='{{url('/')}}'>Home</a>
            </li>

            <li class="navigation-item ">
              <a class='navigation-link' href='{{url('about')}}'>About</a>
            </li>
            <!-- Mega menu -->
            <li class="navigation-item has-submenu">
              <a class="navigation-link" href="#">Type</a>
              <ul class="navigation-megamenu navigation-submenu navigation-megamenu-half">
                <li class="navigation-megamenu-container">
                  <ul class="navigation-tabs">
                    <li class="rlr-navigation__tabbed-list">
                      <ul class="navigation-tabs-nav">
                          @php $location=DB::table('locationtypes')->get(); @endphp
                          
                          @foreach($location as $key=>$locations)
                          <li class="navigation-tabs-nav-item @if(++$key==1)is-active @endif "><a href="#">{{$locations->title}}</a></li>
                          @endforeach
                      </ul>
                    </li>

                    @foreach($location as $key=>$locations)
                    <li class="navigation-tabs-pane @if(++$key==1)is-active @endif">
                      <ul class="navigation-row">
                        <li class="navigation-col">
                          <ul class="navigation-list">
                          @php  $type=DB::table('types')->get(); @endphp

                            @foreach($type as $key=>$types)
                            @if(++$key%2!=0)
 
                            <li class="rlr-icon-text">
                              <div class="rlr-icon-text__text-wrapper">
                                <span class="rlr-icon-text__title"><a href="{{url('type',['id' => $types->id, 'trip' => 'type-trip'])}}">{{$types->title}}</a></span>
                              </div>
                            </li>
                            @endif
                            @endforeach
                            
                          </ul>
                        </li>
                        <li class="navigation-col">
                          <ul class="navigation-list">
                            @php  $type=DB::table('types')->get(); @endphp

                            @foreach($type as $key=>$types)
                            @if(++$key%2==0)
                            
                            <li class="rlr-icon-text">
                              <div class="rlr-icon-text__text-wrapper">
                                <span class="rlr-icon-text__title"><a href="{{url('type',['id' => $types->id, 'trip' => 'type-trip'])}}">{{$types->title}}</a></span>
                              </div>
                            </li>
                            @endif
                            @endforeach
                           
                          </ul>
                        </li>
                      </ul>
                    </li>
                    @endforeach
                    
                  </ul>
                </li>
              </ul>
            </li>



            <li class="navigation-item has-submenu">
              <a class="navigation-link" href="#">Areatype</a>
              <ul class="navigation-megamenu navigation-submenu navigation-megamenu-half">
                <li class="navigation-megamenu-container">
                  <ul class="navigation-tabs">
                    <li class="rlr-navigation__tabbed-list">
                      <ul class="navigation-tabs-nav">
                          @php $location=DB::table('locationtypes')->get(); @endphp
                          
                          @foreach($location as $key=>$locations)
                          <li class="navigation-tabs-nav-item @if(++$key==1)is-active @endif "><a href="#">{{$locations->title}}</a></li>
                          @endforeach
                      </ul>
                    </li>

                    @foreach($location as $key=>$locations)
                    <li class="navigation-tabs-pane @if(++$key==1)is-active @endif">
                      <ul class="navigation-row">
                        <li class="navigation-col">
                          <ul class="navigation-list">
                          @php  $areatype=DB::table('areatypes')->get(); @endphp

                            @foreach($areatype as $key=>$areatypes)
                            @if(++$key%2!=0)
 
                            <li class="rlr-icon-text">
                              <div class="rlr-icon-text__text-wrapper">
                                <span class="rlr-icon-text__title"><a href="{{url('areatype',['id' => $areatypes->id, 'trip' => 'areatype-trip'])}}">{{$areatypes->title}}</a></span>
                              </div>
                            </li>
                            @endif
                            @endforeach
                            
                          </ul>
                        </li>
                        <li class="navigation-col">
                          <ul class="navigation-list">
                            @php  $areatype=DB::table('areatypes')->get(); @endphp

                            @foreach($areatype as $key=>$areatypes)
                            @if(++$key%2==0)
                            
                            <li class="rlr-icon-text">
                              <div class="rlr-icon-text__text-wrapper">
                                <span class="rlr-icon-text__title"><a href="{{url('areatype',['id' => $areatypes->id, 'trip' => 'areatype-trip'])}}">{{$areatypes->title}}</a></span>
                              </div>
                            </li>
                            @endif
                            @endforeach
                           
                          </ul>
                        </li>
                      </ul>
                    </li>
                    @endforeach
                    
                  </ul>
                </li>
              </ul>
            </li>


            <li class="navigation-item has-submenu">
              <a class="navigation-link" href="#">Specialfeature</a>
              <ul class="navigation-megamenu navigation-submenu navigation-megamenu-half">
                <li class="navigation-megamenu-container">
                  <ul class="navigation-tabs">
                    <li class="rlr-navigation__tabbed-list">
                      <ul class="navigation-tabs-nav">
                          @php $location=DB::table('locationtypes')->get(); @endphp
                          
                          @foreach($location as $key=>$locations)
                          <li class="navigation-tabs-nav-item @if(++$key==1)is-active @endif "><a href="#">{{$locations->title}}</a></li>
                          @endforeach
                      </ul>
                    </li>

                    @foreach($location as $key=>$locations)
                    <li class="navigation-tabs-pane @if(++$key==1)is-active @endif">
                      <ul class="navigation-row">
                        <li class="navigation-col">
                          <ul class="navigation-list">
                          @php  $specialfeature=DB::table('specialfeatures')->get(); @endphp

                            @foreach($specialfeature as $key=>$specialfeatures)
                            @if(++$key%2!=0)
 
                            <li class="rlr-icon-text">
                              <div class="rlr-icon-text__text-wrapper">
                                <span class="rlr-icon-text__title"><a href="{{url('specialfeature',['id' => $specialfeatures->id, 'trip' => 'specialfeature-trip'])}}">{{$specialfeatures->title}}</a></span>
                              </div>
                            </li>
                            @endif
                            @endforeach
                            
                          </ul>
                        </li>
                        <li class="navigation-col">
                          <ul class="navigation-list">
                            @php  $specialfeature=DB::table('specialfeatures')->get(); @endphp

                            @foreach($specialfeature as $key=>$specialfeatures)
                            @if(++$key%2==0)
                            
                            <li class="rlr-icon-text">
                              <div class="rlr-icon-text__text-wrapper">
                                <span class="rlr-icon-text__title"><a href="{{url('specialfeature',['id' => $specialfeatures->id, 'trip' => 'specialfeature-trip'])}}">{{$specialfeatures->title}}</a></span>
                              </div>
                            </li>
                            @endif
                            @endforeach
                           
                          </ul>
                        </li>
                      </ul>
                    </li>
                    @endforeach
                    
                  </ul>
                </li>
              </ul>
            </li>

            <!-- Dropdown menu 1 -->
            <!-- <li class="navigation-item">
              <a class='navigation-link' href='home-page-2.html'>Tours</a>
              <ul class="navigation-dropdown">
                <li class="navigation-dropdown-item">
                  <a class='navigation-dropdown-link' href='product-detail-page.html'>Single Tour</a>
                </li>
                <li class="navigation-dropdown-item">
                  <a class='navigation-dropdown-link' href='search-results--left-sidebar.html'>Left Sidebar</a>
                </li>
                <li class="navigation-dropdown-item">
                  <a class='navigation-dropdown-link' href='search-results--right-sidebar.html'>Right Sidebar</a>
                </li>
                <li class="navigation-dropdown-item">
                  <a class='navigation-dropdown-link' href='search-results--no-sidebar.html'>No Sidebar</a>
                </li>
                <li class="navigation-dropdown-item">
                  <a class='navigation-dropdown-link' href='search-results--3-col.html'>Three Column</a>
                </li>
              </ul>
            </li> -->
            <!-- Mega menu -->
           
            <!-- Dropdown menu 2 -->

            <!-- Dropdown menu 2 -->
            <!-- <li class="navigation-item">
              <a class='navigation-link' href='contact.html'> Contact </a>
            </li> -->
          </ul>
          <!-- User actions menu -->
          <ul class="navigation-menu rlr-navigation__menu align-to-right">
            <!-- Currency dropdown -->
            <!-- <li class="navigation-item">
              <a class="navigation-link" href="#">
                <span>USD</span>
              </a>
              <ul class="navigation-dropdown rlr-currency-dropdown">
                <li class="navigation-dropdown-item">
                  <a class="navigation-dropdown-link" href="#">EUR</a>
                </li>
                <li class="navigation-dropdown-item">
                  <a class="navigation-dropdown-link" href="#">GBP</a>
                </li>
                <li class="navigation-dropdown-item">
                  <a class="navigation-dropdown-link" href="#">CHF</a>
                </li>
                <li class="navigation-dropdown-item">
                  <a class="navigation-dropdown-link" href="#">CAD</a>
                </li>
                <li class="navigation-dropdown-item">
                  <hr class="dropdown-divider rlr-dropdown__divider" />
                </li>
                <li class="navigation-dropdown-item">
                  <a class="navigation-dropdown-link" href="#">JPY</a>
                </li>
                <li class="navigation-dropdown-item">
                  <a class="navigation-dropdown-link" href="#">CNH</a>
                </li>
              </ul>
            </li> -->
            <!-- Language dropdown -->
            
            <!-- Add your listing -->
            @if(Auth::check())
            @php $type= Auth::user()->type; @endphp
                      @if($type==1)
            <li class="d-lg-none d-xxl-block navigation-item">
              <a class='navigation-link rlr-navigation__link--so' href="{{url('add-trip')}}" >Add your listing</a>
            </li>
            @endif
            @endif
            @if(Auth::check())
            @php $name=auth()->user()->name @endphp
            @php $picture=auth()->user()->photo @endphp
           
            <li class="navigation-item has-submenu">
              <a class="navigation-link" href="#">{{$name}}

                @if(empty($picture))
                <img class="ui right spaced avatar image" src="{{URL::to('/')}}/backend/image/userprofile/download.png" style="border-radius:100%;width:25px;height:25px;" alt="account avatar"/> 
                @else
                <img class="ui right spaced avatar image" src="{{URL::to('/')}}/backend/image/userprofile/{{$picture}}" style="border-radius:100%;width:25px;height:25px;" alt="account avatar"/> 
                @endif
              </a>
              <ul class="navigation-dropdown">
                <li class="navigation-dropdown-item">
                  <a class='navigation-dropdown-link' href='{{url('user/profile')}}'>Profile</a>
                </li>
              
                <li class="navigation-dropdown-item">
                  <hr class="dropdown-divider rlr-dropdown__divider" />
                </li>
                <li class="navigation-dropdown-item">
                  <a class='navigation-dropdown-link' href="{{url('user/logout')}}">Sign out</a>
                </li>
              </ul>
            </li>
            @else
            <li class="navigation-item">
              <a class="navigation-link" href="{{url('user-register')}}">Register</a>
            </li>

            <li class="navigation-item">
              <a class="navigation-link" href="{{url('user-login')}}">Login</a>
            </li>
            @endif
            
          </ul>
        </div>
      </nav>
    </header>