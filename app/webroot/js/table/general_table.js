	
	function showIndexTable(tableid, cols, targ){
		$(tableid).DataTable({
				   dom: "Blfrtip",
				   buttons: [
						"csv", "excel"
				   ],
				   columnDefs: [{bSortable: false, targets: targ}],
				   "columns": cols,
				   // "scrollY": "430px",
					"scrollCollapse": false,
				   "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					"fnDrawCallback": function(){
						
					}
		});
	}