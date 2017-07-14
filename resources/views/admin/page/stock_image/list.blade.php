@extends('admin.layout.main')
@section('content')

<h1 class="margin-bottom-20">
  คลังรูปภาพ
</h1>

@if(!empty($images))

<div class="cube-portfolio container margin-bottom-60">

  <div id="grid-container" class="cbp-l-grid-agency">

    @foreach($images as $data)

    <div class="cbp-item">
      <div class="cbp-caption">
        <div class="cbp-caption-defaultWrap">
          <img src="{{URL::to('get_image')}}/{{$data->filename}}" alt="{{$data->filename}}">
        </div>
        <div class="cbp-caption-activeWrap">
          <div class="cbp-l-caption-alignCenter">
            <div class="cbp-l-caption-body">
              <ul class="link-captions">
                <li><a target="_blank" href="{{URL::to('get_image')}}/{{$data->filename}}"><i class="rounded-x fa fa-link"></i></a></li>
                <li><a href="{{URL::to('get_image')}}/{{$data->filename}}" class="cbp-lightbox" data-title="Stock Image"><i class="rounded-x fa fa-search"></i></a></li>
              </ul>
              <div class="cbp-l-grid-agency-title">{{$data->filename}}</div>
              <div class="cbp-l-grid-agency-desc">Stock Image</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @endforeach;

  </div>

</div>

@include('pagination.default', ['paginator' => $images])

@endif


<script type="text/javascript" src="{{ URL::asset('assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/plugins/cube-portfolio/cube-portfolio-4.js') }}"></script>

@stop