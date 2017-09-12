@extends('admin.layout.main')
@section('content')

<h1 class="margin-bottom-20">
  Video
</h1>

<div class="row">
  <div class="col-md-12 margin-bottom-20">
    <div class="pull-right">
      <a href="{{URL::to('admin/charity/add')}}" class="btn-u btn-u-blue">+ เพิ่ม</a>
    </div>
  </div>
</div>

@if(!empty($videos))

  <div class="panel panel-red margin-bottom-40">
    <div class="panel-body">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>มูลนิธื</th>
            <th>ชื่อ Video</th>
            <th>URL</th>
            <th>Thumbnail</th>
            <th>เครื่องมือ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($videos as $data)
            <div>
              <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->charity->name}}</td>
                <td>{{$data->title}}</td>
                <td>{{$data->url}}</td>
                <td>{{$data->thumbnail}}</td>
                <td>
                  <a href="{{URL::to('admin/video/edit')}}/{{$data->id}}" class="btn btn-warning btn-xs">Edit</a>
                  <a href="{{URL::to('admin/video/delete')}}/{{$data->id}}" class="btn btn-danger btn-xs">Delete</a>
                </td>
              </tr>
            </div>      
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@include('pagination.default', ['paginator' => $videos])

@endif

@stop