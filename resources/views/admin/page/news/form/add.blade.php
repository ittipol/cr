@extends('admin.layout.main')
@section('content')
  
<h1 class="margin-bottom-20">
  เพิ่มข่าวสาร
</h1>

@include('components.form_error') 

{{Form::open(['id' => 'main_form','method' => 'post', 'enctype' => 'multipart/form-data'])}}

  <div class="form-group">
      {{Form::label('charity_id', 'มูลนิธิ')}}
      {{Form::select('charity_id', $charities, null, array('class' => 'form-control'))}}
  </div>

  <div class="form-group">
    {{Form::label('title', 'หัวข้อข่าว', array('class' => 'required'))}}
    {{Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'หัวข้อข่าว','autocomplete' => 'off'))}}
  </div>

  <div class="form-group">
    {{Form::label('description', 'รายละเอียด', array('class' => 'required'))}}
    {{Form::textarea('description', null, array('class' => 'form-control'))}}
  </div>

  <div class="form-group">
    {{Form::label('thumbnail', 'รูปภาพ Thumbnail', array('class' => 'required'))}}
    {{Form::text('thumbnail', null, array('class' => 'form-control', 'placeholder' => 'URL รูปภาพ','autocomplete' => 'off'))}}
  </div>

  {{Form::submit('บันทึก', array('class' => 'btn-u btn-u-blue'))}}

{{Form::close()}}

<script type="text/javascript">
  const textEditor = new TextEditor();
  textEditor.load();
</script>

@stop