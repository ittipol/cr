@extends('admin.layout.main')
@section('content')
  
<h1 class="margin-bottom-20">
  เพิ่มมูลนิธิ
</h1>

@include('component.form_error') 

{{Form::open(['id' => 'main_form','method' => 'post', 'enctype' => 'multipart/form-data'])}}

  <div class="form-group">
    {{Form::label('name', 'ชื่อมูลนิธิ', array('class' => 'required'))}}
    {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'ชื่อมูลนิธิ','autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('short_desc', 'คำอธิบายโดยย่อ (ไม่เกิน 250 ตัวอักษร)', array('class' => 'required'))}}
    {{Form::text('short_desc', null, array('class' => 'form-control', 'placeholder' => 'คำอธิบายโดยย่อ', 'autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('description', 'รายละเอียด')}}
    {{Form::textarea('description', null, array('class' => 'form-control'))}}
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
      {{Form::label('address', 'ที่อยู่')}}
      {{Form::text('address', null, array('class' => 'form-control', 'placeholder' => 'ที่อยู่','autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
      {{Form::label('province_id', 'จังหวัด')}}
      {{Form::select('province_id', $provinces, null, array('class' => 'form-control'))}}
  </div>

  <div class="form-group">
    {{Form::checkbox('has_reward', null, array('class' => 'form-control'))}}
    {{Form::label('has_reward', 'มีของรางวัล')}}
  </div>

  {{Form::submit('บันทึก', array('class' => 'btn-u btn-u-blue'))}}

{{Form::close()}}

<script type="text/javascript">
  const textEditor = new TextEditor();
  textEditor.load();
</script>

@stop