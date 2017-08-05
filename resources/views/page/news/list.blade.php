@extends('layout.main')
@section('content')

<div class="news list list-page-bg-color">

  <div class="breadcrumbs breadcrumbs-custom margin-top-20 margin-bottom-20">
    <div class="container">
      <h1>ข่าวสาร</h1>
    </div>
  </div>

  <div class="container margin-top-20 padding-bottom-100">
  
    <div class="clearfix margin-bottom-40"></div>

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

  </div>

</div>
@stop