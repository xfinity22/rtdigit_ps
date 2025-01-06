$(document).on("hidden.bs.modal", "#view_modal", function(e){
	$('#default_form').trigger("reset");
});
	
	
$(document).on("click", ".modal_view", function(e){
		e.preventDefault();
		var url		 = $(this).attr("href");
		var title    = $(this).attr("title");
		
		//var note    = $(this).attr("note");
		$(".modal-body").html("");
		$(".modal-title").html("");
		//showLoadingModal("show");
		
		
		$.get(url, function(resp){
			$(".modal-body").html(resp).promise().done( function(){
				
		
				if($("#fileuploader").length) {
					saveFormWithImage(_webroot + "categories/uploadavatar", "jpeg, jpg, png", "#upload_image_form");
				}
				
				
				if ($(".letters_only").length) {
					$(".letters_only").mask('Z', {
						translation: {
							'Z': {
								pattern: /[a-zA-Z ]/, 
								recursive: true
							}
						},
						onKeyPress: function(value, event) {
							event.currentTarget.value = value.toUpperCase();
						}
					});
				}

				
			
				$(".modal-title").html(title);
			
				
				  $('.default_save').on('click', function(){
						
						var form	=  $(this).attr("form");
						var postdata = $(form).serialize();
						var url		 = $(this).attr("url"); //$("#default_form").attr("action");
						
                        $.confirm({
                            title: 'Notification',
                            content: 'You are about to submit the information. Click Confirm to Proceed',
                            icon: '',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Confirm',
                                    btnClass: 'btn-primary',
                                    action: function(){
										if(url === ""){
											$(form).submit();
										}else{
														$.ajax({
															url: url,
															data: postdata,
															headers: {
																'X-CSRF-Token' : $('[name="_csrfToken"]').val()
															}, 
															type: "JSON",
															method: "post",
															beforeSend: function(){
																// $.alert('you clicked on <strong>cancel</strong>');
															},
															success:function(resp){
																console.log(resp);
																//var res = JSON.parse(resp);
																if(resp.code=="1"){
																	$('#default_form').trigger("reset");
																	$("#view_modal").modal("hide");
																	$('#dtable_').DataTable().ajax.reload(); 
																}
																
																$.alert(resp.msg);
															
															},
															error: function(e1, e2, e3){
																 $.alert('Unable to process your request at the moment. Please try again in a short while');
															},
															complete: function(){
																
															}
															
														});	
														
													
										}
                                    }
                                },
                                cancel: function(){
                                    $.alert('Submission has been canceled.');
                                },
                               /*  moreButtons: {
                                    text: 'something else',
                                    action: function(){
                                        $.alert('you clicked on <strong>something else</strong>');
                                    }
                                }, */
                            }
                        });
                    });
					
					

			});
			
			
		});
									
});
	

	