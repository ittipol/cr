<div class="tab-v1 text-center">
  <ul class="nav nav-tabs tab-border-bottom no-margin">
    <li @if($_pageName == 'Charity') class="active" @endif><a href="{{URL::to('charity')}}/{{$_id}}">หน้าหลัก</a></li>
    <li @if($_pageName == 'Project') class="active" @endif>
      <a href="{{URL::to('charity')}}/{{$_id}}/project">โครงการ</a>
    </li>
    <li @if($_pageName == 'News') class="active" @endif>
      <a href="{{URL::to('charity')}}/{{$_id}}/news">ข่าวสาร</a>
    </li>
    <li @if($_pageName == 'Video') class="active" @endif>
      <a href="{{URL::to('charity')}}/{{$_id}}/video">วีดีโอ</a>
    </li>
    <li><a href="{{URL::to('donate')}}?for=charity&id={{$_id}}">บริจาค</a></li>
  </ul>
</div>