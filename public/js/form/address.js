class Address {
	constructor() {
		this.subDistrictId = null;
		this.districtId = null;
	}

	load() {
		this.bind();
		this.getDistrict($('#province').val());
	}

	bind(){

	  let _this = this;

	  $('#province').on('change',function(){
	    _this.getDistrict($(this).val());
	  });
	} 

	setDistrictId(districtId) {
		this.districtId = districtId;
	}

	getDistrict(provinceId){

	  let _this = this;

	  let request = $.ajax({
	    url: "/api/v1/get_district/"+provinceId,
	    type: "get",
	    dataType:'json'
	  });

	  request.done(function (response, textStatus, jqXHR){
	    $('#district').empty();
	    $.each(response, function(key,value) {
	      let option = $("<option></option>");

  	    if(key == _this.districtId){
  	      option.prop('selected',true);
  	      _this.districtId = null;
  	    }

	      $('#district').append(option.attr("value", key).text(value));
	    });
	    
	  });

	  request.fail(function (jqXHR, textStatus, errorThrown){
	    console.error(
	        "The following error occurred: "+
	        textStatus, errorThrown
	    );
	  });

	}

}