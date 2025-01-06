$(".btnattach").click( function(){
	var refid = $(this).attr("refid");
	var mid = $(this).attr("mid");
	var code = $(".code").val();
	var desc = $(".description").val();
	
	if(code !=="" && desc !==""){
		$("#fileuploader").removeClass("nodisplay");
		if($("#fileuploader").length){
			uploadImage(_webroot + "members/uploadfiles/" + refid + "/" + mid, "png jpg, jpeg, JPG, JPEG, PNG, pdf", "#default_form", code, desc);
		}
	}else{
		$.alert("Name & Description is required");
	}
});

function uploadImage(_url, types, form, code, desc){

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
				code : code,
				desc : desc,
			},
			dragDrop: true,
			showCancel: false,
			cancelStr: "Remove File",
			uploadStr: "Browse File ( " + types + " )",
			showDone: false,			
			showError: true,				
			showDelete: false,
			showAbort: false,
			extErrorStr: " Is not a valid file. Please upload the file with the following extension(s) - ",
			onSuccess:function(files,data,xhr,pd){
				
				var _data  = JSON.parse(data);	
				if(_data.resp=="1"){		
					$('#default_form').trigger("reset");
					//$.dialog(_data.msg);
					$.alert(_data.msg);	
					//save the data
					
				}else{
					$.alert(_data.msg);					
				}
								
				uploadObj.reset();
				$("#fileuploader").addClass("nodisplay");
				
			},
			onError: function(files,status,errMsg,pd){
				alert("Something went wrong, please try again");
				uploadObj.reset();
			},
			onSelect:function(files){
				
				  $.confirm({
                            title: 'Notification',
                            content: 'You are about to upload the documents. Click Confirm to Proceed',
                            icon: '',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Confirm',
                                    btnClass: 'btn-blue',
                                    action: function(files){
										if($(".ajax-file-upload-error").text() === "") {
											uploadObj.startUpload();
										}else{
											$.alert('You have selected an invalid file.');
											uploadObj.reset();
										}
										
                                    }
                                },
                                cancel: function(){
                                    $.alert('File upload has been canceled.');
									uploadObj.reset();
                                },
                              
                            }
                        }); 
						
						
					
				},
				onSubmit:function(files){
					  
				},
				showProgress: true,
				autoSubmit: false,
				doneStr: "file successfully uploaded",	
				showStatusAfterSuccess: false,
				showFileCounter: false,
				showFileSize: false,
				showPreview: true,		
				sequential:false,
				sequentialCount:1
			});
							
			$("#cancelupload").click( function(){
				uploadObj.reset();
			});

			$('.bbtnsave').on('click', function(){
						
							var form	=  $(this).attr("form");
							var postdata = $(form).serialize();
							var url		 = $(this).attr("url"); //$("#default_form").attr("action");
							var dialog 	 = $(this).attr("dialog");
							
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
										action: function(files){
											if($(".ajax-file-upload-error").text() === "") {
												uploadObj.startUpload();
											}else{
												$.alert('You have selected an invalid file.');
												uploadObj.reset();
											}
											
										}
									},
									cancel: function(){
										//$.alert('Submission has been canceled.');
										return true;
									},
								   
								}
							});
						});
	}