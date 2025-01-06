
$(document).on("hidden.bs.modal", "#view_modal", function(e){
	$(".member_no").prop("disabled", false).val("").focus();
	$(".modal-body").html("");
	//showLoading("hide");
});
	
$(document).on("shown.bs.modal", "#view_modal", function(e){
		$(".member_no").prop("disabled", true);
		var cid = $(".member_no").val();
		
		$(".modal-body").html("");
		$.get(_webroot + "users/qrcodefinder/" + cid, function(resp){
			$(".modal-body").html(resp).promise().done( function(){
				
			});
		});			
});
					

	