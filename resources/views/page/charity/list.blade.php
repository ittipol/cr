@extends('layout.main')
@section('content')

  <div class="container">
    
    <h2>มูลนิธิ</h2>
    <hr>
    <div class="row">
      @foreach($charities as $data)

        <div class="col-md-4 news-v3">
          <img class="img-responsive full-width" src="/images/bb5.jpg" alt="">
          <div class="news-v3-in-sm bg-color-light">
            <h2 class="new-title">
              <a href="">
                <img class="charity-logo" src="/assets/img/team/img32-md.jpg">
              </a>
              <span>
                <a href="{{URL::to('charity')}}/{{$data->id}}">{{$data->name}}</a>
              </span>
            </h2>
            <p>{{$data->short_desc}}</p>
            <hr>
            <div class="service-block-v3 donation-box">
              <i class="icon-heart"></i>
              <span class="service-heading">การบริจาคในเดือนนี้</span>
              <span class="counter">52,147 บาท</span>

              <div class="clearfix margin-bottom-10"></div>

              <div class="margin-bottom-20">
                <a href="{{URL::to('donate')}}?for=charity&id={{$data->id}}" class="btn-u margin-bottom-10">บริจาคให้กับมูลนิธินี้</a>
              </div>
              <div class="statistics">
                <h3 class="heading-xs">จะส่งมอบเงินให้กับมูลนิธิในอีก <span class="pull-right">15 วัน</span></h3>
                <div class="progress progress-u progress-xxs">
                  <div style="width: 67%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="67" role="progressbar" class="progress-bar progress-bar-light">
                  </div>
                </div>
              </div>
            </div>
  
          </div>
        </div>
      @endforeach

    </div> 
  </div>
@stop