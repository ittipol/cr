@extends('layout.main')
@section('content')

<div class="donate">

  <div class="parallax-quote parallaxBg" style="background-position: 50% 89px;">
    <div class="container">
      <div class="parallax-quote-in">
        <p>ขอบคุณที่คุณร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ{{$for}} {{$name}}</p>
      </div>
    </div>
  </div>

  <div class="container content margin-top-20 margin-bottom-100">
    
    <div class="row invoice-header">
      <div class="col-xs-6">
        <img src="{{$charityLogo}}">
      </div>
      <div class="col-xs-6 invoice-numb">
        {{$for}}
        <span>{{$name}}</span>
      </div>
    </div>

    <div class="row donation-code-box text-center">
      <div class="col-xs-12">
        <h4>หมายเลขการบริจาค</h4>
        <h2 class="donation-code">{{$code}}</h2>
        <p>คุณสามารถใช้หมายเลยนี้ในการเข้าถึงการบริจาคของคุณ หรือหากสร้างบัญชีแล้วสามารถดูประวัติการบริจาคได้จากหน้า "โปรไฟล์"</p>
      </div>
    </div>

    <div id="social_content" class="social-login text-center">      
      <ul class="list-unstyled">       
        <li>             
          <!-- <a href="javascript:void(0);" id="fb_post_btn" class="btn rounded btn-lg btn-facebook-inversed margin-bottom-10">           
            <i class="fa fa-facebook"></i> โพสต์คำขอบคุณจากเราไปยัง Facebook ของคุณ       
          </a> -->
          <a href="javascript:void(0);" id="fb_post_btn" class="btn rounded btn-lg btn-facebook-inversed margin-bottom-10">           
            <i class="fa fa-facebook"></i> โพสต์การบริจาคนี้ไปยัง Facebook ของคุณ       
          </a>    
          <div class="text-center">           
            <small>เราจะไม่โพสต์อะไรทั้งสิ้นใน Facebook<br>โดยไม่ได้รับอนุญาตจากคุณ</small>         
          </div>       
        </li>     
      </ul>  
    </div>

    <hr>

    <div class="row invoice-info">

      <div class="col-xs-12">

        <div class="tag-box tag-box-v3">
          <h2>รายละเอียดการบริจาค:</h2>
          <div class="row">
            <div class="col-md-4"><strong>บริจาคให้กับ:</strong> {{$for}}</div>
            <div class="col-md-4"><strong>ชื่อ{{$for}}</strong> {{$name}}</div>

            <div class="col-md-4">
              <strong>จำนวนเงิน:</strong> {{number_format($donation->amount, 0, '.', ',')}} บาท
            </div>

            <div class="col-md-4">
              <strong>ชื่อ นามสกุล:</strong>
              @if($donation->unidentified)
                ไม่ระบุ
              @elseif(!empty($donation->user_id))
                {{$donation->user->name}}
              @else
                {{$donation->guest_name}}
              @endif
            </div>

            <div class="col-md-4">
              <strong>วันที่:</strong> {{$dateLib->covertDateTimeToSting($donation->created_at)}}
            </div>
          </div>
        </div>
        
      </div>

      @if(!$donation->verified)
      <div class="row">
        <div class="col-xs-12">
          <div class="alert alert-danger fade in">
            <strong>หมายเหตุ</strong> การบริจาคจะไม่แสดงไปยัง{{$for}}ทันที จะมีการตรวจสอบความถูกต้องก่อนจะแสดงไปยัง{{$for}}ที่คุณบริจาค
          </div>
        </div>
      </div>
      @endif

  </div>

</div>

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

  $('#fb_post_btn').on('click',function(e){

    FB.getLoginStatus(function(response) {
      console.log(response);
    });

    FB.login(function(response) {

      console.log(response.authResponse);
      if (response.authResponse) {
        //user just authorized your app

        FB.api("/me/feed","POST",
            {
              message: "ABCDEF ... \nnew line test ...",
              privacy: {value:"SELF"},
              link: 'http://103.13.228.35/'
            },
            function (response) {

              console.log(response.error);

              $('#fb_post_btn').fadeOut(220);

              if (response && !response.error) {
                /* handle the result */
                console.log('axxxx');
              }
            }
        );

      }
    }, {scope: 'publish_actions'});
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

</script>

@stop