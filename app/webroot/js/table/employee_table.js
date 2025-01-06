	
	function showIndexTable(tableid, url){
		
		$.fn.dataTable.ext.errMode = 'none';
		$(tableid).DataTable({
				   dom: "Blfrtip",
				   buttons: [
						//'copy', 
						"csv", "excel"
				   ],
				  "processing"		: true,
				 "serverSide"		: true,
				 "deferRender"		: true,
				  "serverMethod"	: "post",
				  "ajax": {
					  "url"			: url,
					  "method"		: "post",
					  "headers": {
						'X-CSRF-Token' : $('[name="_csrfToken"]').val()
					  },
				  },
				  columnDefs: [
					{
						bSortable: false, 
						targets: [0, 5],
						'checkboxes': {
						   'selectRow': true
						},
						'createdCell':  function (td, cellData, rowData, row, col){
						   if(rowData[2] === 'Software Engineer'){
							  this.api().cell(td).checkboxes.select();
						   }
						}
					},
				
				  ],
				  /* select: {
						style: 'multi',
						  selector: 'td:first-child'
						},*/
					  //order: [[1, 'asc']]
				   
				  // 'select': 'multi',
				//  stateSave: true,
				  "columns": [
					  { data: "id", width: "5%"},
					  { data: "fname", width: "10%"},
					  { data: "mname", width: "10%"},
					  { data: "lname", width: "10%"},
					  { data: "access", width: "5%"},
					  { data: "account", width: "10%"},
					  { data: "employment", width: "10%"},
					  { data: "status", width: "5%"},
					  { data: "campaign", width: "10%"},
					  { data: "office", width: "10%"},
					  { data: "shift", width: "10%"},
					  { data: "action", width: "5%"}
				  ],
				  /* "select": {
					  "style": "multi"
				   },*/	
				   // "scrollY": "430px",
					"scrollCollapse": false,
				   "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					"initComplete": function( settings, json ) {
						mulTiSelCard();
						submitChanges();
					},	
					"drawCallback": function( settings ) {
						disSelectMulti();
					}
					//"fnDrawCallback": function(){
						//mulTiSelCard();
						//showLoadingModal("show");		
					//}
		});
	}
	
	
	function disSelectMulti(){
		var selids = $("#selids").val();
		
			if(selids.length > 0){
				selids = JSON.parse(selids);
				if($("#selall").is(":checked")) {
					$("#selids").val("");
					$("#selall").prop('checked', false);
					$.each(selids, function(key, value){
						$("#check_" + value).prop('checked', false);
					});
				}else{
					$.each(selids, function(key, value){
						$("#check_" + value).prop('checked', true);
					});
				}
			}
	}
	
	
	function mulTiSelCard(){
			const selids = [];
			var jsonString 
			
			$(document).on("change",".selemp",function (){
			//$(".selemp").change( function(){
				var empid = $(this).attr("value");
				if($(this).is(":checked")) {
					selids.push(empid);
				} else {
					selids.splice( $.inArray(empid, selids), 1 );
				}
				jsonString = JSON.stringify(selids);
				$("#selids").val(jsonString);
			});
			
			$(document).on("change","#selall",function (){
				if($(this).is(":checked")) {
					$(".selemp").prop('checked', false);
					$(".selemp").click();
				}else{
					$("#selids").val("");
					$("#selall").prop('checked', false);
					$(".selemp").prop('checked', false);
					selids.splice(0,selids.length);
				}
			});
	}
	
	$(document).on("click", ".btnreset", function(e){
		$("#p_table").DataTable().ajax.url(getTheWebroot()  + "employees/indexajax/Active").load();
	});
	
	
	function submitChanges(){
		
		$(document).on("click", ".btnsavechange", function(e){
				var x = confirm("You are about to submit changes. Please click OK to confirm");
				$(this).prop("disabled", true);
				if(x){
					var office_status 	= $("#office_status").val();
					var emp_status 		= $("#emp_status").val();
					var emp_type 		= $("#emp_type").val();
					var account_status 	= $("#account_status").val();
					var shift_id 		= $("#shift_id").val();
					//var designation_id 	= $("#designation_id").val();
					var jsonString 		= $("#selids").val();

					

						//var _selbranch = $("._branch").val();
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
								shift_id		: shift_id,
								account_status	: account_status,
								//designation_id	: designation_id
							},
							cache		: false,				
							beforeSend	: function(){
								showLoadingModal("show");		
								//$(this).prop("disabled", true);
							},
							success		: function(data){
								//console.log(data);
								var _data = JSON.parse(data);
								//$(this).prop("disabled", false);
								
								if(_data.resp===1){
									$("#form_content_sub").modal("show");
									$("#modal_title_sub").html("Changes Saved");
									$("#note_sub").html("Below are the changes summary");
									$("#modal_content_sub").html(_data.message);
								}else{
									alert(_data.message);
								}
								
								
							},
							error		: function(err1, err2, err3){
								alert("Something went wrong. Please try agian");
							},
							complete	: function(){
								$(".btnsavechange").prop("disabled", false);
								showLoadingModal("hide");	
							},				
						});
				}else{
					$(".btnsavechange").prop("disabled", false);
					e.preventDefault();
					return false;
				}
		});
	}