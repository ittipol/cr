@extends('layout.main')
@section('content')

<div class="donation index">

  <div class="search-block parallaxBg" style="background-position: 50% 16px;">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1>ร่วมเป็นส่วนหนี่งในการบริจาคให้กับมูลนิธิ</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="tab-v1 margin-bottom-60">
      <ul class="nav nav-tabs margin-bottom-20">
        <li class="active"><a href="#about" data-toggle="tab">วิธีการบริจาค</a></li>
        <li><a href="#search" data-toggle="tab">ค้นหาการบริจาคของคุณ</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade in active" id="about">
          <h2>1. โอนเงินมายังบัญชีธนาคาร</h2>

          <div class="tag-box tag-box-v3">

            @include('content.bank_account')

          </div>

          <h2>2. แจ้งการบริจาคของคุณ</h2>
          <h4>คลิกปุ่มที่มีข้อความ "บริจาคให้กับมูลนิธินี้" จากนั้นกรอกรายละเอียดให้ครบถ้วนและคลิก "แจ้งการบริจาค" เพื่อยืนยันการบริจาคของคุณ</h4>
        </div>
        <div class="tab-pane fade in active" id="search">

        </div>
      </div>
    </div>
  </div>

</div>

@stop