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
					uploadCandidatePhoto(_webroot + "candidates/uploadavatar", "jpeg, jpg", "#upload_image_form");
				}
				
				if($(".letters_only_allcaps").length) {
					$(".letters_only_allcaps").mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
						'translation': {
							A: {
								pattern: /[a-zA-Z ]/,  
							},
						 },
						onKeyPress: function (value, event) {
						 event.currentTarget.value = value.toUpperCase();
						}
					});
				}
				
				//showLoadingModal("hide");
				$(".modal-title").html(title);
				//$(".modal-note").html(note);
				if($("#submit_vote").length) {
					
				  $('#submit_vote').on('click', function(){
						
						var form		= $(this).attr("form");
						var postdata 	= $(form).serialize();
						var check_url 	= $(this).attr("check-url"); 
						var url		 	= $(this).attr("url"); //$("#default_form").attr("action");
						
						
						$.ajax({
							url: check_url,
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
								//console.log(resp);
								if ($.isEmptyObject(resp)){
									$.alert("We were unable to process your vote. Please try again");
								}else{
									var res = JSON.parse(resp);
									if(res.resp =="1"){
										//proceed with the confirmation
										$.confirm({
											title: '',
											//title: 'Notification',
											//content: 'You are about to submit the information. Click Confirm to Proceed',
											content: res.msg,
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
																				if(res.resp=="1"){
																					$('#default_form').trigger("reset");
																					$("#view_modal").modal("hide");
																				}
																				
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
											}
										});
									}else{
										$.alert(res.msg);
									}
								}								
							},
							error: function(e1, e2, e3){
								$.alert('Unable to process your request at the moment. Please try again in a short while');
							},
							complete: function(){
								
							}														
						});

                    });
				}
				
			});
			
			
		});
									
});
	
	