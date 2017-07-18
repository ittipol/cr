@extends('layout.main')
@section('content')

<div class="charity list">

  <div class="search-block parallaxBg" style="background-position: 50% 16px;">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1>ร่วมเป็นส่วนหนี่งในการบริจาคให้กับมูลนิธิ</h1>

          <div class="input-group">
            <input type="text" class="form-control" placeholder="ค้นหามูลนิธิ">
            <span class="input-group-btn">
              <button class="btn-u btn-u-lg" type="button"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container margin-top-20 padding-bottom-100">
    
    @if($charities->currentPage() <= $charities->lastPage())

      <!-- <h2>มูลนิธิ</h2> -->

      <div class="clearfix margin-bottom-20"></div>

      <div class="row">
        @foreach($charities as $data)

          <div class="col-md-4 news-v3 new-list-item">
            <a href="{{URL::to('charity')}}/{{$data->id}}">
              <img class="img-responsive full-width" src="{{$data->thumbnail}}">
            </a>
            <div class="news-v3-in-sm bg-color-light">
              <h2 class="new-title">
                <a href="{{URL::to('charity')}}/{{$data->id}}">
                  <img class="charity-logo" src="{{$data->logo}}">
                </a>
                <span>
                  <a href="{{URL::to('charity')}}/{{$data->id}}">{{$data->name}}</a>
                </span>
              </h2>
              <p>{{$data->short_desc}}</p>
              
              <div class="service-block-v3 donation-box for-charity">
                <a href="{{URL::to('donate')}}?for=charity&id={{$data->id}}" class="btn-u btn-custom margin-bottom-10">บริจาคให้กับมูลนิธินี้</a>
              </div>

            </div>
          </div>

        @endforeach
      </div>

      @include('pagination.default2', ['paginator' => $charities])

    @else

      <h2>ไม่มีมูลนิธิให้แสดง</h2>

    @endif

  </div>


</div>

@stop