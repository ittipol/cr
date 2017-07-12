@extends('layout.main')
@section('content')
  
<div class="container charity content profile">

  <div class="charity-header clearfix">
    <img class="charity-logo" src="/assets/img/team/img32-md.jpg">
    <div class="charity-info">
      <h2 class="charity-name">{{$charity->name}}
        <div class="name-location">
          <span><i class="fa fa-map-marker"></i>{{$charity->province->name}}</span>
        </div>
      </h2>
      <p class="charity-short-desc">{{$charity->short_desc}}</p>
    </div>
    <p class="charity-short-desc display-mobile">{{$charity->short_desc}}</p>
  </div>

  <div class="row margin-bottom-40">
    <div class="col-md-8">
      <!-- <div class="img-charity-banner" style="background-image:url(/images/bb1.jpg)"></div> -->
      <div class="embedded-video">
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/c6rP-YP4c5I" frameborder="0" allowfullscreen></iframe>
      </div>
      
    </div>

    <div class="col-md-4">
      <div class="service-block-v3 donation-box">
        <i class="icon-heart"></i>
        <span class="service-heading">การบริจาคในเดือนนี้</span>
        <span class="counter">52,147 บาท</span>

        <div class="clearfix margin-bottom-10"></div>

        <div class="margin-bottom-20">
          <a href="{{URL::to('donate')}}?for=charity&id={{$charity->id}}" class="btn-u btn-custom margin-bottom-10">บริจาคให้กับมูลนิธินี้</a>
          <a href="javascript:void(0);" data-toggle="modal" data-target="#donation_modal">วิธีการบริจาค</a>
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

  @include('content.bank_account_modal')

  <div>
    <div class="text-center margin-bottom-50">
      <h2 class="title-v2 title-center">รูปภาพมูลนิธิ(เพิ่มเติม)</h2>
    </div>

    <div class="cube-portfolio container margin-bottom-60">
      <div id="grid-container" class="cbp-l-grid-agency">

        <div class="cbp-item">
          <div class="cbp-caption">
            <div class="cbp-caption-defaultWrap">
              <img src="/assets/img/main/img26.jpg" alt="">
            </div>
            <div class="cbp-caption-activeWrap">
              <div class="cbp-l-caption-alignCenter">
                <div class="cbp-l-caption-body">
                  <ul class="link-captions">
                    <li><a href="portfolio_single_item.html"><i class="rounded-x fa fa-link"></i></a></li>
                    <li><a href="/assets/img/main/img26.jpg" class="cbp-lightbox" data-title=""><i class="rounded-x fa fa-search"></i></a></li>
                  </ul>
                  <div class="cbp-l-grid-agency-title">Design Object 01</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="cbp-item">
          <div class="cbp-caption">
            <div class="cbp-caption-defaultWrap">
              <img src="/assets/img/main/img2.jpg" alt="">
            </div>
            <div class="cbp-caption-activeWrap">
              <div class="cbp-l-caption-alignCenter">
                <div class="cbp-l-caption-body">
                  <ul class="link-captions">
                    <li><a href="portfolio_single_item.html"><i class="rounded-x fa fa-link"></i></a></li>
                    <li><a href="/assets/img/main/img2.jpg" class="cbp-lightbox" data-title=""><i class="rounded-x fa fa-search"></i></a></li>
                  </ul>
                  <div class="cbp-l-grid-agency-title">Design Object 02</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="cbp-item">
          <div class="cbp-caption">
            <div class="cbp-caption-defaultWrap">
              <img src="/assets/img/main/img9.jpg" alt="">
            </div>
            <div class="cbp-caption-activeWrap">
              <div class="cbp-l-caption-alignCenter">
                <div class="cbp-l-caption-body">
                  <ul class="link-captions">
                    <li><a href="portfolio_single_item.html"><i class="rounded-x fa fa-link"></i></a></li>
                    <li><a href="/assets/img/main/img9.jpg" class="cbp-lightbox" data-title=""><i class="rounded-x fa fa-search"></i></a></li>
                  </ul>
                  <div class="cbp-l-grid-agency-title">Design Object 03</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="cbp-item">
          <div class="cbp-caption">
            <div class="cbp-caption-defaultWrap">
              <img src="/assets/img/main/img11.jpg" alt="">
            </div>
            <div class="cbp-caption-activeWrap">
              <div class="cbp-l-caption-alignCenter">
                <div class="cbp-l-caption-body">
                  <ul class="link-captions">
                    <li><a href="portfolio_single_item.html"><i class="rounded-x fa fa-link"></i></a></li>
                    <li><a href="/assets/img/main/img11.jpg" class="cbp-lightbox" data-title=""><i class="rounded-x fa fa-search"></i></a></li>
                  </ul>
                  <div class="cbp-l-grid-agency-title">Design Object 05</div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>

  <hr>

  <div class="row">

    <div class="col-md-8">

      <div class="tab-v1 margin-bottom-60">
        <ul class="nav nav-tabs margin-bottom-20">
          <li class="active"><a href="#about" data-toggle="tab">เกี่ยวกับ</a></li>
          <li><a href="#news" data-toggle="tab">ข่าวสาร</a></li>
          <li><a href="#comment" data-toggle="tab">ความคิดเห็น</a></li>
          <li><a href="#collaboration" data-toggle="tab">การบริจาค</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade in active" id="about">
            <div class="panel panel-profile">
              <div class="panel-heading overflow-h">
                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>เกี่ยวกับมูลนิธิ</h2>
              </div>
            </div>

            <div class="padding-15">
              {!!$charity->description!!}
            </div>

          </div>
          <div class="tab-pane fade in" id="news">
            <div class="panel panel-profile">
              <div class="panel-heading overflow-h">
                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>ข่าวสาร</h2>
                <a href="page_profile_users.html" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">View All</a>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="profile-blog blog-border">
                      <img class="rounded-x" src="/assets/img/testimonials/img1.jpg" alt="">
                      <div class="name-location">
                        <strong>Mikel Andrews</strong>
                        <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                      </div>
                      <div class="clearfix margin-bottom-20"></div>
                      <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                      <hr>
                      <ul class="list-inline share-list">
                        <li><i class="fa fa-bell"></i><a href="#">12 Notifications</a></li>
                        <li><i class="fa fa-group"></i><a href="#">54 Followers</a></li>
                        <li><i class="fa fa-twitter"></i><a href="#">Retweet</a></li>
                      </ul>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="profile-blog blog-border">
                      <img class="rounded-x" src="/assets/img/testimonials/img4.jpg" alt="">
                      <div class="name-location">
                        <strong>Natasha Kolnikova</strong>
                        <span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
                      </div>
                      <div class="clearfix margin-bottom-20"></div>
                      <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                      <hr>
                      <ul class="list-inline share-list">
                        <li><i class="fa fa-bell"></i><a href="#">37 Notifications</a></li>
                        <li><i class="fa fa-group"></i><a href="#">46 Followers</a></li>
                        <li><i class="fa fa-twitter"></i><a href="#">Retweet</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade in" id="comment">
            <h3>ความคิดเห็น</h3>
          </div>
          <div class="tab-pane fade in" id="collaboration">

            <div class="panel-heading overflow-h">
              <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>การบริจาค</h2>
            </div>
            
            <div class="row margin-bottom-10">
              <div class="col-sm-6 col-xs-6">
                <div class="counters">
                  <span class="counter">10629</span>
                  <h4>ผูบริจาคใหม่</h4>
                </div>
              </div>
              <div class="col-sm-6 col-xs-6">
                <div class="counters">
                  <span class="counter">277</span>
                  <h4>ผู้ที่กลับมาบริจาค</h4>
                </div>
              </div>
            </div>
            
          </div>
        </div>
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

<link rel="stylesheet" href="/assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css">
<link rel="stylesheet" href="/assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css">

<script type="text/javascript" src="/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/cube-portfolio/cube-portfolio-4.js"></script>

<script src="/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="/assets/js/plugins/owl-carousel.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    OwlCarousel.initOwlCarousel();
  });
</script>

@stop