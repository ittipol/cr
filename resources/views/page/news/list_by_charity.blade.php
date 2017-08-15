@extends('layout.main')
@section('content')

<div class="news list">

  <div class="charity-profile">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="text-center">
              @if(!empty($charity->logo))
              <img class="charity-profile-logo" src="{{$charity->logo}}">
              @endif
              <div class="charity-profile-content">
                <h2>{{$charity->name}}</h2>
              </div>
              <div class="tagging-item-list">
                <span class="tagging-item">
                  <div class="location-name"><i class="fa fa-map-marker"></i>{{$charity->province->name}}</div>
                </span>
                <span class="tagging-item">
                  <div class="location-name"><i class="fa fa-flag"></i>{{$charity->charityType->name}}</div>
                </span>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="tab-v1 text-center">
    <ul class="nav nav-tabs tab-border-bottom no-margin">
      <li><a href="{{URL::to('charity')}}/{{$charity->id}}">หน้าหลัก</a></li>
      <li>
        <a href="{{URL::to('charity')}}/{{$charity->id}}/project">โครงการ</a>
      </li>
      <li class="active">
        <a href="{{URL::to('charity')}}/{{$charity->id}}/news">ข่าวสาร</a>
      </li>
      <li><a href="{{URL::to('donate')}}?for=charity&id={{$charity->id}}">บริจาค</a></li>
    </ul>
  </div>

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

    @if($news->currentPage() <= $news->lastPage())
  
      <div class="clearfix margin-bottom-20"></div>

      <div class="row news-v1">
        @foreach($news as $data)

          <div class="col-lg-4 col-sm-6 col-xs-12 md-margin-bottom-40">
            <div class="news-v1-in custom-item-list">
              <a href="{{URL::to('news')}}/{{$data->id}}">
                <div class="full-width-cover" style="background-image: url('{{$data->thumbnail}}');"></div>
              </a>

              <?php
                $strLimit = 120;
                $descLen = $strLimit - mb_strlen($data->name);
                $shortDesc = $stringLib->truncString($data->short_desc,$descLen);
              ?>

              <h3><a href="{{URL::to('news')}}/{{$data->id}}">{{$data->title}}</a></h3>
              <p>{{$shortDesc}}</p>
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

    @else
      <div class="text-center content margin-top-100 margin-bottom-300">
        <h2>ไม่มีข่าวสารให้แสดง</h2>
      </div>
    @endif

  </div>

</div>
@stop