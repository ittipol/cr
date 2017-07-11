@extends('admin.layout.main')
@section('content')
  
<h1 class="margin-bottom-20">
  เพิ่มมูลนิธิ
</h1>

@include('components.form_error') 

{{Form::open(['id' => 'main_form','method' => 'post', 'enctype' => 'multipart/form-data'])}}

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
    {{Form::textarea('description', null, array('class' => 'form-control'))}}
  </div>

  <div class="form-group">
      {{Form::label('charity_type_id', 'ประเภท')}}
      {{Form::select('charity_type_id', $charityTypes, null, array('class' => 'form-control'))}}
  </div>

  <div class="form-group">
      {{Form::label('address', 'ที่อยู่')}}
      {{Form::text('address', null, array('class' => 'form-control', 'placeholder' => 'ที่อยู่','autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
      {{Form::label('province_id', 'จังหวัด')}}
      {{Form::select('province_id', $provinces, null, array('class' => 'form-control'))}}
  </div>

  {{Form::submit('บันทึก', array('class' => 'btn-u btn-u-blue'))}}

{{Form::close()}}

<script type="text/javascript">
  const textEditor = new TextEditor();
  textEditor.load();
</script>

@stop