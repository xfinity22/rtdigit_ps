	
	
	function showIndexTable(tableid, url, assignee){
		$(tableid).DataTable({
				   dom: "Blfrtip",
				   buttons: [
						//'copy', 
						//"csv", "excel"
				   ],
				  "processing"		: true,
				 "serverSide"		: true,
				  "serverMethod"	: "post",
				  "ajax": {
					  "url"			: url,
					  "method"		: "post",
					  "headers": {
						'X-CSRF-Token' : $('[name="_csrfToken"]').val()
					  },
				  },
				  columnDefs: [
					{bSortable: false, targets: [0, 1, 2, 3]},
				
				  ],
				  "columns": [
					  { data: "id", width: "5%"},
					  { data: "fname", width: "30%"},
					  { data: "mname", width: "30%"},
					  { data: "lname", width: "35%"}
				  ],
				   // "scrollY": "430px",
					"scrollCollapse": false,
				   "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					"initComplete": function( settings, json ) {
						mulTiSelCard();
						submitChanges();
					},	
					"fnDrawCallback": function(){
						//mulTiSelCard(assignee);
						//showLoadingModal("show");		
						disSelectMulti();
					}
		});
	}

	
	function disSelectMulti(){
		var _selids = $("#selids").val();
		var snames
		
		if(_selids.length > 0){
			_selids = JSON.parse(_selids);
			$.each(_selids, function(key, value){
				//$("#check_" + value).trigger('click');
				$("#check_" + value).prop('checked', true);
			});
		}
		
		/*else{
			switch(assignee){
				case "supervisor":
					var supervisor = $(".supervisor_id").val();
					var sname 	= $(".supervisor_name").val();
					if(supervisor.length > 0 && sname.length > 0){
						_selids = JSON.parse(supervisor);
						//snames = JSON.parse(sname);
						
						$("#selids").val(supervisor);
						$("#ename").val(sname);
					
						$.each(_selids, function(key, value){
							//$("#check_" + selids).trigger('click');
							$("#check_" + value).prop('checked', true);
						});
					}
				break;
				case "manager":
					var manager = $(".manager_id").val();
					if(manager.length > 0){
						selids = JSON.parse(manager);
					}

				break;
				case "team_leader":
					var tl = $(".team_leader_id").val();
					if(tl.length > 0){
						selids = JSON.parse(tl);
					}
				break;
				case "team_members":
					var tm = $(".team_members_id").val();
					if(tm.length > 0){
						selids = JSON.parse(tm);
					}
				break;
				
			}
			
		}*/
		
	}
	
	function mulTiSelCard(){
			const selids = [];
			const enames = [];
			var jsonString 
			var empnames 
			/*var _sellids = $("#selids").val();
			var _ename = $("#ename").val();
			
			if(_sellids.length > 0){
				selids.push(JSON.parse(_sellids));
				enames.push(JSON.parse(_ename));
			}*/

			$(document).on("change",".selemp",function (){
			//$(".selemp").change( function(){
				var empid = $(this).attr("value");
				var ename = $(this).attr("ename");
				
				if($(this).is(":checked")) {
					selids.push(empid);
					enames.push(ename);
				} else {
					selids.splice( $.inArray(empid, selids), 1 );
					enames.splice( $.inArray(ename, enames), 1 );
				}
				jsonString = JSON.stringify(selids);
				empnames = JSON.stringify(enames);
				
				$("#selids").val(jsonString);
				$("#ename").val(empnames);
			});
	}
	
	function submitChanges(){
		
		$(document).on("click", ".ctnbtn", function(e){
				var jsonString = $("#selids").val();
				var assignee = $("#assignee").val();
				var ename = $("#ename").val();
				var seln1
				var seln = 0;
				var enames
				if(jsonString!==""){
				  seln1 = JSON.parse(jsonString);
				  seln = seln1.length;
				  enames = JSON.parse(ename);
				}
				
				
				switch(assignee){
					case "supervisor":
						if(seln > 1){
							//alert("");
							$(".modal-note").html("Please choose only one (1) supervisor");
						}else{
							$(".supervisor_name").val(enames);
							$(".supervisor_id").val(jsonString);
							$(".modal_close").click();
						}
					break;
					case "manager":
						if(seln > 1){
							$(".modal-note").html("Please choose only one (1) manager");
						}else{
							$(".manager_name").val(enames);
							$(".manager_id").val(jsonString);
							$(".modal_close").click();
						}
					break;
					case "team_leader":
						if(seln > 1){
							$(".modal-note").html("Please choose only one (1) team leader");
						}else{
							$(".team_leader_name").val(enames);
							$(".team_leader_id").val(jsonString);
							$(".modal_close").click();
						}
					break;
					case "team_members":
						if(seln <= 0){
							$(".modal-note").html("Please choose at least one (1) member.");
						}else{
							//alert(enames);
							$(".team_members_name").val(enames);
							$(".team_members_id").val(jsonString);
							$(".modal_close").click();
						}
					break;
					default:
					break;
				}
				
		});
	}
	
	function saveChanges(){
		
		$(document).on("click", ".btnsavechange", function(e){
				var x = confirm("You are about to submit changes. Please click OK to confirm");
				
				var office_status 	= $("#office_status").val();
				var emp_status 		= $("#emp_status").val();
				var emp_type 		= $("#emp_type").val();
				var account_status 	= $("#account_status").val();
				
				if(x){
						var _selbranch = $("._branch").val();
					
						
						$.ajax({
							method		: "POST",
							url			: _webroot + "employees/saveChanges",
							headers: {
							"X-CSRF-Token" : $('[name="_csrfToken"]').val()
						    },
							data		: {
								data			: jsonString,
								emp_status		: emp_status,
								office_status	: office_status,
								emp_type		: emp_type,
								account_status	: account_status
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
	
	
	function teamTable(tableid, url, assignee){
		$(tableid).DataTable({
				   dom: "Blfrtip",
				   buttons: [
						//'copy', 
						//"csv", "excel"
				   ],
				  "processing"		: true,
				 "serverSide"		: true,
				  "serverMethod"	: "post",
				  "ajax": {
					  "url"			: url,
					  "method"		: "post",
					  "headers": {
						'X-CSRF-Token' : $('[name="_csrfToken"]').val()
					  },
				  },
				  columnDefs: [
					{bSortable: false, targets: [1, 2, 3, 4, 5, 6, 7]},
				
				  ],
				  "columns": [
					  { data: "name", width: "20%"},
					  { data: "supervisor", width: "15%"},
					  { data: "manager", width: "15%"},
					  { data: "team_leader", width: "15%"},
					  { data: "members", width: "15%"},
					  { data: "status", width: "5%"},
					  { data: "added", width: "5%"},
					  { data: "modified", width: "5%"},
					  { data: "action", width: "5%"},
				  ],
				   // "scrollY": "430px",
					"scrollCollapse": false,
				   "lengthMenu": [[2, 25, 50, 100, -1], [2, 25, 50, 100, "All"]],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					"fnDrawCallback": function(){
						//mulTiSelCard(assignee);
						//showLoadingModal("show");		
					}
		});
	}
	
	$(document).on("keypress", ".show_manager", function(){
		$(this).val("");
	});
	

	$(document).on("click", ".show_manager", function(){
			var assignee = $(this).attr("assignee");

			//display the modal
			//e.preventDefault();
			var url		 		= _webroot + "employees/showlist";
			var title    		= $(this).attr("title");
			var note     		= $(this).attr("note");
			//var assignee    	= $(this).attr("assignee");
			//var _selected 		= $(this).val();
			
			//alert(_selected);
			$(".modal-body").html("");
			showLoadingModal("show");
			
			$.get(url, function(resp){
				$(".modal-body").html(resp).promise().done( function(){
					showLoadingModal("hide");
					$(".modal-title").html(title);
					$(".modal-note").html(note);
					$("#assignee").val(assignee);
					//$("#p_table").DataTable().ajax.url(getTheWebroot()  + "employees/indexajax/Active").load();
					showIndexTable("#p_table", _webroot  + "employees/filterindex/Active", assignee);
				});
				
			});
			
	});
	
	
	/*function mulTiSelCard(assignee){
			const selids = [];
			const enames = [];
			$(".selemp").change( function(){
				var empid = $(this).attr("value");
				var ename = $(this).attr("ename");
				
				if($(this).is(":checked")) {
					selids.push(empid);
					enames.push(ename);
				} else {
					selids.splice( $.inArray(empid, selids), 1 );
					enames.splice( $.inArray(ename, enames), 1 );
				}
			});
			
			
			
			$(".ctnbtn").click( function(e){
				
				//alert(enames);
				//$(".empids").val(jsonString);
			});
			
			
				
	}*/
	
	
	function getTeamLeave(type){
		var ar
		switch(type){
			case 1:
				ar = $("#sick_leave").val();
			break;
			case 2:
				ar = $("#vacation_leave").val();
			break;
			case 3:
				ar = $("#solo_leave").val();
			break;
			case 4:
				ar = $("#paternity_leave").val();
			break;
			case 5:
				ar = $("#maternity_leave").val();
			break;
			case 6:
				ar = $("#bereavement_leave").val();
			break;
		}
			
		var duce = jQuery.parseJSON(ar);
		
		return duce;
	}
	
	function getTeamLate(type){
		var ar
		switch(type){
			case 1:
				ar = $("#team_late").val();
			break;
			case 2:
				ar = $("#team_over").val();
			break;
			case 3:
				ar = $("#team_under").val();
			break;
			
		}
			
		var duce = jQuery.parseJSON(ar);
		
		return duce;
	}
	
	

				