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

@if(!Auth::check())
<div class="alert alert-info fade in">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4>ไม่มีบัญชีใช้หรือไม่?</h4>
  <p>คุณสามารถบริจาคได้โดยไม่ต้องมีบัญชี สามารถสร้างบัญชีได้ในภายหลังหากต้องการ <!-- <a href="">ต้องการสร้างบัญชี</a> --></p>
  <p>
    <a class="btn-u btn-u-xs btn-u-red" href="#"><i class="fa fa-cog"></i> ต้องการสร้างบัญชี</a>
  </p>
</div>
@endif

<div id="guest_donate_form">
  
  <div class="row">
    <div class="col-md-8">

      @if($for == 'charity')
        <h4>บริจาคให้กับมูลนิธิ</h4>
      @elseif($for == 'project')
        <h4>บริจาคให้กับโครงการ</h4>
      @endif

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

      <p>2. แจ้งการบริจาคของคุณ</p>

      <div class="tag-box tag-box-v2">
        <h4 class="no-margin-top">บริจาคโดยไม่ออกนาม</h4>
        <p>หากต้องการบริจาคโดยไม่ออกนามให้เว้นการกรอก "ชื่อ นามสกุล" ของคุณ</p>
      </div>

      @include('component.form_error')

      {{Form::open(['url' => Request::fullUrl(), 'id' => 'donation_form', 'class' => 'sky-form sky-changes-3', 'method' => 'post', 'enctype' => 'multipart/form-data'])}}

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
                {{Form::text('email', null, array('placeholder' => 'อีเมล','autocomplete' => 'off', 'class' => 'ignore'))}}
              </label>
            </section>
          </div>

          <div class="row">
            <section class="col col-6">
              <label class="label">วันที่โอน</label>
              <label class="input">
                <i class="icon-append fa fa-calendar"></i>
                {{Form::text('date', null, array('id' => 'date' ,'autocomplete' => 'off'))}}
              </label>
            </section>
            <section class="col col-6">
              <label class="label">เวลา</label>
              <label class="input">
                
                <div class="select-group half">
                  <label class="select">
                  {{Form::select('time_hour', $hours)}}<i></i>
                  </label>
                  <label class="select">
                  {{Form::select('time_min', $mins)}}<i></i>
                  </label>
                </div>

              </label>
            </section>
          </div>

          <section>
            <label class="label">จำนวนเงิน</label>
            <label class="input-group">
              {{Form::text('amount', null, array('class' => 'form-control', 'autocomplete' => 'off'))}}
              <span class="input-group-addon">บาท</span>
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
          <p>บริจาคให้กับมูลนิธินี้ตั้งแต่ 300 บาทขึ้นไป คุณจะได้รับของรางวัล <a href="javascript:void(0);" data-toggle="modal" data-target="#reward_modal">รางวัล</a></p>
        </div>

        @include('content.donate_reward')

        <div class="clearfix margin-bottom-10"></div>

        <label class="checkbox state-success">
          <input type="checkbox" id="open_address_form_chkbox" name="reward_chkbox" value="1"><i></i>ต้องการรับของรางวัล
        </label>

        <div class="clearfix margin-bottom-20"></div>

        <div id="address_form">

          <div class="clearfix margin-bottom-10"></div>
          <h4 class="no-margin">ที่อยู่สำหรับการจัดส่งของรางวัล</h4>
          <div class="clearfix margin-bottom-20"></div>

          <fieldset>

            <div class="row">
              <section class="col col-md-12">
                <label class="label">ชื่อ นามสกุลผู้รับ</label>
                <label class="input">
                  {{Form::text('receiver_name', null, array('placeholder' => 'ชื่อผู้รับ','autocomplete' => 'off'))}}
                </label>
              </section>
            </div>

            <div class="row">

              <section class="col-md-6 col-xs-6">
                <label class="label">บ้านเลขที่</label>
                <label class="input">
                  {{Form::text('address_no', null, array('placeholder' => 'บ้านเลขที่','autocomplete' => 'off'))}}
                </label>
              </section>

              <section class="col-md-6 col-xs-6">
                <label class="label">อาคาร/หมู่บ้าน</label>
                <label class="input">
                  {{Form::text('building', null, array('placeholder' => 'อาคาร/หมู่บ้าน','autocomplete' => 'off'))}}
                </label>
              </section>

            </div>

            <div class="row">

              <section class="col-md-6 col-xs-6">
                <label class="label">ชั้น</label>
                <label class="input">
                  {{Form::text('floor', null, array('placeholder' => 'ชั้น','autocomplete' => 'off'))}}
                </label>
              </section>

              <section class="col-md-6 col-xs-6">
                <label class="label">หมู่ที่</label>
                <label class="input">
                  {{Form::text('squad', null, array('placeholder' => 'หมู่ที่','autocomplete' => 'off'))}}
                </label>
              </section>

            </div>

            <div class="row">

              <section class="col-md-6 col-xs-6">
                <label class="label">ถนน</label>
                <label class="input">
                  {{Form::text('road', null, array('placeholder' => 'ถนน','autocomplete' => 'off'))}}
                </label>
              </section>

              <section class="col-md-6 col-xs-6">
                <label class="label">ซอย</label>
                <label class="input">
                  {{Form::text('alley', null, array('placeholder' => 'ซอย','autocomplete' => 'off'))}}
                </label>
              </section>

            </div>

            <div class="row">

              <section class="col-md-6 col-xs-6">
                <label class="label">จังหวัด</label>
                <label class="select">
                  {{Form::select('province', $provinces ,null, array('id' => 'province'))}}<i></i>
                </label>
              </section>

              <section class="col-md-6 col-xs-6">
                <label class="label">อำเภอ/เขต</label>
                <label class="select">
                  {{Form::select('district', array() ,null, array('id' => 'district'))}}<i></i>
                </label>
              </section>

            </div>

            <div class="row">

              <section class="col-md-6 col-xs-6">
                <label class="label">ตำบล/แขวง</label>
                <label class="input">
                  {{Form::text('sub_district', null, array('placeholder' => 'ตำบล/แขวง','autocomplete' => 'off'))}}
                </label>
              </section>

              <section class="col-md-6 col-xs-6">
                <label class="label">รหัสไปรษณีย์</label>
                <label class="input">
                  {{Form::text('post_code', null, array('placeholder' => 'รหัสไปรษณีย์','autocomplete' => 'off'))}}
                </label>
              </section>

            </div>

          </fieldset>

        </div>

        {{Form::submit('แจ้งการบริจาค', array('class' => 'btn-u btn-custom'))}}

      {{Form::close()}}

    </div>

    <div class="col-md-4">

      <div class="clearfix sm-margin-bottom-40"></div>
      <div class="clearfix sm-margin-bottom-40"></div>

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

<script src="/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/validation.js"></script>

<script src="/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/datepicker.js"></script>

<script type="text/javascript">

  class Donate {

    constructor() {}

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

      });

      $('#open_address_form_chkbox').on('click',function(){
        if($(this).is(':checked')) {
          $('#address_form').stop().slideDown(300);
        }else{
          $('#address_form').stop().slideUp(300);
        }
      });

      $("#donation_form").on('submit',function(e){
        // e.preventDefault();
        // console.log($('#open_address_form_chkbox').is(':checked'));

        // if($('#open_address_form_chkbox').is(':checked')) {

        // }
        // console.log('ssd');
        // return false;

      });

    }

  }

  // class Facebook {

  //   constructor(fb) {
  //     this.fb = fb;
  //   }

  //   load() {
  //     this.bind();
  //   }

  //   bind() {

  //     this.fb.getLoginStatus(function(response) {
  //       console.log('xx');
  //     });

  //     $('#fb_login_btn').on('click',function(){

  //       FB.login(function(response) {
  //         console.log(response.authResponse);
  //         if (response.authResponse) {
  //             //user just authorized your app

  //             console.log('dssds');

  //           FB.api("/me/feed","POST",
  //               {
  //                   message: "This is a test message",
  //                   privacy: {value:"SELF"},
  //                   access_token: response.authResponse.accessToken
  //               },
  //               function (response) {

  //                 console.log(response.error);

  //                 if (response && !response.error) {
  //                   /* handle the result */
  //                 }
  //               }
  //           );

  //         }
  //       }, {scope: 'email,public_profile'});
  //     });

  //   }

  // }

  $(document).ready(function(){
    const donate = new Donate();
    donate.load();

    const address = new Address();
    address.load();

    // const fb = new Facebook(FB);
    // fb.load();

    Validation.initValidation();
    Datepicker.initDatepicker();
  });

//   $('#fb_login_btn').on('click',function(){
// console.log('sss');
//     FB.login(function(response) {
//       console.log(response.authResponse);
//       if (response.authResponse) {
//         //user just authorized your app
//       }
//     }, {scope: 'email,public_profile'});

//   });

</script>

@stop