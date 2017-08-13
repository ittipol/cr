@extends('admin.layout.main')
@section('content')
  
<h1 class="margin-bottom-20">
  แก้ไขเป้าหมาย/วัตถุประสงค์
</h1>

@include('component.form_error') 

{{Form::model($data, ['id' => 'main_form', 'method' => 'PATCH', 'enctype' => 'multipart/form-data'])}}

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
      {{Form::select('end_day', $day, null, array('id' => 'end_day'))}}
      {{Form::select('end_month', $month, null, array('id' => 'end_month'))}}
      {{Form::select('end_year', $year, null, array('id' => 'end_year'))}}
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
    
    @foreach($_images as $key => $images)
      {{Form::text('_images['.$key.']', $images, array('class' => 'form-control', 'placeholder' => '#'.($key+1), 'autocomplete' => 'off'))}}
    @endforeach
  </div>

  <div class="form-group">
    {{Form::label('active', 'การเข้าถึง')}}
    {{Form::radio('active', 1, false)}} เปิดการเข้าถึง
    <br>
    {{Form::radio('active', 0, true)}} ปิดการเข้าถึง
  </div>

  {{Form::submit('บันทึก', array('class' => 'btn-u btn-u-blue'))}}

{{Form::close()}}

<script type="text/javascript" src="/js/app/code/ckeditor.js"></script>
<script type="text/javascript" src="/js/loader.js"></script>

<script type="text/javascript">
  initSample();

@stop