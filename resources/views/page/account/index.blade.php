@extends('layout.main')
@section('content')

<div class="container content profile">
  <div class="row">
    <!--Left Sidebar-->
    <div class="col-md-3 md-margin-bottom-40">
      <!-- <img class="img-responsive profile-img margin-bottom-20" src="assets/img/team/img32-md.jpg" alt=""> -->
      <i class="fa fa-user"></i>

      <!-- <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
        <li class="list-group-item">
          <a href="page_profile_me.html"><i class="fa fa-user"></i> Profile</a>
        </li>
      </ul> -->

    </div>
    <!--End Left Sidebar-->

    <!-- Profile Content -->
    <div class="col-md-9">
      <div class="profile-body">
        <!--Service Block v3-->
        <div class="row margin-bottom-10">
          <div class="col-sm-12 sm-margin-bottom-20">

            <div class="service-block-v3 service-block-u">
              <span class="service-heading">การบริจาคในเดือนนี้</span>
              <span class="counter">52,147 บาท</span>
            </div>

            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>User Image</th>
                                  <th class="hidden-sm">About</th>
                                  <th>Status</th>
                                  <th>Contacts</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                    <img class="rounded-x" src="assets/img/testimonials/img1.jpg" alt="">
                                  </td>
                                  <td class="td-width">
                                    <h3><a href="#">Sed nec elit arcu</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                                    <small class="hex">Joined February 28, 2014</small>
                                  </td>
                                  <td>
                                    <span class="label label-success">Success</span>
                                  </td>
                                  <td>
                                    <ul class="list-inline s-icons">
                                      <li>
                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                          <i class="fa fa-facebook"></i>
                                        </a>
                                      </li>
                                      <li>
                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                          <i class="fa fa-twitter"></i>
                                        </a>
                                      </li>
                                      <li>
                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                          <i class="fa fa-dropbox"></i>
                                        </a>
                                      </li>
                                      <li>
                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                          <i class="fa fa-linkedin"></i>
                                        </a>
                                      </li>
                                    </ul>
                                    <span><a href="#">info@example.com</a></span>
                                    <span><a href="#">www.htmlstream.com</a></span>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <img class="rounded-x" src="assets/img/testimonials/img2.jpg" alt="">
                                  </td>
                                  <td>
                                    <h3><a href="#">Donec at aliquam est, a mattis mauris</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                                    <small class="hex">Joined March 2, 2014</small>
                                  </td>
                                  <td>
                                    <span class="label label-info"> Pending</span>
                                  </td>
                                  <td>
                                    <ul class="list-inline s-icons">
                                      <li>
                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                          <i class="fa fa-facebook"></i>
                                        </a>
                                      </li>
                                      <li>
                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                          <i class="fa fa-twitter"></i>
                                        </a>
                                      </li>
                                      <li>
                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                          <i class="fa fa-dropbox"></i>
                                        </a>
                                      </li>
                                      <li>
                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                          <i class="fa fa-linkedin"></i>
                                        </a>
                                      </li>
                                    </ul>
                                    <span><a href="#">info@example.com</a></span>
                                    <span><a href="#">www.htmlstream.com</a></span>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <img class="rounded-x" src="assets/img/testimonials/img3.jpg" alt="">
                                  </td>
                                  <td>
                                    <h3><a href="#">Pellentesque semper tempus vehicula</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                                    <small class="hex">Joined March 3, 2014</small>
                                  </td>
                                  <td>
                                    <span class="label label-warning">Expiring</span>
                                  </td>
                                  <td>
                                    <ul class="list-inline s-icons">
                                      <li>
                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                          <i class="fa fa-facebook"></i>
                                        </a>
                                      </li>
                                      <li>
                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                          <i class="fa fa-twitter"></i>
                                        </a>
                                      </li>
                                      <li>
                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                          <i class="fa fa-dropbox"></i>
                                        </a>
                                      </li>
                                      <li>
                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                          <i class="fa fa-linkedin"></i>
                                        </a>
                                      </li>
                                    </ul>
                                    <span><a href="#">info@example.com</a></span>
                                    <span><a href="#">www.htmlstream.com</a></span>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <img class="rounded-x" src="assets/img/testimonials/img4.jpg" alt="">
                                  </td>
                                  <td>
                                    <h3><a href="#">Alesuada fames ac turpis egestas</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                                    <small class="hex">Joined March 4, 2014</small>
                                  </td>
                                  <td>
                                    <span class="label label-danger">Error!</span>
                                  </td>
                                  <td>
                                    <ul class="list-inline s-icons">
                                      <li>
                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                          <i class="fa fa-facebook"></i>
                                        </a>
                                      </li>
                                      <li>
                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                          <i class="fa fa-twitter"></i>
                                        </a>
                                      </li>
                                      <li>
                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                          <i class="fa fa-dropbox"></i>
                                        </a>
                                      </li>
                                      <li>
                                        <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                          <i class="fa fa-linkedin"></i>
                                        </a>
                                      </li>
                                    </ul>
                                    <span><a href="#">info@example.com</a></span>
                                    <span><a href="#">www.htmlstream.com</a></span>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
          </div>

        </div><!--/end row-->

        <hr>

        <div class="row margin-bottom-20">

          @foreach($donations as $donation)

          @endforeach

          <!--Profile Event-->
          <div class="col-zx md-margin-bottom-20">
            <div class="panel panel-profile no-bg">
              <div class="panel-heading overflow-h">
                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i>ประวัติการบริจาค</h2>
                <a href="page_profile_users.html" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">View All</a>
              </div>
              <div id="scrollbar2" class="panel-body no-padding mCustomScrollbar" data-mcs-theme="minimal-dark">
                <div class="profile-event">
                  <div class="date-formats">
                    <span>25</span>
                    <small>05, 2014</small>
                  </div>
                  <div class="overflow-h">
                    <h3 class="heading-xs"><a href="#">GitHub seminars in Japan.</a></h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry printing.</p>
                  </div>
                </div>
                <div class="profile-event">
                  <div class="date-formats">
                    <span>31</span>
                    <small>06, 2014</small>
                  </div>
                  <div class="overflow-h">
                    <h3 class="heading-xs"><a href="#">Bootstrap Update</a></h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry printing.</p>
                  </div>
                </div>
                <div class="profile-event">
                  <div class="date-formats">
                    <span>07</span>
                    <small>08, 2014</small>
                  </div>
                  <div class="overflow-h">
                    <h3 class="heading-xs"><a href="#">Apple Conference</a></h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry printing.</p>
                  </div>
                </div>
                <div class="profile-event">
                  <div class="date-formats">
                    <span>22</span>
                    <small>10, 2014</small>
                  </div>
                  <div class="overflow-h">
                    <h3 class="heading-xs"><a href="#">Backend Meeting</a></h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry printing.</p>
                  </div>
                </div>
                <div class="profile-event">
                  <div class="date-formats">
                    <span>14</span>
                    <small>11, 2014</small>
                  </div>
                  <div class="overflow-h">
                    <h3 class="heading-xs"><a href="#">Google Conference</a></h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry printing.</p>
                  </div>
                </div>
                <div class="profile-event">
                  <div class="date-formats">
                    <span>05</span>
                    <small>12, 2014</small>
                  </div>
                  <div class="overflow-h">
                    <h3 class="heading-xs"><a href="#">FontAwesome Update</a></h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry printing.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--End Profile Event-->
        </div><!--/end row-->

      </div>
    </div>
    <!-- End Profile Content -->
  </div>
</div><!--/container-->

@stop