
                 
     @extends('frontend.layout.index')
     @section('content')   
    <!-- Main Content -->
    <main id="rlr-main" class="rlr-main--fixed-top">
      <!-- Hero Banner -->
      <section class="rlr-about-hero">
        <div class="container">
            @php $about=DB::table('aboutuses')->first(); @endphp
          <div class="rlr-about-hero__content">
            <img class="rlr-about-hero__bg" src="{{URL::to('/')}}/backend/image/about/{{$about->bannerimage}}" alt="..." />
       
          </div>
        </div>
      </section>
      <!-- Our Vision -->
      <section class="rlr-about rlr-section rlr-section__my">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <!-- Section heading -->
              
                <h2 class="rlr-section__title--main">About sadik</h2>
               
              
              <p class="rlr-text-card__desc">{{$about->title}}</p>
            </div>
            <div class="offset-xl-1 col-lg-5">
              <div class="rlr-img  img-fluid">
                <img class="img-fluid" src="{{URL::to('/')}}/backend/image/about/{{$about->image}}" alt=" image our vision" />
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Our Values -->
     
      <!-- Our Team -->
      <!-- <section class="rlr-section">
        <div class="container">
          <div class="row">
           
            <div class="rlr-section__title rlr-section__title--centered">
              <h2 class="rlr-section__title--main">Our Team</h2>
              <span class="rlr-section__title--sub"></span>
            </div>
            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-offset="250" data-aos-duration="500">
            
              <div class="rlr-team-card rlr-team-card--v2">
               
                <div class="rlr-team-card__thumb">
                  <img src="../d33wubrfki0l68.cloudfront.net/ce34052559e5c13bcf01486fb155a11f800c3768/28124/assets/images/team/team-03.jpg" alt="Member Photo" />
                </div>
               
                <div class="rlr-team-card__summary">
                  <h3 class="rlr-team-card__title">
                    <a href="#">Devon Lane</a>
                  </h3>
                  <h3 class="rlr-team-card__subtitle">Founder</h3>
                 
                  <p class="rlr-team-card__desc">ed non iaculis sem</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-offset="300" data-aos-duration="600">
            
              <div class="rlr-team-card rlr-team-card--v2">
               
                <div class="rlr-team-card__thumb">
                  <img src="../d33wubrfki0l68.cloudfront.net/906752cfbe1886e3b76c07eaa844efbdcb0ba818/d6e7f/assets/images/team/team-05.jpg" alt="Member Photo" />
                </div>
               
                <div class="rlr-team-card__summary">
                  <h3 class="rlr-team-card__title">
                    <a href="#">Cleona Mathur</a>
                  </h3>
                  <h3 class="rlr-team-card__subtitle">Co-Founder</h3>
                 
                  <p class="rlr-team-card__desc">ed non iaculis sem</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-offset="350" data-aos-duration="700">
              
              <div class="rlr-team-card rlr-team-card--v2">
               
                <div class="rlr-team-card__thumb">
                  <img src="../d33wubrfki0l68.cloudfront.net/f3314970165fff293c63df6aa26662293a026994/4399d/assets/images/team/team-06.jpg" alt="Member Photo" />
                </div>
              
                <div class="rlr-team-card__summary">
                  <h3 class="rlr-team-card__title">
                    <a href="#">Darren Spratt</a>
                  </h3>
                  <h3 class="rlr-team-card__subtitle">Tour Manager</h3>
                  
                  <p class="rlr-team-card__desc">ed non iaculis sem</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-offset="400" data-aos-duration="800">
             
              <div class="rlr-team-card rlr-team-card--v2">
              
                <div class="rlr-team-card__thumb">
                  <img src="../d33wubrfki0l68.cloudfront.net/b88d405ba5a5b38620d79ebd8f499815c451707d/f45d7/assets/images/team/team-04.jpg" alt="Member Photo" />
                </div>
               
                <div class="rlr-team-card__summary">
                  <h3 class="rlr-team-card__title">
                    <a href="#">Lejla Fizovic</a>
                  </h3>
                  <h3 class="rlr-team-card__subtitle">Administrator</h3>
                  
                  <p class="rlr-team-card__desc">ed non iaculis sem</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
    </main>
   @endsection