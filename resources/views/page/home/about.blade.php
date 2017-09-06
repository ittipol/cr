@extends('layout.main')
@section('content')

<div class="about">

  <div class="parallax-counter-v4 parallaxBg" style="background-position: 50% 50px;">
    <div class="container">
      <img class="logo" src="/images/logo/logo-light.png">
    </div>
  </div>

  <div class="clearfix margin-top-20"></div>

  <div class="parallax-counter-v4 parallaxBg" style="background-position: 50% 70px;">
    <div class="container">

      <div class="headline-center">
        <h2>เกี่ยวกับเรา</h2>
        <p>เข้าไปช่วยเหลือและเป็นกระบอกเสียงให้คนได้รู้จักและเห็นสิ่งที่เกิดขึ้น เพื่อร่วมกันช่วยเหลือ</p>
      </div>
    </div>

  </div>

  <div class="container">

    <div class="row about-me">
      <div class="col-xs-12">
        <div class="overflow-h">
          <ul class="social-icons pull-right">
            <li><a class="rounded-x social_facebook" data-original-title="Facebook" href="https://www.facebook.com/charityth"></a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="headline-center margin-bottom-60">
      <h2>การดำเนินการ</h2>
      <p>เรามีเว็บไซต์ที่ทำหน้าที่ในการกระบอกเสียงให้คนได้รู้จักและเห็นสิ่งที่เกิดขึ้น รวมถึงการเปิดรับบริจาค แสดงเรื่องราว ข่าวสารต่างๆที่เกินขึ้น และอื่นๆ เพื่อให้เกิดประสิทธิภาพสูงสุดในการช่วยเหลือ</p>
    </div>

    <div class="service-block-v4">
      <div class="container content-sm">
        <div class="row">
          <div class="col-md-4 service-desc md-margin-bottom-50">
            <i class="fa fa-flag"></i>
            <h3>มูลนิธิ</h3>
            <p class="no-margin-bottom">รวบรวมสถานที่ที่ต้องการความช่วยเหลือพร้อมทำหน้าที่เป็นกระบอกเสียงให้คนได้รู้จักและเห็นสิ่งที่เกิดขึ้น เพื่อให้เกิดการช่วยเหลืออย่างมีประสิทธิภาพ</p>
          </div>
          <div class="col-md-4 service-desc md-margin-bottom-50">
            <i class="fa fa-tasks"></i>
            <h3>โครงการ</h3>
            <p class="no-margin-bottom">โครงการที่มีเป้าหมายอย่างชัดเจนจะช่วยให้ร่ววมกันช่วยเหลือได้อย่างมีประสิทธิภาพและแก้ปัญหาได้อย่างยั่งยืน</p>
          </div>
          <div class="col-md-4 service-desc">
            <i class="fa fa-heart"></i>
            <h3>การบริจาค</h3>
            <p class="no-margin-bottom">ทำหน้าในการรวบร่วมการบริจาคและทำหน้าที่ส่งมอบเพื่อช่วยเหลือตามที่กำหนดไว้</p>
          </div>
        </div>
      </div>
    </div>

    <div class="headline-center margin-bottom-60">
      <h2>การช่วยเหลือและความร่วมมือ</h2>
    </div>

    <div class="container content-sm">
      <div class="container">
        <div class="row">
          <div class="col-md-6 md-margin-bottom-30">
            <h2 class="title-v2">แม่จิ๋มบ้านสุนัข</h2>
            <p>ป้าจิ๋มผู้ที่อุทิศชีวิตของตัวเอง ให้กับการช่วยเหลือน้องหมา มามากว่า 30ปี เพียงคนเดียว ถึงร่างกายตัวเองจะเจ็บป่วยแต่แม่ก็ยังทนทำมันด้วยความรัก ที่มีต่อสิ่งมีชีวิตเล็กๆ</p>
            <br>
            <a href="http://www.cr.com/charity/1" class="btn-u btn-custom margin-bottom-10">แสดงรายละเอียด</a>
            <!-- <a href="#" class="btn-u">แสดงรายละเอียด</a> -->
          </div>
          <div class="col-md-6">
            <div class="responsive-video">
              <iframe width="100%" height="100%" src="https://www.youtube.com/embed/t6l1BKfWpo4" frameborder="0" allowfullscreen=""></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

@stop