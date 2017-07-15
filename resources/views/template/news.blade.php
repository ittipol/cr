<div class="panel-heading overflow-h">
  <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>ข่าวสาร</h2>
  <a href="{{URL::to('news/list')}}" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">เพิ่มเติม</a>
</div>

@if($news->exists())
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
  <h2 class="text-center">ยังไม่มีข่าวสาร</h2>
@endif