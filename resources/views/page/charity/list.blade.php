@extends('layout.main')
@section('content')

<div class="charity list">

  <div class="breadcrumbs breadcrumbs-custom margin-top-20 margin-bottom-20">
    <div class="container">
      <h1>มูลนิธิ</h1>
    </div>
  </div>

  <div class="container margin-top-20 padding-bottom-100">
    
    @if($charities->currentPage() <= $charities->lastPage())

      <div class="clearfix margin-bottom-20"></div>

      <div class="row">
        @foreach($charities as $data)

          <div class="col-lg-4 col-sm-6 col-xs-12">
            
            <div class="news-v3 charity-list-item custom-item-list">

              <a href="{{URL::to('charity')}}/{{$data->id}}">
                <img class="img-responsive full-width" src="{{$data->thumbnail}}">
              </a>
              <div class="news-v3-in-sm bg-color-light">
                <!-- <h2 class="new-title">
                  <a href="{{URL::to('charity')}}/{{$data->id}}">
                    <img class="charity-logo" src="{{$data->logo}}">
                  </a>
                  <span>
                    <a href="{{URL::to('charity')}}/{{$data->id}}">{{$data->name}}</a>
                  </span>
                </h2>
                <p>{{$data->short_desc}}</p> -->

                <?php
                  $strLimit = 120;
                  $descLen = $strLimit - mb_strlen($data->name);
                  $shortDesc = $stringLib->truncString($data->short_desc,$descLen);
                ?>

                <div class="main-content margin-bottom-20">
                  <a href="{{URL::to('charity')}}/{{$data->id}}"><img src="{{$data->logo}}">{{$data->name}}</a>
                  — {{$shortDesc}}
                </div>
                
                <div class="service-block-v3 donation-box for-charity">
                  <a href="{{URL::to('donate')}}?for=charity&id={{$data->id}}" class="btn-u btn-custom margin-bottom-10">บริจาคให้กับมูลนิธินี้</a>
                </div>

              </div>

            </div>

          </div>

        @endforeach
      </div>

      @include('pagination.default2', ['paginator' => $charities])

    @else
      <div class="text-center content margin-top-100 margin-bottom-300">
        <h2>ไม่มีมูลนิธิให้แสดง</h2>
      </div>
    @endif

  </div>


</div>

@stop