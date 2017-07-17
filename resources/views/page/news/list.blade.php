@extends('layout.main')
@section('content')

<div class="news">

  <div class="breadcrumbs">
    <div class="container">
      <h1 class="pull-left">ข่าวสาร</h1>
      <ul class="pull-right breadcrumb">
        <li><a href="index.html">หน้าแรก</a></li>
        <li><a href="active">ข่าวสาร</a></li>
      </ul>
    </div>
  </div>

  <div class="container content-md list margin-top-20 margin-bottom-100">
    
    <!-- <h2>ข่าวสาร</h2> -->
    
    <div class="clearfix margin-bottom-20"></div>

    <div class="row">
      @foreach($news as $data)

        <!-- <div class="col-md-4 news-v3 news-list-item">
          <a href="{{URL::to('news')}}/{{$data->id}}">
            <img class="img-responsive full-width" src="{{$data->thumbnail}}">
          </a>
          <div class="news-v3-in-sm bg-color-white">
            <ul class="list-inline posted-info-sm">
              <li>โพสต์เมื่อ: {{$dateLib->covertDateToSting($data->created_at)}}</li>
            </ul>
            <h2><a href="{{URL::to('news')}}/{{$data->id}}">{{$data->title}}</a></h2>
            <p>{{$data->short_desc}}</p>
          </div>
        </div> -->

        <div class="col-md-4 md-margin-bottom-40">
          <div class="news-v1-in">
            <img class="img-responsive" src="{{$data->thumbnail}}">
            <h3><a href="{{URL::to('news')}}/{{$data->id}}">{{$data->title}}</a></h3>
            <p>{{$data->short_desc}}</p>
            <ul class="list-inline news-v1-info">
              <li><a href="{{URL::to('charity')}}/{{$data->charity->id}}">{{$data->charity->name}}</a></li>
              <li>|</li>
              <li><i class="fa fa-clock-o"></i> {{$dateLib->covertDateToSting($data->created_at)}}</li>
            </ul>
          </div>
        </div>

      @endforeach

    </div>

    @include('pagination.default2', ['paginator' => $news])

  </div>

</div>
@stop