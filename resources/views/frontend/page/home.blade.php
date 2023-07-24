
@extends('frontend.layout.index')
@section('content')
    <!-- Main Content -->
    <main id="rlr-main" class="rlr-main--fixed-top">
      <!-- Hero Banner -->
      <aside class="rlr-hero--half-mast">
        <div class="container">
          <div id="rlr_banner_slider" class="splide rlr-banner-splide rlr-banner-splide--v3">
            <div class="splide__track rlr-banner-splide__track">
              <ul class="splide__list">
                <!-- Banner slide 1 -->

                @php  $banner=DB::table('banners')->get(); @endphp

                @foreach($banner as $banners)
                <li class="splide__slide rlr-banner-splide__slide">
                  <div class="rlr-banner-splide__image-wrapper">
                    <img class="rlr-banner-splide__banner-img lazyload" data-sizes="auto" data-src="{{URL::to('/')}}/backend/image/banner/{{$banners->image}}" src="{{URL::to('/')}}/backend/image/banner/{{$banners->image}}" alt="#" />
                  </div>
                  <article class="rlr-banner-splide__content-wrapper">
                  
                    <div class="rlr-banner-splide__content-desc">
                      <div class="rlr-banner-splide__temperature">
                        
                        <div class="rlr-banner-splide__arrows">
                          <button class="rlr-banner-splide__arrow rlr-banner-splide__arrow--prev rlr-banner-js-arrow-prev" aria-label="prev button">
                            <span> <i class="rlr-icon-font flaticon-left"> </i> </span>
                          </button>
                          <button class="rlr-banner-splide__arrow rlr-banner-splide__arrow--next rlr-banner-js-arrow-next" aria-label="next button">
                            <span> <i class="rlr-icon-font flaticon-right"> </i> </span>
                          </button>
                        </div>
                      </div>
                     
                    </div>
                  </article>
                </li>
                @endforeach

                <!-- Banner slide 2 -->
                <!-- <li class="splide__slide rlr-banner-splide__slide">
                  <div class="rlr-banner-splide__image-wrapper">
                    <img class="rlr-banner-splide__banner-img lazyload" data-sizes="auto" data-src="https://d33wubrfki0l68.cloudfront.net/b05f530509166c4c1a4c515357383aaa79ffcb51/200a2/assets/images/banner/banner-03-2.jpg" src="../d33wubrfki0l68.cloudfront.net/b05f530509166c4c1a4c515357383aaa79ffcb51/200a2/assets/images/banner/banner-03-2.jpg" alt="#" />
                  </div>
                  <article class="rlr-banner-splide__content-wrapper">
                    <header class="rlr-banner-splide__header">
                      <h2 class="rlr-banner-splide__slogan">Find your next adventure</h2>
                      <span class="rlr-banner-splide__sub-title">The Himalayan Mountain Ranges</span>
                    </header>
                    <div class="rlr-banner-splide__content-desc">
                      <div class="rlr-banner-splide__temperature">
                        <span>27° C Moderate</span>
                        <div class="rlr-banner-splide__arrows">
                          <button class="rlr-banner-splide__arrow rlr-banner-splide__arrow--prev rlr-banner-js-arrow-prev" aria-label="prev button">
                            <span> <i class="rlr-icon-font flaticon-left"> </i> </span>
                          </button>
                          <button class="rlr-banner-splide__arrow rlr-banner-splide__arrow--next rlr-banner-js-arrow-next" aria-label="next button">
                            <span> <i class="rlr-icon-font flaticon-right"> </i> </span>
                          </button>
                        </div>
                      </div>
                      <div class="rlr-banner-splide__payment-option">
                        <span> <i class="rlr-icon-font flaticon-credit-cards-payment"> </i> </span>
                        <div class="rlr-banner-splide__content-desc-right">
                          <span class="rlr-banner-splide__payment-desc">We Accept Payment Through All Cards & Banking</span>
                          <a class='btn rlr-button rlr-banner-splide__book-now' href='product-detail-page.html'> Book Now! </a>
                        </div>
                      </div>
                    </div>
                  </article>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
      </aside>
      <div class="container">
        <!-- Search banner -->
        <form class="rlr-banner-search rlr-banner-search--hero-half-mast">
          <div class="rlr-banner-search__input-wrapper">
            <!-- Destination -->
            <div class="rlr-banner-input-group rlr-banner-input-group rlr-banner-input-group--home-search rlr-js-autocomplete-demo rlr-banner-search__banner-input rlr-js-search-layout-wrapper">
              <label class="rlr-banner-input-group__label" for="destination_input">
                <mark>Location</mark>
              </label>
              <div class="rlr-banner-input-group__input-wrapper">
                <input id="destination_input" name="location" type="text" autocomplete="off" class="rlr-banner-input-group__input destination_input" placeholder="Enter your destination" />
                <i class="rlr-icon-font flaticon-map-marker"> </i>
                <ul id="home_destination_results" class="rlr-banner-input-group--location-dropdown rlr-autocomplete"></ul>
              </div>
            </div>
            <!-- Activity -->
            <div class="rlr-banner-input-group rlr-js-autocomplete-activity-demo rlr-banner-search__banner-input rlr-js-search-layout-wrapper">
              <label class="rlr-banner-input-group__label" for="rlr-banner-input-group-activity">
                <mark>Activity</mark>
              </label>
              <div class="rlr-banner-input-group__input-wrapper">
                <input id="rlr-banner-input-group-activity" name="activity" type="text" autocomplete="off" class="rlr-banner-input-group__input activity_autocomplete" placeholder="Bungee jump" />
                <i class="rlr-icon-font flaticon-outline-down"> </i>
                <ul id="autocomplete-results" class="rlr-banner-input-group--activity-dropdown rlr-autocomplete"></ul>
              </div>
            </div>
            <!-- Date -->
            <div class="rlr-banner-input-group rlr-banner-search__banner-input rlr-js-search-layout-wrapper">
              <label class="rlr-banner-input-group__label" for="rlr-banner-input-group-dates">
                <mark>Date</mark>
              </label>
              <div class="rlr-banner-input-group__input-wrapper">
                <input id="rlr-banner-input-group-dates" type="text" autocomplete="off" class="rlr-banner-input-group__input eee_home_search_flatpickr" placeholder="Set dates" />
                <i class="rlr-icon-font flaticon-calendar"> </i>
                <ul id="home_date_results" class="rlr-banner-input-group--date-dropdown rlr-autocomplete"></ul>
              </div>
            </div>
          </div>
          <button class="rlr-banner-search__submit-button" aria-label="banner submit">
            <i class="rlr-icon-font flaticon-search"> </i>
          </button>
        </form>
      </div>
      <!-- Product Carousel -->
      <section class="rlr-section rlr-section__mb">
        <div class="container">
          <!-- Swiper -->
          <div class="rlr-carousel__items">
            <div class="swiper rlr-js-product-card-swiper">
              <!-- Carousel header -->
              <div class="rlr-section-header">
                <!-- Section heading -->
                <div class="rlr-section__title">
                  <h2 class="rlr-section__title--main">Trending 2022</h2>
                  <span class="rlr-section__title--sub">The trending tours are based on user bookings.</span>
                </div>
                <div class="button-row">
                  <button type="button" class="btn rlr-button button button--previous rlr-button--carousel" aria-label="Previous">
                    <i class="rlr-icon-font flaticon-left-chevron"> </i>
                  </button>
                  <div class="button-group button-group--cells">
                    <button class="button is-selected">1</button>
                    <button class="button">2</button>
                  </div>
                  <button type="button" class="btn rlr-button button button--next rlr-button--carousel" aria-label="Next">
                    <i class="rlr-icon-font flaticon-chevron"> </i>
                  </button>
                </div>
              </div>
              <div class="swiper-wrapper">
                @php $trip=DB::table('trips')->get(); @endphp

                @foreach($trip as $trips)
                <div class="swiper-slide">
                  <!-- Product card item -->
                  <article class="rlr-product-card rlr-product-card--v3" itemscope itemtype="https://schema.org/Product">
                    <!-- Product card image -->
                    <figure class="rlr-product-card__image-wrapper">
                      
                      <div class="rlr-product-detail-header__button-wrapper">
                        
                        <span class="rlr-product-detail-header__helptext rlr-js-helptext"></span>
                      </div>
                      <div class="swiper rlr-js-product-multi-image-swiper">
                        <div class="swiper-wrapper">
 
                       @php  $image=json_decode($trips->imagegallery); @endphp

                          @foreach($image as $images)
                          <div class="swiper-slide">
                            <a href="{{url('trip-details',$trips->id)}}">
                            <img itemprop="image" data-sizes="auto" data-src="{{URL::to('/')}}/backend/image/trip/{{$images}}" data-srcset="{{URL::to('/')}}/backend/image/trip/{{$images}}" style="height:250px;width:280px;" class="lazyload" alt="product-image" />
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
                          <a class='rlr-product-card__anchor-title' href="{{url('trip-details',$trips->id)}}">
                            <h2 class="rlr-product-card__title" itemprop="name">{{$trips->name}}</h2>
                          </a>
                          <div>
                          @php $type=json_decode($trips->type); @endphp

                            @foreach($type as $types)
                            @php $type=DB::table('types')->where('id',$types)->first(); @endphp

                            <a class='rlr-product-card__anchor-cat' href="{{url('trip-details',$trips->id)}}">
                              <span class="rlr-product-card__sub-title">{{$type->title}}</span>
                            </a>
                            @endforeach
                         
                          </div>
                        </div>
                      </header>
                      <!-- Product card body -->
                      <div class="rlr-product-card__details">
                        <div class="rlr-product-card__prices" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                          <!-- <span class="rlr-product-card__from">from </span> -->
                          <span class="rlr-product-card__price"> <mark itemprop="priceCurrency">₹</mark><mark itemprop="price">{{$trips->pricing}}</mark> </span>
                        </div>
                        <div class="rlr-product-card__ratings" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                          <div class="rlr-review-stars" itemprop="ratingValue" itemscope itemtype="https://schema.org/Product">
                          @php $reviewstar= DB::table('reviewtravels')->where('tripid',$trips->id)->sum('rating'); @endphp
                  
                          @php $reviewcount= DB::table('reviewtravels')->where('tripid',$trips->id)->count(); @endphp

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
                     
                    </div>
                  </article>
                </div>
                @endforeach
              
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Category Carousel -->
      <section class="rlr-section rlr-section__mb">
        <div class="container">
          <!-- Swiper -->
          <div class="rlr-carousel__items">
            <div class="swiper rlr-js-category-card-swiper">
              <!-- Carousel header -->
              <div class="rlr-section-header">
                <!-- Section heading -->
                <div class="rlr-section__title">
                  <h2 class="rlr-section__title--main">Select Category</h2>
                  <span class="rlr-section__title--sub">Find activities based on your adventure styles.</span>
                </div>
                <div class="button-row">
                  <button type="button" class="btn rlr-button button button--previous rlr-button--carousel" aria-label="Previous">
                    <i class="rlr-icon-font flaticon-left-chevron"> </i>
                  </button>
                  <div class="button-group button-group--cells">
                    <button class="button is-selected">1</button>
                    <button class="button">2</button>
                  </div>
                  <button type="button" class="btn rlr-button button button--next rlr-button--carousel" aria-label="Next">
                    <i class="rlr-icon-font flaticon-chevron"> </i>
                  </button>
                </div>
              </div>
              <div class="swiper-wrapper">

              @php $locationtype=DB::table('locationtypes')->get();@endphp

              @foreach($locationtype as $locationtypes)
                <div class="swiper-slide" data-aos="fade-up" data-aos-duration="700" data-aos-once="true">
                  <!-- Category card item -->
                  <article class="rlr-category-card">
                    
                    <div class="rlr-category-card__icon">
                      <a href="{{url('locationtype',['id' => $locationtypes->id, 'trip' => 'location-trip'])}}">
                     <img src="{{URL::to('/')}}/backend/image/locationtype/{{$locationtypes->picture}}"style="height:250px;width:250px">
                    </a>
                    </div>
                    <header>
                      <a class='rlr-category-card__title' href="{{url('locationtype',['id' => $locationtypes->id, 'trip' => 'location-trip'])}}">
                        <h4>{{$locationtypes->title}}</h4>
                      </a>
                     
                    </header>
                  </article>
                </div>
                @endforeach
            
            </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Destination Masonary Grid -->
      <section class="rlr-section rlr-section__mb">
        <div class="container">
          <!-- Section heading -->
          <div class="rlr-section__title">
            <h2 class="rlr-section__title--main">Top Destinations</h2>
            <span class="rlr-section__title--sub">Top destinations are based on user search volumes.</span>
          </div>
          <div class="rlr-masonary-grid__container">

            @php $type=DB::table('types')->take(2)->get(); @endphp
            @foreach($type as $key=>$types)

            <div class="@if(++$key==1) rlr-masonary-grid__one @else rlr-masonary-grid__two @endif">
              <!-- Destination card -->
              <a class='rlr-destination-card' href="{{url('type',['id' => $types->id, 'trip' => 'type-trip'])}}">
                <img data-sizes="auto" data-src="{{URL::to('/')}}/backend/image/type/{{$types->picture}}" data-srcset="{{URL::to('/')}}/backend/image/type/{{$types->picture}}"style="height:288px;width:100%;object-fit:cover;"class="rlr-destination-card__img lazyload" alt="..." />
               
                <div class="rlr-destination-card__info rlr-destination-card__info--left rlr-destination-card__info--bottom">
                  
                  <p class="rlr-destination-card__info--sub"></p>
                </div>
              </a>
            </div>
            @endforeach
          

            @php $type=DB::table('types')->get(); @endphp
            @foreach($type as $key=>$types)
             @if(++$key==3)
            <div class="rlr-masonary-grid__three">
              <!-- Destination card -->
              <a class='rlr-destination-card' href='{{url('type',['id' => $types->id, 'trip' => 'type-trip'])}}'>
                <img data-sizes="auto" data-src="{{URL::to('/')}}/backend/image/type/{{$types->picture}}" data-srcset="{{URL::to('/')}}/backend/image/type/{{$types->picture}}"style="height:620px;width:100%;object-fit:cover;" class="rlr-destination-card__img lazyload" alt="..." />
                <div class="rlr-destination-card__info rlr-destination-card__info--left rlr-destination-card__info--bottom">
                 
                  <p class="rlr-destination-card__info--sub"></p>
                </div>
              </a>
            </div>
            @endif
            @endforeach

            @php $type=DB::table('types')->get(); @endphp
            @foreach($type as $key=>$types)
            @if(++$key==4)
            <div class="rlr-masonary-grid__four">
              <!-- Destination card -->
              <a class='rlr-destination-card' href='{{url('type',['id' => $types->id, 'trip' => 'type-trip'])}}'>
                <img data-sizes="auto" data-src="{{URL::to('/')}}/backend/image/type/{{$types->picture}}"style="height:300px;width:100%;object-fit:cover;"  data-srcset="{{URL::to('/')}}/backend/image/type/{{$types->picture}}" class="rlr-destination-card__img lazyload" alt="..." />

               
                <div class="rlr-destination-card__info rlr-destination-card__info--left rlr-destination-card__info--bottom">
                 
                  <p class="rlr-destination-card__info--sub"></p>
                </div>
              </a>
            </div>
            @endif
            @endforeach
    
            @php $type=DB::table('types')->get(); @endphp
            @foreach($type as $key=>$types)
            @if(++$key==5)
            <div class="rlr-masonary-grid__five">
              <!-- Destination card -->
              <a class='rlr-destination-card' href='{{url('type',['id' => $types->id, 'trip' => 'type-trip'])}}'>
                <img data-sizes="auto" data-src="{{URL::to('/')}}/backend/image/type/{{$types->picture}}" data-srcset="{{URL::to('/')}}/backend/image/type/{{$types->picture}}" style="height:290px;object-fit:cover;"  class="rlr-destination-card__img lazyload" alt="..." />
               
                <div class="rlr-destination-card__info rlr-destination-card__info--left rlr-destination-card__info--bottom">
                  
                  <p class="rlr-destination-card__info--sub"></p>
                </div>
              </a>
            </div>
            @endif
            @endforeach
        

            @php $type=DB::table('types')->get(); @endphp
            @foreach($type as $key=>$types)
            @if(++$key==6)
            <div class="rlr-masonary-grid__six">
              <!-- Destination card -->
              <a class='rlr-destination-card' href='{{url('type',['id' => $types->id, 'trip' => 'type-trip'])}}'>
                <img data-sizes="auto" data-src="{{URL::to('/')}}/backend/image/type/{{$types->picture}}"style="height:290px;width:100%;object-fit:cover;" data-srcset="{{URL::to('/')}}/backend/image/type/{{$types->picture}}" class="rlr-destination-card__img lazyload" alt="..." />
                
                <div class="rlr-destination-card__info rlr-destination-card__info--left rlr-destination-card__info--bottom">
                 
                 
                </div>
              </a>
            </div>
            @endif
            @endforeach

          </div>
        </div>
      </section>
      <!-- Best Sellers -->
      <section class="rlr-section rlr-section__mb rlr-section__cards">
        <div class="container">
          <!-- Section heading -->
          <div class="rlr-section-header">
            <!-- Section heading -->
            <div class="rlr-section__title">
              <h2 class="rlr-section__title--main">Best Seller</h2>
              <span class="rlr-section__title--sub">The best sellers are based on sales volume.</span>
            </div>
           
          </div>
          <div class="row rlr-featured__cards">

           @php $specialfeature=DB::table('specialfeatures')->take(3)->get(); @endphp

           @foreach($specialfeature as $key=>$specialfeatures)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-offset="250" data-aos-duration="700">
              <!-- Featured prodcut card -->
              <article class="rlr-product-card rlr-product-card--featured" itemscope itemtype="https://schema.org/Product">
                <!-- Image -->
                <figure class="rlr-product-card__image-wrapper">
                  <a href="{{url('specialfeature',['id' => $specialfeatures->id, 'trip' => 'specialfeature-trip'])}}">
                  <img itemprop="image" data-src="{{URL::to('/')}}/backend/image/specialfeature/{{$specialfeatures->picture}}"style="height:250px;weight:250px;"data-sizes="auto" class="lazyload" alt="" />
                  </a>
                </figure>
                <!-- Card body -->
                <div class="rlr-product-card--featured__inner">
                 
                  <div class="rlr-product-card--featured__body card-img-overlay">
                   
                    <div class="rlr-product-detail-header__actions">
                      <div class="rlr-product-detail-header__button-wrapper">
                        
                        <span class="rlr-product-detail-header__helptext rlr-js-helptext"></span>
                      </div>
                     
                    </div>
                  </div>
                </div>
                <a class='rlr-product-card__anchor rlr-product-card__anchor--featured' href="{{url('specialfeature',['id' => $specialfeatures->id, 'trip' => 'specialfeature-trip'])}}"></a>
              </article>
              <!-- Summary -->
              
            </div>
            @endforeach
          </div>
        </div>
      </section>
      <!-- Logo Carousel -->
      <section id="features" class="rlr-section rlr-section__mb landding__plugin">
        <div class="container">
          <div class="rlr-logos-slider">
            <div class="rlr-logos-slider__items">
              <div class="slide-track">

              @php $logo=DB::table('logopartners')->get(); @endphp

              @foreach($logo as $logos)
                <div class="slide">
                  <img data-sizes="auto" class="lazyload" data-src="{{URL::to('/')}}/backend/image/logo/{{$logos->image}}" width="187" height="64" alt="partner logo" />
                </div>
              @endforeach
               
              </div>
            </div>
          </div>
        </div>
      </section>
      @php $generalsetting=DB::table('generalsettings')->first(); @endphp
      <!-- Sales and Support -->
      <section class="rlr-section">
        <div class="container">
          <!-- Section heading -->
          <div class="rlr-section__title rlr-section__title--centered">
            <h2 class="rlr-section__title--main">Still have a question?</h2>
            <span class="rlr-section__title--sub">We are available 24/7 to answer our clients queries.</span>
          </div>
          <div class="row">
            <div class="offset-lg-1 col-lg-5" data-aos="fade-down-right" data-aos-duration="700" data-aos-once="true">
              <div class="rlr-support-card rlr-support-card--sale">
                <div class="rlr-support-card__content">
                  <div class="rlr-support-card__img-wrapper">
                    <img src="https://d33wubrfki0l68.cloudfront.net/a3a2ee57a92e0b0322f02b7f0dbda7a625479d57/5deeb/assets/svg/headset.svg" alt="headset" />
                  </div>
                  <h2 class="rlr-support-card__title">For Sales</h2>
                  <p class="rlr-support-card__subtitle rlr-support-card__text">{{@$generalsetting->address}}</p>
                  <p class="rlr-support-card__text">{{@$generalsetting->email}}</p>
                  <p class="rlr-support-card__text">{{@$generalsetting->phone}}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-5" data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
              <div class="rlr-support-card rlr-support-card--help">
                <div class="rlr-support-card__content">
                  <div class="rlr-support-card__img-wrapper">
                    <img src="https://d33wubrfki0l68.cloudfront.net/686abac3955a75eb9a78c5324676c5b64a67410e/3aca8/assets/svg/help-circle.svg" alt="headset" />
                  </div>
                  <h2 class="rlr-support-card__title">Help &amp; Support</h2>
                  <p class="rlr-support-card__subtitle rlr-support-card__text">{{@$generalsetting->help_address}}</p>
                  <p class="rlr-support-card__text">{{@$generalsetting->help_email}}</p>
                  <p class="rlr-support-card__text">{{@$generalsetting->help_phone}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    @include('sweetalert::alert')
@endsection
  