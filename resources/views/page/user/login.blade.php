@extends('layout.main')
@section('content')

{{Form::open(['id' => 'login_form', 'class' => 'user-form', 'method' => 'post', 'enctype' => 'multipart/form-data'])}}

<div class="form-block login-block user-form">

  @include('component.form_error')
  
  <div class="form-block-header">
    <h2 class="margin-bottom-30">เข้าสู่ระบบ</h2>
  </div>

  <div class="input-group margin-bottom-20">
    <span class="input-group-addon rounded-left"><i class="icon-append fa fa-envelope-o"></i></i></span>
    <input type="text" name="email" class="form-control rounded-right" placeholder="อีเมล">
  </div>

  <div class="input-group margin-bottom-20">
    <span class="input-group-addon rounded-left"><i class="icon-lock color-white"></i></span>
    <input type="password" name="password" class="form-control rounded-right" placeholder="รหัสผ่าน">
  </div>

  <div class="row margin-bottom-20">

    <div class="col-md-12 margin-bottom-10">
      <a href="">ลืมรหัสผ่าน</a>
    </div>

    <div class="col-md-12 margin-bottom-10">
      {{Form::submit('เข้าสู่ระบบ', array('class' => 'btn-u btn-custom btn-block rounded'))}}
    </div>
    <div class="col-md-12 sky-form">
      <label class="checkbox"><input type="checkbox" name="remember" value="1"><i></i>จดจำไว้ในระบบ</label>
    </div>
  </div>

  <div class="social-login">     
    <div class="or rounded-x">หรือ</div>     
    <ul class="list-unstyled">       
      <li>             
        <a href="javascript:void(0);" id="fb_login_btn" class="btn rounded btn-block btn-lg btn-facebook-inversed margin-bottom-10">           
          <i class="fa fa-facebook"></i> เข้าสู่ระบบด้วย Facebook         
        </a>         
        <div class="text-center">           
          <small>เราจะไม่โพสต์อะไรทั้งสิ้นใน Facebook<br>โดยไม่ได้รับอนุญาตจากคุณ</small>         
        </div>       
      </li>     
    </ul>  
  </div>

  <div class="text-center margin-top-60">
    ต้องการสร้างบัญชี <a href="{{URL::to('subscription')}}">สร้างบัญชี</a>
  </div>

</div>

{{Form::close()}}

<div class="clearfix margin-top-100"></div>

<script type="text/javascript">

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '227375124451364',
      xfbml      : true,
      version    : 'v2.9'
    });

    init();
  };

  (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  $('#fb_login_btn').on('click',function(e){
    FB.login(function(response) {

      if (response.authResponse) {
        //user just authorized your app

        window.location.href = "/facebook/login?code="+response.authResponse.accessToken;

        // FB.api("/me/feed","POST",
        //     {
        //         message: "testing For ... \ntest ...",
        //         privacy: {value:"SELF"},
        //     },
        //     function (response) {

        //       console.log('here');
        //       console.log(response.error);

        //       if (response && !response.error) {
        //         /* handle the result */
        //       }
        //     }
        // );

      }
    }, {scope: 'email,public_profile,publish_actions'});
  });

</script>

@stop