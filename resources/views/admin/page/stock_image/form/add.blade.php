@extends('admin.layout.main')
@section('content')

<h1 class="margin-bottom-20">
  อัพโหลดรูปภาพ
</h1>

{{Form::open(['id' => 'main_form','method' => 'post', 'enctype' => 'multipart/form-data'])}}

  <div class="form-group">
    {{Form::label('province_id', 'รูปภาพ')}}
    <div id="_image_group"></div>
  </div>

  {{Form::submit('บันทึก', array('class' => 'btn-u btn-u-blue'))}}

{{Form::close()}}

<script type="text/javascript">
  $(document).ready(function(){
    const image = new StockImage('_image_group','photo',10);
    image.load(); 
  });    
</script>


@stop