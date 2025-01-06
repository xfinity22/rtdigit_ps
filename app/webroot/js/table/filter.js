	
	function showIndexTable(tableid, cols, targ){
		$(tableid).DataTable({
				   dom: "Blfrtip",
				   buttons: [
						"csv", "excel"
				   ],
				   columnDefs: [{bSortable: false, targets: targ}],
				   "columns": cols,
				    "order": [[ 1, "asc" ]],
				   // "scrollY": "430px",
					"scrollCollapse": false,
				   "lengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					"fnDrawCallback": function(){
						
					}
		});
	}