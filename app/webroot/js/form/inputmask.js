function initInput(){
	$(".letters_only").mask('A',{
				translation:  {'A': {pattern: /[a-zA-Z ]/, recursive: true}},
				onKeyPress: function (value, event) {
				 event.currentTarget.value = value.toUpperCase();
				}
			}
		);

	$(".numbers_only").mask('0',{
				translation:  {'0': {pattern: /[0-9]/, recursive: true}},
			}
		);

	$(".mixed, .numbers_and_letters").mask('Z',{
				translation:  {'Z': {pattern: /[a-zA-Z0-9 ]/, recursive: true}},
				onKeyPress: function (value, event) {
				 event.currentTarget.value = value.toUpperCase();
				}
			}
		);

	$('.old_code').mask('0000000000000');
	$('.qty').mask('0000');
	$('.money, .amount').mask('999999999.99');
	$('.percentage').mask('999999999.999');
	/* $('.money, .amount').mask(function(val) {
		  // Determine the mask to use based on the input length
		  let masks = ['#,##0.99', '##,##0.99', '###,##0.99', '####,##0.99', '##,###,##0.99', '###,###,##0.99', '####,###,##0.99', '##,####,###,##0.99'];
		  let digits = val.replace(/\D/g, '').length;
		  let mask = masks[0];
		  if (digits > 9) {
			mask = masks[masks.length - 1];
		  } else if (digits > 6) {
			mask = masks[(digits % 3) + 3];
		  } else if (digits > 3) {
			mask = masks[digits % 3];
		  }
		  return mask;
		}, {
		  reverse: true,
		  onKeyPress: function(val, e, field, options) {
			field.mask(function(val) {
			  let masks = ['#,##0.99', '##,##0.99', '###,##0.99', '####,##0.99', '##,###,##0.99', '###,###,##0.99', '####,###,##0.99', '##,####,###,##0.99'];
			  let digits = val.replace(/\D/g, '').length;
			  let mask = masks[0];
			  if (digits > 9) {
				mask = masks[masks.length - 1];
			  } else if (digits > 6) {
				mask = masks[(digits % 3) + 3];
			  } else if (digits > 3) {
				mask = masks[digits % 3];
			  }
			  return mask;
			}, options);
		  }
		}); */



	$(".mobile").mask("09999999999", {placeholder: "__________"});
	$(".otp").mask("999999", {placeholder: "__ __ __ __ __ __"});
	$('.date').mask("00/00/0000", {selectOnFocus: true});
	
	$("input").on("focus", function() {
		$(this).select();
	});

}


initInput();



function getDivisionList(){

			$(".region").change( function(){
				
				//showLoading("show");
				//$(".sitio, .address").val("");
				var _sel = $(".region option:selected").val();
			
				var _url = "";
				if(_sel===""){
					$(".division").empty();
					$(".station").empty();
					alert("Please select a Region.");
					//showLoading("hide");
				}else{
					_url = _webroot + "divisions/getList/" + _sel;
					//showLoading("hide");
					getOptionList(_url, '.division');
					getStationList();
				}
			});
	}
	
function getStationList(){
			$(".division").change( function(){
				//showLoading("show");
				//$(".sitio, .address").val("");
				var div = $(".division option:selected").val();
				var reg = $(".region option:selected").val();
				
				var _url = "";
				if(div==="" || reg===""){
					$(".division").empty();
					$(".station").empty();
					alert("Please select a Region & Division");
				
				}else{
					_url = _webroot + "stations/getList/" + reg + "/" + div;
					//showLoading("hide");
					getOptionList(_url, '.station')
				}
			});
	}
	
	
	function getOptionList(_url, optionid){
		
		
		$.ajax({
				method		: "GET",
				url			: _url,
				cache		: false,				
				beforeSend	: function(){
					//_loading_message("show");
				},
				success		: function(resp){
							_data = JSON.parse(resp);
							$(optionid).empty();
							if(_data.status===200){
								$(optionid).append($("<option>", { 
										value: "",
										text : "--Choose"
								}));
								
								$.each(_data.data, function (i, item) {
									
									$(optionid).append($("<option>", { 
										value: item.id,
										text : item.name 
									}));
									
								});
								
								//var tempregCode = $(".tempregCode").val();
								//if(tempregCode!==""){
									//$('.loc_region > [value="' + tempregCode + '"]').attr("selected", "true");	
								//}
								
							}else{
								
								alert(_data.message);
							}
						
				},
				error		: function(err1, err2, err3){
					//_error_message("show", "Opps! something went wrong, please try again.");
					alert("Opps! something went wrong, please try again.");
				
				},
				complete	: function(){
					//_loading_message("hide");
					
				},				
			});	
	}