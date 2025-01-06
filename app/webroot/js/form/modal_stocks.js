$(document).on("hidden.bs.modal", "#view_modal", function(e){
	$('#default_form').trigger("reset");
});
	
	
$(document).on("click", ".searchbtn", function(e){
	var  reportrange	 = $(".ddata").html();
	var  cashier 		 = $(".cashier").val();
	
	var to = reportrange.substr(reportrange.indexOf("- ")+2)
	var from 	= reportrange.substring(0, reportrange.indexOf(" -"));
	
	
	$('#dtable_').dataTable().fnClearTable();
    $('#dtable_').dataTable().fnDestroy();
	
	showIndexTable("#dtable_", _webroot + "stocks/indexajax/" + from +"/" + to +"/" + cashier);
	
});

$(document).on("click", ".modal_view", function(e){
		e.preventDefault();
		var url		 = $(this).attr("href");
		var title    = $(this).attr("title");
		
		//var note    = $(this).attr("note");
		$(".modal-body").html("");
		$(".modal-title").html("");
		//showLoadingModal("show");
		
		
		$.get(url, function(resp){
			$(".modal-body").html(resp).promise().done( function(){
				
				$(".modal-title").html(title);
				if($("#fileuploader").length) {
					saveFormWithImage(_webroot + "products/uploadavatar", "jpeg, jpg, png", "#upload_image_form");
				}
				
				  if ($("#barChartStacked").length) {
					var barChartCanvas = $("#barChartStacked").get(0).getContext("2d");
					// This will get the first returned node in the jQuery collection.
					var barChart = new Chart(barChartCanvas, {
					  type: 'bar',
					  data: barChartStackedData,
					  options: barChartStackedOptions
					});
				  }
				  
				
				if($(".amount").length) {
					 $('.amount').mask('000,000,000,000.00', {reverse: true});
				}
				
				if($(".numbers").length) {
					 $('.numbers').mask('99999999999', {reverse: true});
				}
				
				if($(".letters_only_allcaps").length) {
					$(".letters_only_allcaps").mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
						'translation': {
							A: {
								pattern: /[a-zA-Z ]/,  
							},
						 },
						onKeyPress: function (value, event) {
						 event.currentTarget.value = value.toUpperCase();
						}
					});
				}
				
				 $('.default_save').on('click', function(){
						
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
                                    btnClass: 'btn-success',
                                    action: function(){
										if(url === ""){
											$(form).submit();
										}else{
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
																	//refresh data table
																	$('#dtable_').DataTable().ajax.reload();
																	$('#default_form').trigger("reset");
																	$("#view_modal").modal("hide");
																}
																
																$.alert(res.msg);
															
															},
															error: function(e1, e2, e3){
																 $.alert('Unable to process your request at the moment. Please try again in a short while');
															},
															complete: function(){
																
															}
															
														});	
														
													
										}
                                    }
                                },
                                cancel: function(){
                                    $.alert('Submission has been canceled.');
                                },
                               /*  moreButtons: {
                                    text: 'something else',
                                    action: function(){
                                        $.alert('you clicked on <strong>something else</strong>');
                                    }
                                }, */
                            }
                        });
                    });
					
					
			});
			
			
		});
									
});

function showIndexTable(tableid, url){
	
		var d = new Date();
	    var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();

		$(tableid).DataTable({
				   dom: 'Blfrtip',
				   buttons: [
					/* 	{
							extend: 'pdfHtml5',
							title: 'LIST OF PRODUCTS AS OF  ' + strDate,
							exportOptions: {
								columns: [ 1, 2, 3, 4, 5, 6 ]
							}
						},	 */
						{
							extend: 'print',
							title: '<div class="text-left fs-12 bold">STOCKS TRANSACTION</div><div class="text-left fs-11 bold">DATE GENERATED : ' + strDate + '</div>',
							exportOptions: {
								columns: [0, 1, 2, 3, 4, 5, 6, 7]
							},
							footer: true,
							filename: 'Stocks_Transaction',
							text: "Print",							
						},
						{
							extend: 'pdfHtml5',
							title: 'STOCKS TRANSACTION AS OF  ' + strDate,
							exportOptions: {
								columns: [0, 1, 2, 3, 4, 5, 6, 7]
							},
							footer: true,
							filename: 'Stocks_Transaction' + strDate,
							text: "PDF",		
							pageSize: 'A4',
							customize: function ( doc ) {
								doc['footer']=(function(page, pages) {
									return {
									columns: [
									
									{
									alignment: 'center',
									text: [
									{ text: page.toString(), italics: true },
									' of ',
									{ text: pages.toString(), italics: true }
									]
									}
									],
									margin: [10, 0]
									}
									});
								
							}
						},	
						{
							extend: 'csvHtml5',
							title: 'STOCKS TRANSACTION AS OF  ' + strDate,
							exportOptions: {
								columns: [0, 1, 2, 3, 4, 5, 6, 7]
							},
							footer: true,
							filename: 'Stocks_Transaction' + strDate,
							text: "CSV",							
						},	
						{
							extend: 'excelHtml5',
							title: 'STOCKS TRANSACTION AS OF ' + strDate,
							exportOptions: {
								columns: [0, 1, 2, 3, 4, 5, 6, 7]
							},
							footer: true,
							filename: 'Stocks_Transaction' + strDate,
							text: "Excel",				
						}
					], 
				  "bFilter"				: false,
				  "processing"		: true,
				  "serverSide"		: true,
				  "ajax": {
					 // "dataType" : 'json',
					  "url"			: url,
					  "method" : "POST",
					  "headers": {
						'X-CSRF-TOKEN' : $('[name="_csrfToken"]').val()
					  }
				  },
				 
				  columnDefs: [
					{bSortable: false, targets: [0, 1, 2, 3, 4 ,5, 6, 7]},
				  ],							
				  "columns": [
					  { data: "product", width: "15%"},
					  { data: "transaction", width: "10%"},					
					  { data: "account", width: "20%"},
					  { data: "rqty", width: "10%"},
					  { data: "qty", width: "10%"},
					  { data: "afqty", width: "10%"},
					  { data: "price_date", width: "10%"},					  
					  { data: "price", width: "15%"}					  
				  ],
				   // "scrollY": "430px",
					"scrollCollapse": false,
				    "lengthMenu": [[20, 500, 1000, -1], [20,  500, 1000, "All"]],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					"fnDrawCallback": function(){
							 $(".changestatus").click( function(e){
								e.preventDefault();
								var url = $(this).attr("href");
								var new_status = $(this).attr("new_status");
								var user_id = $(this).attr("user_id");
								showLoading("show");
								$.get(url, function(resp){
									showLoading("hide");
									 $.alert("New account status has been saved.");
									 if(new_status==="ACTIVE"){
										$("#btn_INACTIVE_" + user_id).removeClass("nodisplay");
										$("#btn_ACTIVE_" + user_id).addClass("nodisplay");
									 }else{
										$("#btn_ACTIVE_" + user_id).removeClass("nodisplay");
										$("#btn_INACTIVE_" + user_id).addClass("nodisplay");
									 }
									 
									 $(".status_t" + user_id).html(new_status);
								});
						});	
					},
					 footerCallback: function (row, data, start, end, display) {
							var api = this.api();
				 
							// Remove the formatting to get integer data for summation
							var intVal = function (i) {
								return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
							};

							totalrqty = api
								.column(3)
								.data()
								.reduce(function (a, b) {
									return intVal(a) + intVal(b);
								}, 0);

							totalqty = api
								.column(4)
								.data()
								.reduce(function (a, b) {
									return intVal(a) + intVal(b);
								}, 0);
							
							totalafqty = api
								.column(5)
								.data()
								.reduce(function (a, b) {
									return intVal(a) + intVal(b);
								}, 0);

							$(api.column(3).footer()).html("(Running) ");
							$(api.column(4).footer()).html("(Added) " + totalqty);
							$(api.column(5).footer()).html("(Current) ");
						},
		}); 
	}
	
	