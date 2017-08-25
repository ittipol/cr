@extends('layout.main')
@section('content')

<div class="project index detail margin-top-20 margin-bottom-100">

  <div class="container">

    <div class="project-header clearfix">
      <h2>{{$project->name}}</h2>
      <p>{{$project->short_desc}}</p>
    </div>
    
    <div class="testimonials-v4">
      <img src="{{$charity->logo}}">
      <span class="testimonials-author">
        โครงการจาก<br>
        <a href="{{URL::to('charity')}}/{{$charity->id}}">{{$charity->name}}</a>
      </span>
    </div>

    <div class="clearfix margin-bottom-40"></div>

    <div class="row">
      <div class="col-md-8">
        @if(empty($charity->vdo_url))
          <div class="image-thumbnail" style="background-image:url({{$project->thumbnail}})"></div>
        @else
        <div class="embedded-video">
          <iframe width="100%" height="100%" src="https://www.youtube.com/embed/c6rP-YP4c5I" frameborder="0" allowfullscreen></iframe>
        </div>
        @endif
      </div>

      <div class="col-md-4">
        <div class="service-block-v3 donation-box for-project">

          @if($projectEnd)
          <div class="alert alert-danger fade in">
            <i class="fa fa-exclamation-circle"></i> โครงการปิดรับการบริจาคแล้ว
          </div>

          <p>{{$donorTotal}} ผู้ให้การสนับสนุนและร่วมบริจาคเป็นจำนวนเงิน {{$amount}} บาทเพื่อช่วยให้โครงการนี้เกิดขึ้นได้จริง</p>

          <hr>

          @else
          <div class="statistics">
            <h3 class="heading-xs"><strong>{{$amount}}</strong> / {{$targetAmount}} บาท<span class="pull-right">{{$percent}}%</span></h3>
            <div class="progress progress-u progress-xxs">
              <div style="width: {{$percent}}%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{$percent}}" role="progressbar" class="progress-bar progress-bar-light">
              </div>
            </div>
          </div>

          <div class="clearfix margin-bottom-20"></div>

          <div class="project-donation-info">
            <div class="project-donation-item">
              <span class="counter">{{$amount}} บาท</span>
              <span class="sub-label">จากเป้าหมาย {{$targetAmount}} บาท</span>
            </div>

            <div class="project-donation-item">
              <span class="counter">{{$donorTotal}}</span>
              <span class="sub-label">ผู้บริจาค</span>
            </div>

            <div class="project-donation-item">
              <span class="counter">{{$remainingDate}}</span>
              <span class="sub-label">จะสิ้นสุดการรับบริจาค</span>
            </div>
          </div>

          <div class="clearfix margin-bottom-10"></div>

          <div class="margin-bottom-20">
            <a href="{{URL::to('donate')}}?for=project&id={{$project->id}}" class="btn-u btn-custom margin-bottom-10">สนับสนุนโครงการนี้</a>
          </div>
          @endif

          <div class="row">
            <div class="col-xs-6">
              @if(!$projectEnd)
              <button class="btn btn-block btn-donation btn-html5" data-toggle="modal" data-target="#donation_modal">
                วิธีการบริจาค
              </button>
              @endif
            </div>
            <div class="col-xs-6">
              <div class="pull-right">
                <a class="btn btn-xs btn-facebook fa-fixed btn-share" href="https://www.facebook.com/sharer/sharer.php?u={{Request::fullUrl()}}" target="_blank">
                  <i class="fa fa-facebook"></i>
                </a>
                <a class="btn btn-xs btn-twitter fa-fixed btn-share" href="https://twitter.com/intent/tweet?url={{Request::fullUrl()}}&text=ร่วมเป็นส่วนหนึ่งในการช่วยเหลือและสนับสนุนโครงการ {{$project->name}}" target="_blank">
                  <i class="fa fa-twitter"></i>
                </a>
                <a class="btn btn-xs btn-googleplus fa-fixed btn-share" href="https://plus.google.com/share?url={{Request::fullUrl()}}" target="_blank">
                  <i class="fa fa-google-plus"></i>
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    @include('content.bank_account_modal_project')

    @if(!empty($images))

    <div class="clearfix margin-bottom-40"></div>

    <div class="content-images-list">
      <div class="text-center margin-bottom-50">
        <h2 class="title-v2 title-center">รูปภาพโครงการ</h2>
      </div>

      <div id="image_slider">
        @foreach($images as $key => $image)
          <div class="cbp-item">
            <a href="{{$image}}" class="cbp-caption cbp-lightbox" data-title="">
              <div class="cbp-caption-defaultWrap">
                <img src="{{$image}}" alt="">
              </div>
              <div class="cbp-caption-activeWrap">
                <div class="cbp-l-caption-alignLeft">
                  <div class="cbp-l-caption-body">
                    <div class="cbp-l-caption-title"></div>
                    <div class="cbp-l-caption-desc"></div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>

    </div>
    @endif

    <div class="clearfix margin-bottom-30"></div>

    <div class="row">

      <div class="col-md-12">

        <div class="clearfix margin-bottom-30"></div>

        <div class="tab-v1 margin-bottom-60">
          <ul class="nav nav-tabs margin-bottom-20">
            <li class="active"><a href="#project" data-toggle="tab">โครงการ</a></li>
            <li><a href="#timeline" data-toggle="tab">ไทม์ไลน์</a></li>
            <li><a href="#collaboration" data-toggle="tab">การบริจาค</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade in active" id="project">

              <div class="panel panel-profile">
                <div class="panel-heading overflow-h">
                  <h2 class="panel-title heading-sm pull-left"><i class="fa fa-info-circle"></i>เกี่ยวกับโครงการ</h2>
                  <a href="{{URL::to('charity')}}/{{$charity->id}}/project" class="btn-u btn-u-blue pull-right">แสดงโครงการทั้งหมด</a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8">
                  <div class="description padding-15">
                    {!!$charity->description!!}
                  </div>
                </div>

                <!-- <div class="col-md-4">
                  <h3>โครงการจาก {{$charity->name}}</h3>
                  <div class="clearfix margin-bottom-20"></div>
                  <a href="{{URL::to('charity')}}/{{$charity->id}}/project" class="btn-u btn-u-blue">แสดงโครงการทั้งหมด</a>
                </div> -->
              </div>

            </div>
            <div class="tab-pane fade in" id="timeline">
              
              <div class="col-md-9">
                <ul class="timeline-v2">

                  @if($projectEnd)

                    <?php
                      $date = $dateLib->explodeDateTime($project->created_at);
                    ?>

                    <li class="equal-height-columns">
                      <div class="cbp_tmtime equal-height-column"><span>{{$date['day']}}/{{(int)$date['month']}}/{{$dateLib->getYearTh($date['year'])}}</span> <span>{{$dateLib->getMonthName($date['month'])}}</span></div>
                      <i class="cbp_tmicon rounded-x hidden-xs"></i>
                      <div class="cbp_tmlabel equal-height-column">
                        <h2>สิ้นสุดการรับบริจาค</h2>
                        <p>{{$donorTotal}} ผู้ให้การสนับสนุนและร่วมบริจาคเป็นจำนวนเงิน {{$amount}} บาทเพื่อช่วยให้โครงการนี้เกิดขึ้นได้จริง</p>
                      </div>
                    </li>
                  @endif

                  <li class="timeline-start">
                    <p>{{$dateLib->covertDateToSting($project->created_at)}}</p>
                    <h4>โครงการเปิดรับบริจาค</h4>
                  </li>

                </ul>

              </div>

            </div>
            <div class="tab-pane fade in" id="collaboration">
              
              <div class="parallax-quote parallaxBg">
                <div class="container">
                  <div class="parallax-quote-in">
                    <p>การบริจาคให้กับโครงการนี้</p>
                  </div>
                </div>
              </div>

              <div class="clearfix margin-bottom-40"></div>

              <h2 class="text-center">การบริจาค</h2>

              <div class="row margin-bottom-10">
                <div class="col-sm-6 col-xs-6">
                  <div class="counters">
                    <span class="counter">{{$donationTotal}}</span>
                    <h4>การบริจาค</h4>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="counters">
                    <span class="counter">{{$donorTotal}}</span>
                    <h4>ผู้บริจาค</h4>
                  </div>
                </div>
              </div>

              @if($donors->exists())

                <div class="clearfix margin-bottom-40"></div>

                <h2 class="text-center">ผู้คนที่ร่วมบริจาคให้กับโครงการนี้</h2>

                <div class="container content-sm">
                  <div class="row team-v4 people-list">
                    @foreach($donors->get() as $donor)
                    <div class="col-md-3 col-xs-6 people-list-item">
                      <div class="profile-image">
                        <i class="fa fa-user"></i>
                      </div>
                    <span>{{$donor->user->name}}</span>
                    </div>
                    @endforeach
                  </div>
                </div>

              @endif

            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>

<link rel="stylesheet" href="/assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css">
<link rel="stylesheet" href="/assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css">

<script type="text/javascript" src="/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="/js/form/image-slider.js"></script>

@stop