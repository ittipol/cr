@extends('layout.main')
@section('content')
  
<div class="charity index margin-top-20 margin-bottom-100" >

  <div class="container">

    <div class="charity-header clearfix">
      <img class="charity-logo" src="{{$charity->logo}}">
      <div class="charity-info">
        <h2 class="charity-name">{{$charity->name}}</h2>
        <p class="charity-short-desc">{{$charity->short_desc}}</p>
      </div>
      <p class="charity-short-desc display-mobile">{{$charity->short_desc}}</p>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="name-location">
          <span><i class="fa fa-map-marker"></i>{{$charity->province->name}}</span>
        </div>
        <div class="clearfix margin-bottom-20"></div>
      </div>
    </div>

    <div class="row">

      <div class="col-md-8">
        <!-- <div class="img-charity-banner" style="background-image:url()"></div> -->
        <div class="embedded-video">
          <iframe width="100%" height="100%" src="{{$charity->vdo_url}}" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>

      <div class="col-md-4">
        <div class="service-block-v3 donation-box for-charity">

          <div class="margin-bottom-20">
            <span class="service-heading">การบริจาคในเดือนนี้</span>
            <span class="counter">{{$amount}} บาท</span>
          </div>

          <div class="statistics">
            <h3 class="heading-xs">จะส่งมอบเงินให้กับมูลนิธิในอีก <span class="pull-right">{{$remainingDate}}</span></h3>
            <div class="progress progress-u progress-xxs">
              <div style="width: {{$percent}}%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{$percent}}" role="progressbar" class="progress-bar progress-bar-light">
              </div>
            </div>
          </div>

          <div class="clearfix margin-bottom-20"></div>

          <div class="margin-bottom-20">
            <a href="{{URL::to('donate')}}?for=charity&id={{$charity->id}}" class="btn-u btn-custom margin-bottom-10">บริจาคให้กับมูลนิธินี้</a>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <button class="btn btn-block btn-donation btn-html5" data-toggle="modal" data-target="#donation_modal">
                วิธีการบริจาค
              </button>
            </div>
            <div class="col-xs-6">
              <div class="pull-right">
                <a class="btn btn-xs btn-facebook fa-fixed btn-share" href="https://www.facebook.com/sharer/sharer.php?u={{Request::fullUrl()}}" target="_blank">
                  <i class="fa fa-facebook"></i>
                </a>
                <a class="btn btn-xs btn-twitter fa-fixed btn-share" href="https://twitter.com/intent/tweet?url={{Request::fullUrl()}}&text=ร่วมเป็นส่วนหนี่งในการบริจาคให้กับมูลนิธิ {{$charity->name}}" target="_blank">
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

    @include('content.bank_account_modal')

    @if(!empty($images))

    <div class="clearfix margin-bottom-40"></div>

    <div class="content-images-list">
      <div class="text-center margin-bottom-50">
        <h2 class="title-v2 title-center">รูปภาพมูลนิธิ</h2>
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

        <div class="tab-v1 margin-bottom-60">
          <ul class="nav nav-tabs margin-bottom-20">
            <li class="active"><a href="#about" data-toggle="tab">เกี่ยวกับ</a></li>
            <li><a href="#news" data-toggle="tab">ข่าวสาร</a></li>
            <li><a href="#project" data-toggle="tab">โครงการ</a></li>
            <li><a href="#collaboration" data-toggle="tab">การบริจาค</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade in active" id="about">
              <div class="panel panel-profile">
                <div class="panel-heading overflow-h">
                  <h2 class="panel-title heading-sm pull-left"><i class="fa fa-info-circle"></i>เกี่ยวกับมูลนิธิ</h2>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8">
                  <div class="description padding-15">
                    {!!$charity->description!!}
                  </div>
                </div>

                <div class="col-md-4">
                  <h3>บริจาคให้กับมูลนิธินี้</h3>

                  <div class="donate-box">
                    <div class="donate-info">
                      <h2 class="donate-amount">บริจาค 300 บาทขึ้นไป</h2>
                      <h3 class="reward-title">รับเสื้อมูลนิธิ</h3>
                      <p class="reward-info">เสื้อสวยๆจากมูลนิธิ (คำอธิบายของรางวัล)</p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="tab-pane fade in" id="news">
              <div class="panel panel-profile">
                @include('page.charity.template.news')
              </div>
            </div>
            <div class="tab-pane fade in" id="project">
              @include('page.charity.template.project')
            </div>
            <div class="tab-pane fade in" id="collaboration">

              <div class="parallax-quote parallaxBg">
                <div class="container">
                  <div class="parallax-quote-in">
                    <p>การบริจาคให้กับมูลนิธินี้</p>
                  </div>
                </div>
              </div>

              <div class="clearfix margin-bottom-40"></div>

              <h2 class="text-center">การบริจาคในเดือนนี้</h2>

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

                <h2 class="text-center">ผู้คนที่ร่วมบริจาคให้กับมูลนิธินี้</h2>

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