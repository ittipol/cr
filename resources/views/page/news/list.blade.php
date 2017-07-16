@extends('layout.main')
@section('content')

<div class="container list" class="margin-top-20 margin-bottom-100">
  
  <h2>ข่าวสาร</h2>
  <hr>
  <div class="row">
    @foreach($news as $data)


    @endforeach

  </div>

  @include('pagination.default2', ['paginator' => $news])

</div>
@stop