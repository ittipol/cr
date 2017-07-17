<div class="fixed-header">
  <nav class="charity-header one-page-header navbar navbar-default navbar-fixed-top one-page-nav-scrolling one-page-nav__fixed" data-role="navigation">
    <div class="container">
      <div class="menu-container page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
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
          <ul class="nav navbar-nav">
            <li class="page-scroll home active">
              <a href="{{URL::to('/')}}">หน้าแรก</a>
            </li>
            <li class="page-scroll">
              <a href="#your-help">การบริจาค</a>
            </li>
            <li class="page-scroll">
              <a href="{{URL::to('charity/list')}}">มูลนิธิ</a>
            </li>
            <li class="page-scroll">
              <a href="{{URL::to('project/list')}}">โครงการ</a>
            </li>
            <li class="page-scroll">
              <a href="{{URL::to('news/list')}}">ข่าวสาร</a>
            </li>
            @if(Auth::check())
            <li class="page-scroll avatar">
              // profile image
              <img src="">
            </li>
            @else
            <li class="page-scroll">
              <a href="{{URL::to('login')}}">เข้าสู่ระบบ</a>
            </li>
            <!-- <li class="page-scroll">
              <a href="{{URL::to('subscription')}}">สร้างบัญชี</a>
            </li> -->
            @endif
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>
