var Validation = function () {

    return {
        
        //Validation
        initValidation: function () {

	        $("#register_form").validate({  

            // ignore: '.ignore-field, :hidden, :disabled',
            ignore: ':hidden, :disabled',

	            // Rules for form validation
            rules:
            {
              name:
              {
                required: true
              },
              email:
              {
                required: true,
                email: true
              },
              password:
              {
              	required: true,
                minlength: 4,
              },
              password_confirmation:
              {
                equalTo : '#password_field'
              }
            },
                                
            // Messages for form validation
            messages:
            {
              name:
              {
                required: 'ชื่อ นามสกุลห้ามว่าง',
              },
              email:
              {
                required: 'อีเมลห้ามว่าง',
                email: 'อีเมลไม่ถูกต้อง'
              },
              password:
              {
                required: 'รหัสผ่านห้ามว่าง',
                minlength: 'รัสผ่านต้องมีอย่างน้อย 4 อักขระ',
              },
              password_confirmation:
              {
                equalTo: 'รหัสผ่านไม่ตรงกัน'
              }
            },    

            // submitHandler: function(form) {},             
	            
	            // Do not change code below
            errorPlacement: function(error, element)
            {
              error.insertAfter(element.parent());
            }
	        });
        }

    };
}();