<div class="panel panel-profile">
  <div class="panel-heading overflow-h">
    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-sticky-note"></i>ข่าวสาร</h2>
  </div>
</div>

@if($news->exists())
  <div class="clearfix margin-bottom-20"></div>
  <div class="container">
    <div class="row">
      @foreach($news->get() as $value)

        <div class="col-md-4 news-v3 news-list-item">
          <a href="{{URL::to('news')}}/{{$value->id}}">
            <img class="img-responsive full-width" src="{{$value->thumbnail}}">
          </a>
          <div class="news-v3-in-sm bg-color-white">
            <ul class="list-inline posted-info-sm">
              <li>โพสต์เมื่อ: {{$dateLib->covertDateToSting($value->created_at)}}</li>
            </ul>
            <h2><a href="{{URL::to('news')}}/{{$value->id}}">{{$value->title}}</a></h2>
            <p>{{$value->short_desc}}</p>
          </div>
        </div>

      @endforeach
    </div>
  </div>
@else
  <div class="clearfix margin-bottom-40"></div>
  <h4 class="text-center">ยังไม่มีข่าวสารจากมูลนิธินี้</h4>
@endif