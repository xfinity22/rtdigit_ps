$('.btnsave').on('click', function(){
						
						var form	=  $(this).attr("form");
						var postdata = $(form).serialize();
						var url		 = $(this).attr("url"); //$("#default_form").attr("action");
						var dialog 	 = $(this).attr("dialog");
						var edit 	 = $(this).attr("edit");
						var reload 	 = $(this).attr("reload");
						
                        $.confirm({
                            title: '<span class="fs-12 bold text-danger">System Notification</span>',
                            content: 'You are about to submit the information. Click Proceed to Confirm',
                            icon: '',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Proceed',
                                    btnClass: 'btn-blue',
                                    action: function(){
										$.ajax({
															url: url,
															data: postdata,
															type: "JSON",
															method: "post",
															beforeSend: function(){
																// $.alert('you clicked on <strong>cancel</strong>');
															},
															success:function(res){
																//console.log(resp);
																//var res = JSON.parse(resp);
																if(res.code=="1"){
																	if(dialog==="Yes"){
																		$.dialog(res.msg);
																	}else{
																		$.alert(res.msg);
																	}
																	
																	if(reload==="Yes"){
																		$('#dtable_').DataTable().ajax.reload();
																	}
																	
																	if(edit==="Yes"){
																		return true;
																	}else{
																		$('#default_form').trigger("reset");
																	}
																	
																}else{														
																	$.alert(res.msg);
																}
															
															},
															error: function(e1, e2, e3){
																 $.alert('Unable to process your request at the moment. Please try again in a short while');
															},
															complete: function(){
																
															}
															
														});	
														
                                  
                                    }
                                },
                                cancel: function(){
                                    //$.alert('Submission has been canceled.');
									return true;
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
					