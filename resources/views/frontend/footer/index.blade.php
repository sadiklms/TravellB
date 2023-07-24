  <!-- Footer -->
  <footer class="rlr-footer rlr-section rlr-section__mt">
      <div class="container">
        <div class="rlr-footer__getintouch">
          <div class="rlr-footer__getintouch_col rlr-footer__getintouch__col--title">
            <h4>Get in travel</h4>
            <p>Adventures Calling You Guys!</p>
          </div>
          <div class="rlr-footer__getintouch_col rlr-footer__getintouch__col--address">
            <h4>Our Offices</h4>
            <a href="#">Nepal, USA, India</a>
          </div>
        </div>
        <!-- Footer menu -->
        <div class="rlr-footer__menu">
          <nav class="rlr-footer__menu__col">
            <!-- Footer menu col -->
            <h4>Type</h4>
            <ul>
              @php $type=DB::table('types')->take('6')->get(); @endphp

              @foreach($type as $types)
              <li><a href="{{url('type',['id' => $types->id, 'trip' => 'type-trip'])}}">{{$types->title}}</a></li>
              @endforeach
            </ul>
          </nav>
          <nav class="rlr-footer__menu__col">
            <!-- Footer menu col -->
            <h4>Areatype</h4>
            <ul>
            @php $areatype=DB::table('areatypes')->take('6')->get(); @endphp
            @foreach($areatype as $areatypes)
              <li><a href="{{url('areatype',['id'=>$areatypes->id,'trip' => 'areatype-trip'])}}">{{$areatypes->title}}</a></li>
            @endforeach
          
            </ul>
          </nav>
          <nav class="rlr-footer__menu__col">
            <!-- Footer menu col -->
            <h4>Specialfeature</h4>
            <ul>
            @php $specialfeature=DB::table('specialfeatures')->take('6')->get(); @endphp
            @foreach($specialfeature as $specialfeatures)
              <li><a href="{{url('specialfeature',['id'=>$specialfeatures->id,'trip' => 'specialfeature'])}}">{{$specialfeatures->title}}</a></li>
            @endforeach
              
            </ul>
          </nav>
          <!-- Subscribe -->
          <nav class="rlr-footer__menu__col rlr-footer__menu__col--lg">
            <h4>Get In Touch</h4>
            <a href="#" class="rlr-footer__menu__col__letstalk">Let’s Talk</a>
            <form method="post"action="{{route('news-letter')}}"class="rlr-subscribe" data-aos="fade-up" data-aos-offset="250" data-aos-duration="700">
              @csrf
              <input type="email"name="email" class="rlr-subscribe__input" placeholder="Enter your email" />
              <button class="btn">Send Now!</button>
            </form>
          </nav>
        </div>
        <!-- Footer bottom -->
        <div class="rlr-footer__legal">
          <div class="rlr-footer__legal__row rlr-footer__legal__row--top">
            <div class="rlr-footer__legal__row__col">
            <a href="{{url('privacy-policy')}}">Privacy Policy</a>
              <span class="separate">/</span>
              <a href="{{url('return-policy')}}">Return Policy</a>
              <span class="separate">/</span>
              <a href="{{url('terms-condition')}}">Term & Condition</a>
            </div>
            <!-- Footer social links -->
            <div class="rlr-footer__legal__row__col">
              <a href="#">Linkedin</a>
              <span class="separate">/</span>
              <a href="#">Facebook</a>
              <span class="separate">/</span>
              <a href="#">Instagram</a>
            </div>
          </div>
          <!-- Footer copyright -->
          <div class="rlr-footer__legal__row rlr-footer__legal__row--bottom">
            <div class="rlr-footer__legal__row__col">
              <span>2022 © Railar Solutions</span>
            </div>
            <!-- Footer payment thumbs -->
            <div class="rlr-footer__legal__row__col">
              <img src="{{url('backend/css/d33wubrfki0l68.cloudfront.net/83eaf1e4cee158ff3ecddd3e631b21f8863b41a0/be152/assets/images/ele-payments.png')}}" alt="Payments" />
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Scripts -->
    <script defer src="{{url('backend/css/d33wubrfki0l68.cloudfront.net/bundles/9123ae4616ab9b822de203233984359201cebe4f.js')}}"></script>

    @stack('script_3')

    <script type="text/javascript">
    $('body').on('click', '.filter', function () {
    var sortyby = $(this).data("id");
    var triptypeid=$("#triptypeid").val();
    var triptype=$("#triptype").val();
    
    $.ajax({
         url:"{{route('trip-filter')}}",
         type: "POST",
         data: {
          id: triptypeid, 
          sortyby: sortyby, 
          triptype: triptype, 
           
        _token: '{{csrf_token()}}' 
        },
        
        dataType : 'json',
        success: function(result){
            $('.tripfilter').html(result.view);
            $('.tripshow').html(result.datavalue);
         
            console.log(result);
           
    
        }
       });





        });
    </script>
  </body>

<!-- Mirrored from ux.emprise.tours/home-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Feb 2023 19:12:51 GMT -->
</html>
