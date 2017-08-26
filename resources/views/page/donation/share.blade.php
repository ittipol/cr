<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <!-- Meta -->
  @include('script.meta')
  @include('script.analyticstracking')
  
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

  <link rel="stylesheet" href="/assets/css/footers/footer-v3.css">

  <link rel="stylesheet" href="/css/custom/main_page.css">

  <link rel="stylesheet" href="/css/custom/layout.css">
  <link rel="stylesheet" href="/css/page/donate.css">

</head>
<body id="body" class="donation share">

  <nav class="charity-header one-page-header navbar navbar-default navbar-fixed-top one-page-nav-scrolling one-page-nav__fixed" data-role="navigation">
    <div class="container">
      <div class="menu-container page-scroll">
        <a class="navbar-brand" href="{{URL::to('/')}}">
          <img class="default-logo" src="/images/logo/logo-dark.png" alt="Logo">
          <img class="shrink-logo" src="/images/logo/logo-dark.png" alt="Logo">
        </a>
      </div>
    </div>
  </nav>

  <div class="promo-section">
    <div class="promo-item" style="background-image: url('{{$charity->shared_image}}');">
      <div class="container">
        <div class="promo-item-content">
          <h3 class="text-center">
            @if($donation->unidentified) 
              ขอขอบคุณที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ{{$for}} {{$name}}
            @elseif(!empty($donation->user_id))
              ขอขอบคุณ คุณ {{$donation->user->name}}<br>ที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ{{$for}} {{$name}}
            @else
              ขอขอบคุณ คุณ {{$donation->guest_name}}<br>ที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ{{$for}} {{$name}}
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
          <p>ร่วมเป็นส่วนหนึ่งในช่วยเหลือและสนับสนุน{{$for}} {{$name}}</p>
        </div>
      </div>
    </div>

    <div class="shered-content">

      <div class="clearfix margin-bottom-20"></div>

      <h2>
        @if(!empty($data->logo))
        <img class="charity-logo" src="{{$data->logo}}">
        @endif
        {{$for}} {{$name}}
      </h2>
      <p>{{$data->short_desc}}</p>

      @if($_for == 'project')
        @if(empty($charity->logo))
        <span>
          โครงการจาก <a href="{{URL::to('charity')}}/{{$charity->id}}">{{$charity->name}}</a>
        </span>
        @else
        <div class="testimonials-v4">
          <img class="charity-logo" src="{{$charity->logo}}">
          <span class="testimonials-author">
            โครงการจาก<br>
            <a href="{{URL::to('charity')}}/{{$charity->id}}">{{$charity->name}}</a>
          </span>
        </div>
        @endif
      @endif

      <div class="clearfix margin-bottom-20"></div>

      <div class="text-center">
      @if($_for == 'charity')
        <h4>หากต้องการติดตามเรื่องราว ข่าวสารหรือต้องการช่วยเหลือ</h4>
        <a class="btn-u btn-custom-color" href="{{URL::to('charity')}}/{{$id}}">เพิ่มเติม</a>
        <a class="btn-u btn-custom-color" href="{{URL::to('donate')}}?for=charity&id={{$id}}"><i class="fa fa-heart"></i> ช่วยเหลือด้วยการบริจาค</a>
      @elseif($_for == 'project')
        <h4>หากต้องการติดตามโครงการ หรือต้องการช่วยเหลือ</h4>
        <a class="btn-u btn-custom-color" href="{{URL::to('project')}}/{{$id}}">เพิ่มเติม</a>
        <a class="btn-u btn-custom-color" href="{{URL::to('donate')}}?for=project&id={{$id}}"><i class="fa fa-heart"></i> ช่วยเหลือด้วยการบริจาค</a>
      @endif
      </div>

      <div class="clearfix margin-bottom-40"></div>

      <hr>

      <div id="social_content" class="social-login text-center">      
        <ul class="list-unstyled">       
          <li>             

            <div class="donation-box text-center">
              @if($_for == 'charity')
                <h4>ร่วมแชร์รายละเอียดและเรื่องราวต่างๆของ {{$name}}</h4>
                <a class="btn btn-xs btn-facebook fa-fixed btn-share" href="https://www.facebook.com/sharer/sharer.php?u={{Request::root()}}/charity/{{$id}}" target="_blank">
                  <i class="fa fa-facebook"></i>
                </a>
                <a class="btn btn-xs btn-twitter fa-fixed btn-share" href="https://twitter.com/intent/tweet?url={{Request::root()}}/charity/{{$id}}&text=ร่วมเป็นส่วนหนึ่งในการช่วยเหลือและสนับสนุน {{$name}}" target="_blank">
                  <i class="fa fa-twitter"></i>
                </a>
                <a class="btn btn-xs btn-googleplus fa-fixed btn-share" href="https://plus.google.com/share?url={{Request::root()}}/charity/{{$id}}" target="_blank">
                  <i class="fa fa-google-plus"></i>
                </a>
              @elseif($_for == 'project')
                <h4>ร่วมแชร์{{$for}} {{$name}}</h4>
                <a class="btn btn-xs btn-facebook fa-fixed btn-share" href="https://www.facebook.com/sharer/sharer.php?u={{Request::root()}}/project/{{$id}}" target="_blank">
                  <i class="fa fa-facebook"></i>
                </a>
                <a class="btn btn-xs btn-twitter fa-fixed btn-share" href="https://twitter.com/intent/tweet?url={{Request::root()}}/project/{{$id}}&text=ร่วมเป็นส่วนหนึ่งในการช่วยเหลือและสนับสนุน {{$name}}" target="_blank">
                  <i class="fa fa-twitter"></i>
                </a>
                <a class="btn btn-xs btn-googleplus fa-fixed btn-share" href="https://plus.google.com/share?url={{Request::root()}}/project/{{$id}}" target="_blank">
                  <i class="fa fa-google-plus"></i>
                </a>
              @endif
            </div>

          </li>     
        </ul>  
      </div>

      <div class="clearfix margin-bottom-60"></div>

    </div>

  </div>

  @include('layout.footer')

  <!-- JS Global Compulsory -->
  <script src="/assets/plugins/jquery/jquery.min.js"></script>
  <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

  <!-- JS Page Level-->
  <script src="/js/plugins/one.app.js"></script>

  <script>
    $(function() {
      App.init();
    });
  </script>

</body>
</html>