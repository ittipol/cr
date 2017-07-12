@extends('layout.main')
@section('content')

  <div class="container">
    
    <h2>โครงการ</h2>
    <hr>
    <div class="row">
      @foreach($projects as $data)

        <div class="col-md-4 news-v3">
          <img class="img-responsive full-width" src="/images/bb6.jpg" alt="">
          <div class="news-v3-in-sm bg-color-light">
            <h2 class="new-title">
              <span>
                <a href="{{URL::to('charity')}}/{{$data->id}}">{{$data->name}}</a>
              </span>
            </h2>
            <p>{{$data->short_desc}}</p>
            <div class="project-by-charity margin-bottom-20">
              <a href="">
                <img class="charity-logo" src="/assets/img/team/img32-md.jpg">
              </a>
              <span>โดย <a href="">ชื่อมูลนิธิ</a></span>
            </div>
            <!-- <hr> -->
            <div class="service-block-v3 project-box">

              <div class="statistics">
                <h3 class="heading-xs"><strong>52,147</strong> / 100,000 บาท<span class="pull-right">67%</span></h3>
                <div class="progress progress-u progress-xxs">
                  <div style="width: 67%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="67" role="progressbar" class="progress-bar progress-bar-light">
                  </div>
                </div>
                <!-- <small><strong>52,147</strong> / 100,000 บาท</small> -->
              </div>

              <div class="clearfix margin-bottom-10"></div>
              <div class="clearfix margin-bottom-10"></div>
              <div class="clearfix margin-bottom-10"></div>

              <i class="icon-clock"></i>
              <span class="counter">19 วัน</span>
              <span class="sub-label">จะสิ้นสุดการเปิดรับบริจาค</span>

              <div class="clearfix margin-bottom-10"></div>
              <div class="clearfix margin-bottom-10"></div>

              <div class="margin-bottom-20">
                <a href="{{URL::to('donate')}}?for=project&id={{$data->id}}" class="btn-u margin-bottom-10">บริจาคให้กับโครงการนี้</a>
              </div>
            </div>
  
          </div>
        </div>
      @endforeach

    </div> 
  </div>
@stop