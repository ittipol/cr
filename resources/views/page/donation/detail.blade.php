@extends('layout.main')
@section('content')

<div class="donate">

  <div class="parallax-quote parallaxBg" style="background-position: 50% 89px;">
    <div class="container">
      <div class="parallax-quote-in">
        <p>ขอบคุณที่คุณร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ{{$for}} {{$name}}</p>
      </div>
    </div>
  </div>

  <div class="container content margin-top-20 margin-bottom-100">
    @include('page.donation.content') 
  </div>

</div>

@stop