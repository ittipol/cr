@extends('layout.main')
@section('content')

{{Form::open(['id' => 'login_form', 'class' => 'user-form', 'method' => 'post', 'enctype' => 'multipart/form-data'])}}

<div class="form-block login-block user-form">
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

  <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>

  <div class="social-login">     <div class="or rounded-x">หรือ</div>     <ul
class="list-unstyled">       <li>         <a class="js-login-facebook
loginbutton dekdbutton -lg -social-facebook _button-with-states -ready
-loading" href="https://www.facebook.com/v2.9/dialog/oauth?auth_type=rerequest
&amp;client_id=227375124451364&amp;state=4993a6fdd2003f1375a7d67d62b6db72&amp;
response_type=code&amp;sdk=php-sdk-5.0.0&amp;redirect_uri=https%3A%2F%2Fwww.de
k-d.com%2Fquiz%2Fsupertest%2F57658%2F&amp;scope=email%2Cuser_about_me%2Cuser_b
irthday%2Cpublic_profile">           xxx               </a>         <button
id="fb_login_btn" class="btn rounded btn-block btn-lg btn-facebook-inversed
margin-bottom-10">           <i class="fa fa-facebook"></i> เข้าสู่ระบบด้วย
Facebook         </button>         <div class="text-center">           <small>
เราจะไม่โพสต์อะไรทั้งสิ้นใน Facebook<br>             โดยไม่ได้รับอนุญาตจากคุณ
</small>         </div>       </li>     </ul>   </div>

  <div class="text-center margin-top-60">
    ต้องการสร้างบัญชี <a href="{{URL::to('register')}}">สร้างบัญชี</a>
  </div>

</div>

{{Form::close()}}

@stop