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
          <h4>ในหน้ามูลนิธิคลิกที่ "บริจาคให้กับมูลนิธินี้" จะแสดงแบบฟอร์มการบริจาค กรอกรายละเอียดให้ครบถ้วนจากนั้นคลิกที่ "แจ้งการบริจาค" เมื่อแจ้งแล้วการบริจาคของคุณจะถูกตรวจสอบและดำเนินการส่งมอบให้กับมูลนิธิตามที่กำหนด</h4>

        </div>

        <div class="tab-pane fade in @if($search) active @endif" id="search">

          <div class="search-block parallaxBg donation-search-block">
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
              @include('page.donation.content') 
            @elseif($search)
              <div class="text-center margin-top-60 margin-bottom-400">
                <h2>ไม่พบการบริจาคที่กำลังค้นหา</h2>
              </div>
            @else
              <div class="clearfix margin-bottom-400"></div>
            @endif

            <div class="clearfix margin-bottom-100"></div>

          </div>

        </div>

      </div>
    </div>
  </div>

</div>

@stop