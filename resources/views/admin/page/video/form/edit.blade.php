@extends('admin.layout.main')
@section('content')
  
<h1 class="margin-bottom-20">
  แก้ไข Video
</h1>

@include('component.form_error') 

{{Form::model($data, ['id' => 'main_form', 'method' => 'PATCH', 'enctype' => 'multipart/form-data'])}}

  <div class="form-group">
      {{Form::label('charity_id', 'มูลนิธิ')}}
      {{Form::select('charity_id', $charities, null, array('class' => 'form-control'))}}
  </div>

  <div class="form-group">
    {{Form::label('title', 'ชื่อ Video', array('class' => 'required'))}}
    {{Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'ชื่อ Video','autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('short_desc', 'คำอธิบายโดยย่อ (ไม่เกิน 250 ตัวอักษร)', array('class' => 'required'))}}
    {{Form::text('short_desc', null, array('class' => 'form-control', 'placeholder' => 'คำอธิบายโดยย่อ', 'autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('url', 'Video URL', array('class' => 'required'))}}
    {{Form::text('url', null, array('class' => 'form-control', 'placeholder' => 'Video URL','autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('description', 'รายละเอียด')}}
    {{Form::textarea('description', null, array('class' => 'form-control', 'id' => 'editor'))}}
  </div>

  <div class="form-group">
    {{Form::label('thumbnail', 'รูปภาพ Thumbnail', array('class' => 'required'))}}
    {{Form::text('thumbnail', null, array('class' => 'form-control', 'placeholder' => 'URL รูปภาพ','autocomplete' => 'off'))}}
  </div>

  {{Form::submit('บันทึก', array('class' => 'btn-u btn-u-blue'))}}

{{Form::close()}}

<script type="text/javascript" src="/js/app/code/ckeditor.js"></script>
<script type="text/javascript" src="/js/loader.js"></script>

<script type="text/javascript">
  initSample();
</script>

@stop