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
        @if(!empty($charityLogo))
          <img src="{{$charityLogo}}">
        @endif
      </div>
      <div class="col-xs-6 invoice-numb">
        {{$for}}
        @if($_for == 'charity')
          <span><a href="{{URL::to('charity')}}/{{$id}}">{{$name}}</a></span>
        @elseif($_for == 'project')
          <span><a href="{{URL::to('project')}}/{{$id}}">{{$name}}</a></span>
        @endif
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

          <div class="donation-box text-center">
            <h4>แชร์การบริจาคนี้และคำขอบคุณจากเรา</h4>
            <a class="btn btn-xs btn-facebook fa-fixed btn-share" href="https://www.facebook.com/sharer/sharer.php?u={{Request::root()}}/share/{{$code}}" target="_blank">
              <i class="fa fa-facebook"></i>
            </a>
            <a class="btn btn-xs btn-twitter fa-fixed btn-share" href="https://twitter.com/intent/tweet?url={{Request::root()}}/share/{{$code}}&text=ขอบคุณที่คุณร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ{{$for}} {{$name}}" target="_blank">
              <i class="fa fa-twitter"></i>
            </a>
            <a class="btn btn-xs btn-googleplus fa-fixed btn-share" href="https://plus.google.com/share?url={{Request::root()}}/share/{{$code}}" target="_blank">
              <i class="fa fa-google-plus"></i>
            </a>
          </div>

        </li>     
      </ul>  
    </div>

    <hr>

    <div class="row">

      <div class="col-xs-12">

        <div class="tag-box tag-box-v3">
          <h2>รายละเอียดการบริจาค</h2>
          <div class="row">
            <div class="col-md-4"><strong>บริจาคให้กับ:</strong> {{$for}} {{$name}}</div>

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

  </div>

  @if(!$donation->verified)
  <div class="row">
    <div class="col-xs-12">
      <div class="alert alert-danger fade in">
        <strong>หมายเหตุ</strong> เพื่อความถูกต้องเราจำเป็นต้องตรวจสอบการบริจาค เมื่อตรวจสอบแล้วการบริจาคถึงจะแสดงใน{{$for}}และจะดำเนินการส่งมอบให้กับ{{$for}}ตามที่กำหนด
      </div>
    </div>
  </div>
  @endif

</div>

@stop