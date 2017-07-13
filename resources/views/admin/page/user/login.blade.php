@extends('admin.layout.main')
@section('content')

<div class="reg-block">
  <div class="reg-block-header">
    <h2>Sign In</h2>
  </div>

  <?php
    echo Form::open(['method' => 'post', 'enctype' => 'multipart/form-data']);
  ?>

  <div class="input-group margin-bottom-20">
    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
    <input type="text" name="email" class="form-control" placeholder="Email">
  </div>
  <div class="input-group margin-bottom-20">
    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
    <input type="password" name="password" class="form-control" placeholder="Password">
  </div>
  <hr>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <?php
        echo Form::submit('Log In', array(
          'class' => 'btn-u btn-block'
        ));
      ?>
    </div>
  </div>

  <?php
    echo Form::close();
  ?>

</div>

@stop