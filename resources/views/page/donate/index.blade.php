@extends('layout.main')
@section('content')

<div class="donate container margin-top-20 margin-bottom-100">

  <div class="heading heading-v4 margin-bottom-40">
    @if($for == 'charity')
      <h2>บริจาคให้กับมูลนิธิ</h2>
      <h3><a href="{{URL::to('charity')}}/{{$id}}">{{$name}}</a></h3>
    @elseif($for == 'project')
      <h2>บริจาคให้กับโครงการ</h2>
      <h3><a href="{{URL::to('project')}}/{{$id}}">{{$name}}</a></h3>
    @endif
    
    @if($for == 'project')
      <h4>โครงการจาก {{$charity->name}}</h4>
    @endif    
  </div>

  <hr>

  @if(!Auth::check())
  <div class="alert alert-info fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4>ไม่มีบัญชีใช่หรือไม่?</h4>
    <p>คุณสามารถบริจาคได้โดยไม่ต้องมีบัญชี สามารถสร้างบัญชีได้ในภายหลังหากต้องการ</p>
    <p>
      <a class="btn-u btn-u-xs btn-u-dark" href="{{URL::to('login')}}"><i class="fa fa-pencil"></i> เข้าสู่ระบบ</a>
      <a class="btn-u btn-u-xs btn-u-red" href="{{URL::to('register')}}"><i class="fa fa-cog"></i> ต้องการสร้างบัญชี</a>
    </p>
  </div>
  @endif

  {{Form::open(['url' => Request::fullUrl(), 'id' => 'donation_form', 'class' => 'sky-form sky-changes-3', 'method' => 'post', 'enctype' => 'multipart/form-data'])}}

  @include('component.form_error')

    <div class="row">
      <div class="col-md-8">




        <section>
          <label class="label">จำนวนเงินบริจาค</label>
          <label class="input-group">
            {{Form::text('amount', null, array('class' => 'form-control', 'autocomplete' => 'off'))}}
            <span class="input-group-addon">บาท</span>
          </label>
        </section>


        <!-- <div class="clearfix margin-bottom-30"></div> -->

        <section>
          <label class="label">บริจาคโดย</label>
        </section>

        <div class="sky-form">
          <label class="radio">
            <input type="radio" name="method" class="method-rdo" value="method_1" checked>
            <i class="rounded-x"></i>บัตรเครคิต
          </label>
        </div>

        <div id="method_1" style="display:none;">

          <div class="clearfix margin-bottom-20"></div>

          <div class="alert alert-info fade in">
            เราจะไม่เก็บข้อมูลบัตรเครดิตหรืออะไรทั้งสิ้น โดยไม่ได้รับอนุญาตจากคุณ
          </div> 

          <div class="row">
            <section class="col-xs-12">
              <label class="label">ชื่อผู้ถือบัตร</label>
              <label class="input">
                {{Form::text('holder_name', null, array('id' => 'holder_name', 'autocomplete' => 'off'))}}
              </label>
            </section>
          </div>

          <div class="row">
            <section class="col-xs-12">
              <label class="label">หมายเลขบัตร</label>
              <label class="input">
                <div class="icon-prepend">
                  <img id="credit_card_image" src="/images/credit_card/card.png" class="displayed">
                </div>
                {{Form::text('card_number', null, array('id' => 'card_number', 'class' => 'cc-input', 'placeholder' => '---- ---- ---- ----', 'autocomplete' => 'off'))}}
              </label>
            </section>
          </div>

          <div class="row">
            <section class="col-xs-12">
              <label class="label">CVC</label>
              <label class="input">
                {{Form::text('cvc', null, array('id' => 'cvc', 'class' => 'cc-input', 'placeholder' => 'CVC', 'autocomplete' => 'off'))}}
              </label>
            </section>
          </div>

          <div class="row">
            <section class="col-xs-12">
              <label class="label">วันหมดอายุ</label>
              <label class="input">
                {{Form::text('card_expire', null, array('id' => 'card_expire', 'class' => 'cc-input', 'placeholder' => 'MM / YY', 'autocomplete' => 'off'))}}
              </label>
            </section>
          </div>

          <input type="hidden" name="omise_token">

        </div>

        <div class="clearfix margin-bottom-30"></div>

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





















        <div class="sky-form">
          <label class="radio">
            <input type="radio" name="method" class="method-rdo" value="method_2">
            <i class="rounded-x"></i>โอนเงินผ่านธนาคาร
          </label>
        </div>

        <div id="method_2" style="display:none;">

          <div class="clearfix margin-bottom-30"></div>

          <div class="alert alert-info fade in">
            ท่านสามารถโอนเงินบริจาคผ่านบัญชีธนาคารได้ตามเลขที่บัญชีที่ระบุ 
            <a href="javascript:void(0);" data-toggle="modal" data-target="#bank_account_modal">เลขที่บัญชีธนาคาร</a>
            หลังจากโอนเงินแล้ว กรุณาแจ้งโอนเงินบริจาคได้ที่แบบฟอร์มด้านล่าง
          </div>   

          <div class="clearfix margin-bottom-10"></div>

          <fieldset>

            <div class="row">
              <section class="col col-6">
                <label class="label">วันที่โอน</label>
                <label class="input floating-label">
                  <i class="icon-append fa fa-calendar"></i>
                  {{Form::text('date', null, array('id' => 'date' ,'autocomplete' => 'off'))}}
                  <div class="floating-label-box" id="date-input-label"></div>
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

          </fieldset>

        </div>







        <div class="clearfix margin-bottom-30"></div>
        <hr>

        @include('content.unidentified_donation')

        @if(Auth::check())

          <!-- <div class="tag-box tag-box-v2">
            <h4 class="no-margin-top">บริจาคโดยไม่ออกนาม</h4>
            <p>หากต้องการบริจาคโดยไม่ออกนามให้คลิกที่ตัวเลือก "บริจาคโดยไม่ออกนาม" <a href="javascript:void(0);" data-toggle="modal" data-target="#unidentified_donation_modal">บริจาคโดยไม่ออกนามคืออะไร?</a></p>
          </div> -->

          <h4 class="no-margin-top">บริจาคโดยไม่ออกนาม</h4>
          <p>หากต้องการบริจาคโดยไม่ออกนามให้คลิกที่ตัวเลือก "บริจาคโดยไม่ออกนาม" <a href="javascript:void(0);" data-toggle="modal" data-target="#unidentified_donation_modal">บริจาคโดยไม่ออกนามคืออะไร?</a></p>

          <label class="checkbox">
            {{Form::checkbox('unidentified', 1)}}<i></i>บริจาคโดยไม่ออกนาม
          </label>

        @else

          <div class="tag-box tag-box-v2">
            <h4 class="no-margin-top">บริจาคโดยไม่ออกนาม</h4>
            <p>หากต้องการบริจาคโดยไม่ออกนามให้ยกเว้นการกรอก "ชื่อ นามสกุลผู้บริจาค" ของคุณ <a href="javascript:void(0);" data-toggle="modal" data-target="#unidentified_donation_modal">บริจาคโดยไม่ออกนามคืออะไร?</a></p>
          </div>

          <div class="row">
            <section class="col col-xs-12">
              <label class="label">ชื่อ นามสกุลผู้บริจาค</label>
              <label class="input">
                {{Form::text('name', null, array('id' => 'name_input', 'autocomplete' => 'off'))}}
              </label>
            </section>
          </div>

          {{Form::hidden('unidentified', 1, array('id' => 'unidentified'))}}

        @endif











        @if($charity->has_reward)

        <div class="clearfix margin-bottom-30"></div>
        <hr>

        <h4 class="no-margin-top">รางวัลจากมูลนิธิ</h4>
        <p>บริจาคให้กับมูลนิธินี้ตั้งแต่ 300 บาทขึ้นไป คุณจะได้รับของรางวัล <a href="javascript:void(0);" data-toggle="modal" data-target="#reward_modal">รางวัล</a></p>
        <!-- <div class="tag-box tag-box-v2">
          <p>บริจาคให้กับมูลนิธินี้ตั้งแต่ 300 บาทขึ้นไป คุณจะได้รับของรางวัล <a href="javascript:void(0);" data-toggle="modal" data-target="#reward_modal">รางวัล</a></p>
        </div> -->

        @include('content.donate_reward')

        <div class="clearfix margin-bottom-10"></div>

        <label class="checkbox state-success">
          {{Form::checkbox('reward_chkbox', 1, false, array('id' => 'open_address_form_chkbox'))}}<i></i>ต้องการรับของรางวัล
        </label>

        <div id="address_form">

          <div class="clearfix margin-bottom-10"></div>
          <h4 class="no-margin">ข้อมูลสำหรับการจัดส่งของรางวัล</h4>
          <div class="clearfix margin-bottom-20"></div>

          <fieldset>

            <div class="row">
              <section class="col col-md-12">
                <label class="label">ระบุ size เสื้อ <a href="javascript:void(0);" data-toggle="modal" data-target="#chart_size_model">ตาราง size เสื้อ</a></label>
                <label class="radio">
                  <input type="radio" name="reward_option" value="s" checked><i></i>S
                </label>
                <label class="radio">
                  <input type="radio" name="reward_option" value="m"><i></i>M
                </label>
                <label class="radio">
                  <input type="radio" name="reward_option" value="l"><i></i>L
                </label>
              </section>
            </div>

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
                <label class="label">หมายเลขโทรศัพท์</label>
                <label class="input">
                  {{Form::text('tel_no', null, array('placeholder' => 'หมายเลขโทรศัพท์','autocomplete' => 'off'))}}
                </label>
              </section>

              <section class="col-md-6 col-xs-6">
                <label class="label">อีเมล</label>
                <label class="input">
                  {{Form::text('email', null, array('placeholder' => 'อีเมล','autocomplete' => 'off'))}}
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

        @endif

        <div class="clearfix margin-bottom-30"></div>

        {{Form::submit('บริจาค', array('class' => 'btn-u btn-custom'))}}

      </div>

      <div class="col-md-4">

        <div class="clearfix sm-margin-bottom-100"></div>

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

  {{Form::close()}}

</div>

<div class="global-overlay"></div>
<div class="global-loading-icon"></div>








<script type="text/javascript" src="/js/omise.js"></script>
<script type="text/javascript">
  Omise.setPublicKey("pkey_test_58v3kcsit84cakasj3s");
</script>

<!-- <script src="assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="/js/form/credit-card-masking.js"></script>
 -->
<script src="/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/js/form/donation-form-validation.js"></script>

<script src="/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/form/donation-form-datepicker.js"></script>

<script src="/js/jquery.payform.min.js"></script>
<script type="text/javascript" src="/js/form/credit-card-validation.js"></script>

<script type="text/javascript">

  class Donate {

    constructor() {
      this.currentMethod = null;
    }

    load() {

      let _this = this;

      this.bind();

      setTimeout(function(){
        _this.currentMethod = $('.method-rdo:checked').val();
        $('#'+_this.currentMethod).slideDown(300);
      },750);
      
      if($('#open_address_form_chkbox').is(':checked')) {
        $('#address_form').slideDown(300);
      }
    }

    bind() {

      let _this = this;

      // remove
      $("#donation_form").submit(function () {
        return false;
      }); 

      $('.method-rdo').on('click',function(){

        if($('.method-rdo:checked').val() == _this.currentMethod) {
          return false;
        }

        $('#'+_this.currentMethod).slideUp(300);

        _this.currentMethod = $('.method-rdo:checked').val();
        $('#'+_this.currentMethod).delay(420).slideDown(300);
      });

      $('#date').on('change',function(){

        if($(this).val() != '') {

          let date = $(this).val().split('-');
          $('#date-input-label').text(parseInt(date[2])+' '+_this.findMonthName(parseInt(date[1]))+' '+(parseInt(date[0])+543));

        }

      });

      $('#open_address_form_chkbox').on('click',function(){
        if($(this).is(':checked')) {
          $('#address_form').stop().slideDown(300);
        }else{
          $('#address_form').stop().slideUp(300);
        }
      });

      $('#donation_form').on('submit',function(){

        if($('#name_input').length && ($('#name_input').val() == '')) {
          $('#unidentified').val(1);
        }else{
          $('#unidentified').val(0);
        }

      });

    }

    findMonthName(month) {
      let monthName = [
        'มกราคม',
        'กุมภาพันธ์',
        'มีนาคม',
        'เมษายน',
        'พฤษภาคม',
        'มิถุนายน',
        'กรกฎาคม',
        'สิงหาคม',
        'กันยายน',
        'ตุลาคม',
        'พฤศจิกายน',
        'ธันวาคม',
      ];

      return monthName[month-1];
    }

  }

  $(document).ready(function(){
    const donate = new Donate();
    donate.load();

    const address = new Address();
    address.load();

    Validation.initValidation();
    Datepicker.initDatepicker();
    // Masking.initMasking();
  });

</script>

@stop