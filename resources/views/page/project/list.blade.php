@extends('layout.main')
@section('content')

<div class="project list">
  <div class="search-block parallaxBg" style="background-position: 50% 16px;">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <h1>ร่วมช่วยเหลือโครงการที่กำลังเปิดรับบริจาค</h1>

        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search words with regular expressions ...">
          <span class="input-group-btn">
            <button class="btn-u btn-u-lg" type="button"><i class="fa fa-search"></i></button>
          </span>
        </div>

      </div>
    </div>
  </div>

  <div class="container margin-top-20 padding-bottom-100">
    
    <!-- <h2>โครงการ</h2> -->
    <div class="clearfix margin-bottom-20"></div>
    
    <div class="row">
      @foreach($projects as $data)

        <div class="col-md-4 news-v3 custom-item-list">
          <a href="{{URL::to('project')}}/{{$data->id}}">
            <img class="img-responsive full-width" src="{{$data->thumbnail}}">
          </a>
          <div class="news-v3-in-sm bg-color-light">
            <h2 class="new-title">
              <span>
                <a href="{{URL::to('project')}}/{{$data->id}}">{{$data->name}}</a>
              </span>
            </h2>
            <p>{{$data->short_desc}}</p>
            <div class="project-by-charity margin-bottom-20">
              <a href="{{URL::to('charity')}}/{{$data->charity->id}}">
                <img class="charity-logo" src="{{$data->charity->logo}}">
              </a>
              <span>โดย <a href="{{URL::to('charity')}}/{{$data->charity->id}}">{{$data->charity->name}}</a></span>
            </div>
        
            <div class="service-block-v3 donation-box for-project">

              <?php
                $amount = $donationModel->getTotalAmount('Project',$data->id,false,false);
                $percent = round(($amount*100)/$data->target_amount);
              ?>

              <div class="statistics">
                <h3 class="heading-xs"><strong>{{$donationModel->countDonor('Project',$data->id)}}</strong> / {{number_format($data->target_amount, 0, '.', ',')}} บาท<span class="pull-right">{{$percent}}%</span></h3>
                <div class="progress progress-u progress-xxs">
                  <div style="width: {{$percent}}%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{$percent}}" role="progressbar" class="progress-bar progress-bar-light">
                  </div>
                </div>
              </div>

              <div class="clearfix margin-bottom-10"></div>

              <div class="statistics">
                <h3 class="heading-xs">เหลือเวลาบริจาคอีก <strong>{{$dateLib->remainingDate($data->end_date)}}</strong></h3>
              </div>

              <div class="clearfix margin-bottom-20"></div>

              <div>
                <a href="{{URL::to('donate')}}?for=project&id={{$data->id}}" class="btn-u btn-custom margin-bottom-10">สนับสนุนโครงการนี้</a>
              </div>
            </div>

          </div>
        </div>
      @endforeach

    </div>

    @include('pagination.default2', ['paginator' => $projects])

  </div>
</div>

@stop