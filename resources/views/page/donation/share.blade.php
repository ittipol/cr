<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <!-- Meta -->
  @include('script.meta')

  <link href="https://fonts.googleapis.com/css?family=Sriracha" rel="stylesheet">
  
  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/app.css">
  <link rel="stylesheet" href="/assets/css/blocks.css">
  <link rel="stylesheet" href="/css/style/custom/one.style.css">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="/assets/plugins/animate.css">
  <link rel="stylesheet" href="/assets/plugins/line-icons-pro/styles.css">
  <link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/assets/plugins/slick/slick.css">

  <!-- CSS Theme -->
  <link rel="stylesheet" href="/css/style/custom/charity.style.css">

  <!-- CSS Customization -->
  <!-- <link rel="stylesheet" href="css/style/custom/custom.css"> -->

  <link rel="stylesheet" href="/assets/css/footers/footer-v3.css">

  <!-- <link rel="stylesheet" href="/css/custom/layout.css">
  <link rel="stylesheet" href="/css/custom/profile_image.css">
  <link rel="stylesheet" href="/css/custom/list_item.css">
  <link rel="stylesheet" href="/css/custom/button.css"> -->
  <link rel="stylesheet" href="/css/custom/main_page.css">

  <link rel="stylesheet" href="/css/custom/layout.css">
  <link rel="stylesheet" href="/css/page/donate.css">

</head>
<body id="body" class="donation share">

  <nav class="charity-header one-page-header navbar navbar-default navbar-fixed-top one-page-nav-scrolling one-page-nav__fixed" data-role="navigation">
    <div class="container">
      <div class="menu-container page-scroll">
        <a class="navbar-brand" href="{{URL::to('/')}}">
          <img class="default-logo" src="/images/logo/logo-light.png" alt="Logo">
          <img class="shrink-logo" src="/images/logo/logo-dark.png" alt="Logo">
        </a>
      </div>
    </div>
  </nav>

  <div class="promo-section">
    <div class="promo-item" style="background-image: url(/images/promo/1_1.jpg);">
      <div class="container">
        <div class="promo-item-content">
          <h3 class="text-center">
            @if($donation->unidentified) 
              บริจาคโดยไม่ออกนาม<br>ขอขอบคุณที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ {{$name}}
            @elseif(!empty($donation->user_id))
              ขอขอบคุณ {{$donation->user->name}}<br>ที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ {{$name}}
            @else
              ขอขอบคุณ {{$donation->guest_name}}<br>ที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ {{$name}}
            @endif
          </h3>
        </div>
      </div>
    </div>
  </div>

  <div class="container story-content">

    <div class="parallax-quote parallaxBg" style="background-position: 50% 89px;">
      <div class="container">
        <div class="parallax-quote-in">
          <p>ร่วมเป็นส่วนหนึ่งในช่วยเหลือและสนับสนุน {{$name}}</p>
        </div>
      </div>
    </div>

    <div class="shered-content">

      <div class="clearfix margin-bottom-20"></div>
      <h2>{{$name}}</h2>
      <p>ป้าจิ๋มผู้ที่อุทิศชีวิตของตัวเอง ให้กับการช่วยเหลือน้องหมา มามากว่า 30ปี เพียงคนเดียว ถึงร่างกายตัวเองจะเจ็บป่วยแต่แม่ก็ยังทนทำมันด้วยความรัก ที่มีต่อสิ่งมีชีวิตเล็กๆ</p>
      <br>
      <div class="text-center">
        <h4>หากต้องการติดตามเรื่องราว ข่าวารหรือต้องการช่วยเหลือ</h4>
        <a class="btn-u btn-custom-color" href="#">เพิ่มเติม</a>
        <a class="btn-u btn-custom-color" href="#"><i class="fa fa-heart"></i> ช่วยเหลือด้วยการบริจาค</a>
      </div>
      <div class="clearfix margin-bottom-40"></div>

      <hr>

      <div id="social_content" class="social-login text-center">      
        <ul class="list-unstyled">       
          <li>             

            <div class="donation-box text-center">
              <h4>ร่วมแชร์รายละเอียดและเรื่องราวต่างๆของ {{$name}}</h4>
              <a class="btn btn-xs btn-facebook fa-fixed btn-share" href="https://www.facebook.com/sharer/sharer.php?u={{Request::root()}}/share/{{$code}}" target="_blank">
                <i class="fa fa-facebook"></i>
              </a>
              <a class="btn btn-xs btn-twitter fa-fixed btn-share" href="https://twitter.com/intent/tweet?url={{Request::root()}}/share/{{$code}}&text=ขอบคุณที่คุณร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ{{$for}} {{$name}}" target="_blank">
                <i class="fa fa-twitter"></i>
              </a>
              <a class="btn btn-xs btn-googleplus fa-fixed btn-share" href="https://plus.google.com/share?url={{Request::root()}}/share/{{$code}}" target="_blank">
                <i class="fa fa-google-plus"></i>
              </a>
            </div>

          </li>     
        </ul>  
      </div>

      <div class="clearfix margin-bottom-60"></div>

    </div>

  </div>

  <div id="footer-v3" class="footer-v3">

    <div class="copyright">
      <div class="container">
        <div class="row">
    
          <div class="col-md-6">
            <p>
              2017 CharityTH
            </p>
          </div>

          <div class="col-md-6">
            <ul class="social-icons pull-right">
              <li><a href="https://www.facebook.com/charityth/" data-original-title="Facebook" class="rounded-x social_facebook"></a></li>
              <li><a href="#" data-original-title="Twitter" class="rounded-x social_twitter"></a></li>
              <li><a href="#" data-original-title="Goole Plus" class="rounded-x social_googleplus"></a></li>
            </ul>
          </div>
   
        </div>
      </div>
    </div>
  </div>

  <!-- JS Global Compulsory -->
  <script src="/assets/plugins/jquery/jquery.min.js"></script>
  <script src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
  <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="/assets/plugins/smoothScroll.js"></script>
  <script src="/assets/plugins/jquery.easing.min.js"></script>
  <script src="/assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
  <script src="/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
  <script src="/assets/plugins/slick/slick.min.js"></script>
  <script src="/assets/plugins/circles-master/circles.min.js"></script>
  <script src="/assets/plugins/jquery-appear.js"></script>
  <script src="/assets/plugins/jquery.easypin/dist/jquery.easypin.min.js"></script>

  <!-- JS Page Level-->
  <script src="/js/plugins/one.app.js"></script>
  <script src="/js/plugins/promo.js"></script>
  <script src="/js/plugins/projects.js"></script>
  <script src="/js/plugins/circles-master.js"></script>
  <script src="/js/plugins/progress-bar.js"></script>
  <script src="/js/plugins/posts.js"></script>
  <script src="/js/plugins/success-stories.js"></script>
  <script src="/js/plugins/helping.js"></script>
  <script src="/js/plugins/map-pin.js"></script>

  <script>
    $(function() {
      App.init();
    });
  </script>
  <!--[if lt IE 10]>
    <script src="../assets/plugins/sky-forms-pro/skyforms/js/jquery.placeholder.min.js"></script>
  <![endif]-->
</body>
</html>