<!doctype html>
<html>
<head>
  <!-- Meta data -->
  @include('script.meta') 
  <!-- CSS & JS -->
  @include('script.analyticstracking') 
  @include('script.script')
  <!-- Title  -->
</head>
<body>

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.9&appId=227375124451364";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  @include('layout.header')

  <!-- <div> -->
    @yield('content')
  <!-- </div> -->

  @include('layout.footer')

  <script src="/js/plugins/one.app.js"></script>

  <script>
    $(function() {
      App.init();
    });
  </script>

</body>
</html>