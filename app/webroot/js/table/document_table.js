	
	function showIndexTable(tableid, url){
		$(tableid).DataTable({
				   dom: "Blfrtip",
				   buttons: [
						//'copy', 
						"csv", "excel"
				   ],
				   "searching": false,
				  "processing"		: true,
				 "serverSide"		: true,
				  "serverMethod"	: "post",
				   "order": [[ 0, "desc" ]],
				  "ajax": {
					  "url"			: url,
					  "method"		: "post",
					  "headers": {
						'X-CSRF-Token' : $('[name="_csrfToken"]').val()
					  },
				  },
				  columnDefs: [
					{bSortable: false, targets: [0]},
				
				  ],
				  "columns": [
					  { data: "id", width: "5%"},
					  { data: "filed", width: "5%"},
					  { data: "from", width: "15%"},
					  { data: "to", width: "15%"},
					  { data: "description", width: "15%"},
					  { data: "status", width: "15%"},
					  { data: "approved_by", width: "15%"},
					  { data: "rejected_by", width: "15%"},
					  { data: "modified", width: "15%"},
					  { data: "action", width: "15%"}
				  ],
				   // "scrollY": "430px",
					"scrollCollapse": false,
				   "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					"fnDrawCallback": function(){
						leaveStatus();
					}
		});
	}
	
	$(document).on("click", "#afile", function(e){
		var empid = $("#empid").val();
		var desc = $("#desc").val();
	
		$("#upload_wrap").removeClass("nodisplay");
		
		uploadDocument(_webroot + "documents/proceedUploadPhoto/" + empid, "png, jpeg, jpg", desc);
	});
	
	$(document).on("change", "#max", function(e){
		var min = $("#min").val();
		var max = $("#max").val();
		var empid = $("#empid").val();
		
		$("#p_table").DataTable().ajax.url(getTheWebroot()  + "leaves/eleave/" + empid + "/" + min + "/" + max).load();
	});
	
	function leaveStatus(){
		$(".approve, .reject").on("click", function(e){	
			var _conf = confirm("You are about to update leave application status. Please click OK to confirm.");
			e.preventDefault();			
			if(_conf){		
				var form	=  $("#default_form");
				var url		 = $(this).attr("href"); //$("#default_form").attr("action");
				
							
				$(this).prop("disabled", true);	
						
				showLoading("show");
							//save the data then redirect for update
				$.post(url, $(form).serialize(), function(resp){
					var resp = JSON.parse(resp);
					alert(resp.msg);
					showLoading("hide");
				});
			}else{
				
				return false;
			}
		});
	}
	

	function uploadDocument(_url, types, form){
		
		
		$("#uploadbtn").prop("disabled", true);
		var uploadObj  = $("#imagefile").uploadFile({
			url: _url,
			headers: {
					'X-CSRF-Token' : $('[name="_csrfToken"]').val()
			},
			maxFileCount: 1,
			allowedTypes: types,
			//allowedTypes: "png, jpg, jpeg, JPG, JPEG, PNG",
			fileName:"imagefile",
			formData: {
				postdata : form
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
				showLoading("hide");
				$("#upload_wrap").addClass("nodisplay");				
				//console.log(data);
				var _data  = JSON.parse(data);	
				if(_data.respcode=="1"){		
					$("#upload_response").html(_data.data);
				}else{
					alert(_data.message);					
				}
								
				uploadObj.reset();
				//$("#uploadbtn").prop("disabled", false);
			},
			onError: function(files,status,errMsg,pd){
				showLoading("hide");
				//$("#uploadbtn").addClass("disabled");
				alert("Something went wrong, please try again");
				uploadObj.reset();
				$("#uploadbtn").prop("disabled", true);
				//$("#uploadbtn").prop("disabled", false);
			},
			onSelect:function(files){
				/*setTimeout( function(){
				if($(".ajax-file-upload-error").text() === "") {
					if(files[0].type==="application/vnd.ms-excel" || files[0].type===""){					
					$(".response_message").html("Continue uploading " + files[0].name + "?. The system will proceed parsing the data, please confirm.");
					$("#response_modal__").modal("show");
						$(".message_modal_text_nc").html("");
					}else{
						_responseMsg("You have uploaded an invalid file. Please check and try again.");		
					uploadObj.reset();
					}
				}
				}, 100);*/
				//$("#uploadbtn").removeClass("disabled");
				$("#uploadbtn").prop("disabled", false);
				uploadObj.reset();
			},
			onSubmit:function(files){
				showLoading("show");
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
						
		$("#uploadbtn").click( function(){				
			showLoading("show");
			uploadObj.startUpload();
			$(this).prop("disabled", true);
		});	

		$("#cancelupload").click( function(){
			uploadObj.reset();
		});
					
	}
		
		