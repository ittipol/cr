@extends('admin.layout.main')
@section('content')

<h1 class="margin-bottom-20">
  ข่าวสาร
</h1>

@if(!empty($news))

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
            <th>หัวข้อข่าว</th>
            <th>Thumbnail</th>
            <th>เครื่องมือ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($news as $data)
            <div>
              <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->charity->name}}</td>
                <td>{{$data->title}}</td>
                <td>{{$data->thumbnail}}</td>
                <td>
                  <a href="{{URL::to('admin/news/edit')}}/{{$data->id}}" class="btn btn-warning btn-xs">Edit</a>
                  <a href="{{URL::to('admin/news/delete')}}/{{$data->id}}" class="btn btn-danger btn-xs">Delete</a>
                </td>
              </tr>
            </div>      
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@include('pagination.default', ['paginator' => $news])

@endif

@stop