<?php
  require 'minify/minify-js.php';
  require 'minify/minify-css.php';
?>

<?php
  $combine = false;
?>

<?php

  $jsFiles = array(
    // 'js/jquery-3.2.1.min.js',
    'assets/plugins/jquery/jquery.min.js',
    'assets/plugins/jquery/jquery-migrate.min.js',
    'assets/plugins/bootstrap/js/bootstrap.min.js',
    // 'js/app/app.js', // tinymce
    // 'js/app/loader.js', // tinymce loader
    'js/library/token.js',
    'js/form/address.js',
    // 'js/form/stock-images.js',
    // 'assets/plugins/owl-carousel/owl-carousel/owl.carousel.js',
    // 'assets/js/plugins/owl-carousel.js',
    // 'assets/plugins/parallax-slider/js/modernizr.js',
    // 'assets/plugins/parallax-slider/js/jquery.cslider.js',
    // 'assets/js/plugins/parallax-slider.js',
    // 'assets/js/plugins/style-switcher.js',
    'assets/js/custom.js',
    'assets/js/app.js',
  );

  if($combine){
    $code = '';
    foreach ($jsFiles as $js) {
      $code .= file_get_contents($js);
    }

    $_js = JSMin::minify($code);

    if(!file_exists(public_path().'/js/8fcf1793a14f7d35.js') || (strlen($_js) != filesize(public_path().'/js/8fcf1793a14f7d35.js'))){
      file_put_contents('js/8fcf1793a14f7d35.js', $_js);
    }
  }
  
?>

@if($combine)
<script type="text/javascript" src="{{ URL::asset('js/8fcf1793a14f7d35.js') }}"></script>
@endif

@if(!$combine)
@foreach ($jsFiles as $js)
  <script type="text/javascript" src="/{{$js}}"></script>
@endforeach
@endif


<?php

  $cssFiles = array(
    // 'css/admin/bootstrap.min.css',
    'assets/plugins/bootstrap/css/bootstrap.min.css',
    'assets/css/style.css',
    'assets/css/app.css',
    // 'assets/css/headers/header-default.css',
    // 'assets/css/footers/footer-v1.css',
    'assets/css/blocks.css',
    'assets/plugins/animate.css',
    // 'assets/plugins/slick/slick.css',
    'assets/plugins/line-icons/line-icons.css',
    'assets/plugins/font-awesome/css/font-awesome.min.css',
    // 'assets/plugins/parallax-slider/css/parallax-slider.css',
    'assets/plugins/owl-carousel/owl-carousel/owl.carousel.css',
    // 'assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css',
    // 'assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css',
    'assets/css/headers/header-default.css',
    'assets/css/footers/footer-v3.css',
    'assets/plugins/brand-buttons/brand-buttons.css',
    'assets/css/pages/page_log_reg_v3.css',
    'assets/plugins/brand-buttons/brand-buttons-inversed.css',
    // 'assets/css/pages/page_log_reg_v4.css',
    'assets/css/pages/shortcode_timeline2.css',
    'assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css',
    'assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css',
    'assets/css/pages/page_contact.css',
    // 'assets/css/theme-colors/default.css',
    // 'assets/css/theme-skins/dark.css',
    // 'css/style/custom/charity.style.css',
    // 'css/style/custom/custom.css',
    'assets/css/pages/profile.css',
    'assets/css/custom.css',
    'css/custom/core.css',
    'css/custom/tab.css',
    'css/custom/button.css',
    'css/page/charity.css',
    'css/page/project.css',
    'css/page/donate.css',
    // 'css/components/form.css',
  );

  if($combine){
    $code = '';
    foreach ($cssFiles as $css) {
      $code .= file_get_contents($css);
    }

    $_css = CSSMin::minify($code);

    if(!file_exists(public_path().'/css/a590bf3e950e330b.css') || (strlen($_css) != filesize(public_path().'/css/a590bf3e950e330b.css'))){
      file_put_contents('css/a590bf3e950e330b.css', $_css);
    }
  }

?>

@if($combine)
<link rel="stylesheet" href="{{ URL::asset('css/a590bf3e950e330b.css') }}" />
@endif

@if(!$combine)
@foreach ($cssFiles as $css)
  <link rel="stylesheet" href="/{{$css}}" />
@endforeach
@endif