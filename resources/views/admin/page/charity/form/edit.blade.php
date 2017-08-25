@extends('admin.layout.main')
@section('content')

<h1 class="margin-bottom-20">
  เพิ่มสินค้า
</h1>

@include('component.form_error') 

{{Form::model($data, ['id' => 'main_form', 'method' => 'PATCH', 'enctype' => 'multipart/form-data'])}}

  <div class="form-group">
    {{Form::label('name', 'ชื่อมูลนิธิ', array('class' => 'required'))}}
    {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'ชื่อมูลนิธิ','autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('short_desc', 'คำอธิบายโดยย่อ (ไม่เกิน 250 ตัวอักษร)', array('class' => 'required'))}}
    {{Form::text('short_desc', null, array('class' => 'form-control', 'placeholder' => 'คำอธิบายโดยย่อ','autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('description', 'รายละเอียด')}}
    {{Form::textarea('description', null, array('class' => 'form-control', 'id' => 'editor'))}}
  </div>

  <div class="form-group">
      {{Form::label('charity_type_id', 'ประเภท')}}
      {{Form::select('charity_type_id', $charityTypes, null, array('class' => 'form-control'))}}
  </div>

  <div class="form-group">
    {{Form::label('logo', 'Logo', array('class' => 'required'))}}
    {{Form::text('logo', null, array('class' => 'form-control', 'autocomplete' => 'off'))}}
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
    {{Form::label('shared_image', 'รูปภาพขอบคุณ / แชร์', array('class' => 'required'))}}
    {{Form::text('shared_image', null, array('class' => 'form-control', 'autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('images', 'รูปภาพของมูลนิธิ (มากสุด 10 รูป)', array('class' => 'required'))}}
    
    @foreach($_images as $key => $images)
      {{Form::text('_images['.$key.']', $images, array('class' => 'form-control', 'placeholder' => '#'.($key+1), 'autocomplete' => 'off'))}}
    @endforeach
  </div>

  <div class="form-group">
      {{Form::label('address', 'ที่อยู่')}}
      {{Form::text('address', null, array('class' => 'form-control', 'placeholder' => 'ที่อยู่','autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
      {{Form::label('province_id', 'จังหวัด')}}
      {{Form::select('province_id', $provinces, null, array('class' => 'form-control'))}}
  </div>

  <div class="form-group">
    {{Form::checkbox('has_reward', 1)}}
    {{Form::label('has_reward', 'แจกของที่ระลึก')}}
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
</script>

@stop