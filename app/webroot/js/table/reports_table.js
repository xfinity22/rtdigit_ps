	
	function showIndexTable(tableid, url){
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
					"fnDrawCallback": function(){
						mulTiSelCard();
						//showLoadingModal("show");		
					}
		});
	}
	
	
	
	$(document).on("click", ".altype", function(e){
		var sel = $(this).val();
		
		
		if(sel==="selected"){
			//display the modal
			e.preventDefault();
			var url		 = _webroot + "employees/showlist";
			var title    = $(this).attr("title");
			var note     = $(this).attr("note");
			$(".modal-body").html("");
			showLoadingModal("show");
			
			$.get(url, function(resp){
				$(".modal-body").html(resp).promise().done( function(){
					showLoadingModal("hide");
					$(".modal-title").html(title);
					$(".modal-note").html(note);
					//$("#p_table").DataTable().ajax.url(getTheWebroot()  + "employees/indexajax/Active").load();
					showIndexTable("#p_table", _webroot  + "employees/filterindex/Active");
				});
				
			});
			
		}
		
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
			
			
			
			$(".ctnbtn").click( function(e){
				var jsonString = JSON.stringify(selids);
				$(".empids").val(jsonString);
				$(".altype").prop("checked", true);
			});
			
			$(".btnsavechange").click( function(e){
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
				