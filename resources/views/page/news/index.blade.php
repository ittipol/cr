@extends('layout.main')
@section('content')

<div class="news index">

  <div class="breadcrumbs">
    <div class="container">
      <h1 class="pull-left">{{$news->title}}
        <br>
        <small><i class="fa fa-clock-o"></i> {{$dateLib->covertDateToSting($news->created_at)}}</small>
      </h1>
    </div>
  </div>

  <div class="container margin-top-20 margin-bottom-100">

<!--     <div class="row margin-bottom-20">
      <div class="col-md-10">
        <div class="row">

          <div class="col-md-6">
            <div class="testimonials-v4">
              <img src="{{$charity->logo}}">
              <span class="testimonials-author">
                ข่าวสารจาก<br>
                <a href="{{URL::to('charity')}}/{{$charity->id}}">{{$charity->name}}</a>
              </span>
            </div>
          </div>

          <div class="col-md-6">
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
      </div>
    </div> -->

    <div class="row margin-bottom-20">
      <div class="col-xs-12">
        <div class="clearfix">
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
    </div>

    <div class="row margin-bottom-20">

      <div class="col-md-2">

        <div class="testimonials-v4">
          @if(!empty($charity->logo))
          <img src="{{$charity->logo}}">
          @endif
          <span class="testimonials-author">
            ข่าวสารจาก<br>
            <a href="{{URL::to('charity')}}/{{$charity->id}}">{{$charity->name}}</a>
          </span>
        </div>

        <div class="clearfix margin-bottom-20"></div>
        <a href="{{URL::to('charity')}}/{{$charity->id}}/news" class="btn-u btn-u-blue">แสดงข่าวสารทั้งหมด</a>
        <div class="clearfix margin-bottom-20"></div>

      </div>

      <div class="col-md-10">
        @if(!empty($news->thumbnail))
        <img src="{{$news->thumbnail}}" class="news-thumbnail margin-bottom-20">
        @endif
        {!!$news->description!!}
      </div>

    </div>

  </div>

</div>

@stop