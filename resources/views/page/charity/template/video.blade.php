<div class="panel panel-profile">
  <div class="panel-heading overflow-h">
    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-video-camera"></i>วีดีโอ</h2>
    <a href="{{URL::to('charity')}}/{{$charity->id}}/video" class="btn-u btn-u-blue pull-right">แสดงทั้งหมด</a>
  </div>
</div>

@if($videos->exists())

  <div class="clearfix margin-bottom-20"></div>

  <div class="container">
    <div class="row news-v1 video-list">
      @foreach($videos->take(6)->get() as $value)

        <div class="col-md-4 md-margin-bottom-40">
          <div class="news-v1-in custom-item-list">
            <a href="{{URL::to('video')}}/{{$value->id}}">
              <div class="full-width-cover video-play-icon" style="background-image: url('{{$value->thumbnail}}');">
                <i class="fa fa-caret-right"></i>
              </div>
            </a>
            <h3><a href="{{URL::to('video')}}/{{$value->id}}">{{$value->title}}</a></h3>
            <ul class="list-inline news-v1-info">
              <li><a href="{{URL::to('charity')}}/{{$value->charity->id}}">{{$value->charity->name}}</a></li>
              <li>|</li>
              <li><i class="fa fa-clock-o"></i> {{$dateLib->covertDateToSting($value->created_at)}}</li>
            </ul>
          </div>
        </div>

      @endforeach
    </div>
  </div>

@else
  <div class="clearfix margin-bottom-40"></div>
  <h4 class="text-center">ยังไม่มีวีดีโอ</h4>
@endif