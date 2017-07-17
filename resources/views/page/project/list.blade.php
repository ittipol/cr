@extends('layout.main')
@section('content')

<div class="container list margin-top-20 margin-bottom-100">
  
  <h2>โครงการ</h2>
  <hr>
  <div class="row">
    @foreach($projects as $data)

      <div class="col-md-4 news-v3">
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
            <a href="">
              <img class="charity-logo" src="{{$data->charity->logo}}">
            </a>
            <span>โดย <a href="{{URL::to('charity')}}/{{$data->charity->id}}">{{$data->charity->name}}</a></span>
          </div>
      
          <div class="service-block-v3 project-box">

            <?php
              $percent = round(($data->amount*100)/$data->target_amount);
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

            <div class="margin-bottom-20">
              <a href="{{URL::to('donate')}}?for=project&id={{$data->id}}" class="btn-u btn-custom margin-bottom-10">บริจาคให้กับโครงการนี้</a>
            </div>
          </div>

        </div>
      </div>
    @endforeach

  </div>

  @include('pagination.default2', ['paginator' => $projects])

</div>
@stop