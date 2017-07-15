<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.9&appId=227375124451364";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
              <a href="{{URL::to('/charity')}}">มูลนิธิ</a>
            </li>
            <li class="page-scroll">
              <a href="{{URL::to('/project')}}">โครงการ</a>
            </li>
            <li class="page-scroll">
              <a href="#donators">Donators</a>
            </li>
            <li class="page-scroll">
              <a href="#events">Events</a>
            </li>
            <li class="page-scroll">
              <a href="#blog">ข่าวสาร</a>
            </li>
            <li class="page-scroll">
              <a href="#subscription">Subscription</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>
