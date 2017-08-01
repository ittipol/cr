@extends('layout.main')
@section('content')

<div class="donation donate index">

  <div class="breadcrumbs breadcrumbs-custom margin-top-20 margin-bottom-20">
    <div class="container clearfix">
      <h1>การบริจาค</h1>
    </div>
  </div>

  <div class="container">

    <div class="tab-v1 margin-bottom-60">
      <ul class="nav nav-tabs margin-bottom-20">
        <li @if(!$search) class="active" @endif><a href="#about" data-toggle="tab">วิธีการบริจาค</a></li>
        <li @if($search) class="active" @endif><a href="#search" data-toggle="tab">ค้นหาการบริจาคของคุณ</a></li>
      </ul>
      <div class="tab-content">

        <div class="tab-pane fade in @if(!$search) active @endif" id="about">

          <h2>1. โอนเงินมายังบัญชีธนาคาร</h2>

          <div class="tag-box tag-box-v3">
            @include('content.bank_account')
          </div>

          <h2>2. แจ้งการบริจาคของคุณ</h2>
          <h4>ในหน้ามูลนิธิคลิกที่ "บริจาคให้กับมูลนิธินี้" จะแสดงแบบฟอร์มการบริจาค กรอกรายละเอียดให้ครบถ้วนจากนั้นตลิกที่ "แจ้งการบริจาค" เมื่อแจ้งแล้วการบริจาคของคุณจะถูกตรวจสอบและดำเนินการส่งมอบให้กับมูลนิธิตามที่กำหนด</h4>

        </div>

        <div class="tab-pane fade in @if($search) active @endif" id="search">

          <div class="search-block parallaxBg donation-search-block" style="background-image: url(/images/common/input-code-bg.png); background-position: 50% 16px;">
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <h1>ป้อนหมายเลขการบริจาคของคุณ</h1>

                  {{Form::open(['method' => 'get', 'enctype' => 'multipart/form-data'])}}

                  <div class="input-group">
                    {{Form::text('code', null, array('class' => 'form-control', 'placeholder' => 'หมายเลขการบริจาค','autocomplete' => 'off'))}}
                    <span class="input-group-btn">
                      <button class="btn-u btn-u-lg" type="button" onclick="document.forms[0].submit()"><i class="fa fa-search"></i></button>
                    </span>
                  </div>

                  {{Form::close()}}

                </div>
              </div>
            </div>
          </div>

          <div class="content margin-top-20 margin-bottom-100">

            @if($search && !empty($donation))
              
              <div class="row invoice-header">
                <div class="col-xs-6">
                  <img src="{{$charityLogo}}">
                </div>
                <div class="col-xs-6 invoice-numb">
                  {{$for}}
                  <span>{{$name}}</span>
                </div>
              </div>

              <div id="social_content" class="social-login text-center">      
                <ul class="list-unstyled">       
                  <li>             
                    <a href="javascript:void(0);" id="fb_post_btn" class="btn rounded btn-lg btn-facebook-inversed margin-bottom-10">           
                      <i class="fa fa-facebook"></i> โพสต์คำขอบคุณจากเราไปยัง Facebook ของคุณ       
                    </a>         
                    <div class="text-center">           
                      <small>เราจะไม่โพสต์อะไรทั้งสิ้นใน Facebook<br>โดยไม่ได้รับอนุญาตจากคุณ</small>         
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

              </div>

            @elseif($search)
              <div class="text-center margin-top-60">
                <h2>ไม่พบการบริจาคที่กำลังค้นหา</h2>
              </div>
            @endif

            <div class="clearfix margin-bottom-100"></div>

          </div>

        </div>

      </div>
    </div>
  </div>

</div>

@stop