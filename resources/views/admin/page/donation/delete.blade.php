@extends('admin.layout.main')
@section('content')

  <h2>ต้องการลบการบริจาค #{{$id}}</h2>

  <a href="{{Request::fullUrl()}}?delete=y" class="btn-u">ตกลง</a>
  <a href="{{URL::to('admin/donation/list')}}" class="btn-u btn-u-red">ยกเลิก</a>

@stop