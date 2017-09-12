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
    // 'js/app/loader.js', // tinymce loader,
    // 'js/plugins/one.app.js',
    'js/library/token.js',
    'js/form/address.js',
    // 'assets/plugins/circles-master/circles.min.js',
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
    'assets/plugins/bootstrap/css/bootstrap.min.css',
    'assets/css/style.css',
    'css/style/custom/one.style.css',
    'assets/plugins/animate.css',
    'assets/plugins/line-icons/line-icons.css',
    'assets/plugins/font-awesome/css/font-awesome.min.css',
    'assets/css/footers/footer-v3.css',
    'assets/plugins/brand-buttons/brand-buttons.css',
    'assets/css/pages/page_log_reg_v3.css',
    'assets/plugins/brand-buttons/brand-buttons-inversed.css',
    'assets/css/pages/shortcode_timeline2.css',
    'assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css',
    'assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css',
    'assets/css/pages/page_contact.css',
    'assets/css/pages/page_invoice.css',
    'assets/css/pages/page_search.css',
    'assets/css/pages/profile.css',
    'assets/css/custom.css',
    'css/custom/core.css',
    'css/custom/layout.css',
    'css/custom/profile_image.css',
    'css/custom/list_item.css',
    'css/custom/tab.css',
    'css/custom/button.css',
    'css/page/about.css',
    'css/page/user.css',
    'css/page/account.css',
    'css/page/charity.css',
    'css/page/project.css',
    'css/page/donate.css',
    'css/page/news.css',
    'css/page/video.css',
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
