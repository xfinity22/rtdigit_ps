(function($) {
  'use strict';
  $(function() {
	  
var barChartStackedData = {
    labels: ["jan", "feb", "mar", "apr", "may", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: 'Safari',
      data: [10,20,15,30,20,10,20,15,30,20, 10,20,],
      //data: [$(".nlist").val()],
      backgroundColor: [
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
      ],
      borderColor: [
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
        '#2b80ff',
      ],
      borderWidth: 1,
      fill: false
    },
    {
      label: 'Chrome',
      data: [5,25,10,20,30,5,25,10,20,30,25,10],
      //data: [$(".nlist").val()],
      backgroundColor: [
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
      ],
      borderColor: [
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
        '#bfccda',
      ],
      borderWidth: 1,
      fill: false
    }]
  };
  
  var barChartStackedOptions = {
    scales: {
      xAxes: [{
        display: false,
        stacked: true,
        gridLines: {
          display: false //this will remove only the label
        },
      }],
      yAxes: [{
        stacked: true,
        display: false,
      }]
    },
    legend: {
      display: false,
      position: "bottom"
    },
    legendCallback: function(chart) {
      var text = [];
      text.push('<div class="row">');
      for (var i = 0; i < chart.data.datasets.length; i++) {
        text.push('<div class="col-sm-5 mr-3 ml-3 ml-sm-0 mr-sm-0 pr-md-0 mt-3"><div class="row align-items-center"><div class="col-2"><span class="legend-label" style="background-color:' + chart.data.datasets[i].backgroundColor[i] + '"></span></div><div class="col-9"><p class="text-dark m-0">' + chart.data.datasets[i].label + '</p></div></div>');
        text.push('</div>');
      }
      text.push('</div>');
      return text.join("");
    },
    elements: {
      point: {
        radius: 0
      }
    }
  };
	
	
  
	  if ($("#barChart").length) {
			var nlist = $(".nlist").val();
			const nls = nlist.split(',');
			
			var data = {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
			  label: 'Total Sales',
			 // data: [10, 19, 3, 5, 2, 3, 10, 19, 3, 5, 2, 3],
			  data: nls,
			  backgroundColor: [
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
			  
			  ],
			  borderColor: [
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
			 
			  ],
			  borderWidth: 1,
			  fill: true
			}]
		  };
		  
			var options = {
			scales: {
			  yAxes: [{
				ticks: {
				  beginAtZero: true
				}
			  }]
			},
			legend: {
			  display: false
			},
			elements: {
			  point: {
				radius: 0
			  }
			}

		  };
		  
		  
		var barChartCanvas = $("#barChart").get(0).getContext("2d");
		// This will get the first returned node in the jQuery collection.
		var barChart = new Chart(barChartCanvas, {
		  type: 'bar',
		  data: data,
		  options: options
		});
		
	  }

	  if ($("#barChart1").length) {
			var nlist = $(".snlist").val();
			const nls = nlist.split(',');
			
			var data = {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
			  label: 'Total Sales',
			 // data: [10, 19, 3, 5, 2, 3, 10, 19, 3, 5, 2, 3],
			  data: nls,
			  backgroundColor: [
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
			  
			  ],
			  borderColor: [
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
				'rgba(255,99,132,1)',
			 
			  ],
			  borderWidth: 1,
			  fill: true
			}]
		  };
		  
			var options = {
			scales: {
			  yAxes: [{
				ticks: {
				  beginAtZero: true
				}
			  }]
			},
			legend: {
			  display: false
			},
			elements: {
			  point: {
				radius: 0
			  }
			}

		  };
		  
		  
		var barChartCanvas = $("#barChart1").get(0).getContext("2d");
		// This will get the first returned node in the jQuery collection.
		var barChart = new Chart(barChartCanvas, {
		  type: 'bar',
		  data: data,
		  options: options
		});
		
	  }
	  
  
  
   });
})(jQuery);

$(document).on("hidden.bs.modal", "#view_modal", function(e){
	$('#default_form').trigger("reset");
});
	
	
$(document).on("click", ".searchbtn", function(e){
	var  reportrange	= $(".ddata").html();
	var  cashier 		= $(".cashier").val();
	var  payment 	  	= $(".payment").val();
	var  status 		= $(".status").val();
	
	
	var to = reportrange.substr(reportrange.indexOf("- ")+2)
	var from 	= reportrange.substring(0, reportrange.indexOf(" -"));
	
	
	$('#dtable_').dataTable().fnClearTable();
    $('#dtable_').dataTable().fnDestroy();
	
	showIndexTable("#dtable_", _webroot + "sales/indexajax/" + from +"/" + to +"/" + payment + "/" + status + "/" + cashier);
	
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
						title: '<div class="text-left fs-12 bold">SALES REPORT</div><div class="text-left fs-11 bold">DATE GENERATED : ' + strDate + '</div>',
						exportOptions: {
							columns: [ 1, 2, 3, 4, 5, 6 ]
						}
					},
					{
						extend: 'csvHtml5',
						title: 'SALES REPORT AS OF  ' + strDate,
						exportOptions: {
							columns: [ 1, 2, 3, 4, 5, 6 ]
						}
					},	
					{
						extend: 'excelHtml5',
						title: 'SALES REPORT AS OF ' + strDate,
						exportOptions: {
							columns: [ 1, 2, 3, 4, 5, 6 ]
						}
					}
					], 
				  //"bFilter"				: false,
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
					{bSortable: false, targets: [0, 1, 2, 3, 4 ,5 , 6, 7]},
				
				  ],						
				  "columns": [
					  { data: "cashier", width: "10%"},
					  { data: "date_time", width: "10%"},					
					  { data: "total", width: "10%"},
					  { data: "status", width: "10%"},
					  { data: "payment", width: "10%"},
					  { data: "paid_amount", width: "10%"},
					  { data: "change", width: "10%"},
					  { data: "action", width: "10%"}					  
				  ],
				   // "scrollY": "430px",
					"scrollCollapse": false,
				    "lengthMenu": [[10, 500, 1000, -1], [10,  500, 1000, "All"]],
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
				 
							// Total over all pages
							total = api
								.column(2)
								.data()
								.reduce(function (a, b) {
									return intVal(a) + intVal(b);
								}, 0);
				 
							// Total over this page
							totalSales = api
								.column(2, { page: 'current' })
								.data()
								.reduce(function (a, b) {
									//return intVal(a) + intVal(b);
									var st =  parseFloat(intVal(a) + intVal(b));
									return st.toFixed(2);
								}, 0);
							
							totalPaid = api
								.column(5, { page: 'current' })
								.data()
								.reduce(function (a, b) {
									var st =  parseFloat(intVal(a) + intVal(b));
									return st.toFixed(2);
								}, 0);
								
								totalChange = api
								.column(6, { page: 'current' })
								.data()
								.reduce(function (a, b) {
									var st =  parseFloat(intVal(a) + intVal(b));
									return st.toFixed(2);
								}, 0);
				 
							// Update footer
							//$(api.column(2).footer()).html('PHP ' + pageTotal + ' ( PHP ' + total + ' )');
							$(api.column(2).footer()).html(totalSales);
							$(api.column(5).footer()).html(totalPaid);
							$(api.column(6).footer()).html(totalChange);
						},
		}); 
	}
	
	