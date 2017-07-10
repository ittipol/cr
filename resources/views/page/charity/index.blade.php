@extends('layout.main')
@section('content')
  
  <div class="container content profile">

    <div class="charity-header clearfix">
      <img class="charity-logo" src="/assets/img/team/img32-md.jpg" alt="">
      <div class="charity-info">
        <h2 class="charity-name">{{$charity->name}}</h2>
        <p class="charity-short-desc">คำอธิบายแบบย่อไม่เกิน 250 ตัวอักษร</p>
      </div>
      <p class="charity-short-desc display-mobile">คำอธิบายแบบย่อไม่เกิน 250 ตัวอักษร</p>
    </div>

    <div class="row margin-bottom-40">
      <div class="col-md-8">
        <div class="img-charity-banner" style="background-image:url(/images/bb1.jpg)"></div>
      </div>

      <div class="col-md-4">
          <div class="service-block-v3 white-style">
            <i class="icon-users"></i>
            <span class="service-heading">การบริจาคในเดือนนี้</span>
            <span class="counter">52,147 บาท</span>

            <div class="clearfix margin-bottom-10"></div>

            <div class="margin-bottom-20">
              <button class="btn-u btn-u-dark-blue" type="button">บริจาคให้กับมูลนิธินี้</button>
            </div>
            <div class="statistics">
              <h3 class="heading-xs">จะนำเงินไปให้กับมูลนิธิในอีก <span class="pull-right">15 วัน</span></h3>
              <div class="progress progress-u progress-xxs">
                <div style="width: 67%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="67" role="progressbar" class="progress-bar progress-bar-light">
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        รูปภาพเรียงเป็น grid 6 รูป
      </div>
    </div>

    <hr>

    <div class="row">

      <div class="col-md-8">
        <!-- <h3>เกี่ยวกับมูลนิธิ</h3> -->
        <div class="tab-v1">
          <ul class="nav nav-tabs margin-bottom-20">
            <li class="active"><a href="#about" data-toggle="tab">เกี่ยวกับ</a></li>
            <li><a href="#timeline" data-toggle="tab">ไทม์ไลน์</a></li>
            <li><a href="#news" data-toggle="tab">ข่าวสาร</a></li>
            <li><a href="#comment" data-toggle="tab">ความคิดเห็น</a></li>
            <li><a href="#collaboration" data-toggle="tab">ความรวมมือ</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade in active" id="about">
              <h3>เกี่ยวกับมูลนิธิ</h3>
            </div>
            <div class="tab-pane fade in" id="timeline">
              <h3>ไทม์ไลน์</h3>
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
                        <img class="rounded-x" src="assets/img/testimonials/img1.jpg" alt="">
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
                        <img class="rounded-x" src="assets/img/testimonials/img4.jpg" alt="">
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
              <h3>ความรวมมือ</h3>
              ranking
              รายชื่อผู้บริจาค
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

            <!-- <img class="margin-bottom-20" src="/assets/img/team/img2-sm.jpg" alt="">
            <img class="margin-bottom-20" src="/assets/img/team/img2-sm.jpg" alt="">
            <img class="margin-bottom-20" src="/assets/img/team/img2-sm.jpg" alt=""> -->
          </div>
        </div>
      </div>

    </div>

  </div>

@stop