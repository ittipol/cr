@extends('admin.layout.main')
@section('content')

<h1 class="margin-bottom-20">
  เป้าหมาย/วัตถุประสงค์
</h1>

@if(!empty($goals))

  <div class="panel panel-red margin-bottom-40">
    <!-- <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-user"></i> มูลนิธิ</h3>
    </div> -->
    <div class="panel-body">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>มูลนิธื</th>
            <th>เป้าหมาย/วัตถุประสงค์</th>
            <th>จำนวนเงินเป้าหมาย</th>
            <th>วันที่สิ้นสุด</th>
            <th>เครื่องมือ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($goals as $data)
            <div>
              <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->charity->name}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->target_amount}}</td>
                <td>{{$data->end_date}}</td>
                <td>
                  <a href="{{URL::to('admin/goal/edit')}}/{{$data->id}}" class="btn btn-warning btn-xs">Edit</a>
                  <a href="{{URL::to('admin/goal/delete')}}/{{$data->id}}" class="btn btn-danger btn-xs">Delete</a>
                </td>
              </tr>
            </div>      
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@include('pagination.default', ['paginator' => $goals])

@endif

@stop