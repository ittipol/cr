@extends('admin.layout.main')
@section('content')

<h1 class="margin-bottom-20">
  มูลนิธิ
</h1>

<div class="row">
  <div class="col-md-12 margin-bottom-20">
    <div class="pull-right">
      <a href="{{URL::to('admin/charity/add')}}" class="btn-u btn-u-blue">+ เพิ่ม</a>
    </div>
  </div>
</div>

@if(!empty($charities))

  <div class="panel panel-red margin-bottom-40">
    <div class="panel-body">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>ชื่อมูลนิธิ</th>
            <th>ประเภท</th>
            <th>จังหวัด</th>
            <th>เครื่องมือ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($charities as $data)
            <div>
              <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->charityType->name}}</td>
                <td>{{$data->province->name}}</td>
                <td>
                  <a href="{{URL::to('admin/charity/edit')}}/{{$data->id}}" class="btn btn-warning btn-xs">Edit</a>
                  <a href="{{URL::to('admin/charity/delete')}}/{{$data->id}}" class="btn btn-danger btn-xs">Delete</a>
                </td>
              </tr>
            </div>      
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@include('pagination.default', ['paginator' => $charities])

@endif

@stop