@extends('admin.layout.main')
@section('content')
  
<h1 class="margin-bottom-20">
  แก้ไขข่าวสาร
</h1>

@include('component.form_error') 

{{Form::model($data, ['id' => 'main_form', 'method' => 'PATCH', 'enctype' => 'multipart/form-data'])}}

  <div class="form-group">
      {{Form::label('charity_id', 'มูลนิธิ')}}
      {{Form::select('charity_id', $charities, null, array('class' => 'form-control'))}}
  </div>

  <div class="form-group">
    {{Form::label('title', 'หัวข้อข่าว', array('class' => 'required'))}}
    {{Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'หัวข้อข่าว','autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('short_desc', 'คำอธิบายโดยย่อ (ไม่เกิน 250 ตัวอักษร)', array('class' => 'required'))}}
    {{Form::text('short_desc', null, array('class' => 'form-control', 'placeholder' => 'คำอธิบายโดยย่อ', 'autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('description', 'รายละเอียด', array('class' => 'required'))}}
    {{Form::textarea('description', null, array('class' => 'form-control'))}}
  </div>

  <div class="form-group">
    {{Form::label('thumbnail', 'รูปภาพ Thumbnail', array('class' => 'required'))}}
    {{Form::text('thumbnail', null, array('class' => 'form-control', 'placeholder' => 'URL รูปภาพ','autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('active', 'การเข้าถึง'))}}
    {{Form::radio('active', 1, false)}} เปิดการเข้าถึง
    <br>
    {{Form::radio('active', 0, true)}} ปิดการเข้าถึง
  </div>

  {{Form::submit('บันทึก', array('class' => 'btn-u btn-u-blue'))}}

{{Form::close()}}

<script type="text/javascript">
  const textEditor = new TextEditor();
  textEditor.load();
</script>

@stop