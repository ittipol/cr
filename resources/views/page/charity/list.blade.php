@extends('layout.main')
@section('content')

<div class="charity list">

<!--   <div class="search-block parallaxBg" style="background-position: 50% 16px;">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1 class="no-margin">ร่วมเป็นส่วนหนี่งในการบริจาคให้กับมูลนิธิ</h1>
          <h1 class="no-margin">มูลนิธิ</h1>
        </div>
      </div>
    </div>
  </div> -->

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

          <div class="col-md-4">
            
            <div class="news-v3 charity-list-item custom-item-list">

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

          </div>

        @endforeach
      </div>

      @include('pagination.default2', ['paginator' => $charities])

    @else
      <div class="text-center content margin-top-60">
        <h2>ไม่มีมูลนิธิให้แสดง</h2>
      </div>
    @endif

  </div>


</div>

@stop