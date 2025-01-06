$(document).on("hidden.bs.modal", "#form_modal_view", function(e){
	return true;
});

$(document).on("click", ".nomodal_save", function(e){
		
						var form	=  $(this).attr("form");
						var postdata = $(form).serialize();
						var url		 = $(this).attr("url"); //$("#default_form").attr("action");
						var table_id = $(this).attr("table");
						var dialog 	= $(this).attr("dialog");
						var reload 	= $(this).attr("reload");
						var edit 	= $(this).attr("edit");
						var new_entry 	= $(this).attr("new_entry");
						
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
									action: function() {
										
										 if (url === "") {
											$(form).submit();
										} else {
											$.ajax({
												url: url,
												type: 'post', // Changed from "method" to "type"
												dataType: 'json', // Changed from "type: 'JSON'" to "dataType: 'json'"
												data: postdata,
												headers: {
													'X-CSRF-Token': $('[name="_csrfToken"]').val()
												},
												beforeSend: function() {
													// Code for before sending the request (if needed)
												},
												success: function(response) {
													// Assuming response is already a JSON object
													
													
													if (response.resp === 1) {
														
														if (dialog === "Yes") {
															$.dialog(response.msg);
														} else {
															$.alert(response.msg);
														}

														if (reload === "Yes") {
															$(table_id).DataTable().ajax.reload();
														}
														
														if(new_entry === "Yes") {
																$(form)[0].reset();
															}
														
													} else {
														$.alert(response.msg);
													}
												},
												error: function(xhr, status, error) {
													$.alert('Error: Unable to process your request at the moment. Please try again later.');
												}
											});
										} 
									}
								},
								cancel: function() {
									$.alert('Submission has been canceled.');
								}
							}
						});
						

						
						
                    });
					

$(document).on("click", ".form_modal_view", function(e){
		e.preventDefault();
		var url		 = $(this).attr("href");
		var title    = $(this).attr("title");
		var table    = $(this).attr("table");
		
		//var note    = $(this).attr("note");
		$(".form-modal-body").html("");
		$(".form-modal-title").html("");
		$(".form_close").attr("table_name", table);
		//showLoadingModal("show");
		
		
		$.get(url, function(resp){
			$(".form-modal-body").html(resp).promise().done( function(){
				
				$(".form-modal-title").html(title);
				if($("#fileuploader").length) {
					saveFormWithImage(_webroot + "products/uploadavatar", "jpeg, jpg, png", "#upload_image_form");
				}
				
				//initInput();
				if($(table).length){
					initTable(table);;
				}
				
				getDivisionList();
				
				 $('.form_default_save').on('click', function() {
						var form = $(this).attr("form");
						var postdata = $(form).serialize();
						var url = $(this).attr("url");
						var table_id = $(this).attr("table");
						var dialog = $(this).attr("dialog");
						var reload = $(this).attr("reload");
						var edit = $(this).attr("edit");

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
									action: function() {
										
										 if (url === "") {
											$(form).submit();
										} else {
											$.ajax({
												url: url,
												type: 'post', // Changed from "method" to "type"
												dataType: 'json', // Changed from "type: 'JSON'" to "dataType: 'json'"
												data: postdata,
												headers: {
													'X-CSRF-Token': $('[name="_csrfToken"]').val()
												},
												beforeSend: function() {
													// Code for before sending the request (if needed)
												},
												success: function(response) {
													// Assuming response is already a JSON object
													//console.log(response);
													
													if (response.resp == "1") {
														if (dialog === "Yes") {
															$.dialog(response.msg);
														} else {
															$.alert(response.msg);
														}

														if (reload === "Yes") {
															$(table_id).DataTable().ajax.reload();
														}

														if (edit !== "Yes") {
															$(form).trigger("reset");
														}
													} else {
														$.alert(response.msg);
													}
												},
												error: function(xhr, status, error) {
													$.alert('Error: Unable to process your request at the moment. Please try again later.');
												}
											});
										} 
									}
								},
								cancel: function() {
									$.alert('Submission has been canceled.');
								}
							}
						});
					});

					
			});
			
			
		});
									
});

$(document).on("click", ".modal_view", function(e){
		e.preventDefault();
		var url		 	= $(this).attr("href");
		var title    	= $(this).attr("title");
		var table    	= $(this).attr("table");
		var target_url   = $(this).attr("target_url");
		
		//var note    = $(this).attr("note");
		$(".modal-body").html("");
		$(".modal-title").html("");
		//showLoadingModal("show");
		
	
		$.get(url, function(resp){
			$(".modal-body").html(resp).promise().done( function(){
			
				$(".modal-title").html(title);
				/* if($("#fileuploader").length) {
					saveFormWithImage(_webroot + "products/uploadavatar", "jpeg, jpg, png", "#upload_image_form");
				}
				 */
				//initInput();
				/* if($(table).length){
					initTable(table);;
				}
				 */
				
				if($(".approve").length){
					
					$(".approve, .reject").on("click", function(e){	
						var _conf = confirm("You are about to update leave application status. Please click OK to confirm.");
						e.preventDefault();			
						if(_conf){		
							var form		=  $("#default_form");
							var url		 	= $(this).attr("href"); //$("#default_form").attr("action");
							var dholder		= $(this).attr("dholder");
										
							$(this).prop("disabled", true);	
									
							showLoading("show");
										//save the data then redirect for update
							$.post(url, $(form).serialize(), function(resp){
								//console.log(resp);
								var resp = JSON.parse(resp);
								alert(resp.msg);
								if(resp.resp=="1"){
									$(dholder).hide();
								}
								showLoading("hide");
								//window.location = _webroot  + '/leaves/pending-leave-application';
							});
						}else{
							
							return false;
						}
					});
				}

				if ($(".generate_report").length) {
					
					$(document).on("click", ".generate_report", function(e) {
						e.preventDefault();
						var url_dl = $(this).attr("url");
						
						var client = $("#client option:selected").val();
						var date_from = $("#date_from").val();
						var date_to = $("#date_to").val();

						// Check if date fields are not empty and date_to is greater than date_from
						if (!date_from || !date_to) {
							$.alert("Both date fields are required.");
							return;  // Exit the function if any date field is empty
						}

						if (new Date(date_to) <= new Date(date_from)) {
							$.alert("The end date must be greater than the start date.");
							return;  // Exit the function if date_to is not greater than date_from
						}
						
						
						
						// Construct the download URL with parameters
						var downloadUrl = url_dl + "/true/" + encodeURIComponent(client) + "/" + encodeURIComponent(date_from) + "/" + encodeURIComponent(date_to);

						// Create a download link
						var downloadLink = '<a href="' + downloadUrl + '" target="_blank" class="bold text-black fs-12">DOWNLOAD REPORT IN PDF FORMAT</a>';

						// Append the download link to the div with class 'download_link'
						$(".download_link").html(downloadLink);
					});
				}


				
				if($("#fileuploader").length) {			
					var newurl = $("#url_data").val();
					uploadImage(newurl, "jpeg, jpg, png", "#upload_image_form");
				}
				
				if($(".refresh_table").length){
					$(document).on("click", ".refresh_table", function(e){
						e.preventDefault();
						var table = $(this).attr("table");
						if($(table).length){
							$(table).DataTable().ajax.reload();
							//alert(table);
						}		
					});
				}
				
				if($(".amount_in_decimal").length){	
					$(".amount_in_decimal").on("blur", function() {
					
						var amount = parseFloat($(this).val());
						var words = numberToWords(amount);
						$(".in_words").val(words);
					});
				}

                if($("#add-entry-button").length){		
					
					//var accounts = JSON.parse($('#account-data').data('accounts'));
					var accountsData = $('#account-data').attr('data-accounts');
					var accounts = JSON.parse(accountsData);
					
					// Bind click event to the Add Entry button
					$('#add-entry-button').on('click', function() {
					
						addJournalEntry(accounts);
					});

					// Bind click event to dynamically remove entry rows
					$(document).on('click', '.remove-entry', function() {
						$(this).closest('.journal-entry-row').remove();
					});

					// Initialize the form with the first entry
					addJournalEntry(accounts);
				}
				

				
				if($(".select_member").length){
					
				 	var tdata = [
					{ data: "fname", width: "40%"},
					{ data: "mname", width: "10%"},					
					{ data: "lname", width: "40%"},										
					{ data: "action", width: "10%"}					
					];
												  
					var cols = [0, 1, 2, 3]; //report columns
					var tar = [0, 1, 2, 3]; //target column sorting
					
					showIndexTable("#select_member",  target_url, "Members", tdata, cols, tar);  
				}	  
				
				if($(".select_product").length){
					
				 	var tdata = [
					{ data: "product", width: "70%"},
					{ data: "stock", width: "10%"},					
					{ data: "status", width: "10%"},										
					{ data: "action", width: "10%"}					
					];
												  
					var cols = [0, 1, 2, 3]; //report columns
					var tar = [0, 1, 2, 3]; //target column sorting
					
					showIndexTable("#select_product",  target_url, "Members", tdata, cols, tar);  
					
				}	  

				
				
				
				$('.default_save').off('click').on('click', function(){	
				//$('.default_save').on('click', function(){
					
						var form	=  $(this).attr("form");
						var postdata = $(form).serialize();
						var url		 = $(this).attr("url"); //$("#default_form").attr("action");
						var table_id = $(this).attr("table");
						var dialog 	= $(this).attr("dialog");
						var reload 	= $(this).attr("reload");
						var edit 	= $(this).attr("edit");
						
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
									action: function() {
										
										 if (url === "") {
											$(form).submit();
										} else {
											$.ajax({
												url: url,
												type: 'post', // Changed from "method" to "type"
												dataType: 'json', // Changed from "type: 'JSON'" to "dataType: 'json'"
												data: postdata,
												headers: {
													'X-CSRF-Token': $('[name="_csrfToken"]').val()
												},
												beforeSend: function() {
													// Code for before sending the request (if needed)
												},
												success: function(response) {
													// Assuming response is already a JSON object
													
													
													if (response.resp === 1) {
														if (dialog === "Yes") {
															$.dialog(response.msg);
														} else {
															$.alert(response.msg);
														}

														if (reload === "Yes") {
															
															$(table_id).DataTable().ajax.reload();
														}

														if (edit !== "Yes") {
															$(form).trigger("reset");
														}
													} else {
														$.alert(response.msg);
													}
												},
												error: function(xhr, status, error) {
													$.alert('Error: Unable to process your request at the moment. Please try again later.');
												}
											});
										} 
									}
								},
								cancel: function() {
									$.alert('Submission has been canceled.');
								}
							}
						});
						

						
						
                    });
					
					
			});
			
			
		});
									
});

function addJournalEntry(accounts) {
        var entryIndex = $('#journal-entries .journal-entry-row').length;
        var accountOptions = '';

        // Loop through accounts to build the options for the select dropdown
        $.each(accounts, function(accountId, accountName) {
            accountOptions += '<option value="' + accountId + '">' + accountName + '</option>';
        });

        // Construct new journal entry HTML
        var newEntryHtml = '<div class="journal-entry-row row">' +
            '<div class="col-md-12 m-t-10">' +
                '<div class="form-floating">' +
                    '<select name="journalentries[' + entryIndex + '][chartofaccount_id]" class="form-control bold" required>' +
                        accountOptions +
                    '</select>' +
                    '<label class="fs-11 text-success text-uppercase">Account</label>' +
                '</div>' +
            '</div>' +
            '<div class="col-md-6 m-t-10 nopadding-right">' +
                '<div class="form-floating">' +
                    '<input type="number" name="journalentries[' + entryIndex + '][debit]" class="fs-20 form-control bold amount" placeholder="Debit" />' +
                    '<label class="fs-11 text-success text-uppercase">Debit</label>' +
                '</div>' +
            '</div>' +
            '<div class="col-md-6 m-t-10 nopadding-left">' +
                '<div class="form-floating">' +
                    '<input type="number" name="journalentries[' + entryIndex + '][credit]" class="fs-20 form-control bold amount" placeholder="Credit" />' +
                    '<label class="fs-11 text-success text-uppercase">Credit</label>' +
                '</div>' +
            '</div>' +
            '<div class="col-md-12 m-t-10">' +
                '<button type="button" class="remove-entry btn btn-xs btn-danger">Remove</button>' +
            '</div>' +
        '</div>';
        $('#journal-entries').append(newEntryHtml);
    }
	
function changeRequest(url, remove_view, remove_id){
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
				action: function() {
					$.ajax({
						url: url,
						type: 'post', 
						dataType: 'json', 
						headers: {
							'X-CSRF-Token': $('[name="_csrfToken"]').val()
						},
						beforeSend: function() {
							// Code for before sending the request (if needed)
						},
						success: function(response) {
							if (response.resp == "1") {
								$.alert(response.msg);
															
								if (remove_view === "Yes") {
									$(remove_id).fadeOut();
								}
							} else {
								$.alert(response.msg);
							}
						},
						error: function(xhr, status, error) {
							$.alert('Error: Unable to process your request at the moment. Please try again later.');
						}
					});
											
				}
			},
			cancel: function() {
				$.alert('Submission has been canceled.');
			}
		}
	});
}

function numberToWords(amount) {
    if (isNaN(amount)) return "Not a number";
    if (amount === 0) return "Zero Pesos";

    const ones = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
    const tens = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
    const teens = ['Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];

    function getPart(word) {
        let part = '';
        const hundreds = Math.floor(word / 100);
        const remainder = word % 100;
        const tensVal = Math.floor(remainder / 10);
        const onesVal = remainder % 10;

        if (hundreds) {
            part += ones[hundreds] + ' Hundred ';
        }
        if (remainder < 20 && remainder >= 10) {
            part += teens[onesVal];
        } else {
            if (tensVal) {
                part += tens[tensVal] + ' ';
            }
            if (onesVal) {
                part += ones[onesVal];
            }
        }
        return part;
    }

    let words = '';
    let parts = amount.toString().split(".");
    let integerPart = parseInt(parts[0], 10);
    const million = Math.floor(integerPart / 1000000);
    integerPart = integerPart % 1000000;
    const thousand = Math.floor(integerPart / 1000);
    const remainder = integerPart % 1000;

    if (million) {
        words += getPart(million) + ' Million ';
    }
    if (thousand) {
        words += getPart(thousand) + ' Thousand ';
    }
    if (remainder) {
        words += getPart(remainder);
    }

    words += ' Pesos ';

    if (parts.length > 1) {
        let decimalPart = parseInt(parts[1].substring(0, 2), 10);
        if (decimalPart) {
            words += ' and ' + getPart(decimalPart) + ' Cents';
        }
    }

    return words.trim().toUpperCase();
}


function showTable(table_name, url){
	switch(table_name){
		case "#deduction_payments":			
			var tdata = [
			{ data: "type", width: "20%"},
			{ data: "category", width: "20%"},					
			{ data: "member", width: "20%"},					
			{ data: "amount", width: "10%"},
			{ data: "due_date", width: "10%"},
			{ data: "paid_date", width: "10%"},
			{ data: "status", width: "10%"},
			];
												  
			var cols = [0, 1, 2, 3, 4, 5, 6]; //report columns
			var tar = [0, 1, 2, 3, 4, 5, 6]; //target column sorting
			
			showIndexTable(table_name, url, "Deduction Payments", tdata, cols, tar); 
		break;
		default:
		break;
	}
}
	

// Function to handle the modal content loading and setup
function handleModalContent(url, title, table, body, _title) {
    $(body).html("");
    $(_title).html(title);
    //showLoadingModal("show");

    $.get(url, function(resp) {
        $(body).html(resp).promise().done(function() {

            // Additional initialization if necessary
            if($("#fileuploader").length) {
                saveFormWithImage(_webroot + "products/uploadavatar", "jpeg, jpg, png", "#upload_image_form");
            }
            
            //initInput();
            if($(table).length){
                initTable(table);
            }
				
				if ($(".show_table").length){		
					var _url = $(".table_url").val();
					var table_name = $(".table_name").val();
					
					showTable(table_name, _url);
				}

				if ($(".MonthsToPay").length) {				
					$(document).on("change", ".MonthsToPay", function(e) {
						var mos 	= $(".MonthsToPay").val();
						var amount 	= $(".ApprovedLoanAmount").val();
						
						if(mos!==""){
							calculateLoanDetails(amount, mos);
						}else{
							$.alert("Select the months to pay");
						}
					});
				}

				if($(".incqty, .decqty").length){
					
					//$(".decqty").click(function(){
					$(".decqty").off("click").on("click", function(e){
						var qty = $('.quantity').val();
						var currentValue = parseInt(qty);
						if(!isNaN(currentValue) && currentValue > 1) {
							$('.quantity').val(currentValue - 1);
						}
					});
					
					//$(".incqty").click(function(){
					$(".incqty").off("click").on("click", function(e){
						var qty = $('.quantity').val();
						var currentValue = parseInt(qty);
						var availableQtyInput = $(".available_qty").val();
						var availableQty = parseInt(availableQtyInput);
						
						if(!isNaN(currentValue) && currentValue < availableQty) {
							$('.quantity').val(currentValue + 1);
						} else {
							$.alert("Error: Quantity exceeds available quantity!");
						}
					});
				}
				
				if($(".change_request").length){
					$(".change_request").off("click").on("click", function(e){
					//$(document).on("click", ".change_request", function(e){
						e.preventDefault();
						var url			 = $(this).attr("href");
						var remove_view  = $(this).attr("remove_view");
						var remove_id 	 = $(this).attr("remove_id");
						changeRequest(url, remove_view, remove_id);
					});
				}
				
				if($(".refresh_table").length){
					$(document).on("click", ".refresh_table", function(e){
						e.preventDefault();
						var table = $(this).attr("table");
						if($(table).length){
							$(table).DataTable().ajax.reload();
							//alert(table);
						}		
					});
				}
				
				$('.default_save').off('click').on('click', function(){	
				//$('.default_save').on('click', function(){
					
						var form	=  $(this).attr("form");
						var postdata = $(form).serialize();
						var url		 = $(this).attr("url"); //$("#default_form").attr("action");
						var table_id = $(this).attr("table");
						var dialog 	= $(this).attr("dialog");
						var reload 	= $(this).attr("reload");
						var edit 	= $(this).attr("edit");
						
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
									action: function() {
										
										 if (url === "") {
											$(form).submit();
										} else {
											$.ajax({
												url: url,
												type: 'post', // Changed from "method" to "type"
												dataType: 'json', // Changed from "type: 'JSON'" to "dataType: 'json'"
												data: postdata,
												headers: {
													'X-CSRF-Token': $('[name="_csrfToken"]').val()
												},
												beforeSend: function() {
													// Code for before sending the request (if needed)
												},
												success: function(response) {
													// Assuming response is already a JSON object
													//console.log(response);
													
													if (response.resp == "1") {
														if (dialog === "Yes") {
															$.dialog(response.msg);
														} else {
															$.alert(response.msg);
														}

														if (reload === "Yes") {
															$(table_id).DataTable().ajax.reload();
														}

														if (edit !== "Yes") {
															$(form).trigger("reset");
														}
													} else {
														$.alert(response.msg);
													}
												},
												error: function(xhr, status, error) {
													$.alert('Error: Unable to process your request at the moment. Please try again later.');
												}
											});
										} 
									}
								},
								cancel: function() {
									$.alert('Submission has been canceled.');
								}
							}
						});
						

						
						
                    });

        });
    });
}

// Bind to click event of elements with the class .modal_view_lg
$(document).on("click", ".modal_view_lg", function(e) {
    e.preventDefault();
	//e.stopPropagation();
	
    var url = $(this).attr("href");
    var title = $(this).attr("title");
    var table = $(this).attr("table");
    
    handleModalContent(url, title, table, '.modal-body-lg', '.modal-title-lg');
});

$(document).on("click", ".modal_add", function(e) {
    e.preventDefault();
	//e.stopPropagation();
	
    var url = $(this).attr("href");
    var title = $(this).attr("title");
    var table = $(this).attr("table");
    
    handleModalContent(url, title, table, '.modal-body-add', '.modal-title-add');
});


/* 
$(document).on("click", ".modal_view_lg", function(e){
		
		e.preventDefault();
		var url		 = $(this).attr("href");
		var title    = $(this).attr("title");
		var table    = $(this).attr("table");
		
		//var note    = $(this).attr("note");
		$(".modal-body-lg").html("");
		$(".modal-title-lg").html("");
		//showLoadingModal("show");
		

		$.get(url, function(resp){
			$(".modal-body-lg").html(resp).promise().done( function(){
							
				
				$(".modal-title-lg").html(title);
				if($("#fileuploader").length) {
					saveFormWithImage(_webroot + "products/uploadavatar", "jpeg, jpg, png", "#upload_image_form");
				}
				
				initInput();
				if($(table).length){
					initTable(table);;
				}
								
				
				if ($(".MonthsToPay").length) {
					
					$(document).on("change", ".MonthsToPay", function(e) {
						var mos 	= $(".MonthsToPay").val();
						var amount 	= $(".ApprovedLoanAmount").val();
						
						if(mos!==""){
							calculateLoanDetails(amount, mos);
						}else{
							$.alert("Select the months to pay");
						}
					});
				}

				
				
				if($(".refresh_table").length){
					$(document).on("click", ".refresh_table", function(e){
						e.preventDefault();
						var table = $(this).attr("table");
						if($(table).length){
							$(table).DataTable().ajax.reload();
							//alert(table);
						}		
					});
				}
				
				$('.default_save').off('click').on('click', function(){	
				//$('.default_save').on('click', function(){
						
						var form	=  $(this).attr("form");
						var postdata = $(form).serialize();
						var url		 = $(this).attr("url"); //$("#default_form").attr("action");
						var table_id = $(this).attr("table");
						var dialog 	= $(this).attr("dialog");
						var reload 	= $(this).attr("reload");
						var edit 	= $(this).attr("edit");
						
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
									action: function() {
										
										 if (url === "") {
											$(form).submit();
										} else {
											$.ajax({
												url: url,
												type: 'post', // Changed from "method" to "type"
												dataType: 'json', // Changed from "type: 'JSON'" to "dataType: 'json'"
												data: postdata,
												headers: {
													'X-CSRF-Token': $('[name="_csrfToken"]').val()
												},
												beforeSend: function() {
													// Code for before sending the request (if needed)
												},
												success: function(response) {
													// Assuming response is already a JSON object
													//console.log(response);
													
													if (response.resp == "1") {
														if (dialog === "Yes") {
															$.dialog(response.msg);
														} else {
															$.alert(response.msg);
														}

														if (reload === "Yes") {
															$(table_id).DataTable().ajax.reload();
														}

														if (edit !== "Yes") {
															$(form).trigger("reset");
														}
													} else {
														$.alert(response.msg);
													}
												},
												error: function(xhr, status, error) {
													$.alert('Error: Unable to process your request at the moment. Please try again later.');
												}
											});
										} 
									}
								},
								cancel: function() {
									$.alert('Submission has been canceled.');
								}
							}
						});
						

						
						
                    });
					
					
			});
			
			
		});
									
}); */

function getDateMonthsFromNow(months) {
    var currentDate = new Date();
    currentDate.setMonth(currentDate.getMonth() + months);

    // Formatting the date as d/m/Y
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1; // Adding 1 because JavaScript months are 0-11
    var year = currentDate.getFullYear();

    // Ensuring two digits for day and month
    day = day < 10 ? '0' + day : day;
    month = month < 10 ? '0' + month : month;

    return year + '-' + month + '-' + day;
}


function calculateLoanDetails(amount, mos) {
	
	var approvedLoanAmount = parseFloat(amount) || 0;	
	var monthsToPay = parseInt(mos) || 0;
	/* var interestRate = 0.08; // 8% per annum
	var insuranceRate = 6.00; // Insurance rate per 1000 of loan amount
	var serviceFeeRate = 0.015; // 1.5%
	var capitalBuildUpRate = 0.025; // 2.5%
	var annualInterest = approvedLoanAmount * interestRate;
	var monthlyInterest = annualInterest / 12; */

	var interestRate 		= $(".interest_rate").val();
	var insuranceRate 		= $(".insurance_rate").val();
	var serviceFeeRate 		= $(".service_rate").val();
	var capitalBuildUpRate 	= $(".cbu_rate").val();
	var pre_payments 		= $(".pre_payments").val();

	
	var annualInterest = approvedLoanAmount * interestRate;
	var monthlyInterest = annualInterest / 12;
	
	var totalInterest = monthlyInterest * monthsToPay;
	
	// Compute each component
	var insurance = (Math.ceil(approvedLoanAmount / 1000) * insuranceRate) * (monthsToPay / 12);
	var serviceFee = approvedLoanAmount * serviceFeeRate;
	var capitalBuildUp = approvedLoanAmount * capitalBuildUpRate;

	// Total deductions
	var totalDeductions = insurance + serviceFee + capitalBuildUp;

	// Net amount of loan
	var netAmountOfLoan = approvedLoanAmount - totalDeductions;

	
	var loan_payable = totalInterest + approvedLoanAmount;
	
	// Monthly amortization
	var monthlyAmortization = loan_payable / monthsToPay;
	
	//monthly interest
	var monthlyInterest = totalInterest / monthsToPay;
	
	//monthly principal
	var monthlyPrincipal = approvedLoanAmount / monthsToPay;
	
	

	// Update the fields on the form
	$('.Insurance').val(insurance.toFixed(2));
	$('.servicefee_amount').val(serviceFee.toFixed(2));
	$('.cbu_amount').val(capitalBuildUp.toFixed(2));
	$('.interest_amount').val(totalInterest.toFixed(2));
	$('.total_deduction').val(totalDeductions.toFixed(2));
	
	$('.NetAmountOfLoan').val(netAmountOfLoan.toFixed(2));
	$('.NetAmountOfLoan_text').text(netAmountOfLoan.toFixed(2));
	
	$('.monthlyAmortization').val(monthlyAmortization.toFixed(2));
	$('.monthly_principal').val(monthlyPrincipal.toFixed(2));
	$('.monthly_interest').val(monthlyInterest.toFixed(2));
	
	$('.loan_payable').val(loan_payable.toFixed(2));
	$('.loan_payable_text').text(loan_payable.toFixed(2));
	
	var futureDate = getDateMonthsFromNow(monthsToPay);
	$('.end_date').val(futureDate);
}


	
function isValidJSON(str) {
  try {
    JSON.parse(str);
    return true; 
  } catch (error) {
    return false; 
  }
}

function initTable(table){
	var cols = [];
	var tar  = []; 					
	var tl = "";		
	var wdth = [];	
	switch(table){
		case "#division_table":
		break;
		 cols = [0, 1, 2, 3, 4, 5];
		 tar  = [0, 1, 2, 3, 4, 5]; 			
		 wdth = [
			{width : "35%", targets : [0]},
			{width : "20%", targets : [1]},
			{width : "20%", targets : [2]},
			{width : "20%", targets : [3]},
			{width : "15%", targets : [4]},
			{width : "5%", targets :  [5]}		
		];
		 tl = "Divisions";
		showNormalTable(table, tl, cols, tar, wdth);	
		break;
		case "#schools_datable":
			
			var tdata = [
				{ data: "name", width: "90%"},
				{ data: "action", width: "10%"},								
			];
										  
			var cols = [0, 1]; //report columns
			var tar = [0, 1]; //target column sorting
			
			showIndexTable(table, getTheWebroot()  + "schools/indexajax", "School Data", tdata, cols, tar);
		break;
		default:
			showNormalTable(table, tl, cols, tar, wdth);
		break;
	}
	
	
}


function productCategoryHandler(tableid, url, t1, tdata, cols, tar) {
    if ($("#select_category").length) {
        $("#select_category").off('change').on('change', function() {
            var category = $(this).val();
            var queryParams = { category: category };  // Assuming you need to pass the selected category
            // Call showIndexTable with destroyFirst set to true
            showIndexTable(tableid, url, t1, tdata, cols, tar, queryParams, true);
        });
    }
}


function showIndexTable(tableid, url, t1, tdata, cols, tar, queryParams = null, destroyFirst = false){
			if (destroyFirst && $.fn.DataTable.isDataTable(tableid)) {
				$(tableid).DataTable().destroy();  // Destroy the existing DataTable
				$(tableid).empty();  // Clear the table body
			}
			
			var d = new Date();
			var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();

			$(tableid).DataTable({
					   dom: 'Blfrtip',
					   responsive: true,
					   bFilter: true,
					   buttons: [
						{
							extend: 'print',
							title: '<div class="text-left fs-12 bold">' + t1 + '</div><div class="text-left fs-11 bold">DATE GENERATED : ' + strDate + '</div>',
							exportOptions: {
								columns: cols
							}
						},
						{
							extend: 'csvHtml5',
							title: t1 + ' AS OF  ' + strDate,
							exportOptions: {
								columns: cols
							}
						},	
						{
							extend: 'excelHtml5',
							title: t1 + ' AS OF ' + strDate,
							exportOptions: {
								columns: cols
							}
						}
						], 
					  "processing"		: true,
					  "serverSide"		: true,
					  "ajax": {
						  "url"		: url,
						  "method"  : "POST", 
						  "headers" : {
							'X-CSRF-TOKEN' : $('[name="_csrfToken"]').val()
						  },
						  "data": function(d) {
							   
								return queryParams ? $.extend({}, d, queryParams) : d;
								
						   }
						 
					  },
					 
					  columnDefs: [
						{bSortable: false, targets: tar},
					  ],
						"columns": tdata,
						//"scrollY": "500px",
						"scrollCollapse": false,
						"lengthMenu": [[20, 500, 1000, 2000, -1], [20,  500, 1000, 2000, "All"]],
						"bStateSave": false, 
						"pagingType": "full_numbers",
						"fnDrawCallback": function(){
		
							
							if($(".change_request").length){
								//$(document).on("click", ".change_request", function(e){
								$(".change_request").off("click").on("click", function(e){
									e.preventDefault();
									var url			 = $(this).attr("href");
									var remove_view  = $(this).attr("remove_view");
									var remove_id 	 = $(this).attr("remove_id");
									changeRequest(url, remove_view, remove_id);
								});
							}
							
							/*if($(".approve").length){
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
							}*/
													
							productCategoryHandler(tableid, url, t1, tdata, cols, tar);
								

						}
			}); 
			
			
			if (queryParams) {
				$(tableid).DataTable().ajax.reload();
			}
		
}
	
function showNormalTable(tableid, t1, cols, tar, wdth){
				
		var d = new Date();
	    var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
		
		
		$(tableid).DataTable({
				   dom: 'Blfrtip',
				   bFilter: true,
				   buttons: [
					{
						extend: 'print',
						title: '<div class="text-left fs-12 bold">' + t1 + '</div><div class="text-left fs-11 bold">DATE GENERATED : ' + strDate + '</div>',
						exportOptions: {
							columns: cols
						}
					},
					{
						extend: 'csvHtml5',
						title: t1 + ' AS OF  ' + strDate,
						exportOptions: {
							columns: cols
						}
					},	
					{
						extend: 'excelHtml5',
						title: t1 + ' AS OF ' + strDate,
						exportOptions: {
							columns: cols
						}
					}
					], 
					"bAutoWidth": false,
				    columnDefs: {bSortable: false, targets : tar},
					//columns: wdth,
					"scrollCollapse": false,
				    "lengthMenu": [[10, 500, 1000, 2000, -1], [10,  500, 1000, 2000, "All"]],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					"fnDrawCallback": function(){
					/* 	$(function() {
							var start = moment().subtract(29, 'days');
							//var start = moment();
							var end = moment();

							function cb(start, end) {
								$('.reportrange span.ddata').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
							}

							$('.reportrange').daterangepicker({
								startDate: start,
								endDate: end,
								ranges: {
								   'Today': [moment(), moment()],
								   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
								   'Last 7 Days': [moment().subtract(6, 'days'), moment()],
								   'Last 30 Days': [moment().subtract(29, 'days'), moment()],
								   'This Month': [moment().startOf('month'), moment().endOf('month')],
								   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
								}
							}, cb);
			
							cb(start, end);					
	
							
						});	 */
						
						

					}
		}); 
}
	

/* $(document).on("click", ".refresh_table", function(e){
	var table = $(this).attr("table");
	$(table).DataTable().ajax.reload();
}); */

$(document).on("click", ".searchbtn", function(e){
	
	if($(".ddata").length){
		var  reportrange	= $(".ddata").html();	
		var to 				= reportrange.substr(reportrange.indexOf("- ")+2)
		var from 			= reportrange.substring(0, reportrange.indexOf(" -"));
	}
	
	var url  = $(this).attr("url");
	
	var tableid  = $(this).attr("tableid");
	var action  = $(this).attr("action");
	
	$(tableid).dataTable().fnClearTable();
	$(tableid).dataTable().fnDestroy();
	
	switch(action){
		case "sales":
			var cashier = $(".cashier").val();
			var payment = $(".payment").val();
			var status 	= $(".status").val();	
			url = url + "/" + from +"/" + to + "/" + payment + "/" + status + "/" + cashier;
			showSalesTable($(".cashiername").val() + " Sales", tableid, url);
		break;
		case "userlogins":
			var cashier = $(".cashier").val();
			url = url + "/" + cashier + "/" + from +"/" + to;			
			showAttendanceTable($(".cashiername").val() + " Attendance", tableid, url);
		break;
		case "stocks":
			var cashier = $(".cashier").val();
			url = url + "/new_stock/" + from +"/" + to + "/" + cashier;
			showStocksTable($(".cashiername").val() + " Stocks", tableid, url);
		break;
	}

});
			

function showSalesTable(reportname, tableid, url){
	var tdata = [
		 { data: "cashier", width: "10%"},
		{ data: "date_time", width: "10%"},					
		{ data: "total", width: "10%"},
		{ data: "status", width: "10%"},
		{ data: "payment", width: "10%"},
		{ data: "paid_amount", width: "10%"},
		{ data: "change", width: "10%"},
		{ data: "action", width: "10%"}					
	];
								  
	var cols = [1, 2, 3, 4 ,5 , 6]; //report columns
	var tar = [0, 1, 2, 3, 4 ,5 , 6, 7]; //target column sorting
	
	showIndexTable(tableid, url, reportname, tdata, cols, tar); 
}

function showAttendanceTable(reportname, tableid, url){
	 var tdata = [{ data: "login", width: "10%"},
		{ data: "logout", width: "20%"},
		{ data: "worktime", width: "10%"},				  
		{ data: "late", width: "10%"},				  
		{ data: "overtime", width: "10%"},				  
		{ data: "rate", width: "10%"},				  
		{ data: "ot_rate", width: "10%"}]
								  
	var cols = [ 1, 2, 3]; //report columns
	var tar = [ 0, 1, 2]; //target column sorting
	
	showIndexTable(tableid, url, reportname, tdata, cols, tar); 
}

function showStocksTable(reportname, tableid, url){
	var tdata = [
		 { data: "product", width: "10%"},
		{ data: "transaction", width: "10%"},					
		{ data: "account", width: "10%"},
		{ data: "rqty", width: "10%"},
		{ data: "qty", width: "10%"},
		{ data: "price", width: "10%"},
		{ data: "afqty", width: "10%"},
		{ data: "status", width: "10%"}					
	];				
								  
	var cols = [0, 1, 2, 3, 4 ,5 , 6, 7]; //report columns
	var tar = [0, 1, 2, 3, 4 ,5 , 6, 7]; //target column sorting
	
	showIndexTable(tableid, url, reportname, tdata, cols, tar); 
}


function uploadImage(_url, types, form){
		
		
		var postdata = $(form).serialize();
		//$("#uploadbtn").prop("disabled", true);
		var uploadObj  = $("#fileuploader").uploadFile({
			url: _url,
			headers: {
				'X-CSRF-Token' : $('[name="_csrfToken"]').val()
			}, 
			maxFileCount: 1,
			allowedTypes: types,
			//allowedTypes: "png, jpg, jpeg, JPG, JPEG, PNG",
			fileName:"defaultform",
			formData: $.extend({}, { postdata: $(form).serialize() }, { /* other data fields */ }),
			dragDrop: true,
			showCancel: true,
			cancelStr: "Cancel",
			uploadStr: "Product Image ( " + types + " )",
			showDone: false,			
			showError: true,				
			showDelete: false,			
			showAbort: false,
			extErrorStr: " Is not a valid file. Please upload the file with the following extension(s) - ",
			onSuccess:function(files,data,xhr,pd){	
				//var _data  = JSON.parse(data);	
				//if(data.resp=="1"){	
					//
				//}else{
					uploadObj.reset();
					$.alert(data.msg);	
					if($("#dtable_").length){
						$("#dtable_").DataTable().ajax.reload();
					}
				//}	
				
				
			},
			onError: function(files,status,errMsg,pd){
				alert("Something went wrong, please try again");
				uploadObj.reset();
			},
			onSelect:function(files){
				if($(".ajax-file-upload-error").text() === "") {					
					$('.save_image').off('click').on('click', function(){	
                        $.confirm({
                            title: 'Notification',
                            content: 'You are about to upload the image. Click Confirm to Proceed',
                            icon: '',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Confirm',
                                    btnClass: 'btn-success',
                                    action: function(){
										uploadObj.startUpload();					
									}
									
								},
								cancel: function(){
									$.alert('Submission has been canceled.');
								},
							}
						});								
					});								
				}else{
					$.alert('You have selected an invalid file.');
					uploadObj.reset();
				}
			},
			onSubmit:function(files){
				
			},
			showProgress: true,
			autoSubmit: false,
			doneStr: "file successfully uploaded",	
			showStatusAfterSuccess: false,
			showFileCounter: false,
			showFileSize: true,
			showPreview: true,		
			sequential:false,
			sequentialCount:1
		});
		
		
						
	/* 	$("#cancelupload").click( function(){
			uploadObj.reset();
		});
		 */
		
}

	