@if($tripcount==0)
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
             