@extends('admin.layout.main')
@section('content')
  
<h1 class="margin-bottom-20">
  เพิ่มเป้าหมาย
</h1>

@include('component.form_error') 

{{Form::open(['id' => 'main_form','method' => 'post', 'enctype' => 'multipart/form-data'])}}

  <div class="form-group">
      {{Form::label('charity_id', 'มูลนิธิ')}}
      {{Form::select('charity_id', $charities, null, array('class' => 'form-control'))}}
  </div>

  <div class="form-group">
    {{Form::label('name', 'เป้าหมาย/วัตถุประสงค์', array('class' => 'required'))}}
    {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'เป้าหมาย/วัตถุประสงค์','autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('short_desc', 'คำอธิบายโดยย่อ (ไม่เกิน 250 ตัวอักษร)', array('class' => 'required'))}}
    {{Form::text('short_desc', null, array('class' => 'form-control', 'placeholder' => 'คำอธิบายโดยย่อ','autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('description', 'รายละเอียด', array('class' => 'required'))}}
    {{Form::textarea('description', null, array('class' => 'form-control'))}}
  </div>

  <div class="form-group">
    {{Form::label('target_amount', 'จำนวนเงินเป้าหมาย', array('class' => 'required'))}}
    {{Form::text('target_amount', null, array('class' => 'form-control', 'placeholder' => 'จำนวนเงินเป้าหมาย','autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('', 'วันที่สิ้นสุด')}}
    <div>
      {{Form::select('end_day', $day, $currentDay, array('id' => 'end_day'))}}
      {{Form::select('end_month', $month, $currentMonth, array('id' => 'end_month'))}}
      {{Form::select('end_year', $year, $currentYear, array('id' => 'end_year'))}}
    </div>
  </div>

  <div class="form-group">
    {{Form::label('', 'เวลาที่สิ้นสุด')}}
    <div>
      {{Form::select('end_hour', $hours, null, array('id' => 'end_hour'))}}
      {{Form::select('end_min', $mins, null, array('id' => 'end_min'))}}
    </div>
  </div>

  <div class="form-group">
    {{Form::label('thumbnail', 'Thumbnail', array('class' => 'required'))}}
    {{Form::text('thumbnail', null, array('class' => 'form-control', 'autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('vdo_url', 'VDO URL (Youtube URL)', array('class' => 'required'))}}
    {{Form::text('vdo_url', null, array('class' => 'form-control', 'autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('images', 'รูปภาพของมูลนิธิ (มากสุด 10 รูป)', array('class' => 'required'))}}
    {{Form::text('_images[0]', null, array('class' => 'form-control', 'placeholder' => '#1', 'autocomplete' => 'off'))}}
    {{Form::text('_images[1]', null, array('class' => 'form-control', 'placeholder' => '#2', 'autocomplete' => 'off'))}}
    {{Form::text('_images[2]', null, array('class' => 'form-control', 'placeholder' => '#3', 'autocomplete' => 'off'))}}
    {{Form::text('_images[3]', null, array('class' => 'form-control', 'placeholder' => '#4', 'autocomplete' => 'off'))}}
    {{Form::text('_images[4]', null, array('class' => 'form-control', 'placeholder' => '#5', 'autocomplete' => 'off'))}}
    {{Form::text('_images[5]', null, array('class' => 'form-control', 'placeholder' => '#6', 'autocomplete' => 'off'))}}
    {{Form::text('_images[6]', null, array('class' => 'form-control', 'placeholder' => '#7', 'autocomplete' => 'off'))}}
    {{Form::text('_images[7]', null, array('class' => 'form-control', 'placeholder' => '#8', 'autocomplete' => 'off'))}}
    {{Form::text('_images[8]', null, array('class' => 'form-control', 'placeholder' => '#9', 'autocomplete' => 'off'))}}
    {{Form::text('_images[9]', null, array('class' => 'form-control', 'placeholder' => '#10', 'autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('active', 'การเข้าถึง')}}
    <br>
    {{Form::radio('active', 1, false)}} <label>เปิดการเข้าถึง</label>
    <br>
    {{Form::radio('active', 0, true)}} <label>ปิดการเข้าถึง</label>
  </div>

  {{Form::submit('บันทึก', array('class' => 'btn-u btn-u-blue'))}}

{{Form::close()}}

<script type="text/javascript" src="/js/app/code/ckeditor.js"></script>
<script type="text/javascript" src="/js/loader.js"></script>

<script type="text/javascript">
  initSample();

@stop