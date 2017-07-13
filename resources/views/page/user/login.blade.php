@extends('layout.main')
@section('content')

  {{Form::open(['url' => Request::fullUrl(), 'id' => 'login_form', 'method' => 'post', 'enctype' => 'multipart/form-data'])}}

  <div class="form-block login-block">
    <div class="form-block-header">
      <h2 class="margin-bottom-30">เข้าสู่ระบบ</h2>
    </div>

    <div class="input-group margin-bottom-20">
      <span class="input-group-addon rounded-left"><i class="icon-append fa fa-envelope-o"></i></i></span>
      <input type="text" class="form-control rounded-right" placeholder="อีเมล">
    </div>

    <div class="input-group margin-bottom-20">
      <span class="input-group-addon rounded-left"><i class="icon-lock color-white"></i></span>
      <input type="password" class="form-control rounded-right" placeholder="รหัสผ่าน">
    </div>

    <div class="row margin-bottom-20">

      <div class="col-md-12 margin-bottom-10">
        <a href="">ลืมรหัสผ่าน</a>
      </div>

      <div class="col-md-12 margin-bottom-10">
        {{Form::submit('เข้าสู่ระบบ', array('class' => 'btn-u btn-custom btn-block rounded'))}}
      </div>
      <div class="col-md-12 sky-form">
        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>จดจำไว้ในระบบ</label>
      </div>
    </div>
    <div class="social-login">
      <div class="or rounded-x">หรือ</div>
      <ul class="list-unstyled">
        <li>
          <button id="fb_login_btn" class="btn rounded btn-block btn-lg btn-facebook-inversed margin-bottom-10">
            <i class="fa fa-facebook"></i> เข้าสู่ระบบด้วย Facebook
          </button>
          <div class="text-center">
            <small>
              เราจะไม่โพสต์อะไรทั้งสิ้นใน Facebook<br>
              โดยไม่ได้รับอนุญาตจากคุณ
            </small>
          </div>
        </li>
      </ul>
    </div>

    <div class="text-center margin-top-60">
      ต้องการสมัครสมาชิก <a href="{{URL::to('register')}}">สมัครสมาชิก</a>
    </div>

  </div>

  {{Form::close()}}

@stop