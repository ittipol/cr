@extends('layout.main')
@section('content')

<div class="project list">

  <div class="breadcrumbs breadcrumbs-custom margin-top-20 margin-bottom-20">
    <div class="container">
      <h1>โครงการ</h1>
    </div>
  </div>

  <div class="container margin-top-20 padding-bottom-100">

    @if($projects->currentPage() <= $projects->lastPage())
    
      <div class="clearfix margin-bottom-20"></div>
      
      <div class="row">
        @foreach($projects as $data)

          <div class="col-lg-4 col-sm-6 col-xs-12">

            <div class="news-v3 custom-item-list">

              <a href="{{URL::to('project')}}/{{$data->id}}">
                <img class="img-responsive full-width" src="{{$data->thumbnail}}">
              </a>
              <div class="news-v3-in-sm bg-color-light">

                <?php
                  $strLimit = 120;
                  $descLen = $strLimit - mb_strlen($data->name);
                  $shortDesc = $stringLib->truncString($data->short_desc,$descLen);
                ?>

                <div class="main-content margin-bottom-10">
                  <a href="{{URL::to('charity')}}/{{$data->id}}">{{$data->name}}</a>
                  — {{$shortDesc}}
                </div>

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

          </div>
        @endforeach

      </div>

      @include('pagination.default2', ['paginator' => $projects])

    @else
      <div class="text-center content margin-top-100 margin-bottom-300">
        <h2>ไม่มีโครงการให้แสดง</h2>
      </div>
    @endif

  </div>
</div>

@stop