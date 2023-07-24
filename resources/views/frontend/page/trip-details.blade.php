
@extends('frontend.layout.index')
@section('content')



<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
     .rate {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rate:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rate:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rate:not(:checked) > label:before {
         content: '★ ';
         }
         .rate > input:checked ~ label {
         color: #ffc700;
         }
         .rate:not(:checked) > label:hover,
         .rate:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rate > input:checked + label:hover,
         .rate > input:checked + label:hover ~ label,
         .rate > input:checked ~ label:hover,
         .rate > input:checked ~ label:hover ~ label,
         .rate > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
         .star-rating-complete{
            color: #c59b08;
         }
         .rating-container .form-control:hover, .rating-container .form-control:focus{
         background: #fff;
         border: 1px solid #ced4da;
         }
         .rating-container textarea:focus, .rating-container input:focus {
         color: #000;
         }
         .rated {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rated:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ffc700;
         }
         .rated:not(:checked) > label:before {
         content: '★ ';
         }
         .rated > input:checked ~ label {
         color: #ffc700;
         }
         .rated:not(:checked) > label:hover,
         .rated:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rated > input:checked + label:hover,
         .rated > input:checked + label:hover ~ label,
         .rated > input:checked ~ label:hover,
         .rated > input:checked ~ label:hover ~ label,
         .rated > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
</style>  

                                
    <!-- Main Content -->
    <main id="rlr-main" class="rlr-main--fixed-top">
      <!-- Main Content -->
      <div class="container">
        <!-- Media Slider -->
        <aside class="row">
          <!-- Media main image carousel -->
          <div class="col-md-10 rlr-media">
            <div class="splide rlr-media--wrapper rlr-js-media">
              <!-- Arrows -->
        
              <!-- Media main images -->
              <div class="splide__track rlr-media__strack">
                <ul id="image-preview" class="splide__list">
                  <li class="splide__slide rlr-media__image-view">
                    <img class="lazyload" data-src="{{URL::to('/')}}/backend/image/trip/{{$trip->featureimage}}" alt="media image" />
                  </li>
                  
                  </li>
                </ul>
              </div>
              <!-- Media pagination counter -->
           
            </div>
          </div>
          <!-- Media Thumbnails -->
          <div class="col-md-2 rlr-media">
            <!-- Media sidebar -->
            <div class="splide rlr-media--wrapper rlr-media--sidebar rlr-js-thumbnail-media">
              <!-- Arrows -->
           
              <!-- Thumbnails -->
              <div class="splide__track rlr-media__strack">
                <ul id="image-preview-thumb" class="splide__list">

                @php  $image=json_decode($trip->imagegallery); @endphp
                 @foreach($image as $images)
                  <li class="splide__slide rlr-media__image-view">
                    <img class="rlr-media__thumb lazyload" data-src="{{URL::to('/')}}/backend/image/trip/{{$images}}" alt="media image" />
                  </li>
                  @endforeach
                 
                </ul>
              </div>
            </div>
          </div>
        </aside>
        <!-- Product Detail Sextion -->
        <section class="row rlr-product-detail-section">
          <div class="rlr-product-detail-section__details col-xl-8">
            <!-- Product Detail Header -->
            <div class="rlr-product-detail-header" id="rlr-js-detail-header">
              <div class="rlr-product-detail-header__contents">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb rlr-breadcrumb__items">
                    <li class="breadcrumb-item rlr-breadcrumb__item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item rlr-breadcrumb__item"><a href="#">Destination</a></li>
                    <li class="breadcrumb-item rlr-breadcrumb__item active" aria-current="page">Tour</li>
                  </ol>
                </nav>
                <h1 class="rlr-section__heading--main rlr-product-detail-header__title">{{$trip->name}}</h1>
                <div class="rlr-review-stars" itemscope itemtype="https://schema.org/Product">
                  <div class="rlr-review-stars" itemprop="ratingValue" itemscope itemtype="https://schema.org/Product">

                  @php $reviewstar= DB::table('reviewtravels')->where('tripid',$trip->id)->sum('rating'); @endphp
                  
                  @php $reviewcount= DB::table('reviewtravels')->where('tripid',$trip->id)->count(); @endphp

                  @if($reviewcount>0)
                 <?php
                 
                 $floatValue =$reviewstar/$reviewcount;
                 $reviewcountnumber=intval($floatValue);
                 ?>

                  @for($i=1; $i<=5; $i++)
                  <?php 
                         if($i>$reviewcountnumber)
                         {
                          echo '<i class="rlr-icon-font flaticon-star"> </i>';
                         }
                         else
                         {
                         echo '<i class="rlr-icon-font flaticon-star-1"> </i>';
                         }
                        
                   ?>
                   @endfor

                   @else
                   @for($i=1; $i<=5; $i++)
                 <i class="rlr-icon-font flaticon-star"> </i>
                 @endfor
                   @endif
                 
                  </div>
                  <div class="rlr-review-stars__content">
                    <span class="rlr-review-stars__count">{{$reviewcount}}</span>
                    <span> Reviews</span>
                  </div>
                </div>
              </div>
           
            </div>
            <!-- Secondary Menu -->
            <nav class="rlr-product-detail-secondary-menu">
              <ul class="rlr-product-detail-secondary-menu__tabitems" id="rlr-js-secondary-menu">
                <li class="rlr-product-detail-secondary-menu__tabitem js-tabitem is-active" id="rlr-product-sec-overview"><span>Overview</span></li>
                <li class="rlr-product-detail-secondary-menu__tabitem js-tabitem" id="rlr-product-sec-itinerary"><span>Itinerary</span></li>
                <li class="rlr-product-detail-secondary-menu__tabitem js-tabitem" id="rlr-product-sec-inclusion"><span>Inclusions</span></li>
                <li class="rlr-product-detail-secondary-menu__tabitem js-tabitem" id="rlr-product-sec-review"><span>Reviews</span></li>
                <li class="rlr-product-detail-secondary-menu__tabitem js-tabitem" id="rlr-product-sec-faq"><span>FAQ</span></li>
                <li class="rlr-product-detail-secondary-menu__tabitem js-tabitem" id="rlr-product-sec-info"><span>Essential Info</span></li>
              </ul>
            </nav>
            <!-- Overview -->
            <div class="rlr-secondary-menu-desc" data-id="rlr-product-sec-overview">
        
              <div class="rlr-secondary-menu-desc__details">
                <div class="rlr-overview-detail">
                  <div class="rlr-readmore-desc rlr-overview-detail__description">
                    <p class="rlr-readmore-desc__content rlr-js-desc">
                     {{$trip->descriptionlong}}
                    </p>
                    <span class="rlr-readmore-desc__readmore rlr-js-readmore">Show more...</span>
                  </div>
                  <div class="rlr-overview-detail__icon-groupset">
                    <div class="rlr-overview-detail__icon-group">
                      <span class="rlr-overview-detail__label">Duration</span>
                      <div class="rlr-overview-detail__icons">
                        <figure class="rlr-icon-text"><i class="rlr-icon-font flaticon-three-o-clock-clock"> </i> <span class="">2 Days </span></figure>
                      </div>
                    </div>
                    <div class="rlr-overview-detail__icon-group">
                      <span class="rlr-overview-detail__label">Activity</span>
                      <div class="rlr-overview-detail__icons">
                        <figure class="rlr-icon-text"><i class="rlr-icon-font flaticon-beach"> </i> <span class="">Beach </span></figure>
                      </div>
                    </div>
                    <div class="rlr-overview-detail__icon-group">
                      <span class="rlr-overview-detail__label">Physical</span>
                      <div class="rlr-overview-detail__icons">
                        <figure class="rlr-icon-text"><i class="rlr-icon-font flaticon-icecream-cone"> </i> <span class="">Luxury </span></figure>
                      </div>
                    </div>
                    <div class="rlr-overview-detail__icon-group">
                      <span class="rlr-overview-detail__label">Group Size</span>
                      <div class="rlr-overview-detail__icons">
                        <figure class="rlr-icon-text"><i class="rlr-icon-font flaticon-add-user"> </i> <span class="">8 </span></figure>
                      </div>
                    </div>
                    <div class="rlr-overview-detail__icon-group">
                      <span class="rlr-overview-detail__label">Age</span>
                      <div class="rlr-overview-detail__icons">
                        <figure class="rlr-icon-text"><i class="rlr-icon-font flaticon-carbon-tall-man"> </i> <span class="">7+ </span></figure>
                      </div>
                    </div>
                    <div class="rlr-overview-detail__icon-group">
                      <span class="rlr-overview-detail__label">Location</span>
                      <div class="rlr-overview-detail__icons">
                        <figure class="rlr-icon-text"><i class="rlr-icon-font flaticon-map-marker"> </i> <span class="">Rome, Italy </span></figure>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Itinerary -->
            <div class="rlr-secondary-menu-desc" data-id="rlr-product-sec-itinerary">
              <!-- Icon -->
              
              <div class="rlr-secondary-menu-desc__details">
                <!-- Itinerary item -->
                <div class="accordion rlr-accordion">
          

                 @php $tripday=DB::table('itenaries')->get(); @endphp
                 @php $k=2; @endphp
                 @foreach($tripday as $key=>$trips)
                 
                 @if(++$key==1)
                 <div class="accordion-item rlr-accordion__item">
                    <div class="accordion-header rlr-accordion__header" id="rlr-itinerary-header1">
                      <button class="accordion-button rlr-accordion__button" type="button" data-bs-toggle="collapse" data-bs-target="#rlr-itinerary-collapse1" aria-expanded="true" aria-controls="rlr-itinerary-collapse1"><span class="rlr-accordion__badge">1</span>{{$trips->id}}</button>
                    </div>
                    <div id="rlr-itinerary-collapse1" class="accordion-collapse collapse show" aria-labelledby="rlr-itinerary-header1" style="">
                      <div class="accordion-body rlr-accordion__body">
                      <div class="rlr-readmore-desc">
                        <p class="rlr-itinerary__title">
                         {!!$trips->description!!}
                        </p>
                      </div>
                      </div>
                    </div>
                  </div>
                  @else          
                  <div class="accordion-item rlr-accordion__item">
                    <div class="accordion-header rlr-accordion__header" id="rlr-itinerary-header{{$k}}">
                      <button class="accordion-button rlr-accordion__button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rlr-itinerary-collapse{{$k}}" aria-expanded="false" aria-controls="rlr-itinerary-collapse{{$k}}">
                        <span class="rlr-accordion__badge">{{$key}}</span>{{$trips->id}}
                      </button>
                    </div>
                    <div id="rlr-itinerary-collapse{{$k}}" class="accordion-collapse collapse" aria-labelledby="rlr-itinerary-header{{$k}}">
                      <div class="accordion-body rlr-accordion__body">
                        <div class="rlr-readmore-desc">
                          <p class="rlr-readmore-desc__content rlr-js-desc">
                           
                          {!!$trips->description!!}
                          </p>
                          <span class="rlr-readmore-desc__readmore rlr-js-readmore">Show more...</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  @php $k++; @endphp
                  @endif
                  @endforeach
                </div>
                <!-- Pagination -->
              
              </div>
            </div>
            <!-- Inclusion and Exclusions -->
            <div class="rlr-secondary-menu-desc" data-id="rlr-product-sec-inclusion">
              <!-- Icon -->
  
              <!-- Overview -->
              <div class="rlr-secondary-menu-desc__details">
                <div class="rlr-readmore-desc">
                  <p class="rlr-readmore-desc__content rlr-js-desc">
                   {!!$trip->cost_terms_inclusion!!}
                  </p>
                  <p class="rlr-readmore-desc__content rlr-js-desc">
                   {!!$trip->cost_terms_exclusion!!}
                  </p>
                  <span class="rlr-readmore-desc__readmore rlr-js-readmore">Show more...</span>
                </div>
             
              </div>
            </div>
            <!-- Reviews -->
            <div class="rlr-secondary-menu-desc" data-id="rlr-product-sec-review">
              <!-- Icon -->
          
              <div class="rlr-secondary-menu-desc__details">

              @php $review=DB::table('reviewtravels')->where('tripid',$trip->id)->get(); @endphp

               @foreach($review as $key=>$reviews)
                <!-- Review -->
                <article class="rlr-review-card" itemscope itemtype="https://schema.org/Product">
                  <div class="rlr-review-card__contact">
                    <!--Using in Components -->
                    <div class="rlr-avatar">
                  @php  $user=DB::table('users')->where('id',$reviews->userid)->first(); @endphp
                      <img class="rlr-avatar__media--rounded" src="{{URL::to('/')}}/backend/image/userprofile/{{$user->photo}}" itemprop="avatar" alt="avatar icon" /width="30px;">
                      <span class="rlr-avatar__name" itemprop="name">{{$user->name}}</span>
                    </div>
                    
                    <div class="rlr-review-stars" itemprop="ratingValue" itemscope itemtype="https://schema.org/Product">

                   @php $reviewstar= DB::table('reviewtravels')->where('userid',$reviews->userid)->first(); @endphp

                   @for($i=1; $i<=5; $i++)
                  <?php 
                         if($i>$reviewstar->rating)
                         {
                          echo '<i class="rlr-icon-font flaticon-star"> </i>';
                         }
                         else
                         {
                         echo '<i class="rlr-icon-font flaticon-star-1"> </i>';
                         }
                        
                   ?>
                   @endfor
                 
                    </div>
                  </div>
                  <div class="rlr-review-card__details">
                    <div class="rlr-review-card__title">
                      <h3 class="rlr-review-card__title-review">{{$reviews->title}}</h3>
                      <span class="rlr-review-card__review-date" itemprop="review date">{{ Carbon\Carbon::parse($reviews->date)->format('d-m-Y') }}</span>
                    </div>
                    <div class="rlr-review-card__comments" itemprop="review description">
                      <div class="rlr-readmore-desc">
                        <p class="rlr-readmore-desc__content rlr-js-desc">
                          {{$reviews->reviews}}
                        </p>
                        <span class="rlr-readmore-desc__readmore rlr-js-readmore">Show more...</span>
                      </div>
                    </div>
                  </div>
                </article>
                @endforeach
                <!-- Review -->
         
          
             
                <!-- Pagination -->
                
              </div>
            </div>
            <!-- FAQ-->
            <div class="rlr-secondary-menu-desc" data-id="rlr-product-sec-faq">
              <!-- Icon -->
        

              @php $faqlist=DB::table('faqs')->where('trip_id',$trip->id)->get(); @endphp
              <div class="rlr-secondary-menu-desc__details">
                <!-- Faq Items -->
                @php $k=1; @endphp
                <div class="accordion rlr-accordion">
                  @foreach($faqlist as $key=>$faqlists)
                  @if(++$key==1)
                  <div class="accordion-item rlr-accordion__item">
                    <div class="accordion-header rlr-accordion__header" id="rlr-faq-collapse-header1">
                      <button class="accordion-button rlr-accordion__button" type="button" data-bs-toggle="collapse" data-bs-target="#rlr-faq-collapse1" aria-expanded="true" aria-controls="rlr-faq-collapse1">
                        <span class="rlr-accordion__badge">?</span> {{$faqlists->question}}
                      </button>
                    </div>
                    <div id="rlr-faq-collapse1" class="accordion-collapse collapse show" aria-labelledby="rlr-faq-collapse-header1">
                      <div class="accordion-body rlr-accordion__body">
                        <div class="rlr-readmore-desc">
                          <p class="rlr-readmore-desc__content rlr-js-desc">
                          {{$faqlists->answer}}
                          </p>
                          <span class="rlr-readmore-desc__readmore rlr-js-readmore">Show more...</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  @else
                 
                   <div class="accordion-item rlr-accordion__item">
                    <div class="accordion-header rlr-accordion__header" id="rlr-faq-collapse-header{{$k}}">
                      <button class="accordion-button rlr-accordion__button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rlr-faq-collapse{{$k}}" aria-expanded="false" aria-controls="rlr-faq-collapse{{$k}}">
                        <span class="rlr-accordion__badge">?</span> {{$faqlists->question}}
                      </button>
                    </div>
                    <div id="rlr-faq-collapse{{$k}}" class="accordion-collapse collapse" aria-labelledby="rlr-faq-collapse-header{{$k}}">
                      <div class="accordion-body rlr-accordion__body">
                        <div class="rlr-readmore-desc">
                          <p class="rlr-readmore-desc__content rlr-js-desc">
                          {{$faqlists->answer}}
                          </p>
                          <span class="rlr-readmore-desc__readmore rlr-js-readmore">Show more...</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endif
                  @php $k++; @endphp
                  @endforeach
           
                </div>
                <!-- Pagination -->
               
              </div>
            </div>


            <div class="rlr-secondary-menu-desc" data-id="rlr-product-sec-info">
              <!-- Icon -->
  
              <!-- Overview -->
              <div class="rlr-secondary-menu-desc__details">
                <div class="rlr-readmore-desc">
                  <p class="rlr-readmore-desc__content rlr-js-desc">
                   {!!$trip->how_to_reach_pickup!!}
                  </p>
                  <p class="rlr-readmore-desc__content rlr-js-desc">
                   {!!$trip->how_to_reach_dropoff!!}
                  </p>

                  <p class="rlr-readmore-desc__content rlr-js-desc">
                   {!!$trip->how_to_reach_dropoff!!}
                  </p>

                  <p class="rlr-readmore-desc__content rlr-js-desc">
                   {!!$trip->how_toreach_notes!!}
                  </p>

                  
                  <span class="rlr-readmore-desc__readmore rlr-js-readmore">Show more...</span>
                </div>
             
              </div>
            </div>
          </div>
          <!-- Booking Form -->

       
          <aside class="col-xl-4 col-xxxl-3 d-xl-block offset-xxxl-1 mt-5 mt-lg-0">
            <form method="post"action="{{route('booking')}}"class="rlr-booking-card">
              @csrf
              <fieldset class="rlr-fieldrow">
                <legend class="rlr-booking-card__legend--hide">Booking form</legend>
                <article itemscope itemtype="https://schema.org/Offer" class="rlr-booking-card__price-details rlr-fieldrow__form-element">
                  <span class="rlr-booking-card__total-price">Total price</span>
                  <header class="rlr-booking-card__offer">
                    <h2 class="rlr-booking-card__price" itemscope itemtype="https://schema.org/AggregateOffer">
                      <span class="rlr-booking-card__current-price rlr-booking-card--currency" itemprop="priceCurrency">₹</span>
                      <span itemprop="lowPrice" class="rlr-booking-card__current-price rlr-booking-card--low-price">{{$trip->pricing}}</span>
                      <span itemprop="category" class="rlr-booking-card__price-type rlr-booking-card__price-type--result"></span>
                    </h2>
                    <svg width="56" height="57" viewBox="0 0 56 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#a)">
                        <rect y=".411" width="56" height="56" rx="28" fill="#28B0A6" />
                        <path d="M24.253 40.365a1.629 1.629 0 0 1-2.31 0l-9.225-9.226a2.45 2.45 0 0 1 0-3.466l1.155-1.155a2.45 2.45 0 0 1 3.466 0l5.76 5.76L38.66 16.715a2.45 2.45 0 0 1 3.466 0l1.155 1.155a2.45 2.45 0 0 1 0 3.465l-19.029 19.03z" fill="#fff" />
                      </g>
                      <defs>
                        <clipPath id="a">
                          <path fill="#fff" transform="translate(0 .411)" d="M0 0h56v56H0z" />
                        </clipPath>
                      </defs>
                    </svg>
                  </header>
                  <span class="rlr-booking-card__info">{{$trip->pricingdescription}}</span>
                </article>
               

                @if (Auth::check()) 

                @php $type= Auth::user()->type; @endphp

                @if($type==1)
                @else
                <div class="rlr-fieldrow__item rlr-booking-card__form-item">
                  <label class="rlr-form-label rlr-form-label--dark rlr-booking-card__label" for="rlr-booking-dateranges-input"> Dates </label>
                  <div class="rlr-input-group rlr-input-group__datefield rlr-js-booking-form-daterange" id="rlr-booking-startRange">
                  <input type="date" id="date" name="bookingforcedate"class="form-control">
                  </div>
                </div> 
               <input type="hidden"name="tripid"value="{{$trip->id}}">
               
              </fieldset>
              <fieldset class="rlr-booking-card__results rlr-booking-card__results--found">
                <ul class="rlr-booking-card__result-list">
                  <li class="rlr-icon-text">
                    <i class="rlr-icon-font flaticon-three-o-clock-clock"> </i>
                    <div class="rlr-icon-text__text-wrapper">
                      <span class="">10:00 AM </span>
                      <span class="rlr-icon-text__subtext">Starting Time</span>
                    </div>
                  </li>
                </ul>
                <div class="rlr-icon-text rlr-booking-card__message">
                  <i class="rlr-icon-font flaticon-carbon-result"> </i>
                  <div class="rlr-icon-text__text-wrapper">
                    <span class="">Instant confirmation </span>
                    <span class="rlr-icon-text__subtext">Once you confirm booking, you&#x27;ll receive details to print.</span>
                  </div>
                </div>
              </fieldset>
              @if(Auth::check())
              <button type="submit"class='btn rlr-button rlr-booking-card__button'> Proceed to Booking </button>
              @else
              <a href="{{url('user-login')}}"class='btn rlr-button rlr-booking-card__button'> Proceed to Booking </a>
              @endif
              @endif
              @else

              @endif
            </form>
          </aside>

         </section>
         @guest
         @else
         @php 

         $tripcount=DB::table('reviewtravels')
         ->where('userid',auth()->user()->id)
         ->where('tripid',$trip->id)
         ->count();

         @endphp
         @if($tripcount==1)
         @else
         @php $type= Auth::user()->type; @endphp
         @if($type==1)
          @else
         <div class="container">
                                    <div class="row">
                                       <div class="col mt-4">
                                          <form class="py-2 px-4" action="{{route('review-store')}}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                                             @csrf
                                             <p class="font-weight-bold ">Review</p>
                                             <div class="form-group row">
                                                <input type="hidden" name="tripid" value=" {{$trip->id}}">
                                                <div class="col">
                                                   <div class="rate">
                                                     <input type="text"name="">
                                                      <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                                                      <label for="star5" title="text">5 stars</label>
                                                      <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                                                      <label for="star4" title="text">4 stars</label>
                                                      <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                                                      <label for="star3" title="text">3 stars</label>
                                                      <input type="radio" id="star2" class="rate" name="rating" value="2">
                                                      <label for="star2" title="text">2 stars</label>
                                                      <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                                                      <label for="star1" title="text">1 star</label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group row mt-4">
                                                <div class="col">
                                                  <input type="text"name="title"class="form-control">
                                                </div>
                                             </div>
                                             <div class="form-group row mt-4">
                                                <div class="col">
                                                   <textarea class="form-control" name="reviews" rows="6 " placeholder="Comment" maxlength="200"></textarea>
                                                </div>
                                             </div>
                                             <div class="mt-3 text-right">
                                                <button class="btn btn-sm py-2 px-3 btn-info">Submit
                                                </button>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
            @endif
            @endif
            @endguest


        <!-- Similar Products -->
        <section class="rlr-section rlr-section__mt rlr-related-product-wrapper">
          <!-- Section heading -->
          <div class="rlr-section-header">
            <!-- Section heading -->
            <div class="rlr-section__title">
              <h2 class="rlr-section__title--main">Similar Trip</h2>
              <span class="rlr-section__title--sub"></span>
            </div>
          
          </div>
          <div class="row rlr-featured__cards">
            
          @php $triplist=DB::table('trips')->take('3')->inRandomOrder()->get(); @endphp
          @foreach($triplist as $triplists)
          @if($triplists->id==$trip->id)
          @else
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-offset="250" data-aos-duration="700">
              <!-- Featured prodcut card -->
              <article class="rlr-product-card rlr-product-card--featured" itemscope itemtype="https://schema.org/Product">
                <!-- Image -->
                <figure class="rlr-product-card__image-wrapper">
                  <img itemprop="image" data-src="{{URL::to('/')}}/backend/image/trip/{{$triplists->featureimage}}" data-sizes="auto" class="lazyload" alt="" />
                </figure>
                <!-- Card body -->
              
             
              </article>
              <!-- Summary -->
              <div class="rlr-product-card--featured__summary">
              <a class='' href='{{url('trip-details',$triplists->id)}}'style="text-decoration:none;">
                <h4 class="type-h6-semi-bold">{{$triplists->name}}</h4>
              </a>
              </div>
            </div>
            @endif
            @endforeach
          </div>
        </section>
      </div>
    </main>

    @include('sweetalert::alert')
                               
    @endsection
