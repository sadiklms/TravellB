

@extends('frontend.layout.index')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>

.rlr-section__content--lg-top {
  margin-top:0px;
}

.card{

width: 800px;
border:none;

}
.btr{

border-top-right-radius: 5px !important;
}


.btl{

border-top-left-radius: 5px !important;
}

/* .btn-dark {
  color: #fff;
  background-color: #0d6efd;
  border-color: #0d6efd;
} */

/* 
.btn-dark:hover {
  color: #fff;
  background-color: #0d6efd;
  border-color: #0d6efd;
} */


.nav-pills{

display:table !important;
width:100%;
}

.nav-pills .nav-link {
  border-radius: 0px;
      border-bottom: 1px solid #0d6efd40;

}

.nav-item{
    display: table-cell;
     background: #0d6efd2e;
}


.form{

padding: 10px;
    height: 300px;
}

.form input{

margin-bottom: 12px;
border-radius: 3px;
}


.form input:focus{

box-shadow: none;
}

.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #17a4b1!important;
}

.form button{

margin-top: 20px;
}
</style>
    <!-- Main Content -->
    <main id="rlr-main" class="rlr-main--fixed-top">
      <div class="rlr-section__content--lg-top">
        <section class="rlr-section rlr-section__mt rlr-account">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 offset-lg-4">
                  <!-- <form method="post"action="{{route('registeruser')}}"enctype="multipart/form-data">
                      @csrf
                <div class="rlr-authforms">
                  <div class="rlr-authforms__header">
                    <img class="mb-2" src="https://d33wubrfki0l68.cloudfront.net/7aa117a3131fd60197dc98c1b95aabffdabf254b/aad64/assets/images/logos/logomark.svg" alt="Logo" />
                    <h2>Create an account</h2>
                    <p>Helps to access all features of the site.</p>
                  </div>
                  <div class="rlr-authforms__form">
                    <div class="rlr-authforms__inputgroup"><label class="rlr-form-label rlr-form-label--light required"> Name </label> <input type="text" name="name" autocomplete="off" class="form-control form-control--light" /></div>
                    <div class="rlr-authforms__inputgroup"><label class="rlr-form-label rlr-form-label--light required"> Email </label> <input type="text"name="email" autocomplete="off" class="form-control form-control--light" /></div>
                    <div class="rlr-authforms__inputgroup">
                      <label class="rlr-form-label rlr-form-label--light required"> Password </label> <input type="password" name="password" autocomplete="off" class="form-control form-control--light" />
                      <p class="help-text">Must be 8 characters or more.</p>
                    </div>
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
                      <label class="rlr-form-label rlr-form-label--light required">Type</label> 
                      <select class="form-control"name="type">
                        <option value="1">Travel Group</option>
                        <option value="0">Traveller</option>
                      </select>
                     
                    </div>

                    <div class="rlr-authforms__inputgroup">
                      <label class="rlr-form-label rlr-form-label--light required">Addresses</label> <input type="text" name="address" autocomplete="off" class="form-control form-control--light" />
                    </div>

                    <div class="rlr-authforms__inputgroup">
                      <label class="rlr-form-label rlr-form-label--light required">picture</label> 
                      <input type="file" name="photo" autocomplete="off" class=" form-control--light" />
                     
                    </div>
                    <button type="submit" class="btn rlr-button rlr-button--fullwidth rlr-button--primary">Sign in</button>
                    
                  </div>
                    </form> -->


                    
      

                    <div class="text-center mb-4">
                    <img class="mb-2 " src="https://d33wubrfki0l68.cloudfront.net/7aa117a3131fd60197dc98c1b95aabffdabf254b/aad64/assets/images/logos/logomark.svg " alt="Logo" />
                    <h4>Create an account</h4>
                   </div>

                   
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item text-center">
                  <a class="nav-link active btl btn" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Traveller </a>
                </li>
                <li class="nav-item text-center">
                  <a class="nav-link btr" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Travel Group </a>
                </li>
               
              </ul>
              
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  
                  <div class="form px-4 ">
                    
                  <form method="post"action="{{route('registeruser')}}">
                      @csrf
                  <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="name" class="form-control mt-2"name="name" placeholder="Enter Name">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control mt-2"name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                      @if ($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                      @endif
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control mt-2"name="password" id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <input type="hidden"name="type"value="0">
                  
                    <button type="submit" class="btn btn-info form-control">Sign Up</button>
                   </form>

                  </div>



                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  

                  <div class="form px-4">

                  <form method="post"action="{{route('registeruser')}}">
                      @csrf 
                  <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control mt-2" name="name"placeholder="Enter Name">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control mt-2"  name="email"id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                      @if ($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                      @endif
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control mt-2" name="password"id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <input type="hidden"name="type"value="1">
                  
                    <button type="submit"  class="btn btn-info form-control">Sign Up</button>
                   </form>

                  </div>



                
            
          
          

        </div>
        

      </div>
                  
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
    @include('sweetalert::alert')

    @endsection
