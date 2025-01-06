$(document).ready( function(){


				if($("#fileuploader").length) {
					saveFormWithImage(_webroot + "settings/uploadavatar", "jpeg, jpg, png", "#upload_image_form");
				}
				
				 
				if($(".letters_only_allcaps").length) {
					$(".letters_only_allcaps").mask('Z', {
						'translation': {
							Z: {
								pattern: /[a-zA-Z ]/,  
							},
						 },
						onKeyPress: function (value, event) {
						 event.currentTarget.value = value.toUpperCase();
						}
					});
				}
				
				
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
																
																var res = JSON.parse(resp);
																
																
																$.alert(res.msg);
															
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

	
	