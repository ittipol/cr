@extends('layout.main')
@section('content')

  <div class="heading heading-v4 margin-bottom-40">
    @if($for == 'charity')
      <h2>บริจาคให้กับมูลนิธิ</h2>
    @elseif($for == 'project')
      <h2>บริจาคให้กับโครงการ</h2>
    @endif
    
    <h3>{{$name}}</h3>
    @if($for == 'project')
      <h4>โครงการจาก {{$charityName}}</h4>
    @endif    
  </div>

  @if(!Auth::check())

    <div class="container">

      <hr>

      <!-- <div class="row">
        <div class="col-md-12 text-center">
          <h3 class="no-margin-bottom">ไม่มีบัญชี</h3>
          <p>คุณสามารถบริจาคได้โดยไม่ต้องมีบัญชี สามารถสร้างบัญชีได้ในภายหลังหากต้องการ</p>
          <a href="" class="btn-u btn-custom">บริจาค</a>
        </div>
      </div> -->

      <div class="wide-centered-box">
        <div class="text-center">
          <h3 class="no-margin-bottom">ไม่มีบัญชี</h3>
          <p>คุณสามารถบริจาคได้โดยไม่ต้องมีบัญชี สามารถสร้างบัญชีได้ในภายหลังหากต้องการ</p>
          <a href="" class="btn-u btn-custom">บริจาค</a>
        </div>
      </div>
      
      <hr>

      <div class="container">

        <div class="wide-centered-box margin-bottom-40">
          <div class="text-center">
            <h3 class="no-margin-bottom">เข้าสู่ระบบหรือสร้างบัญชี</h3>
          </div>
        </div>

        <div class="row space-xlg-hor equal-height-columns">
          <!--login Block-->
          <div class="form-block login-block col-md-6 col-sm-12 rounded-left equal-height-column" style="height: 606px;">
            <div class="form-block-header">
              <h2 class="margin-bottom-15">เข้าสู่ระบบ</h2>
            </div>

            <div class="input-group margin-bottom-20">
              <span class="input-group-addon rounded-left"><i class="icon-envelope color-white"></i></span>
              <input type="text" class="form-control rounded-right" placeholder="อีเมล">
            </div>

            <div class="input-group margin-bottom-20">
              <span class="input-group-addon rounded-left"><i class="icon-lock color-white"></i></span>
              <input type="password" class="form-control rounded-right" placeholder="รหัสผ่าน">
            </div>

            <div class="row margin-bottom-70">
              <div class="col-md-12">
                <button type="submit" class="btn-u btn-block rounded">เข้าสู่ระบบ</button>
              </div>
            </div>
            <div class="social-login">
              <div class="or rounded-x">หรือ</div>
              <ul class="list-unstyled">
                <li>
                  <button class="btn rounded btn-block btn-lg btn-facebook-inversed margin-bottom-20">
                    <i class="fa fa-facebook"></i> เข้าสู่ระบบด้วย Facebook
                  </button>
                </li>
              </ul>
            </div>
          </div>
          <!--End login Block-->

          <!--Reg Block-->
          <div class="form-block reg-block col-md-6 col-sm-12 rounded-right equal-height-column" style="height: 606px;">
            <div class="form-block-header">
              <h2 class="margin-bottom-10">สร้างบัญชี</h2>
              <p class="margin-bottom-20">ผู้ใช้ที่สร้างบัญชีจะสามารถเข้าถึงส่วนต่างๆและคุณสมบัติต่างๆของเว็บไซต์เพื่อให้การใช้สะดวกและรวดเร็วมากขึ้น</p>
            </div>

            <div class="input-group margin-bottom-20">
              <span class="input-group-addon rounded-left"><i class="icon-user"></i></span>
              <input type="text" class="form-control rounded-right" placeholder="ชื่อ นามสกุล">
            </div>

            <div class="input-group margin-bottom-20">
              <span class="input-group-addon rounded-left"><i class="icon-envelope"></i></span>
              <input type="email" class="form-control rounded-right" placeholder="อีเมล">
            </div>

            <div class="input-group margin-bottom-20">
              <span class="input-group-addon rounded-left"><i class="icon-lock"></i></span>
              <input type="password" class="form-control rounded-right" placeholder="รหัสผ่าน (อย่างน้อย 4 อักขระ)">
            </div>

            <div class="input-group margin-bottom-20">
              <span class="input-group-addon rounded-left"><i class="icon-lock"></i></span>
              <input type="password" class="form-control rounded-right" placeholder="ป้อนรหัสผ่านอีกครั้ง">
            </div>

            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn-u btn-block rounded">สร้างบัญชี</button>
              </div>
            </div>
          </div>
          <!--End Reg Block-->
        </div>
      </div>

    </div>

  @else

  @endif

@stop