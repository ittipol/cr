@extends('layout.main')
@section('content')

{{Form::open(['id' => 'register_form', 'class' => 'user-form', 'method' => 'post', 'enctype' => 'multipart/form-data'])}}

<div class="form-block reg-block user-form">

  @include('component.form_error')

  <div class="form-block-header">
    <h2 class="margin-bottom-30">สร้างบัญชี</h2>
  </div>

  <section class="margin-bottom-20">
    <div class="input-group">
      <span class="input-group-addon rounded-left"><i class="icon-user"></i></span>
      <input type="text" name="name" class="form-control rounded-right" placeholder="ชื่อ นามสกุล" autocomplete="off">
    </div>
  </section>

  <section class="margin-bottom-20">
    <div class="input-group">
      <span class="input-group-addon rounded-left"><i class="icon-envelope"></i></span>
      <input type="text" name="email" class="form-control rounded-right" placeholder="อีเมล" autocomplete="off">
    </div>
  </section>

  <section class="margin-bottom-20">
    <div class="input-group">
      <span class="input-group-addon rounded-left"><i class="icon-lock"></i></span>
      <input type="password" name="password" id="password_field" class="form-control rounded-right" placeholder="รหัสผ่าน (อย่างน้อย 4 อักขระ)">
    </div>
  </section>

  <section class="margin-bottom-20">
    <div class="input-group">
      <span class="input-group-addon rounded-left"><i class="icon-action-redo"></i></span>
      <input type="password" name="password_confirmation" class="form-control rounded-right" placeholder="ป้อนรหัสผ่านอีกครั้ง">
    </div>
  </section>

  <div class="row margin-bottom-40">
    <div class="col-md-12">
      {{Form::submit('สร้างบัญชี', array('class' => 'btn-u btn-custom btn-block rounded'))}}
    </div>
  </div>

  <div class="login-block">
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
  </div>

  <div class="text-center margin-top-60">
    มีบัญชีแล้ว <a href="{{URL::to('login')}}">เข้าสู่ระบบ</a>
  </div>

</div>

{{Form::close()}}

<script src="/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/js/form/register-validation.js"></script>

<script type="text/javascript">

  $(document).ready(function(){
    Validation.initValidation();
  });

</script>

@stop