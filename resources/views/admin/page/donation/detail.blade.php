@extends('admin.layout.main')
@section('content')

<?php
$date = new \App\library\Date;
?>

<div class="clearfix">
  <div class="pull-right">
    <a href="{{URL::to('admin/donation/delete')}}/{{$donation->id}}" class="btn-u btn-u-red">ลบ</a>
    <a href="{{URL::to('admin/donation/list')}}" class="btn-u btn-u-blue">กลับ</a>
  </div>
</div>

<h2>การบริจาค #{{$donation->id}}</h2>
<h4>หมายเลขการบริจาค: <strong>{{$donation->code}}</strong></h4>

@if($donation->verified)
<div class="alert alert-success fade in">
  <h4 class="no-margin">ตรจวสอบการบริจาคแล้ว</h4>
</div>
@else
<div class="alert alert-danger fade in">
  <h4>ยังไม่ได้ตรวจสอบการบริจาค</h4>
  <p>
    <a class="btn-u btn-u-dark-blue" href="{{URL::to('admin/donation/verify')}}/{{$donation->id}}">ยืนยันการบริจาคนี้</a>
  </p>
</div>
@endif

<dl>
  <dt>บริจาคไปยัง</dt>
  <dd><h4>{{$donation->model}}</h4></dd>
  <dt>ชื่อ {{$donation->model}}</dt>
  <dd><h4>{{$donation->{strtolower($donation->model)}->name}}</h4></dd>
  <dt>ชื่อผู้บริจาค</dt>
  <dd><h4>
    @if($donation->unidentified) 
      ไม่ออกนาม
    @elseif(!empty($donation->user_id))
      {{$donation->user->name}}
    @else
      {{$donation->guest_name}}
    @endif
  </h4></dd>
  <dt>จำนวนเงินบริจาค</dt>
  <dd><h4>{{$donation->amount}}</h4></dd>
  <dt>วันที่โอน</dt>
  <dd><h4>{{$date->covertDateTimeToSting($donation->transaction_date)}}</h4></dd>
</dl>

<h2>หลักฐานการโอน</h2>
@if(!empty($donation->transfer_slip))
  <img src="/slip/{{$donation->id}}/{{$donation->transfer_slip}}" class="transfer-slip">
  <div class="clearfix margin-bottom-20"></div>
  <a href="/slip/{{$donation->id}}/{{$donation->transfer_slip}}" target="_blank">ดูรูปเต็ม</a>
@else
  <h4>ไม่มี</h4>
@endif

<hr>

<h3>ของที่ระลึก</h3>
<h4>@if($donation->get_reward) ต้องการ @else ไม่ต้องการ @endif</h4>

@if($donation->get_reward)
  <h3>รายละเอีนดของรางวัล</h3>
  <dl>
    <dt>ของรางวัลที่เลือก</dt>
    <dd><h4>{{$reward['selected']}}</h4></dd>
  </dl>

  <h3>ที่อยู่สำหรับจัดส่ง</h3>

  <div class="row">
    <div class="col-md-12">
      <dl>
        <dt>ชื่อผู้รับ</dt>
        <dd><h4>&nbsp;{{$address['receiver_name']}}</h4></dd>
      </dl>
    </div>
    <div class="col-md-4">
      <dl>
        <dt>บ้านเลขที่</dt>
        <dd><h4>&nbsp;{{$address['address_no']}}</h4></dd>
      </dl>
    </div>
    <div class="col-md-4">
      <dl>
        <dt>หมู่บ้าน</dt>
        <dd><h4>&nbsp;{{$address['building']}}</h4></dd>
      </dl>
    </div>
    <div class="col-md-4">
      <dl>
        <dt>ชั้น</dt>
        <dd><h4>&nbsp;{{$address['floor']}}</h4></dd>
      </dl>
    </div>
    <div class="col-md-4">
      <dl>
        <dt>หมู่ที่</dt>
        <dd><h4>&nbsp;{{$address['squad']}}</h4></dd>
      </dl>
    </div>
    <div class="col-md-4">
      <dl>
        <dt>ถนน</dt>
        <dd><h4>&nbsp;{{$address['road']}}</h4></dd>
      </dl>
    </div>
    <div class="col-md-4">
      <dl>
        <dt>ซอย</dt>
        <dd><h4>&nbsp;{{$address['alley']}}</h4></dd>
      </dl>
    </div>
    <div class="col-md-4">
      <dl>
        <dt>จังหวัด</dt>
        <dd><h4>&nbsp;{{$address['province']}}</h4></dd>
      </dl>
    </div>
    <div class="col-md-4">
      <dl>
        <dt>อำเภอ/เขต</dt>
        <dd><h4>&nbsp;{{$address['district']}}</h4></dd>
      </dl>
    </div>
    <div class="col-md-4">
      <dl>
        <dt>ตำบล/แขวง</dt>
        <dd><h4>&nbsp;{{$address['sub_district']}}</h4></dd>
      </dl>
    </div>
    <div class="col-md-4">
      <dl>
        <dt>รหัสไปรษณีย์</dt>
        <dd><h4>&nbsp;{{$address['post_code']}}</h4></dd>
      </dl>
    </div>
  </div>
@endif

@stop