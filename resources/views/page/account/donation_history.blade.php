@extends('layout.main')
@section('content')

<div class="account list padding-bottom-100">

  <div class="search-block parallaxBg" style="background-position: 50% 16px;">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <div class="profile-image">
          <i class="fa fa-user"></i>
        </div>
        <h1 class="no-margin">{{Auth::user()->name}}</h1>
      </div>
    </div>
  </div>

  <div class="container content">

    <div class="row">
    
      <div class="col-md-3 md-margin-bottom-40">

        <div class="headline"><h2>เมนู</h2></div>

        <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
          <li class="list-group-item">
            <a href="{{URL::to('account')}}"><i class="fa fa-user"></i> หน้าแรกบัญชี</a>
          </li>
          <li class="list-group-item">
            <a href="{{URL::to('account/donation/history')}}"><i class="fa fa-heart"></i> การบริจาค</a>
          </li>
        </ul>

      </div>

      <div class="col-md-9">

        @if($donations->currentPage() <= $donations->lastPage())

          <div class="headline"><h2>การบริจาค</h2></div>

          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>บริจาคให้กับ</th>
                <th>ชื่อมูลนิธิ/โครงการ</th>
                <th>จำนวนที่บริจาค</th>
                <th>วันที่</th>
              </tr>
            </thead>
            <tbody>
              @foreach($donations as $donation)
              <tr>
                <td class="td-width">
                  @if($donation->model == 'Charity')
                    มูลนิธิ
                  @else
                    โครงการ
                  @endif
                </td>
                <td>
                  @if($donation->model == 'Charity')
                    <a href="{{URL::to('charity')}}/{{$donation->model_id}}">{{$donation->charity->name}}</a>
                  @else
                    <a href="{{URL::to('project')}}/{{$donation->model_id}}">{{$donation->project->name}}</a>
                  @endif
                </td>
                <td>
                  {{number_format($donation->amount, 0, '.', ',')}} บาท
                </td>
                <td class="profile">
                  {{$dateLib->covertDateTimeToSting($donation->created_at)}}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          @include('pagination.default2', ['paginator' => $donations])
        
        @endif

      </div>

  </div>

</div>

@stop