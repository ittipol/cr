@extends('layout.main')
@section('content')

<div class="donate share">

  <div class="shared-content-bg" style="background-image: url('http://www.cr.com/images/promo/1_1.jpg');">
    <div class="container">
      <h1 class="text-center">
        @if($donation->unidentified) 
          บริจาคโดยไม่ออกนาม<br>ขอขอบคุณที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ {{$name}}
        @elseif(!empty($donation->user_id))
          ขอขอบคุณ {{$donation->user->name}}<br>ที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ {{$name}}
        @else
          ขอขอบคุณ {{$donation->guest_name}}<br>ที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ {{$name}}
        @endif
      </h1>
    </div>
  </div>

  <div class="container">

    <div class="parallax-quote parallaxBg" style="background-position: 50% 89px;">
      <div class="container">
        <div class="parallax-quote-in">
          <p>ร่วมเป็นส่วนหนึ่งในช่วยเหลือและสนับสนุน {{$name}}</p>
        </div>
      </div>
    </div>

    <div class="shered-content">

      <div class="clearfix margin-bottom-20"></div>
      <h2>{{$name}}</h2>
      <p>ป้าจิ๋มผู้ที่อุทิศชีวิตของตัวเอง ให้กับการช่วยเหลือน้องหมา มามากว่า 30ปี เพียงคนเดียว ถึงร่างกายตัวเองจะเจ็บป่วยแต่แม่ก็ยังทนทำมันด้วยความรัก ที่มีต่อสิ่งมีชีวิตเล็กๆ</p>
      <a class="btn-u btn-custom-color" href="#">เพิ่มเติม</a>
      <a class="btn-u btn-custom-color" href="#"><i class="fa fa-heart"></i> บริจาคให้กับมูลนิธินี้</a>
      <div class="clearfix margin-bottom-60"></div>

      <hr>

      <div id="social_content" class="social-login text-center">      
        <ul class="list-unstyled">       
          <li>             

            <div class="donation-box text-center">
              <h4>ร่วมแชร์รายละเอียดและเรื่องราวต่างๆของ {{$name}}</h4>
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

      <div class="clearfix margin-bottom-60"></div>

    </div>

  </div>

</div>

@stop