
	
/* $.confirm({
    title: 'What is up?',
    content: 'Here goes a little content',
    type: 'green',
    buttons: {   
        ok: {
            text: "ok!",
            btnClass: 'btn-primary',
            keys: ['enter'],
            action: function(){
                 console.log('the user clicked confirm');
            }
        },
        cancel: function(){
                console.log('the user clicked cancel');
        }
    }
}); */


 // confirmation
                    $('.btnsave').on('click', function(){
						
						var form	=  $(this).attr("form");
						var postdata = $(form).serialize();
						var url		 = $(this).attr("url"); //$("#default_form").attr("action");
						
						
                        $.confirm({
                            title: 'Notification',
                            content: 'You are about to submit the information. Click Proceed to Confirm',
                            icon: '',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Proceed',
                                    btnClass: 'btn-blue',
                                    action: function(){
										
										$.ajax({
															url: url,
															data: postdata,
															type: "JSON",
															method: "post",
															beforeSend: function(){
																// $.alert('you clicked on <strong>cancel</strong>');
															},
															success:function(resp){
																
																var res = JSON.parse(resp);
																if(res.resp=="1"){
																	$('#default_form').trigger("reset");
																}
																
																$.alert(res.msg);
															
															},
															error: function(e1, e2, e3){
																 $.alert('Unable to process your request at the moment. Please try again in a short while');
															},
															complete: function(){
																
															}
															
														});	
														
                                       /*  $.confirm({
                                            title: 'Confirmation',
                                            content: 'This information will be saved. Click Confirm.',
                                            icon: '',
                                            animation: 'scale',
                                            closeAnimation: 'zoom',
                                            buttons: {
                                                confirm: {
                                                    text: 'Confirm',
                                                    btnClass: 'btn-orange',
                                                    action: function(){
														$.ajax({
															url: url,
															data: postdata,
															type: "JSON",
															method: "post",
															beforeSend: function(){
																// $.alert('you clicked on <strong>cancel</strong>');
															},
															success:function(resp){
																
																var res = JSON.parse(resp);
																if(res.resp=="1"){
																	$('#default_form').trigger("reset");
																}
																
																$.alert(res.msg);
															
															},
															error: function(e1, e2, e3){
																 $.alert('Unable to process your request at the moment. Please try again in a short while');
															},
															complete: function(){
																
															}
															
														});	
														
														//$(form).submit();
						
                                                    }
                                                },
                                                cancel: function(){
                                                    $.alert('Saving information has been canceled.');
                                                }
                                            }
                                        }); */
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
					