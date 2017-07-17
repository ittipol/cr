@extends('layout.main')
@section('content')

<div class="search-block parallaxBg" style="background-position: 50% 16px;">
  <div class="container">
    <div class="col-md-7 col-md-offset-3">
      <h1>ร่วมเป็นส่วนหนี่งในการบริจาคให้กับมูลนิธิ</h1>

      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search words with regular expressions ...">
        <span class="input-group-btn">
          <button class="btn-u btn-u-lg" type="button"><i class="fa fa-search"></i></button>
        </span>
      </div>

      <form action="" class="sky-form page-search-form">
        <div class="inline-group">
          <label class="checkbox"><input type="checkbox" name="checkbox-inline" checked=""><i></i>Recent</label>
          <label class="checkbox"><input type="checkbox" name="checkbox-inline"><i></i>Related</label>
          <label class="checkbox"><input type="checkbox" name="checkbox-inline"><i></i>Popular</label>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- <div class="flat-testimonials bg-image-v1 parallaxBg" style="background-image: url(/assets/img/bg/7.jpg); background-position: 50% 26px;">
  <div class="container">
    <div class="headline-center headline-light margin-bottom-60">
      <h2>ร่วมเป็นส่วนหนี่งในการบริจาคให้กับมูลนิธิ</h2>
      <p>ทุกการบริจาคของคุณจะสามารถช่วยเหลือในเรื่องต่างที่มูลนิธิกำลังต้องการ</p>
    </div>
  </div>
</div> -->

<div class="container list margin-top-20 margin-bottom-100">
  
  <h2>มูลนิธิ</h2>
  <!-- <hr> -->
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

          <div class="clearfix margin-bottom-20"></div>
          
          <div class="service-block-v3 donation-box">

            <i class="icon-heart"></i>
            <span class="service-heading">การบริจาคในเดือนนี้</span>
            <span class="counter">{{$donationModel->getTotalAmount('Charity',$data->id,true)}} บาท</span>

            <div class="clearfix margin-bottom-10"></div>

            <div class="margin-bottom-20">
              <a href="{{URL::to('donate')}}?for=charity&id={{$data->id}}" class="btn-u btn-custom margin-bottom-10">บริจาคให้กับมูลนิธินี้</a>
            </div>

            <!-- <div class="statistics">
              <h3 class="heading-xs">จะส่งมอบเงินให้กับมูลนิธิในอีก <span class="pull-right">{{$remainingDate}}</span></h3>
              <div class="progress progress-u progress-xxs">
                <div style="width: {{$percent}}%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{$percent}}" role="progressbar" class="progress-bar progress-bar-light">
                </div>
              </div>
            </div> -->
          </div>

        </div>
      </div>

    @endforeach
  </div>

  @include('pagination.default2', ['paginator' => $charities])

</div>

@stop