@extends('page.account.account_menu')
@section('account_content')

<div class="headline"><h2>แก้ไขโปรไฟล์</h2></div>

@include('component.form_error') 

{{Form::model($data, ['id' => 'profile_form', 'class' => 'sky-form sky-changes-3', 'method' => 'PATCH', 'enctype' => 'multipart/form-data'])}}

  <div class="row">
    <section class="col col-md-12">
      <label class="profile-image">
        <input id="profile_image_input" class="profile-image-input" type="file" name="profile_image">
        <i class="fa fa-user"></i>
        @if(empty($data->avatar))
        <div id="profile_image_preview" class="profile-image-preview"></div>
        <a href="javascript:void(0);" id="profile_image_remove_btn" class="image-remove-btn">×</a>
        @else
        <div id="profile_image_preview" class="profile-image-preview" style="background-color:#fff; background-image: url({{URL::to('avatar')}}/{{$data->avatar}});"></div>
        <a href="javascript:void(0);" id="profile_image_remove_btn" class="image-remove-btn" style="display:block;">×</a>
        @endif
        <p class="error-message"></p>
        <div class="progress-bar">
          <div class="status"></div>
        </div>
      </label>
      <p class="profile-image-message"></p>
    </section>
  </div>

  <div class="row">
    <section class="col col-md-12">
      <label class="label">ชื่อ นามสกุล</label>
      <label class="input">
        {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'ชื่อ นามสกุล','autocomplete' => 'off'))}}
      </label>
    </section>
  </div>

  <input type="hidden" id="remove" name="remove">

  {{Form::submit('บันทึก', array('class' => 'btn-u btn-u-blue'))}}

{{Form::close()}}

<script src="/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/js/form/profile-edit-validation.js"></script>

<script type="text/javascript">
  
  class ProfileImage {

    constructor() {}

    load() {
      this.bind();
    }

    bind() {

      let _this = this;

      $('#profile_image_input').on('change', function(e){
        e.preventDefault();
        return false
      });

      $('#profile_image_input').on('change', function(){
        _this.preview(this);
      });

      $('#profile_image_remove_btn').on('click',function(){
        _this.removePreview(this);
      });

    }

    preview(input){

      if (input.files && input.files[0]) {

        // let parent = $(input).parent();

        if(!window.File && window.FileReader && window.FileList && window.Blob){ //if browser doesn't supports File API
          alert("Your browser does not support new File API! Please upgrade.");
          return false;
        }else{
          let fileSize = input.files[0].size;
          let mimeType = input.files[0].type;

          if(!this.checkImageType(mimeType) || !this.checkImageSize(fileSize)) {
            $('.profile-image-message').css('display','block').text('ไม่รองรับไฟล์นี้');
          }else {

            $('.profile-image-message').css('display','none').text('');
            $('#profile_image_remove_btn').css('display','block');

            let reader = new FileReader();

            reader.onload = function (e) {
              $('#profile_image_preview').css('background-image', 'url(' + e.target.result + ')').css('background-color','#fff');
            }

            reader.readAsDataURL(input.files[0]);

          }
        }

      }

    }

    removePreview(elem){
      $('#profile_image_input').val('');
      $('#profile_image_remove_btn').css('display','none');
      $('#profile_image_preview').css({
        'background-image': 'none',
        'background-color': 'transparent'
      });
      $('#remove').val(1);
    }

    checkImageType(type){
      let allowedFileTypes = ['image/jpg','image/jpeg','image/png', 'image/pjpeg'];

      let allowed = false;

      for (let i = 0; i < allowedFileTypes.length; i++) {
        if(type == allowedFileTypes[i]){
          allowed = true;
          break;            
        }
      };

      return allowed;
    }

    checkImageSize(size) {
      // 4MB
      let maxSize = 4194304;

      let allowed = false;

      if(size <= maxSize){
        allowed = true;
      }

      return allowed;
    }

  }

  $(document).ready(function(){

    Validation.initValidation();

    const profileImage = new ProfileImage();
    profileImage.load();
  });

</script>

@stop