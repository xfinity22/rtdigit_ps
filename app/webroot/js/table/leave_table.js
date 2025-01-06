	
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
					  { data: "type", width: "25%"},
					  { data: "filed", width: "15%"},
					  { data: "_date", width: "15%"},
					  { data: "duration", width: "5%"},
					  { data: "status", width: "15%"},
					  { data: "action", width: "25%"}
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
	
	function showTable(tableid, url){
	
		var table = $(tableid).DataTable({
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
					  { data: "chkbox", width: "5%"},
					  { data: "id", width: "15%"},
					  { data: "filed", width: "10%"},
					  { data: "emp", width: "30%"},
					  { data: "from_date", width: "10%"},
					  { data: "to_date", width: "10%"},
					  { data: "day", width: "10%"},
					  { data: "status", width: "10%"},
					 // { data: "action", width: "10%"}
				  ],
				   // "scrollY": "430px",
					"scrollCollapse": false,
				   "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					"fnDrawCallback": function(){
						leaveStatus();
						mulTiSelCard();
					}
		});
		
		
		 
	}
	
	$(document).on("click", "#btnfilter", function(e){
		var min = $("#imin").val() || 0;
		var max = $("#imax").val() || 0;
		var lstatus = $("#lstatus").val() || 0;
		var itype = $("#itype").val() || 0;
		var ltype = $("#ltype").val() || 0;
		var empid = $("#empid").val() || 0;

		var url = getTheWebroot() + "leaves/indexajax/" + lstatus + "/" + min + "/" + max + "/" + ltype + "/" + empid;
		
		$("#p_table").DataTable().ajax.url(url).load();
		
	});
	
	$(document).on("click", "#btnfilter2", function(e){
		var min = $("#min").val();
		var max = $("#max").val();
		var empid = $("#empid").val();
		var ltype = $("#ltype").val();
		var lstatus = $("#lstatus").val();
		
		$("#p_table").DataTable().ajax.url(getTheWebroot()  + "leaves/eleave/" + empid + "/" + min + "/" + max + "/" + ltype + "/" + lstatus).load();
	});
	
	/*
	$(document).on("change", "#imax", function(e){
		var min = $("#imin").val();
		var max = $("#imax").val();
		var istatus = $("#istatus").val();
		var itype = $("#itype").val();
		
		$("#p_table").DataTable().ajax.url(getTheWebroot()  + "leaves/indexajax/" + istatus + "/" + itype + "/" + min + "/" + max).load();
	});
	*/
	
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
	
	$(document).on("click", ".modal_view", function(e){
			e.preventDefault();
			var url		 = $(this).attr("href");
			var title    = $(this).attr("title");
			var note    = $(this).attr("note");
			$(".modal-body").html("");
			showLoadingModal("show");
			$.get(url, function(resp){
				$(".modal-body").html(resp).promise().done( function(){
					showLoadingModal("hide");
					$(".modal-title").html(title);
					$(".modal-note").html(note);
				});
				
			});
	});
	
	function mulTiSelCard(){
			const selids = [];
			$(".selemp").change( function(){
				var empid = $(this).attr("value");
				if($(this).is(":checked")) {
					selids.push(empid);
				} else {
					selids.splice( $.inArray(empid, selids), 1 );
				}
			});
			
			$("#btnsavechanges").click( function(e){
				var x = confirm("You are about to submit changes. Please click OK to confirm");
				
				var status 	= $("#status").val();
				
				if(x){
						var _selbranch = $("._branch").val();
					
						var jsonString = JSON.stringify(selids);
						$.ajax({
							method		: "POST",
							url			: _webroot + "leaves/saveChanges",
							headers: {
							"X-CSRF-Token" : $('[name="_csrfToken"]').val()
						    },
							data		: {
								data			: jsonString,
								status			: status,
							
							},
							cache		: false,				
							beforeSend	: function(){
								showLoadingModal("show");			
							},
							success		: function(data){
								var _data = JSON.parse(data);
								alert(_data.message);
							
							},
							error		: function(err1, err2, err3){
								alert("Something went wrong. Please try agian");
							},
							complete	: function(){
								showLoadingModal("hide");	
							},				
						});
				}else{
					e.preventDefault();
					return false;
				}
			});
				
	}	
	
	function getEmpLeave(type){
		var ar
		switch(type){
			case 1:
				ar = $("#sl").val();
			break;
			case 2:
				ar = $("#vl").val();
			break;
			case 3:
				ar = $("#spl").val();
			break;
			case 4:
				ar = $("#pl").val();
			break;
			case 5:
				ar = $("#ml").val();
			break;
			case 6:
				ar = $("#bl").val();
			break;
		}
			
		var duce = jQuery.parseJSON(ar);
		
		return duce;
	}
	
				