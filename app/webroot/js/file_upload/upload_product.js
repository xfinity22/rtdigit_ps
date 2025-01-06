function saveFormWithImage(_url, types, form){

		var postdata = $(form).serialize();
		//$("#uploadbtn").prop("disabled", true);
		var uploadObj  = $("#fileuploader").uploadFile({
			url: _url,
			headers: {
				'X-CSRF-Token' : $('[name="_csrfToken"]').val()
			}, 
			maxFileCount: 1,
			allowedTypes: types,
			//allowedTypes: "png, jpg, jpeg, JPG, JPEG, PNG",
			fileName:"defaultform",
			formData: {
				refid 	 : $(".refid").val()
			},
			dragDrop: true,
			showCancel: true,
			cancelStr: "Change Image",
			uploadStr: "Product Image ( " + types + " )",
			showDone: false,			
			showError: true,				
			showDelete: false,			
			showAbort: false,
			extErrorStr: " Is not a valid file. Please upload the file with the following extension(s) - ",
			onSuccess:function(files,data,xhr,pd){	
				var _data  = JSON.parse(data);	
				if(_data.respcode=="1"){	
					uploadObj.reset();
				}else{
					$.alert(_data.message);		
				}		
				
			},
			onError: function(files,status,errMsg,pd){
				alert("Something went wrong, please try again");
				uploadObj.reset();
			},
			onSelect:function(files){
				if($(".ajax-file-upload-error").text() === "") {
						
					$('.default_save_with_image').on('click', function(){
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
										//save the data
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
													$(form).trigger("reset");
													$("#view_modal").modal("hide");
													//upload the image
													uploadObj.startUpload();			
												}
																					
												$.alert(res.msg);
																				
												},
											error: function(e1, e2, e3){
													$.alert('Unable to process your request at the moment. Please try again in a short while');
											},
											complete: function(){															
											}
																				
										});	
										//end of saving data	
                                    }
                                },
                                cancel: function(){
                                    $.alert('Submission has been canceled.');
                                },
                             
                            }
                        });
                    });	
				}else{
					$.alert('You have selected an invalid file.');
					uploadObj.reset();
				}
			},
			onSubmit:function(files){
				
			},
			showProgress: true,
			autoSubmit: false,
			doneStr: "file successfully uploaded",	
			showStatusAfterSuccess: false,
			showFileCounter: false,
			showFileSize: true,
			showPreview: true,		
			sequential:false,
			sequentialCount:1
		});
						
		$("#cancelupload").click( function(){
			uploadObj.reset();
		});
		
		
}