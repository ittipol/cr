<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <!-- Meta -->
  @include('script.meta')

  <!-- Favicon -->
  <link rel="shortcut icon" href="../favicon.ico">

  <!-- Web Fonts -->
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=cyrillic,latin">

  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/app.css">
  <link rel="stylesheet" href="assets/css/blocks.css">
  <link rel="stylesheet" href="css/style/custom/one.style.css">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="assets/plugins/animate.css">
  <link rel="stylesheet" href="assets/plugins/line-icons-pro/styles.css">
  <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/plugins/slick/slick.css">

  <!-- CSS Theme -->
  <link rel="stylesheet" href="css/style/custom/charity.style.css">

  <!-- CSS Customization -->
  <link rel="stylesheet" href="css/style/custom/custom.css">

  <link rel="stylesheet" href="assets/css/footers/footer-v3.css">

  <link rel="stylesheet" href="css/custom/layout.css">
  <link rel="stylesheet" href="css/custom/profile_image.css">
  <link rel="stylesheet" href="css/custom/list_item.css">
  <link rel="stylesheet" href="css/custom/button.css">
  <link rel="stylesheet" href="css/custom/main_page.css">

</head>
<body id="body">

  <nav class="charity-header one-page-header navbar navbar-default navbar-fixed-top one-page-nav-scrolling one-page-nav__fixed" data-role="navigation">
    <div class="container">
      <div class="menu-container page-scroll">
        <button type="button" class="navbar-toggle @if(Auth::check()) margin-right-50 @endif" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="#body">
          <img class="default-logo" src="/images/logo/logo-light.png" alt="Logo">
          <img class="shrink-logo" src="/images/logo/logo-dark.png" alt="Logo">
        </a>
      </div>

      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <div class="menu-container">
          <ul class="nav navbar-nav @if(Auth::check()) margin-right-50 @endif">
            <li class="page-scroll home active">
              <a href="{{URL::to('/')}}">หน้าแรก</a>
            </li>
            <li class="page-scroll">
              <a href="{{URL::to('charity/list')}}">มูลนิธิ</a>
            </li>
            <li class="page-scroll">
              <a href="{{URL::to('project/list')}}">โครงการ</a>
            </li>
            <li class="page-scroll">
              <a href="#your-help">การบริจาค</a>
            </li>
            <li class="page-scroll">
              <a href="{{URL::to('news/list')}}">ข่าวสาร</a>
            </li>
            @if(!Auth::check())
            <li class="page-scroll">
              <a href="{{URL::to('login')}}">เข้าสู่ระบบ</a>
            </li>
            @endif
          </ul>
        </div>
      </div>

      @if(Auth::check())
        <div class="profile-image">
          <a href="{{URL::to('account')}}">
            <i class="fa fa-user"></i>
          </a>
        </div>
      @endif
    </div>

  </nav>

  <!-- Promo section -->
  <div class="promo-section">
    <div class="promo-item" style="background-image: url(/images/common/xxx.jpg);">
      <div class="container">
        <div class="promo-item-content">
          <h3>สัตว์เหล่านี้,<br> <strong>กำลังต้องการความช่วยเหลือ</strong></h3>
          <div class="g-mb-45">
            <div class="money-type-1 g-mr-10 g-mb-10--4x"><em>Need</em> <strong>$1 250 000</strong></div>
            <div class="money-type-1"><em>We have</em> <strong>$175 586</strong></div>
          </div>
          <p class="g-color-white--dark g-mb-45">Donec erat urna, tincidunt at leo non, blandit finibus ante. Nunc venenatis risus in finibus dapibus. Ut ac massa sodales, mattis enim id, efficitur tortor</p>
          <a class="btn-u btn-u-lg btn-u-upper g-mr-10" href="#"><i class="fa fa-heart"></i> บริจาคให้กับมูลนิธินี้</a>
          <a class="btn-u btn-u-lg btn-u-upper" href="#">ดูรายละเอียดเพิ่มเติม</a>
        </div>
      </div>
    </div>
    <div class="promo-item" style="background-image: url(/assets/img-temp/promo/2.jpg);">
      <div class="container">
        <div class="promo-item-content">
          <h3>รวมบริจาคให้กับ<br> <strong>มูลนิธิ Animal wants org.</strong></h3>
          <div class="g-mb-45">
            <div class="money-type-1 g-mr-10 g-mb-10--4x"><em>Need</em> <strong>$1 250 000</strong></div>
            <div class="money-type-1"><em>We have</em> <strong>$175 586</strong></div>
          </div>
          <p class="g-color-white--dark g-mb-45">Donec erat urna, tincidunt at leo non, blandit finibus ante. Nunc venenatis risus in finibus dapibus. Ut ac massa sodales, mattis enim id, efficitur tortor</p>
          <a class="btn-u btn-u-lg btn-u-upper g-mr-10" href="#"><i class="fa fa-heart"></i> Donate now</a>
          <a class="btn-u btn-u-lg btn-u-upper" href="#">Learn more</a>
        </div>
      </div>
    </div>
  </div>
  <!-- /Promo section -->

  <div class="container">

    <div class="clearfix margin-bottom-100"></div>

    <div class="g-heading-v13 text-center g-max-width--770 g-margin-side-auto g-mb-60">
      <h2 class="g-mb-35">ร่วมเป็นส่วนหนึ่งในการสนับสนุนมูลนิธิ</strong></h2>
      <p>Donec in blandit dolor. Vivamus a fringilla lorem, vel faucibus ante. Nunc ullamcorper, justo a iaculis elementum, enim orci viverra eros, fringilla porttitor lorem eros vel odio.</p>
    </div>

    <div class="row">
      @foreach($charities as $data)

        <div class="col-lg-4 col-sm-6 col-xs-12">
          
          <div class="news-v3 charity-list-item custom-item-list">

            <a href="{{URL::to('charity')}}/{{$data->id}}">
              <img class="img-responsive full-width" src="{{$data->thumbnail}}">
            </a>
            <div class="news-v3-in-sm bg-color-light">

              <small>{{$data->charityType->name}}</small>
              <div class="clearfix margin-bottom-10"></div>
              
              <?php
                $strLimit = 120;
                $descLen = $strLimit - mb_strlen($data->name);
                $shortDesc = $stringLib->truncString($data->short_desc,$descLen);
              ?>

              <div class="main-content margin-bottom-20">
                <a href="{{URL::to('charity')}}/{{$data->id}}"><img src="{{$data->logo}}">{{$data->name}}</a>
                — {{$shortDesc}}
              </div>
              
              <div class="service-block-v3 donation-box for-charity">
                <a href="{{URL::to('donate')}}?for=charity&id={{$data->id}}" class="btn-u btn-custom margin-bottom-10">บริจาคให้กับมูลนิธินี้</a>
              </div>

            </div>

          </div>

        </div>

      @endforeach
    </div>
  </div>

  <!-- Section "Can help" -->
  <section class="g-pt-100 g-pb-100 text-center" id="your-help" style="background-color:#B0BEC5;">
    <div class="container">
      <div class="g-heading-v13 text-center g-max-width--770 g-margin-side-auto g-mb-60">
        <h2 class="g-mb-35">คุณสามารถช่วยได้อย่างไร</h2>
        <!-- <p>Donec in blandit dolor. Vivamus a fringilla lorem, vel faucibus ante. Nunc ullamcorper, justo a iaculis elementum, enim orci viverra eros, fringilla porttitor lorem eros vel odio.</p> -->
      </div>
      <div class="row">
        <!-- <div class="col-md-6">
          <div class="infoblock-v1">
            <div class="infoblock-v1-content infoblock-v1-content--left">
              <h3 class="g-mb-25">Beacome a <strong>volunteer</strong></h3>
              <p class="g-mb-30">Praesent pulvinar gravida efficitur. Aenean bibendum purus eu nisi pulvinar venenatis vitae non velit.</p>
              <a class="btn-u btn-u-upper" href="#">Join us</a>
            </div>
            <div class="infoblock-v1-image" style="background-image: url(/assets/img-temp/1.jpg);"></div>
          </div>
        </div> -->
        <div class="col-md-12">
          <div class="infoblock-v1">
            <div class="infoblock-v1-image" style="background-image: url(/images/common/www.jpg);"></div>
            <div class="infoblock-v1-content infoblock-v1-content--right">
              <h3 class="g-mb-25">บริจาคให้กับมูลนิธิ</h3>
              <p class="g-mb-30">มีมูลนิธิมากมายที่ต้องการการสนับสนุนเพื่อให้มูลนิธิสามารถดำเนินการต่อได้</p>
              <a class="btn-u btn-u-upper" href="#">มูลนิธิ</a>
              <a class="btn-u btn-u-upper" href="#">วิธีการบริจาค</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Section "Can help" -->

  <!-- Section "Best Donators" -->
  <section class="g-pt-100 g-pb-50 text-center overflow-h" id="donators">
    <div class="container">
      <div class="g-heading-v13 text-center g-max-width--770 g-margin-side-auto g-mb-60">
        <h2 class="g-mb-35">ร่วมเป็นผู้สนับสนุน</h2>
        <p>สร้างบัญชีเพื่อเก็บประวัติการบริจาคของคุณ</p>
      </div>
      <div class="row">
        <div class="col-md-2 col-sm-4 col-xs-6 g-mb-50">
          <div class="person">
            <img src="/assets/img-temp/4.jpg" alt="" class="rounded-x person__image g-mb-15">
            <strong class="person__name g-mb-5">Mark Spencer</strong>
            <em class="person__position g-mb-15">Molestie ullamcorper</em>
            <div class="money-type-2"><em>Need</em> <strong>$11 250 000</strong></div>
          </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 g-mb-50">
          <div class="person">
            <img src="/assets/img-temp/15.jpg" alt="" class="rounded-x person__image g-mb-15">
            <strong class="person__name g-mb-5">Dorian Gray</strong>
            <em class="person__position g-mb-15">Molestie ullamcorper</em>
            <div class="money-type-2"><em>Need</em> <strong>$690 000</strong></div>
          </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 g-mb-50">
          <div class="person">
            <img src="/assets/img-temp/13.jpg" alt="" class="rounded-x person__image g-mb-15">
            <strong class="person__name g-mb-5">Rebecca Kenton</strong>
            <em class="person__position g-mb-15">Molestie ullamcorper</em>
            <div class="money-type-2"><em>Need</em> <strong>$420 000</strong></div>
          </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 g-mb-50">
          <div class="person">
            <img src="/assets/img-temp/16.jpg" alt="" class="rounded-x person__image g-mb-15">
            <strong class="person__name g-mb-5">John Doe</strong>
            <em class="person__position g-mb-15">Molestie ullamcorper</em>
            <div class="money-type-2"><em>Need</em> <strong>$1 250 000</strong></div>
          </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 g-mb-50">
          <div class="person">
            <img src="/assets/img-temp/14.jpg" alt="" class="rounded-x person__image g-mb-15">
            <strong class="person__name g-mb-5">Jessica Alan</strong>
            <em class="person__position g-mb-15">Molestie ullamcorper</em>
            <div class="money-type-2"><em>Need</em> <strong>$6 610 000</strong></div>
          </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 g-mb-50">
          <div class="person">
            <img src="/assets/img-temp/no-photo.png" alt="" class="rounded-x person__image g-mb-15">
            <strong class="person__name g-mb-10">You can be here</strong>
            <a class="btn-u btn-u-lg btn-u-upper" href="#">Become a donator</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Section "Best Donators" -->

  <div id="footer-v3" class="footer-v3">

    <div class="copyright">
      <div class="container">
        <div class="row">
    
          <div class="col-md-6">
            <p>
              2015 &copy; All Rights Reserved. Unify Theme by
              <!-- <a target="_blank" href="https://twitter.com/htmlstream">Htmlstream</a> | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a> -->
            </p>
          </div>

          <div class="col-md-6">
            <ul class="social-icons pull-right">
              <li><a href="#" data-original-title="Facebook" class="rounded-x social_facebook"></a></li>
              <li><a href="#" data-original-title="Twitter" class="rounded-x social_twitter"></a></li>
              <li><a href="#" data-original-title="Goole Plus" class="rounded-x social_googleplus"></a></li>
              <li><a href="#" data-original-title="Linkedin" class="rounded-x social_linkedin"></a></li>
              <li><a href="#" data-original-title="Pinterest" class="rounded-x social_pintrest"></a></li>
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