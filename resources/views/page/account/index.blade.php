@extends('page.account.account_menu')
@section('account_content')

<div class="headline"><h2>การสนับสนุนในเดือนนี้</h2></div>

<div class="row margin-bottom-10">
  <div class="col-sm-12 sm-margin-bottom-20">

    <div class="service-block-v3 donation-info-block service-block-u">
      <span class="service-heading">จำนวนเงินที่บริจาค</span>
      <span class="counter">{{$totalAmount}} บาท</span>
    </div>

    @if($donations->exists())
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>บริจาคให้กับ</th>
          <th>ชื่อมูลนิธิ/โครงการ</th>
          <th>จำนวนที่บริจาค</th>
        </tr>
      </thead>
      <tbody>
        @foreach($donations->get() as $donation)
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
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif

  </div>

</div>

@stop