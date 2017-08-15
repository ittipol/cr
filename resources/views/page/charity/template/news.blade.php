<div class="panel panel-profile">
  <div class="panel-heading overflow-h">
    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-sticky-note"></i>ข่าวสาร</h2>
    <a href="{{URL::to('charity')}}/{{$charity->id}}/news" class="btn-u btn-brd btn-brd-hover btn-u-dark pull-right">ทั้งหมด</a>
  </div>
</div>

@if($news->exists())

  <div class="clearfix margin-bottom-20"></div>

  <div class="container">
    <div class="row news-v1">
      @foreach($news->take(6)->get() as $value)

        <div class="col-md-4 md-margin-bottom-40">
          <div class="news-v1-in custom-item-list">
            <a href="{{URL::to('news')}}/{{$value->id}}">
              <div class="full-width-cover" style="background-image: url('{{$value->thumbnail}}');"></div>
            </a>
            <h3><a href="{{URL::to('news')}}/{{$value->id}}">{{$value->title}}</a></h3>
            <p>{{$value->short_desc}}</p>
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
  <h4 class="text-center">ยังไม่มีข่าวสารจากมูลนิธินี้</h4>
@endif