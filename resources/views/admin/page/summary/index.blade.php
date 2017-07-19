@extends('admin.layout.main')
@section('content')

  <h1 class="margin-bottom-20">
    สรุปยอด
  </h1>

  {{Form::open(['id' => 'main_form','method' => 'post', 'enctype' => 'multipart/form-data'])}}

    <div class="form-group">
      {{Form::label('name', 'เป้าหมาย/วัตถุประสงค์', array('class' => 'required'))}}
      {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'เป้าหมาย/วัตถุประสงค์','autocomplete' => 'off'))}}
    </div>

    

    {{Form::submit('สรุป', array('class' => 'btn-u btn-u-blue'))}}

  {{Form::close()}}

@stop