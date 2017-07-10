@extends('admin.layout.main')
@section('content')
  
<h1 class="margin-bottom-20">
  แก้ไขเป้าหมาย/วัตถุประสงค์
</h1>

@include('components.form_error') 

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

  {{Form::submit('บันทึก', array('class' => 'btn-u btn-u-blue'))}}

{{Form::close()}}

<script type="text/javascript">
  const textEditor = new TextEditor();
  textEditor.load();
</script>

@stop