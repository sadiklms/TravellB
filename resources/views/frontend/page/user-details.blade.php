
@extends('frontend.layout.index')
@section('content')
<style>

.rlr-section__content--lg-top {
  margin-top:0px;
}
</style>
    <!-- Main Content --> 
    <main id="rlr-main" class="rlr-main--fixed-top">
      <div class="rlr-section__content--lg-top">
        <section class="rlr-section rlr-section__mt rlr-account">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 offset-lg-4">
                <form method="post"action="{{route('userdetail-store')}}" enctype="multipart/form-data">
                    @csrf
                  <div class="rlr-authforms__header">
                    <img src="https://d33wubrfki0l68.cloudfront.net/7aa117a3131fd60197dc98c1b95aabffdabf254b/aad64/assets/images/logos/logomark.svg" alt="Logo" />
                    <h2>User Details</h2>
                   
                  </div>
                  <div class="rlr-authforms__form">
                  <div class="rlr-authforms__inputgroup">
                      <label class="rlr-form-label rlr-form-label--light required">state</label> <input type="text" name="state" autocomplete="off" class="form-control form-control--light" />
                     
                    </div>

                    <div class="rlr-authforms__inputgroup">
                      <label class="rlr-form-label rlr-form-label--light required">City</label> <input type="text" name="city" autocomplete="off" class="form-control form-control--light" />
                     
                    </div>

                    <div class="rlr-authforms__inputgroup">
                      <label class="rlr-form-label rlr-form-label--light required">Zipcode</label> <input type="text" name="zipcode" autocomplete="off" class="form-control form-control--light" />
                     
                    </div>

                    <div class="rlr-authforms__inputgroup">
                      <label class="rlr-form-label rlr-form-label--light required">Addresses</label> <input type="text" name="address" autocomplete="off" class="form-control form-control--light" />
                    </div>

                    <div class="rlr-authforms__inputgroup">
                      <label class="rlr-form-label rlr-form-label--light required">Profile Picture</label> 
                      <input type="file"class="form-control" name="photo" autocomplete="off" class=" form-control--light" />
                     
                    </div>
                    
                    <button type="submit" class="btn mb-3 rlr-button rlr-button--fullwidth rlr-button--primary">Save</button>
                   
                  </div>
                 
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
    @include('sweetalert::alert') 
    @endsection
