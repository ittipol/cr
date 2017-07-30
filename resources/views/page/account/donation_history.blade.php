@extends('page.account.account_menu')
@section('account_content')

@if($donations->currentPage() <= $donations->lastPage())

  <div class="headline"><h2>การสนับสนุน</h2></div>

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
        <td>
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

@else
  <div class="text-center content margin-top-40 margin-bottom-300">
    <h2>ไม่มีข้อมูลการสนับสนุนให้แสดง</h2>
  </div>
@endif

@stop