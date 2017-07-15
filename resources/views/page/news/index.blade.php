@extends('layout.main')
@section('content')

<div class="parallax-quote parallax-quote-light parallaxBg">
  <div class="container">
    <div class="parallax-quote-in">
      <p>การบริจาคให้กับมูลนิธินี้</p>
    </div>
  </div>
</div>

<div class="clearfix margin-bottom-40"></div>

<div class="container">

  <div class="row margin-bottom-20">
    <div class="col-md-8">

      <!-- <h2>{{$news->title}}</h2> -->

      {!!$news->description!!}
    </div>

    <div class="col-md-4">
      <h3>มูลนิธิ</h3>
    </div>

  </div>

</div>

@stop