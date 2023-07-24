
                 
     @extends('frontend.layout.index')
     @section('content')   
    <!-- Main Content -->
    <main id="rlr-main" class="rlr-main--fixed-top">
      <!-- Hero Banner -->
      <section class="rlr-about-hero">
        <div class="container">
            @php $returnpolicy=DB::table('returnpolicies')->first(); @endphp
          
        </div>
      </section>
      <!-- Our Vision -->
      <section class="rlr-about rlr-section rlr-section__my">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- Section heading -->
              <h2 class="rlr-section__title--main">Return Policy</h2>
               <p class="rlr-text-card__desc">{!!$returnpolicy->returnpolicy!!}</p>
            </div>
            <div class="offset-xl-1 col-lg-5">
           
            </div>
          </div>
        </div>
      </section>
   
    </main>
   @endsection