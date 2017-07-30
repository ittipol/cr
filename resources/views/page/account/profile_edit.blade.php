@extends('page.account.account_menu')
@section('account_content')

<div class="headline"><h2>แก้ไขโปรไฟล์</h2></div>

@include('component.form_error') 

{{Form::model($data, ['id' => 'main_form', 'method' => 'PATCH', 'enctype' => 'multipart/form-data'])}}

  <div class="form-group">
    <label class="profile-image">
      <input id="profile_image_input" class="profile-image-input" type="file">
      <i class="fa fa-user"></i>
      <div id="profile_image_preview" class="profile-image-preview"></div>
      <a href="javascript:void(0);" id="profile_image_remove_btn" class="image-remove-btn">×</a>
      <p class="error-message"></p>
      <div class="progress-bar">
        <div class="status"></div>
      </div>
    </label>
    <p class="profile-image-message"></p>
  </div>

  <div class="form-group">
    {{Form::label('name', 'ชื่อ นามสกุล')}}
    {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'ชื่อ นามสกุล','autocomplete' => 'off'))}}
  </div>

  {{Form::submit('บันทึก', array('class' => 'btn-u btn-u-blue'))}}

{{Form::close()}}

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
              $('#profile_image_preview').css('background-image', 'url(' + e.target.result + ')');
            }

            reader.readAsDataURL(input.files[0]);

            // let formData = new FormData();
            // formData.append('_token', $('input[name="_token"]').val());  
            // formData.append('image', input.files[0]);

            // this.uploadImage(parent,input,formData);

          }
        }

      }

    }

    removePreview(elem){
      // let parent = $(elem).parent();

      $('#profile_image_input').val('');
      $('#profile_image_remove_btn').css('display','none');
      $('#profile_image_preview').css('background-image', 'none');
    }

    uploadImage(parent,input,data) {

      let _this = this;
      
      let id = input.getAttribute('id');

      let request = $.ajax({
        url: "/upload_image",
        type: "POST",
        data: data,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function( xhr ) {

          $('#main_form input[type="submit"]').prop('disabled','disabled').addClass('disabled');    

          $(parent).parent().find('.status').css('width','0%');
          parent.parent().find('.progress-bar').css('display','block');

        },
        mimeType:"multipart/form-data",
        xhr: function(){
    
          let xhr = $.ajaxSettings.xhr();
          if (xhr.upload) {
            xhr.upload.addEventListener('progress', function(event) {
              let percent = 0;
              let position = event.loaded || event.position;
              let total = event.total;
              if (event.lengthComputable) {
                percent = Math.ceil(position / total * 100);
              }
        
              parent.parent().find('.status').css('width',percent +'%');
            }, true);
          }
          return xhr;
        }
      });

      request.done(function (response, textStatus, jqXHR){

        if(response.success){

          parent.find('div.preview-image').fadeIn(450);
          parent.find('a').css('display','block');
          parent.parent().find('.progress-bar').css('display','none');

          let key = parent.prop('id').split('_');

          _this.createAddedImage(parent,key[0],key[1],response.filename);

          setTimeout(function(){
            _this.inputDisable.splice(_this.inputDisable.indexOf(input.id),1);

            if(_this.inputDisable.length == 0) {
              $('#main_form input[type="submit"]').prop('disabled',false).removeClass('disabled');
            }

          },350);
          
        }else{

          if(typeof response.message == 'object') {
            const notificationBottom = new NotificationBottom();
            notificationBottom.setTitle('เกิดข้อผิดพลาด');
            notificationBottom.setType('error');
            notificationBottom.display();
          }

        }
        
      });

      request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
      });

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
    const profileImage = new ProfileImage();
    profileImage.load();
  });

</script>

@stop