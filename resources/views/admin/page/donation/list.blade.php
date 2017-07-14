@extends('admin.layout.main')
@section('content')

<h1 class="margin-bottom-20">
  การบริจาค
</h1>

@if(!empty($donations))

  <div class="panel panel-red margin-bottom-40">
    <!-- <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-user"></i> มูลนิธิ</h3>
    </div> -->
    <div class="panel-body">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>บริจาคไปยัง</th>
            <th>ชื่อผู้บริจาค</th>
            <th>จำนวนเงินบริจาค</th>
            <th>ต้องการรางวัล</th>
            <th>ตรวจสอบแล้ว</th>
            <th>เครื่องมือ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($donations as $data)
            <div>
              <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->model}}</td>
                <td>@if(!empty($data->donator_name)) {{$data->donator_name}} @else ไม่ออกนาม @endif</td>
                <td>{{$data->amount}}</td>
                <td>@if($data->get_reward) ต้องการ @else ไม่ต้องการ @endif</td>
                <td>@if($data->verified) ตรจวสอบแล้ว @else ยังไม่ได้ตรวจสอบ @endif</td>
                <td>
                  <a href="{{URL::to('admin/donation/detail')}}/{{$data->id}}" class="btn btn-warning btn-xs">detail</a>
                  <a href="{{URL::to('admin/donation/edit')}}/{{$data->id}}" class="btn btn-warning btn-xs">Edit</a>
                  <a href="{{URL::to('admin/donation/delete')}}/{{$data->id}}" class="btn btn-danger btn-xs">Delete</a>
                </td>
              </tr>
            </div>      
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@include('pagination.default', ['paginator' => $donations])

@endif

@stop