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
  <!-- <link rel="stylesheet" href="css/style/custom/custom.css"> -->

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

        <a class="navbar-brand" href="{{URL::to('/')}}">
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
        @if(empty(Auth::user()->avatar))
          <a href="{{URL::to('account')}}"><i class="fa fa-user"></i></a>
        @else
          <a href="{{URL::to('account')}}">
            <div class="user-avatar" style="background-image: url({{URL::to('avatar')}}/{{Auth::user()->avatar}});"></div>
          </a>
        @endif
        </div>
      @endif
      
    </div>

  </nav>

  <!-- Promo section -->
  <div class="promo-section">
    <div class="promo-item" style="background-image: url(/images/common/promo_bg.jpg);">
      <div class="container">
        <div class="promo-item-content">
          <h3>ร่วมช่วยเหลือมูลนิธิ<br> <strong>มูลนิธิช่วยเหลือแมวจร</strong></h3>
          <!-- <div class="g-mb-45">
            <div class="money-type-1 g-mr-10 g-mb-10--4x"><em>การบริจาคในเดือนนี้</em> <strong>7200 บาท</strong></div>
          </div> -->
          <p class="g-color-white--dark g-mb-45">จะทำหน้าที่ช่วยเหลือแมวจร ที่บ้านเจ็บ ไร้บ้าน และพร้อมโครงการที่จะช่วยเหลือแมวในการหาเจ้าของ</p>
          <a class="btn-u btn-u-lg btn-u-upper g-mr-10" href="#"><i class="fa fa-heart"></i> บริจาคให้กับมูลนิธินี้</a>
          <a class="btn-u btn-u-lg btn-u-upper" href="#">ไปยังมูลนิธิ</a>
        </div>
      </div>
    </div>
  </div>
  <!-- /Promo section -->

  <div class="container">

    <div class="clearfix margin-bottom-100"></div>

    <div class="g-heading-v13 text-center g-max-width--770 g-margin-side-auto g-mb-60">
      <h2 class="g-mb-35">ร่วมเป็นส่วนหนึ่งในการช่วยเหลือและสนับสนุนมูลนิธิ</strong></h2>
    </div>

    <div class="row">
      @foreach($charities as $data)

        <div class="col-lg-4 col-sm-6 col-xs-12">
          
          <div class="news-v3 charity-list-item custom-item-list">

            <a href="{{URL::to('charity')}}/{{$data->id}}">
              <div class="full-width-cover" style="background-image: url('{{$data->thumbnail}}');"></div>
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

  <div class="clearfix margin-bottom-60"></div>

  <section class="infoblock-v2 g-pt-100 g-pb-100">
    <div class="container">
      <div class="row">

        <div class="col-xs-12">
          <h2 class="g-color-default g-mb-20 g-pt-20">ร่วมช่วยเหลือและสนับสนุนกับ CharityTH <strong class="g-color-white">คุณสามารถช่วยได้อย่างไร</strong></h2>

          <div class="row g-mb-90">
            <div class="col-md-6 g-sm-mb-30">
              <h4 class="g-mb-25 g-color-white"><i class="g-color-default infoblock-v2__icon fa fa-heart"></i> ร่วมบริจาคให้กับมูลนิธิและโครงการ</h4>
              <p class="g-mb-30">ร่วมบริจาคให้กับมูลนิธิและโครงการที่ต้องการความช่วยเหลือและการสนับสนุนเพื่อให้มูลนิธิและโครงการสามารถดำเนินการต่อได้</p>
              <div>
                <a class="btn-u" href="#">มูลนิธิ</a>
                <a class="btn-u" href="#">โครงการ</a>
                <a class="btn-u" href="#">วิธีการบริจาค</a>
              </div>
            </div>

            <div class="col-md-6">
              <h4 class="g-mb-25 g-color-white"><i class="g-color-default infoblock-v2__icon fa fa-share"></i> ส่งต่อมูลนิธิและโครงการไปยังบุคคลที่คุณรู้จัก</h4>
              <p class="g-mb-30">คุณสามารถส่งต่อมูลนิธิและโครงการไปยังบุคคลที่คุณรู้จัก ไม่ว่าจะป็น Facebook, Twitter, Google Plus เพื่อให้มูลนิธิได้รับการช่วยเหลือมากขึ้น</p>
              <div>
                <a class="btn btn-xs btn-facebook fa-fixed btn-share" href="https://www.facebook.com/sharer/sharer.php?u={{Request::fullUrl()}}" target="_blank">
                  <i class="fa fa-facebook"></i>
                </a>
                <a class="btn btn-xs btn-twitter fa-fixed btn-share" href="https://twitter.com/intent/tweet?url={{Request::fullUrl()}}&text=ร่วมช่วยเหลือและสนับสนุนกับ CharityTH" target="_blank">
                  <i class="fa fa-twitter"></i>
                </a>
                <a class="btn btn-xs btn-googleplus fa-fixed btn-share" href="https://plus.google.com/share?url={{Request::fullUrl()}}" target="_blank">
                  <i class="fa fa-google-plus"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="clearfix margin-bottom-60"></div>

  <section class="g-pt-30 g-pb-50 text-center">
    <div class="container">

      <div class="g-heading-v13 text-center g-max-width--770 g-margin-side-auto g-mb-30">
        <h2>เรื่องราวและข่าวสารจากมูลนิธิ</h2>
        <p>ติดตามเรื่องราวและข่าวสารต่างๆจากมูลนิธิ ไม่ว่าจะเป็นการช่วยเหลือมูลนิธิ การพัฒนาและความคืบหน้าของโครงการ และอื่นๆ</p>
        <a class="btn-u btn-u-upper" href="#">ข่าวสาร</a>
      </div>

      <!-- <h1>เรื่องราวและข่าวสารจากมูลนิธิ</h1>
      <div class="clearfix margin-bottom-20"></div> -->

      <!-- <div class="row">
        <div class="col-md-12">
          <div class="infoblock-v1">
            <div class="infoblock-v1-image" style="background-image: url(/images/common/help.jpg);"></div>
            <div class="infoblock-v1-content infoblock-v1-content--right">
              <h3 class="g-mb-25">ข่าวสารจากมูลนิธิ</h3>
              <p class="g-mb-30">ติดตามเรื่องราวและข่าวสารต่างๆจากมูลนิธิ ไม่ว่าจะเป็นการช่วยเหลือมูลนิธิ การพัฒนาและความคืบหน้าของโครงการ และอื่นๆ</p>
              <a class="btn-u btn-u-upper" href="#">ข่าวสาร</a>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  </section>

  <div class="clearfix margin-bottom-20"></div>

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