<!doctype html>
<html>
<head>
  <!-- Meta data -->
  @include('script.meta') 
  <!-- CSS & JS -->
  @include('script.script')
  <!-- Title  -->
</head>
<body>

  @include('layout.header')

  <div class="margin-top-20 margin-bottom-100">
    @yield('content')
  </div>

  @include('layout.footer')

</body>
</html>