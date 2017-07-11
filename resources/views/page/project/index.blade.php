@extends('layout.main')
@section('content')
  
<div class="container content profile">

  <div class="testimonials-v4 md-margin-bottom-50">
    <div class="testimonials-v4-in">
      <h2>โครงการ: {{$project->name}}</h2>
      <p>{{$project->short_desc}}</p>
    </div>
    <img class="rounded-x" src="/assets/img/team/img32-md.jpg">
    <span class="testimonials-author">
      โครงการจาก<br>
      <a href="{{URL::to('charity')}}/{{$project->id}}">ชื่อมูลนิธิ</a>
    </span>
  </div>

  <hr>

  <!-- <div class="project-header">
    <h2 class="project-name">{{$project->name}}</h2>
    <p class="project-short-desc">คำอธิบายแบบย่อไม่เกิน 250 ตัวอักษร</p>
    <div class="project-by-charity">
      <a href="">
        <img class="charity-logo" src="/assets/img/team/img32-md.jpg">
      </a>
      <span>
        โดย <a href="{{URL::to('charity')}}/{{$project->id}}">ชื่อมูลนิธิ</a>
      </span>
    </div>
  </div> -->

  <div class="charity-header clearfix">

  <div class="row margin-bottom-40">
    <div class="col-md-8">
      <div class="img-charity-banner" style="background-image:url(/images/bb1.jpg)"></div>
    </div>

    <div class="col-md-4">
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

          <i class="icon-heart"></i>
          <span class="counter">52,147 บาท</span>
          <span class="sub-label">จากเป้าหมาย 100000 บาท</span>

          <div class="clearfix margin-bottom-10"></div>

          <i class="icon-users"></i>
          <span class="counter">219</span>
          <span class="sub-label">ผู้บริจาค</span>

          <div class="clearfix margin-bottom-10"></div>

          <i class="icon-clock"></i>
          <span class="counter">19 วัน</span>
          <span class="sub-label">จะสิ้นสุดการเปิดรับบริจาค</span>

          <div class="clearfix margin-bottom-10"></div>
          <div class="clearfix margin-bottom-10"></div>

          <div class="margin-bottom-20">
            <button class="btn-u" type="button">บริจาคให้กับโครงการนี้</button>
          </div>
        </div>
    </div>
  </div>

  <div class="container content">
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

      <div class="tab-v1 margin-bottom-40">
        <ul class="nav nav-tabs margin-bottom-20">
          <li class="active"><a href="#project" data-toggle="tab">โครงการ</a></li>
          <li><a href="#timeline" data-toggle="tab">ไทม์ไลน์</a></li>
          <li><a href="#comment" data-toggle="tab">ความคิดเห็น</a></li>
          <li><a href="#collaboration" data-toggle="tab">การบริจาค</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade in active" id="project">
            <h3>เกี่ยวกับโครงการ</h3>
          </div>
          <div class="tab-pane fade in" id="timeline">
            
            <div class="col-md-9">
              <ul class="timeline-v2">

                <li class="equal-height-columns">
                  <div class="cbp_tmtime equal-height-column"><span>2/4/11</span> <span>April</span></div>
                  <i class="cbp_tmicon rounded-x hidden-xs"></i>
                  <div class="cbp_tmlabel equal-height-column">
                    <h2>Back to the past</h2>
                    <p>Peanut gourd nori welsh onion rock melon mustard jícama. Desert raisin amaranth kombu aubergine kale seakale brussels sprout pea. Black-eyed pea celtuce bamboo shoot salad kohlrabi leek squash prairie turnip catsear rock melon chard taro broccoli turnip greens. Fennel quandong potato watercress ricebean swiss chard garbanzo. Endive daikon brussels sprout lotus root silver beet epazote melon shallot.</p>
                  </div>
                </li>

                <li class="equal-height-columns">
                  <div class="cbp_tmtime equal-height-column"><span>18/7/13</span> <span>June</span></div>
                  <i class="cbp_tmicon rounded-x hidden-xs"></i>
                  <div class="cbp_tmlabel equal-height-column">
                    <h2>เปิดรับบริจาค</h2>
                  </div>
                </li>
              </ul>
            </div>

          </div>
          <div class="tab-pane fade in" id="comment">
            <h3>ความคิดเห็น</h3>
          </div>
          <div class="tab-pane fade in" id="collaboration">
            <div class="panel panel-profile">
              <div class="panel-heading overflow-h">
                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>การบริจาค</h2>
              </div>
            </div>
            
            <div class="row margin-bottom-10">
              <div class="col-sm-3 col-xs-6">
                <div class="counters">
                  <span class="counter">10629</span>
                  <h4>ผูบริจาคใหม่</h4>
                </div>
              </div>
              <div class="col-sm-3 col-xs-6">
                <div class="counters">
                  <span class="counter">277</span>
                  <h4>ผู้ที่กลับมาบริจาค</h4>
                </div>
              </div>
              <div class="col-sm-3 col-xs-6">
                <div class="counters">
                  <span class="counter">78</span>
                  <h4>ผู้บริจาคโดยไม่ออกนาม</h4>
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

@stop