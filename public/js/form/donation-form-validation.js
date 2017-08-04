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
              card_owner:
              {
                required: true
              },
              card_number:
              {
                required: true,
                creditcard: true
                // digits: true
              },
              cvc:
              {
                required: true,
                regx: /^[0-9]{3,4}$/
                // digits: true
              },
              card_expire:
              {
                required: true
              },
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
              card_owner:
              {
                required: 'ชื่อเจ้าของบัตรห้ามว่าง'
              },
              card_number:
              {
                required: 'หมายเลขบัตรห้ามว่าง',
                creditcard: 'หมายเลขบัตรไม่ถูกต้อง'
                // digits: 'กรุณาป้อนหมายเลขบัตรด้วยตัวเลข'
              },
              cvc:
              {
                required: 'CVC ห้ามว่าง',
                // digits: 'กรุณาป้อน CVC ด้วยตัวเลข',
                regx: 'CVC ไม่ถูกต้อง'
              },
              card_expire:
              {
                required: 'วันหมดอายุห้ามว่าง'
              },
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