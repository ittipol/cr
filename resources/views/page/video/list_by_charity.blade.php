@extends('layout.main')
@section('content')

<div class="video list">

  @include('page.charity.header')
  @include('page.charity.nav')

  <div class="clearfix margin-top-20"></div>

  <div class="custom-search-bar">
    <div class="container">
      <h5>ค้นหา</h5>
      <div class="row">
        {{Form::open(['class' => 'sky-form','method' => 'get', 'enctype' => 'multipart/form-data'])}}
        <div class="col-sm-4 search-box">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
            {{Form::text('q', null, array('class' => 'form-control', 'placeholder' => 'ค้นหา','autocomplete' => 'off'))}}
          </div>
        </div>
        <div class="col-sm-4 search-box">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-sort-amount-asc"></i></span>
            {{Form::select('sort', $sorting, null, array('class' => 'form-control'))}}
          </div>
        </div>
        <div class="col-sm-4">
          <button type="submit" class="btn-u btn-block btn-u-dark-blue">ค้นหา</button>
        </div>
        {{Form::close()}}
      </div>
    </div>
  </div>

  <div class="container padding-bottom-100">

    @if($video->currentPage() <= $video->lastPage())
  
      <div class="clearfix margin-bottom-20"></div>

      <div class="row news-v1 video-list">
        @foreach($video as $data)

          <div class="col-lg-4 col-sm-6 col-xs-12 md-margin-bottom-40">
            <div class="news-v1-in custom-item-list">
              <a href="{{URL::to('video')}}/{{$data->id}}">
                <div class="full-width-cover video-play-icon" style="background-image: url('{{$data->thumbnail}}');">
                  <i class="fa fa-caret-right"></i>
                </div>
              </a>
              <h3><a href="{{URL::to('video')}}/{{$data->id}}">{{$data->title}}</a></h3>
              <ul class="list-inline news-v1-info">
                <li><a href="{{URL::to('charity')}}/{{$data->charity->id}}">{{$data->charity->name}}</a></li>
                <li>|</li>
                <li><i class="fa fa-clock-o"></i> {{$dateLib->covertDateToSting($data->created_at)}}</li>
              </ul>
            </div>
          </div>

        @endforeach

      </div>

      @include('pagination.default2', ['paginator' => $video])

    @else
      <div class="text-center content margin-top-100 margin-bottom-300">
        <h2>ไม่มีวีดีโอให้แสดง</h2>
      </div>
    @endif

  </div>

</div>
@stop