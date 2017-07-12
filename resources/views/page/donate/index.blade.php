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

<hr>

@if(Auth::check())

@elseif($guest)

  <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
  <button id="xxx" class="btn rounded btn-block btn-lg btn-facebook-inversed">
    <i class="fa fa-facebook"></i> เข้าสู่ระบบด้วย Facebook
  </button>

  <button id="aaa" class="btn rounded btn-block btn-lg btn-facebook-inversed">
    <i class="fa fa-facebook"></i> logout
  </button>

  <div class="fb-like" 
      data-href="{{Request::fullUrl()}}" 
      data-layout="standard" 
      data-action="like" 
      data-show-faces="true">
    </div>

    <div class="fb-share-button" 
        data-href="{{Request::fullUrl()}}" 
        data-layout="button">
      </div>

  <script>

      function init() {
      }

      $('#xxx').on('click',function(){
        FB.login(function(response) {
          console.log(response.authResponse);
          if (response.authResponse) {
              //user just authorized your app

              console.log('dssds');

            FB.api("/me/feed","POST",
                {
                    message: "This is a test message",
                    privacy: {value:"SELF"},
                    access_token: response.authResponse.accessToken
                },
                function (response) {

                  console.log(response.error);

                  if (response && !response.error) {
                    /* handle the result */
                  }
                }
            );

          }
        }, {scope: 'email,public_profile'});
      });

      $('#aaa').on('click',function(){
        FB.getLoginStatus(function(response) {

          console.log(response.status);
                if (response && response.status === 'connected') {
                    FB.logout(function(response) {
                        // document.location.reload();
                        console.log('logout');
                    });
                }
            });

      });

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
  </script>

@else

  <div id="guest_donate_form">
    
    <div class="row">
      <div class="col-md-8">

        <!-- <h3>แจ้งการบริจาค</h3> -->
        <h4>วิธีการบริจาค</h4>
        <p>
          1.โอนเงินมายังบัญชีธนาคาร <a href="javascript:void(0);" data-toggle="modal" data-target="#bank_account_modal">บัญชีธนาคาร</a>
        </p>

        <div class="modal fade" id="bank_account_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 id="myModalLabel1" class="modal-title">บัญชีธนาคาร</h4>
              </div>
              <div class="modal-body">
                <div class="tag-box tag-box-v3">
                  @include('content.bank_account')
                </div>
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn-u btn-u-default" type="button">ปิด</button>
              </div>
            </div>
          </div>
        </div>

        <div class="tag-box tag-box-v2">
          <p>Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat.</p>
        </div>

        <p>2. แจ้งการบริจาคของคุณ</p>

        {{Form::open(['id' => 'main_form', 'class' => 'sky-form sky-changes-3', 'method' => 'post', 'enctype' => 'multipart/form-data'])}}

          <fieldset>
            <div class="row">
              <section class="col col-6">
                <label class="label">ชื่อ นามสกุล</label>
                <label class="input">
                  <i class="icon-append fa fa-user"></i>
                  {{Form::text('name', null, array('placeholder' => 'ชื่อ นามสกุล','autocomplete' => 'off'))}}
                </label>
              </section>
              <section class="col col-6">
                <label class="label">อีเมล</label>
                <label class="input">
                  <i class="icon-append fa fa-envelope-o"></i>
                  {{Form::text('email', null, array('placeholder' => 'อีเมล','autocomplete' => 'off'))}}
                </label>
              </section>
            </div>

            <div class="row">
              <section class="col col-6">
                <label class="label">วันที่โอน</label>
                <label class="input">
                  <i class="icon-append fa fa-user"></i>
                  <input type="text" name="name" id="name">
                </label>
              </section>
              <section class="col col-6">
                <label class="label">เวลา</label>
                <label class="input">
                  <i class="icon-append fa fa-envelope-o"></i>
                  <input type="email" name="email" id="email">
                </label>
              </section>
            </div>

            <section>
              <label class="label">จำนวนเงิน</label>
              <label class="input">
                <i class="icon-append fa fa-tag"></i>
                <input type="text" name="subject" id="subject">
              </label>
            </section>
            
            <section>
              <label class="label">รูปภาพหลักฐานการชำระเงิน</label>
              <label class="input">
                
              </label>
            </section>

          </fieldset>

          <hr>

          <div class="tag-box tag-box-v2">
            <p>การบริจาคให้กับมูลนิธินรี้ตั้งแต่ 300 บาทขึ้นไป คุณจะได้รับของรางวัล <a href="javascript:void(0);" data-toggle="modal" data-target="#reward_modal">รางวัล</a></p>
          </div>

          <div class="modal fade" id="reward_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 id="myModalLabel1" class="modal-title">การบริจาค</h4>
                </div>
                <div class="modal-body">

                  <div class="clearfix margin-bottom-40"></div>

                  <div class="donate-box">
                    <div class="donate-info">
                      <h2 class="donate-amount">บริจาค 300 บาทขึ้นไป</h2>
                      <h3 class="reward-title">รับเสื้อมูลนิธิ</h3>
                      <p class="reward-info">เสื้อสวยๆจากมูลนิธิ (คำอธิบายของรางวัล)</p>
                    </div>
                  </div>

                  <div class="clearfix margin-bottom-40"></div>

                </div>
                <div class="modal-footer">
                  <button data-dismiss="modal" class="btn-u btn-u-default" type="button">ปิด</button>
                </div>
              </div>
            </div>
          </div>

          <h5>ที่อยู่สำหรับการจัดส่งของรางวัล</h5>

          <fieldset>

            <section class="col col-6">
              <label class="label">บ้านเลขที่</label>
              <label class="input">
                <i class="icon-append fa fa-user"></i>
                {{Form::text('address', null, array('placeholder' => 'ชื่อ นามสกุล','autocomplete' => 'off'))}}
              </label>
            </section>

          </fieldset>

          {{Form::submit('แจ้งการบริจาค', array('class' => 'btn-u btn-custom'))}}

        {{Form::close()}}
      </div>

      <div class="col-md-4">

        <h4>การบริจาค</h4>
        
        <div class="donate-box">
          <div class="donate-info">
            <h2 class="donate-amount">บริจาค 300 บาทขึ้นไป</h2>
            <h3 class="reward-title">รับเสื้อมูลนิธิ</h3>
            <p class="reward-info">เสื้อสวยๆจากมูลนิธิ (คำอธิบายของรางวัล)</p>
          </div>
        </div>

      </div>
    </div>

  </div>

  <div id="guest_donate_message" class="container">

    <div class="wide-centered-box">
      <div class="text-center">
        <h3 class="no-margin-bottom">ไม่มีบัญชี</h3>
        <p>คุณสามารถบริจาคได้โดยไม่ต้องมีบัญชี สามารถสร้างบัญชีได้ในภายหลังหากต้องการ</p>
        <a id="display_guest_donate_form_btn" href="javascript:void(0);" class="btn-u btn-custom">บริจาค</a>
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

@endif

<script type="text/javascript">

  class Donate {

    construct(){}

    load() {
      this.bind();
    }

    bind() {
      $('#display_guest_donate_form_btn').on('click',function(){
        $('#guest_donate_form').slideDown(300);
        // $('#guest_donate_message').delay(350).slideUp(300);
        $('#guest_donate_message').delay(250).slideUp(800);

        setTimeout(function(){
          $('#guest_donate_message').remove();
        },4000);

      })
    }

  }

  $(document).ready(function(){
    const donate = new Donate();
    donate.load();
  });

</script>

@stop