<div class="panel panel-profile">
  <div class="panel-heading overflow-h">
    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>โครงการ</h2>
  </div>
</div>

@if($projects->exists())
  <div class="clearfix margin-bottom-20"></div>
  <div class="container">
    <div class="row">
      @foreach($projects->get() as $value)

        <div class="col-md-4 news-v3">
          <a href="{{URL::to('project')}}/{{$value->id}}">
            <img class="img-responsive full-width" src="{{$value->thumbnail}}">
          </a>
          <div class="news-v3-in-sm bg-color-light">
            <h2 class="new-title">
              <span>
                <a href="{{URL::to('project')}}/{{$value->id}}">{{$value->name}}</a>
              </span>
            </h2>
            <p>{{$value->short_desc}}</p>

            <div class="service-block-v3 donation-box for-project">

              <?php
                $amount = $donationModel->getTotalAmount('Project',$value->id,false,false);
                $percent = round(($amount*100)/$value->target_amount)
              ?>

              <div class="statistics">
                <h3 class="heading-xs"><strong>{{$donationModel->countDonor('Project',$value->id)}}</strong> / {{number_format($value->target_amount, 0, '.', ',')}} บาท<span class="pull-right">{{$percent}}%</span></h3>
                <div class="progress progress-u progress-xxs">
                  <div style="width: {{$percent}}%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{$percent}}" role="progressbar" class="progress-bar progress-bar-light">
                  </div>
                </div>
              </div>

              <div class="clearfix margin-bottom-10"></div>

              <div class="statistics">
                <h3 class="heading-xs">เหลือเวลาบริจาคอีก <strong>{{$dateLib->remainingDate($value->end_date)}}</strong></h3>
              </div>

              <div class="clearfix margin-bottom-20"></div>

              <div class="margin-bottom-20">
                <a href="{{URL::to('donate')}}?for=project&id={{$value->id}}" class="btn-u btn-custom margin-bottom-10">บริจาคให้กับโครงการนี้</a>
              </div>
            </div>
        
          </div>
        </div>

      @endforeach
    </div>
  </div>
@else
  <div class="clearfix margin-bottom-40"></div>
  <h4 class="text-center">ยังไม่มีโครงการ</h4>
@endif