@extends('layout.main')
@section('content')

<div class="news index">

  <div class="breadcrumbs">
    <div class="container">
      <h1 class="pull-left">ข่าวสาร</h1>
      <ul class="pull-right breadcrumb">
        <li><a href="index.html">หน้าแรก</a></li>
        <li><a href="">ข่าวสาร</a></li>
        <li class="active">{{$news->title}}</li>
      </ul>
    </div>
  </div>

  <div class="container margin-top-20 margin-bottom-100">

    <div class="row margin-bottom-20">
      <div class="col-md-10">
        <div class="pull-right">
          <a class="btn btn-xs btn-facebook fa-fixed btn-share" href="https://www.facebook.com/sharer/sharer.php?u={{Request::fullUrl()}}" target="_blank">
            <i class="fa fa-facebook"></i>
          </a>
          <a class="btn btn-xs btn-twitter fa-fixed btn-share" href="https://twitter.com/intent/tweet?url={{Request::fullUrl()}}&text=ร่วมเป็นส่วนหนี่งในการบริจาคให้กับมูลนิธิ {{$news->title}}" target="_blank">
            <i class="fa fa-twitter"></i>
          </a>
          <a class="btn btn-xs btn-googleplus fa-fixed btn-share" href="https://plus.google.com/share?url={{Request::fullUrl()}}" target="_blank">
            <i class="fa fa-google-plus"></i>
          </a>
        </div>
      </div>
    </div>

    <div class="row margin-bottom-20">
      <div class="col-md-10">

        <img src="{{$news->thumbnail}}" class="news-thumbnail margin-bottom-20">

        <h1>{{$news->title}}</h1>
        
        <p>
          <i class="fa fa-clock-o"></i> {{$dateLib->covertDateToSting($news->created_at)}}
        </p>

        <p>
          {!!$news->description!!}
        </p>
      </div>

      <!-- <div class="col-md-4">
        <h3>ข่าวสารที่น่าสนใจ</h3>
      </div> -->

    </div>

  </div>

</div>

@stop