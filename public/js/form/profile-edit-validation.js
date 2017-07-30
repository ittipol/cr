var Validation = function () {

    return {
        
        //Validation
        initValidation: function () {

	        $("#profile_form").validate({  

            // ignore: '.ignore-field, :hidden, :disabled',
            ignore: ':hidden, :disabled',

	            // Rules for form validation
            rules:
            {
              name:
              {
              	required: true
              },
            },
                                
            // Messages for form validation
            messages:
            {
              name:
              {
                  required: 'ชื่อ นามสกุลห้ามว่าง'
              }
            },    
	            // Do not change code below
            errorPlacement: function(error, element)
            {
              error.insertAfter(element.parent());
            }
	        });
        }

    };
}();