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

<div id="social_share_btn" class="social-login text-center" @if($popup) style="display:none;" @endif>  
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
        <div class="clearfix margin-bottom-10"></div>
        <div class="alert alert-info alert-inline-block fade in">
          <strong>หมายเหตุ</strong> นี้ไม่ใช่หน้าที่จะแสดงเมื่อคุณได้แชร์ จะมีหน้าที่แสดงโดยเฉพาะสำหรับการแชร์ <a href="{{URL::to('share')}}/{{$code}}">คลิกเพื่อแสดงหน้าสำหรับการแชร์</a>
        </div>
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
      <strong>หมายเหตุ</strong> เพื่อความถูกต้องเราจำเป็นต้องตรวจสอบการบริจาค เมื่อตรวจสอบแล้วจึงดำเนินการส่งมอบตามที่กำหนด
    </div>
  </div>
</div>
@endif

@if($popup)

  <a href="javascript:void(0);" id="socaial_share_popup_btn" data-toggle="modal" data-target="#socaial_share_box" style="display:none;"></a>

  <div class="modal fade" id="socaial_share_box" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">

          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

          <img class="shared-social-image" src="{{$sharedImage}}">

          <h2>เราขอขอบคุณที่คุณได้ร่วมเป็นส่วนหนึ่งในการช่วยเหลือและสนับสนุน{{$for}} {{$name}}</h2>

          <div class="clearfix margin-bottom-20"></div>

          @if($donation->unidentified) 
            ขอขอบคุณที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ{{$for}} {{$name}}
          @elseif(!empty($donation->user_id))
            ขอขอบคุณ คุณ {{$donation->user->name}} ที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ{{$for}} {{$name}}
          @else
            ขอขอบคุณ คุณ {{$donation->guest_name}} ที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ{{$for}} {{$name}}
          @endif

          <!-- ขอให้ท่านมีความสุขความเจริญ ชีวิตก้าวหน้าในหน้าที่การงาน อายุมั่นขวัญยืนสุขภาพร่างกายแข็งแรงทั้งตัวท่านเองและครอบครัวของท่านด้วย -->
          เราขอขอบคุณสำหรับการช่วยเหลือสุนัขจร ขออนุโมทนาบุญและการช่วยเหลือของท่านจะช่วยหนุนนำให้ท่านที่มีความสุขความเจริญอยุ่แล้วก็จะได้มีความสุขความเจริญยิ่งๆขึ้นไปทั้งตัวท่านเองและครอบครัวของท่านด้วย

          <br><br>

          เรา CharityTH และ {{$charityName}} ขอกล่าวขอบพระคุณอย่างสูง

          <div class="clearfix margin-bottom-40"></div>

          <hr>

          <div class="donation-box text-center">
            <h4>แชร์การบริจาคนี้และคำขอบคุณจากเรา</h4>
            <a class="btn btn-xs btn-facebook fa-fixed btn-share" href="https://www.facebook.com/sharer/sharer.php?u={{Request::root()}}/share/{{$code}}" target="_blank">
              <i class="fa fa-facebook"></i>
            </a>
            <a class="btn btn-xs btn-twitter fa-fixed btn-share" href="https://twitter.com/intent/tweet?url={{Request::root()}}/share/{{$code}}&text=ขอขอบคุณที่คุณได้ร่วมเป็นส่วนหนึ่งในการช่วยเหลือและสนับสนุน{{$for}} {{$name}}" target="_blank">
              <i class="fa fa-twitter"></i>
            </a>
            <a class="btn btn-xs btn-googleplus fa-fixed btn-share" href="https://plus.google.com/share?url={{Request::root()}}/share/{{$code}}" target="_blank">
              <i class="fa fa-google-plus"></i>
            </a>
            <div class="clearfix margin-bottom-10"></div>
            <div class="alert alert-info alert-inline-block fade in">
              <strong>หมายเหตุ</strong> นี้ไม่ใช่หน้าที่จะแสดงเมื่อคุณได้แชร์ จะมีหน้าที่แสดงโดยเฉพาะสำหรับการแชร์ <a href="{{URL::to('share')}}/{{$code}}">คลิกเพื่อแสดงหน้าสำหรับการแชร์</a>
            </div>
          </div>

          <div class="clearfix margin-bottom-20"></div>

        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    
    $(document).ready(function(){
      setTimeout(function(){
        $('#socaial_share_popup_btn').trigger('click');
      },500);

      $('#socaial_share_box').on('click',function(){
        $('#social_share_btn').delay(500).fadeIn(400);
      });


      $('#socaial_share button.close').on('click',function(){
        $('#social_share_btn').delay(500).fadeIn(400);
      });

    });

  </script>

@endif