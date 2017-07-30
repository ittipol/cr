@extends('layout.main')
@section('content')

<div class="account index padding-bottom-100">

  <div class="search-block parallaxBg" style="background-position: 50% 16px;">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <div class="header-profile-image">
          <i class="fa fa-user"></i>
        </div>
        <h1 class="no-margin">{{Auth::user()->name}}</h1>
      </div>
    </div>
  </div>

  <div class="container content profile">
    <div class="row">
  
      <div class="col-md-3 md-margin-bottom-40">
        <div class="headline"><h2>เมนู</h2></div>

        <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
          <li class="list-group-item">
            <a href="{{URL::to('account')}}"><i class="fa fa-user"></i> หน้าแรกบัญชี</a>
          </li>
          <li class="list-group-item">
            <a href="{{URL::to('account/profile/edit')}}"><i class="fa fa-pencil"></i> แก้ไขโปรไฟล์</a>
          </li>
          <li class="list-group-item">
            <a href="{{URL::to('account/donation/history')}}"><i class="fa fa-heart"></i> การสนับสนุน</a>
          </li>
          <li class="list-group-item">
            <a href="{{URL::to('logout')}}"><i class="fa fa-arrow-left"></i> ออกจากระบบ</a>
          </li>
        </ul>
      </div>

      <div class="col-md-9">
        @yield('account_content')
      </div>

    </div>
  </div>

</div>

@stop