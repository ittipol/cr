<div class="fixed-header">
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
              <a href="{{URL::to('donation')}}">การบริจาค</a>
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
</div>
