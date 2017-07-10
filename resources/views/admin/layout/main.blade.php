<!doctype html>
<html>
<head>
  <!-- Meta data -->
  @include('admin.script.meta') 
  <!-- CSS & JS -->
  @include('admin.script.script')
  <!-- Title  -->
</head>
<body>

  <div class="container margin-top-20 margin-bottom-100">
    @yield('content')
  </div>

</body>
</html>