<!doctype html>
<html>
<head>
  <!-- Meta data -->
  @include('admin.script.meta') 
  <!-- CSS & JS -->
  @include('admin.script.script')
  <!-- Title  -->

  <style type="text/css">
    body {
      background-color: #333;
    }

    h1 {
      color: #fff;
    }
  </style>

</head>
<body>

  <div class="header">
    <div class="container">
   
      <a class="logo" href="{{URL::to('admin/dashboard')}}">
        <img src="/images/logo/logo-dark.png" alt="Logo">
      </a>

      @if(session()->has('admin_auth') && !empty(session()->get('admin_auth')))
      <div class="topbar">
        <ul class="loginbar pull-right">
          <li><a href="{{URL::to('admin/logout')}}">Logout</a></li>
        </ul>
      </div>
      @else
      <div class="topbar">
        <ul class="loginbar pull-right">
          <li><a href="#">Login</a></li>
        </ul>
      </div>
      @endif

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="fa fa-bars"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
      <div class="container">
        <ul class="nav navbar-nav">
 
          @if(session()->has('admin_auth') && !empty(session()->get('admin_auth')))

          <li class="dropdown">
            <a href="{{URL::to('admin/charity/list')}}" class="dropdown-toggle" data-toggle="dropdown">
              Charitys
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{URL::to('admin/charity/list')}}">list</a></li>
              <li><a href="{{URL::to('admin/charity/add')}}">add</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="{{URL::to('admin/project/list')}}" class="dropdown-toggle" data-toggle="dropdown">
              Projects
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{URL::to('admin/project/list')}}">list</a></li>
              <li><a href="{{URL::to('admin/project/add')}}">add</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="{{URL::to('admin/news/list')}}" class="dropdown-toggle" data-toggle="dropdown">
              News
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{URL::to('admin/news/list')}}">list</a></li>
              <li><a href="{{URL::to('admin/news/add')}}">add</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="{{URL::to('admin/donation/list')}}" class="dropdown-toggle" data-toggle="dropdown">
              donations
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{URL::to('admin/donation/list')}}">list</a></li>
              <li><a href="{{URL::to('admin/donation/add')}}">add</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="{{URL::to('admin/stock_image/list')}}" class="dropdown-toggle" data-toggle="dropdown">
              Stock Images
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{URL::to('admin/stock_image/list')}}">list</a></li>
              <li><a href="{{URL::to('admin/stock_image/add')}}">add</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="{{URL::to('admin/summary')}}" class="dropdown-toggle" data-toggle="dropdown">
              Summary
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{URL::to('admin/summary')}}">Monthly & Daily</a></li>
            </ul>
          </li>

          @else

          <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
              Home
            </a>
          </li>

          @endif
          <!-- End Search Block -->
        </ul>
      </div><!--/end container-->
    </div><!--/navbar-collapse-->
  </div>


  <div class="container margin-top-20 margin-bottom-100">
    @yield('content')
  </div>

</body>
</html>