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
        <iframe width="100%" height="100%" src="{{$charity->vdo_url}}" frameborder="0" allowfullscreen></iframe>
      </div>
      
    </div>

    <div class="col-md-4">
      <div class="service-block-v3 donation-box">
        <i class="icon-heart"></i>
        <span class="service-heading">การบริจาคในเดือนนี้</span>
        <span class="counter">{{$amount}} บาท</span>

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

  <div class="content-images-list">
    <div class="text-center margin-bottom-50">
      <h2 class="title-v2 title-center">รูปภาพมูลนิธิ(เพิ่มเติม)</h2>
    </div>

    <div class="cube-portfolio container margin-bottom-60">
      <div id="grid-container" class="cbp-l-grid-agency">

        @foreach($images as $key => $image)

        <div class="cbp-item" <?php if($key > 3) echo 'style="display:none;"'; ?>>
          <div class="cbp-caption">
            <div class="cbp-caption-defaultWrap">
              @if($key == 3)
                <div class="more-picture">+ {{count($images) - 4}}</div>
              @endif
              <img src="{{$image}}">
            </div>
            <div class="cbp-caption-activeWrap">
              <div class="cbp-l-caption-alignCenter">
                <div class="cbp-l-caption-body">
                  <ul class="link-captions">
                    <li><a href="{{$image}}" class="cbp-lightbox" data-title=""><i class="rounded-x fa fa-search"></i></a></li>
                  </ul>
                  <!-- <div class="cbp-l-grid-agency-title">#</div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

        @endforeach

      </div>
    </div>

  </div>

  <hr>

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
                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>เกี่ยวกับมูลนิธิ</h2>
              </div>
            </div>

            <div class="description padding-15">
              {!!$charity->description!!}
            </div>

          </div>
          <div class="tab-pane fade in" id="news">
            <div class="panel panel-profile">

              <div class="panel-heading overflow-h">
                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>ข่าวสาร</h2>
                <a href="page_profile_users.html" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">เพิ่มเติม</a>
              </div>
   
              <div class="bg-color-light">
                <div class="container content-md">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="thumbnails-v1 news-list-item">
                        <div class="thumbnail-img">
                          <img class="img-responsive" src="/assets/img/masonry/blog2.jpg" alt="">
                        </div>
                        <div class="caption">
                          <h3><a href="#">Business Opportunities</a></h3>
                          <p>Donec id elit non mi porta gravida at eget metsit us. Fusce dapibus, justo sit amet risus etiam portapsum generators on the Internet tend to repeat predefined.</p>
                          <p class="no-margin-bottom"><a class="read-more" href="#">See More</a></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="thumbnails-v1 news-list-item">
                        <div class="thumbnail-img">
                          <img class="img-responsive" src="/assets/img/masonry/blog3.jpg" alt="">
                        </div>
                        <div class="caption">
                          <h3><a href="#">Engage Customers With Unify</a></h3>
                          <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text, all the  ipsum generators.</p>
                          <p class="no-margin-bottom"><a class="read-more" href="#">See More</a></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="thumbnails-v1 news-list-item">
                        <div class="thumbnail-img">
                          <img class="img-responsive" src="/assets/img/masonry/blog4.jpg" alt="">
                        </div>
                        <div class="caption">
                          <h3><a href="#">Empower People, HCM</a></h3>
                          <p>Donec id elit non mi porta gravida at eget metsit us. Fusce dapibus, justo sit amet risus etiam portapsum generators on the Internet tend to repeat predefined.</p>
                          <p class="no-margin-bottom"><a class="read-more" href="#">See More</a></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="tab-pane fade in" id="project">

            <div class="panel panel-profile">
              <div class="panel-heading overflow-h">
                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>โครงการจากมูลนิธินี้</h2>
              </div>
            </div>

            <div class="clearfix margin-bottom-40"></div>

            <!-- <h2 class="text-center">ยังไม่มีโครงการจากมูลนิธินี้</h2> -->

            <div class="col-md-4 news-v3">
              <img class="img-responsive full-width" src="/images/bb6.jpg" alt="">
              <div class="news-v3-in-sm bg-color-light">
                <h2 class="new-title">
                  <span>
                    <a href="{{URL::to('charity')}}/1">xxx</a>
                  </span>
                </h2>
                <p>desc</p>
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
                    <a href="{{URL::to('donate')}}?for=project&id=1" class="btn-u btn-custom margin-bottom-10">บริจาคให้กับโครงการนี้</a>
                  </div>
                </div>
            
              </div>
            </div>

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
                  <span class="counter">277</span>
                  <h4>ผู้บริจาค</h4>
                </div>
              </div>
            </div>

            <div class="clearfix margin-bottom-40"></div>

            <h2 class="text-center">ผู้คนที่ร่วมบริจาคให้กับมูลนิธินี้</h2>

            <div class="bg-color-light">
              <div class="container content-sm">
                <div class="row team-v4 people-list">
                  <div class="col-md-3 col-sm-6 people-list-item">
                    <img class="img-responsive" src="/assets/img/team/img20-md.jpg" alt="">
                    <span>Daniel Wearne</span>
                  </div>
                  <div class="col-md-3 col-sm-6 people-list-item">
                    <img class="img-responsive" src="/assets/img/team/img30-md.jpg" alt="">
                    <span>Sara Lisbon</span>
                  </div>
                  <div class="col-md-3 col-sm-6 people-list-item">
                    <img class="img-responsive" src="/assets/img/team/img22-md.jpg" alt="">
                    <span>John Doe</span>
                  </div>
                  <div class="col-md-3 col-sm-6 people-list-item">
                    <img class="img-responsive" src="/assets/img/team/img19-md.jpg" alt="">
                    <span>Alice Williams</span>
                  </div>
                  <div class="col-md-3 col-sm-6 people-list-item">
                    <img class="img-responsive" src="/assets/img/team/img19-md.jpg" alt="">
                    <span>Alice Williams</span>
                  </div>
                  <div class="col-md-3 col-sm-6 people-list-item">
                    <img class="img-responsive" src="/assets/img/team/img19-md.jpg" alt="">
                    <span>Alice Williams</span>
                  </div>
                  <div class="col-md-3 col-sm-6 people-list-item">
                    <img class="img-responsive" src="/assets/img/team/img19-md.jpg" alt="">
                    <span>Alice Williams</span>
                  </div>
                  <div class="col-md-3 col-sm-6 people-list-item">
                    <img class="img-responsive" src="/assets/img/team/img19-md.jpg" alt="">
                    <span>Alice Williams</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="text-center">
              <button class="btn-u btn-u-lg btn-u-red" type="button">แสดงเพิ่มเติม</button>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- <div class="col-md-4">
      <h3>บริจาคให้กับมูลนิธินี้</h3>

      <div class="donate-box">
        <div class="donate-info">
          <h2 class="donate-amount">บริจาค 300 บาทขึ้นไป</h2>
          <h3 class="reward-title">รับเสื้อมูลนิธิ</h3>
          <p class="reward-info">เสื้อสวยๆจากมูลนิธิ (คำอธิบายของรางวัล)</p>
        </div>
      </div>
    </div> -->

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