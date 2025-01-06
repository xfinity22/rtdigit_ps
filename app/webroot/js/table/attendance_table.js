	
	/*function showIndexTable(tableid, url){
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
				  "ajax": {
					  "url"			: url,
					  "method"		: "post",
					  "headers": {
						'X-CSRF-Token' : $('[name="_csrfToken"]').val()
					  },
				  },
				  columnDefs: [
					{bSortable: false, targets: [0,1,2,3,4,5,6]},
				
				  ],
				   "order": [[ 0, "desc" ]],
				  "columns": [
					  { data: "id", width: "5%"},
					  { data: "added", width: "5%"},
					  { data: "am_in", width: "15%"},
					  { data: "am_out", width: "15%"},
					  { data: "pm_in", width: "15%"},
					  { data: "pm_out", width: "15%"},
					  { data: "ot_in", width: "15%"},
					  { data: "ot_out", width: "15%"},
				  ],
				   // "scrollY": "430px",
					"scrollCollapse": false,
				   "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					"fnDrawCallback": function(){
						
					}
		});
	}*/
	
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
				  "ajax": {
					  "url"			: url,
					  "method"		: "post",
					  "headers": {
						'X-CSRF-Token' : $('[name="_csrfToken"]').val()
					  },
				  },
				  columnDefs: [
					{bSortable: false, targets: [0,1,2,3,4,5,6,7,8,9,10]},
				
				  ],
				   "order": [[ 0, "desc" ]],
				  "columns": [
					  { data: "added", width: "10%"},
					  { data: "name", width: "15%"},
					  { data: "shift", width: "10%"},
					  { data: "campaign", width: "10%"},
					  { data: "in", width: "10%"},
					  { data: "in_device", width: "10%"},
					  { data: "out", width: "10%"},
					  { data: "out_device", width: "10%"},
					  { data: "late", width: "5%"},
					  { data: "ot", width: "5%"},
					  { data: "ut", width: "5%"}
				  ],
				   // "scrollY": "430px",
					"scrollCollapse": false,
				   "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					"fnDrawCallback": function(){
						
					}
		});
	}
	
	function showSingleTable(tableid, url){
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
				  "ajax": {
					  "url"			: url,
					  "method"		: "post",
					  "headers": {
						'X-CSRF-Token' : $('[name="_csrfToken"]').val()
					  },
				  },
				  columnDefs: [
					{bSortable: false, targets: [0,1,2,3,4,5,6,7]},
				
				  ],
				   "order": [[ 0, "desc" ]],
				  "columns": [
					  { data: "added", width: "20%"},
					  { data: "shift", width: "20%"},
					  { data: "campaign", width: "15%"},
					  { data: "in", width: "10%"},
					  { data: "out", width: "10%"},
					  { data: "late", width: "5%"},
					  { data: "ot", width: "5%"},
					  { data: "ut", width: "5%"}
				  ],
				   // "scrollY": "430px",
					"scrollCollapse": false,
				   "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					"fnDrawCallback": function(){
						
					}
		});
	}
	
	function showTable(tableid, url){
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
				  "ajax": {
					  "url"			: url,
					  "method"		: "post",
					  "headers": {
						'X-CSRF-Token' : $('[name="_csrfToken"]').val()
					  },
				  },
				  columnDefs: [
					{bSortable: false, targets: [0,1,2,3,4,5,6,7,8,9,10]},
				
				  ],
				   "order": [[ 0, "desc" ]],
				  "columns": [
					  { data: "added", width: "10%"},
					  { data: "name", width: "15%"},
					  { data: "shift", width: "10%"},
					  { data: "campaign", width: "10%"},
					  { data: "in", width: "10%"},
					  { data: "in_device", width: "10%"},
					  { data: "out", width: "10%"},
					  { data: "out_device", width: "10%"},
					  { data: "late", width: "5%"},
					  { data: "ot", width: "5%"},
					  { data: "ut", width: "5%"}
				  ],
				   // "scrollY": "430px",
					"scrollCollapse": false,
				   "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					"fnDrawCallback": function(){
						
					}
		});
	}
	
	/*function showTable(tableid, url){
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
				   "order": [[ 0, "desc" ]],
				  "columns": [
					  { data: "id", width: "5%"},
					  { data: "added", width: "5%"},
					  { data: "empid", width: "5%"},
					  { data: "name", width: "5%"},
					  { data: "am_in", width: "15%"},
					  { data: "am_out", width: "15%"},
					  { data: "pm_in", width: "15%"},
					  { data: "pm_out", width: "15%"},
					  { data: "ot_in", width: "15%"},
					  { data: "ot_out", width: "15%"}
				  ],
				   // "scrollY": "430px",
					"scrollCollapse": false,
				   "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					"fnDrawCallback": function(){
						
					}
		});
	}*/
	
	
	
	$(document).on("click", "#btnfilter", function(e){
		var min = $("#imin").val();
		var max = $("#imax").val();

		$("#p_table").DataTable().ajax.url(getTheWebroot()  + "attendances/indexajax/" + min + "/" + max).load();
	});
	
	$(document).on("click", "#btnfilter2", function(e){
		var min = $("#imin").val();
		var max = $("#imax").val();
		var empid = $("#empid").val();

		$("#p_table").DataTable().ajax.url(getTheWebroot()  + "attendances/eattendance/" + empid + "/" + min + "/" + max).load();
	});
	
	
	
	
