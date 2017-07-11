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

  <div class="fixed-header">
    <div class="header-logo-mobile">
      <a class="site-nav__item site-nav__item--logo site-nav__item--logo--mobile" href="/?ref=nav">
        <img src="/images/logo.png" alt="Logo">
      </a>
    </div>
    <div class="header">
      <div class="container">
        <a class="logo" href="index.html">
          <img src="/images/logo.png" alt="Logo">
        </a>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="fa fa-bars"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
        <div class="container">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                หน้าแรก
              </a>
            </li>
            <li>
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                มูลนิธิ
              </a>
            </li>
            <li>
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                ข่าวสาร
              </a>
            </li>
            <li>
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                การบริจาค
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="container margin-top-20 margin-bottom-100">
    @yield('content')
  </div>

  <script type="text/javascript">
    jQuery(document).ready(function() {
      App.init();
    });
  </script>

</body>
</html>