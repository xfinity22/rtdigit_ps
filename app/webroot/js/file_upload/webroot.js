function getTheWebroot(){
	return ("https:"==document.location.protocol?"https://":"http://") + document.location.hostname + "/SEMPCO/dashboard/admin/";
}

function getTheWebrootMember(){
	return ("https:"==document.location.protocol?"https://":"http://") + document.location.hostname + "/SEMPCO/dashboard/member/";
}

function fileUploadWebroot(){
	return ("https:"==document.location.protocol?"https://":"http://") + document.location.hostname + "/SEMPCO/dashboard";
}


var _webroot = getTheWebroot();
var _webrootmember = getTheWebrootMember();
var _filewebroot = fileUploadWebroot();

	

function showLoading(type){
	switch(type){
		case "show":
			$(".loading").loading({
				message: "Fetching Info..."
			});
		break;
		case "hide":
			$(".loading").loading("stop");
		break;
		default:
		
		break;
	}
	
}

	
function resetAccount(url){
	 $.confirm({
        title: 'Notification',
                            content: 'You are about to submit the changes. Click Proceed to Confirm',
                            icon: '',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Proceed',
                                    btnClass: 'btn-blue',
                                    action: function(){
										$.get(url, function(resp){
											if ($.isEmptyObject(resp)){
												$.alert('Unable to process your request. Please try again in a short while.');
											}else{
												var res = JSON.parse(resp);
												$.alert(res.message);
											}
										 });
													
                                    }
                                },
                                cancel: function(){
                                    $.alert('Submission has been canceled.');
                                },
                            }
                        });
						
}
	
    /* function getCityList(){	
			$(".loc_province").change( function(){
				showLoading("show");
				
					
				//$(".sitio, .address").val("");
				var _sel = $(".loc_region option:selected").val();
				var _sel_pr = $(".loc_province option:selected").val();
				var _url = "";
				if(_sel===""){
					$(".loc_city").empty();
					$(".loc_barangay").empty();
					alert("Please select a Province.");
					showLoading("hide");
				
				}else{
					
					_url = _webroot + "cities/getList/" + _sel + "/" + _sel_pr;
					showLoading("hide");
					getOptionList(_url, ".loc_city");
					$(".loc_barangay").empty();
					getBarangayList();
					//getLocName(_webroot + "provinces/getAddressName/" + _sel_pr, ".address");
				}

			});
	}

	function getBarangayList(){
			$(".loc_city").change( function(){
				showLoading("show");
				//$(".sitio, .address").val("");
				var _sel = $(".loc_region option:selected").val();
				var _sel_pr = $(".loc_province option:selected").val();
				var _sel_ct = $(".loc_city option:selected").val();
				var _url = "";
				if(_sel===""){
					alert("Please select a City.");
					showLoading("hide");
				}else{
					_url = _webroot + "barangays/getList/" + _sel + "/" + _sel_pr + "/" + _sel_ct;
					showLoading("hide");
					getOptionList(_url, ".loc_barangay");
					//generateAddress();
					//getLocName(_webroot + "cities/getAddressName/" + _sel_ct, ".address");
				}
			});
	}
	 */
	