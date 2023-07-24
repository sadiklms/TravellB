

@foreach($trip_detail['abc'] as $abc=>$trip_details)

@extends('frontend.layout.index')
@section('content')


    <!-- Main Content -->
    <main id="rlr-main" class="rlr-main--fixed-top">
      <div class="rlr-search-results-page container">
        <div class="rlr-search-results-page__breadcrumb-section">
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb rlr-breadcrumb__items">
              <li class="breadcrumb-item rlr-breadcrumb__item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item rlr-breadcrumb__item"><a href="index.html">Destination</a></li>
              <li class="breadcrumb-item rlr-breadcrumb__item active" aria-current="page">Tour</li>
            </ol>
          </nav>
          <div class="rlr-icon-text"><i class="rlr-icon-font flaticon-phone-receiver-silhouette"> </i> <span class="rlr-search-results-page__phone">Questions? +977 (985) 110-8896 </span></div>
        </div>
        <aside class="row">
          <!-- Search results header -->
          <div class="rlr-search-results-header rlr-search-results-header__wrapper">
            <!-- Title -->
            <div class="tripshow">
           
           </div>
            <!-- Sort order -->
            <div class="rlr-search-results-header__sorting-wrapper">
              <span class="rlr-search-results-header__label">Sort by:</span>
              <div class="dropdown rlr-dropdown rlr-js-dropdown">
                <button class="btn dropdown-toggle rlr-dropdown__button rlr-js-dropdown-button" type="button" id="rlr_dropdown_menu_search_results" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="-50,35">Most Popular</button>
                <ul class="dropdown-menu rlr-dropdown__menu" aria-labelledby="rlr_dropdown_menu_search_results">
                  <li>
                    <a class="dropdown-item rlr-dropdown__item rlr-js-dropdown-item filter"data-id="1" href="javascript:void(0)">Recommended</a>
                  </li>
                  <li>
                    <a class="dropdown-item rlr-dropdown__item rlr-js-dropdown-item filter"data-id="2" href="javascript:void(0)">Price (Low to High)</a>
                  </li>
                  <li>
                    <a class="dropdown-item rlr-dropdown__item rlr-js-dropdown-item  filter"data-id="3" href="javascript:void(0)">Price (High to Low)</a>
                  </li>
                  <li>
                    <hr class="dropdown-divider rlr-dropdown__divider" />
                  </li>
                  
                  </ul>
              </div>
            </div>
          </div>
        </aside>
        <!-- Dynamic filter -->

        <!-- Product cards -->
        <div class="row rlr-search-results-page__product-details">
          <aside class="col-xl-3 rlr-search-results-page__sidebar">
            <form method="post"action="{{route('typeby-filter')}}">
              @csrf
            <div class="rlr-product-filters__filters-wrapper">
              <!-- Search filter -->
              <div class="rlr-product-filters__filter">
                <label class="rlr-form-label rlr-form-label-- rlr-product-filters__label"> When are you travelling? </label>
           
              </div>
              <!-- Popular tags filter -->
              <div class="rlr-product-filters__filter">
                <label class="rlr-form-label rlr-form-label-- rlr-product-filters__label"> Popular Type </label>
                <ul class="rlr-checkboxes">
                  @php $type=DB::table('types')->get(); @endphp

                  @foreach($type as $types)
                  <li class="form-check form-check-block">
                    <input class="form-check-input rlr-form-check-input rlr-product-filters__checkbox" name="type[]"id="rlr-product-tag-1"value="{{$types->id}}" type="checkbox" />
                    <label class="rlr-form-label rlr-form-label--checkbox rlr-product-filters__checkbox-label" for="rlr-product-tag-1"> {{$types->title}} </label>
                  </li>
                  @endforeach
                  
                </ul>
              </div>
              <!-- Price range filter -->
          
       
           
             
              <div class="rlr-product-filters__filter">
                <label class="rlr-form-label rlr-form-label-- rlr-product-filters__label"> Specials </label>
                <ul class="rlr-checkboxes">
                @php $travelgroup=DB::table('travelgroups')->get(); @endphp
                @foreach($travelgroup as $travelgroups)

               @php $userid=DB::table('users')->where('id',$travelgroups->userid)->first(); @endphp
                  <li class="form-check form-check-block">
                    <input class="form-check-input rlr-form-check-input rlr-product-filters__checkbox" id="rlr-filter-speicals-1" type="checkbox" />
                    <label class="rlr-form-label rlr-form-label--checkbox rlr-product-filters__checkbox-label" for="rlr-filter-speicals-1">{{$userid->name}}</label>
                  </li>
                @endforeach 
                </ul>
              </div>
              <button type="submit"class="btn btn-success"> Save </button>
            </div>
            
            </form>
          </aside>
          <div class="rlr-search-results-page__product-list col-lg-9">
            <div class="row rlr-search-results-page__card-wrapper tripfilter">
            
            @if(empty($trip_detail))
            <h1>No Trip Available</h1>
            @else
            @foreach($trip_detail as $tripsdetails)
           
            
              <div class="col-md-6 col-lg-4">
                <!-- Product card item -->
                <article class="rlr-product-card rlr-product-card--v3" itemscope itemtype="https://schema.org/Product">
                  <!-- Product card image -->
                  <figure class="rlr-product-card__image-wrapper">
                   
                    <div class="swiper rlr-js-product-multi-image-swiper">
                      <div class="swiper-wrapper ">
                      @php  $image=json_decode($tripsdetails->imagegallery); @endphp
                        @foreach($image as $images)
                        <div class="swiper-slide">
                          <a href="{{url('trip-details',$tripsdetails->id)}}">
                          <img itemprop="image" data-sizes="auto" data-src="{{URL::to('/')}}/backend/image/trip/{{$images}}"style="height:220px;width:100%;object-fit:fill;" class="lazyload" alt="product-image" />
                          </a>
                        </div>
                        @endforeach
                      </div>
                      <button type="button" class="btn rlr-button splide__arrow splide__arrow--prev" aria-label="prev button">
                        <i class="rlr-icon-font flaticon-left-chevron"> </i>
                      </button>
                      <button type="button" class="btn rlr-button splide__arrow splide__arrow--next" aria-label="next button">
                        <i class="rlr-icon-font flaticon-chevron"> </i>
                      </button>
                    </div>
                  </figure>
                  <div class="rlr-product-card__detail-wrapper rlr-js-detail-wrapper">
                    <!-- Product card header -->
                    <header class="rlr-product-card__header">
                      <div>
                        <a class='rlr-product-card__anchor-title' href='{{url('trip-details',$tripsdetails->id)}}'>
                          <h2 class="rlr-product-card__title" itemprop="name">{{$tripsdetails->name}}</h2>
                        </a>
                        <div>
                          @if($trip=='type-trip')
                         
                          @php  $type_name=DB::table('types')->where('id',$id)->first();  @endphp

                          <a class='rlr-product-card__anchor-cat' href="{{url('trip-details',$tripsdetails->id)}}">
                            <span class="rlr-product-card__sub-title">{{$type_name->title}}</span>
                          </a>
                          @elseif($trip=='location-trip')
                        
                         @php  $location_type=DB::table('locationtypes')->where('id',$id)->first();  @endphp

                          <a class='rlr-product-card__anchor-cat' href="{{url('trip-details',$tripsdetails->id)}}">
                            <span class="rlr-product-card__sub-title">{{$location_type->title}}</span>
                          </a>
                          <span class="rlr-product-card__sub-title"></span>
                          
                          @elseif($trip=='specialfeature-trip')
                           
                          @php  $specialfeature_name=DB::table('specialfeatures')->where('id',$id)->first();  @endphp

                          <a class='rlr-product-card__anchor-cat' href="{{url('trip-details',$tripsdetails->id)}}">
                            <span class="rlr-product-card__sub-title">{{$specialfeature_name->title}}</span>
                          </a>
                        
                          @elseif($trip=='areatype-trip')
                           
                           @php  $areatype=DB::table('areatypes')->where('id',$id)->first();  @endphp
                            <a class='rlr-product-card__anchor-cat' href="{{url('trip-details',$tripsdetails->id)}}">
                              <span class="rlr-product-card__sub-title">{{$areatype->title}}</span>
                             </a>
                          @endif
                          
                        </div>
                      </div>
                    </header>
                    <!-- Product card body -->
                    <div class="rlr-product-card__details">
                      <div class="rlr-product-card__prices" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                       
                        <span class="rlr-product-card__price"> <mark itemprop="priceCurrency">₹</mark><mark itemprop="price">{{$tripsdetails->pricing}}</mark> </span>
                      </div>
                      <div class="rlr-product-card__ratings" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                        <div class="rlr-review-stars" itemprop="ratingValue" itemscope itemtype="https://schema.org/Product">
                      @php $reviewstar= DB::table('reviewtravels')->where('tripid',$tripsdetails->id)->sum('rating'); @endphp
                     @php $reviewcount= DB::table('reviewtravels')->where('tripid',$tripsdetails->id)->count(); @endphp

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
                 <?php
         
         $floatValue ='';
       
      ?>
                 @endif
                          
                        </div>
                        <span class="rlr-product-card__rating-text" itemprop="reviewCount">{{$floatValue}} ({{$reviewcount}})</span>
                      </div>
                    </div>
                    <!-- Product card footer -->
                  
                </article>
              </div>
              @endforeach
            
              @endif

            </div>
            <hr class="rlr-search-results-page__divider" />
    
          </div>
        </div>
      </div>
    </main>
    @endsection
 
@endforeach