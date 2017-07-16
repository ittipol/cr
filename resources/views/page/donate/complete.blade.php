@extends('layout.main')
@section('content')

<div class="donate">

  <div class="parallax-quote parallaxBg" style="background-position: 50% 89px;">
    <div class="container">
      <div class="parallax-quote-in">
        <p>ขอบคุณที่คุณร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ@if($for == 'charity')มูลนิธิ @elseif($for == 'project')โครงการ @endif{{$name}}</p>
      </div>
    </div>
  </div>

  <div class="container content margin-top-20 margin-bottom-100">
    
    <div class="row invoice-header">
      <div class="col-xs-6">
        <img src="{{$charityLogo}}">
      </div>
      <div class="col-xs-6 invoice-numb">
        @if($for == 'charity')มูลนิธิ @elseif($for == 'project')โครงการ @endif
        <span>{{$name}}</span>
      </div>
    </div>

    <div class="row donation-code-box text-center">
      <div class="col-xs-12">
        <h4>หมายเลขการบริจาค</h4>
        <h2 class="donation-code">{{$code}}</h2>
        <p>คุณสามารถใช้หมายเลยนี้ในการเข้าถึงการบริจาคของคุณ หรือหากสร้างบัญชีแล้วสามารถดูประวัติการบริจาคได้จากหน้า "ประวัติการบริจาค"</p>
      </div>
    </div>

    <div class="social-login text-center">      
      <ul class="list-unstyled">       
        <li>             
          <a href="javascript:void(0);" id="fb_login_btn" class="btn rounded btn-lg btn-facebook-inversed margin-bottom-10">           
            <i class="fa fa-facebook"></i> โพสต์คำขอบคุณจากเราไปยัง Facebook ของคุณ       
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
          <ul class="list-unstyled">
            <li><strong>บริจาคให้กับ:</strong> @if($for == 'charity')มูลนิธิ @elseif($for == 'project')โครงการ @endif</li>
            <li><strong>ชืื่อ@if($for == 'charity')มูลนิธิ @elseif($for == 'project')โครงการ @endif:</strong> MR.JOHN</li>
            <li><strong>ชื่อ นามสกุล:</strong> MR.JOHN</li>
            <li><strong>วันที่:</strong> NILSON</li>
            <li><strong>จำนวนเงิน:</strong> YYYY/MM/DD</li>
          </ul>
        </div>
      </div>
    </div>

  </div>

</div>

@stop