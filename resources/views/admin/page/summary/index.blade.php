@extends('admin.layout.main')
@section('content')

  <h1 class="margin-bottom-20">
    สรุปยอด
  </h1>

  {{Form::open(['id' => 'main_form','method' => 'get', 'enctype' => 'multipart/form-data'])}}
    
    <div class="alert alert-danger fade in">
      <h4>หมายเหตุ</h4>
      <p>
        * ค้าหารายวันให้ป้อนทั้ง 3 ช่อง วัน เดือน ปี
        <br>
        * ค้าหารายเดือนให้ป้อน เดือนและปี
      </p>
    </div>

    <div class="row">
      <div class="col-md-10">
        <div class="row">
          <section class="col-md-4">
            <div class="form-group">
              {{Form::text('date', null, array('class' => 'form-control', 'placeholder' => 'วันที่ (ป้อน 1-31)','autocomplete' => 'off'))}}
            </div>
          </section>
          <section class="col-md-4">
            <div class="form-group">
              {{Form::text('month', null, array('class' => 'form-control', 'placeholder' => 'เดือน (ป้อน 1-12)','autocomplete' => 'off'))}}
            </div>
          </section>
          <section class="col-md-4">
            <div class="form-group">
              {{Form::text('year', null, array('class' => 'form-control', 'placeholder' => 'ปี (ป้อนปีค.ศ.)','autocomplete' => 'off'))}}
            </div>
          </section>
        </div>
      </div>
      <div class="col-md-2">
        {{Form::submit('สรุปยอด', array('class' => 'btn-u btn-u-blue'))}}
      </div>
    </div>

  {{Form::close()}}

  <hr>

  @if(!empty($donations))

    <?php
      $summartAmount = array(
        'total' => 0,
        'deducted' => 0,
        'balance' => 0 
      );
    ?>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ชื่อมูลนิธิ/โครงการ</th>
          <th>ยอดรวม</th>
          <th>ยอดที่หัก</th>
          <th>ยอดส่งมอบ</th>
        </tr>
      </thead>
      <tbody>
        @foreach($donations as $donation)
        <?php
          $deductedAmount =  $donation->totalAmount * 0.3;
          $balance =  $donation->totalAmount - $deductedAmount;

          $summartAmount['total'] += $donation->totalAmount;
          $summartAmount['deducted'] += $deductedAmount;
          $summartAmount['balance'] += $balance;
        ?>
        <tr>
          <td>
            @if($donation->model == 'Charity')
              <a href="{{URL::to('charity')}}/{{$donation->model_id}}">{{$donation->charity->name}}</a>
            @else
              <a href="{{URL::to('project')}}/{{$donation->model_id}}">{{$donation->project->name}}</a>
            @endif
          </td>
          <td>
            {{$donation->totalAmount}}
          </td>
          <td>
            {{$deductedAmount}}
          </td>
          <td>
            {{$balance}}
          </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td>สรุป</td>
          <td>{{$summartAmount['total']}}</td>
          <td>{{$summartAmount['deducted']}}</td>
          <td>{{$summartAmount['balance']}}</td>
        </tr>
      </tfoot>
    </table>

  @endif

@stop