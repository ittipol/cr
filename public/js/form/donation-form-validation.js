var Validation = function () {

    return {
        
        //Validation
        initValidation: function () {

          $.validator.addMethod("regx", function(value, element, regexpr) {          
              return regexpr.test(value);
          }, "");

	        $("#donation_form").validate({  

            // ignore: '.ignore-field, :hidden, :disabled',
            ignore: ':hidden, :disabled',

	            // Rules for form validation
            rules:
            {
              email:
              {
                email: true
              },
              tel_no:
              {
                digits: true
              },
              date:
              {
              	required: true,
                date: true
              },
              amount:
              {
              	required: true,
                regx: /^[0-9]{1,3}(?:,?[0-9]{3})*(?:\.[0-9]{2})?$/,
              },
              receiver_name:
              {
                required: true
              },
              address_no:
              {
                required: true
              },
              sub_district:
              {
                required: true
              },
              post_code:
              {
                required: true,
                digits: true,
                minlength: 5,
                maxlength: 5
              }
            },
                                
            // Messages for form validation
            messages:
            {
              email:
              {
                  email: 'อีเมลไม่ถูกต้อง'
              },
              tel_no:
              {
                  digits: 'หมายเลขโทรศัพท์ไม่ถูกต้อง'
              },
              date:
              {
                required: 'วันที่โอนห้ามว่าง',
                date: 'วันที่โอนไม่ถูกต้อง',
              },
              amount:
              {
                required: 'จำนวนเงินห้ามว่าง',
                regx: 'จำนวนเงินไม่ถูกต้อง'
              },
              receiver_name:
              {
                required: 'ชื่อ นามสกุลผู้รับห้ามว่าง'
              },
              address_no:
              {
                required: 'บ้านเลขที่ห้ามว่าง'
              },
              sub_district:
              {
                required: 'ตำบล/แขวงห้ามว่าง'
              },
              post_code:
              {
                required: 'รหัสไปรษณีย์ห้ามว่าง',
                digits: 'รหัสไปรษณีย์ไม่ถูกต้อง',
                minlength: 'รหัสไปรษณีย์ไม่ถูกต้อง',
                maxlength: 'รหัสไปรษณีย์ไม่ถูกต้อง'
              },
            },    

            // submitHandler: function(form) {

            //   let _form = $(form);


            //   _form.submit();

            // },             
	            
	            // Do not change code below
            errorPlacement: function(error, element)
            {
              error.insertAfter(element.parent());
            }
	        });
        }

    };
}();