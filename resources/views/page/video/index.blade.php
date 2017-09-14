@extends('layout.main')
@section('content')

<div class="video index margin-top-60">

  <div class="container">

    <div class="row">

      <div class="col-md-8">
        <div class="embedded-video">
          <iframe width="100%" height="100%" src="{{$video->url}}" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>

      <div class="col-md-4">
        <h2 class="title-v2">{{$video->title}}</h2>
        <small><i class="fa fa-clock-o"></i> {{$dateLib->covertDateToSting($video->created_at)}} | <a href="{{URL::to('charity')}}/{{$charity->id}}">{{$charity->name}}</a></small>
        <div class="clearfix margin-bottom-20"></div>
        <p>{{$video->short_desc}}</p>
        <div class="clearfix margin-bottom-20"></div>

        <div class="row margin-bottom-20">
          <div class="col-xs-12">
            <div class="clearfix">
              <div>
                <a class="btn btn-xs btn-facebook fa-fixed btn-share" href="https://www.facebook.com/sharer/sharer.php?u={{Request::fullUrl()}}" target="_blank">
                  <i class="fa fa-facebook"></i>
                </a>
                <a class="btn btn-xs btn-twitter fa-fixed btn-share" href="https://twitter.com/intent/tweet?url={{Request::fullUrl()}}&text=ร่วมเป็นส่วนหนี่งในการบริจาคให้กับมูลนิธิ {{$video->title}}" target="_blank">
                  <i class="fa fa-twitter"></i>
                </a>
                <a class="btn btn-xs btn-googleplus fa-fixed btn-share" href="https://plus.google.com/share?url={{Request::fullUrl()}}" target="_blank">
                  <i class="fa fa-google-plus"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    @if(!empty($video->description))
    <div class="clearfix margin-bottom-20"></div>
    <p>{!!$video->description!!}</p>
    @endif

    <hr>

    <h3>วีดีโอที่เกี่ยวข้อง</h3>

    @if($relatedVideo->exists())

    <div class="row news-v1 video-list">
      @foreach($relatedVideo->get() as $value)

        <div class="col-md-4 md-margin-bottom-40">
          <div class="news-v1-in custom-item-list">
            <a href="{{URL::to('video')}}/{{$value->id}}">
              <div class="full-width-cover video-play-icon" style="background-image: url('{{$value->thumbnail}}');">
                <i class="fa fa-caret-right"></i>
              </div>
            </a>
            <h3><a href="{{URL::to('video')}}/{{$value->id}}">{{$value->title}}</a></h3>
            <ul class="list-inline news-v1-info">
              <li><a href="{{URL::to('charity')}}/{{$value->charity->id}}">{{$value->charity->name}}</a></li>
              <li>|</li>
              <li><i class="fa fa-clock-o"></i> {{$dateLib->covertDateToSting($value->created_at)}}</li>
            </ul>
          </div>
        </div>

      @endforeach
    </div>

    @else
      <div class="clearfix margin-bottom-40"></div>
      <h4 class="text-center">ยังไม่มีวีดีโอที่เกี่ยวข้อง</h4>
      <div class="clearfix margin-bottom-100"></div>
    @endif

    <div class="clearfix margin-bottom-100"></div>

  </div>

</div>

@stop