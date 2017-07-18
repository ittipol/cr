@extends('layout.main')
@section('content')

<div class="news list">

  <div class="search-block parallaxBg" style="background-position: 50% 16px;">
    <div class="container">
      <div class="col-md-8">
        <h1>ข่าวสารจากมูลนิธิ</h1>
      </div>
    </div>
  </div>

  <div class="container margin-top-20 margin-bottom-100">
  
    <div class="clearfix margin-bottom-40"></div>

    <div class="row news-v1">
      @foreach($news as $data)

        <div class="col-md-4 md-margin-bottom-40">
          <div class="news-v1-in">
            <a href="{{URL::to('news')}}/{{$data->id}}">
              <img class="img-responsive" src="{{$data->thumbnail}}">
            </a>
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