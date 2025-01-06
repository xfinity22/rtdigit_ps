
function getListByGender(type){
	var url	=  _webroot + "personals/getListByGender/" + type;
	 var result = 0;
     $.ajax({
        url: url,
        type: "get",
        dataType: "json",
        async: false,
        success: function(data) {
            result = data;
        } 
     });
     return result;
}


$(function () {
  'use strict';	
	
  if ($("#overview_gender").length) {
    var options = {
      type: 'bar',
      data: {
          labels: ["Total"],
	 datasets: [{
            label: 'Male',
            data: getListByGender("MALE"),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[0],
            borderColor: chartColors[0],
            borderWidth: 0
          },
          {
            label: 'Female',
             data: getListByGender("FEMALE"),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[1],
            borderColor: chartColors[1],
            borderWidth: 0
          }
        ]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              reverse: false
            },
			
          }]
        },
        fill: false,
        legend: {
                display: true,
                labels: {
                    color: 'rgb(255, 99, 132)'
                },
				position: 'top',
				align: 'center'
            }
      },
	 
    }

    var ctx = document.getElementById('overview_gender').getContext('2d');
    new Chart(ctx, options);
  }

  if ($("#overview_head").length) {
    var options = {
      type: 'bar',
      data: {
          labels: ["Total"],
	 datasets: [{
            label: 'Male',
            data: getListByGender("MALE"),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[0],
            borderColor: chartColors[0],
            borderWidth: 0
          },
          {
            label: 'Female',
             data: getListByGender("FEMALE"),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[1],
            borderColor: chartColors[1],
            borderWidth: 0
          }
        ]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              reverse: false
            },
			
          }]
        },
        fill: false,
        legend: {
                display: true,
                labels: {
                    color: 'rgb(255, 99, 132)'
                },
				position: 'top',
				align: 'center'
            }
      },
	 
    }

    var ctx = document.getElementById('overview_head').getContext('2d');
    new Chart(ctx, options);
  }
  
  if ($("#overview_age").length) {
    var options = {
      type: 'bar',
      data: {
          labels: ["Total"],
	 datasets: [{
            label: '16-25',
            data: ["243"], //getEmpLeave(1),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[0],
            borderColor: chartColors[0],
            borderWidth: 0
          },
          {
            label: '26-40',
             data: ["783"], //getEmpLeave(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[1],
            borderColor: chartColors[1],
            borderWidth: 0
          },
		  {
            label: '41-60',
             data: ["56"], //getEmpLeave(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[2],
            borderColor: chartColors[2],
            borderWidth: 0
          },
		  {
            label: '60 & Above',
             data: ["24"], //getEmpLeave(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[3],
            borderColor: chartColors[3],
            borderWidth: 0
          }
        ]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              reverse: false
            },
			
          }]
        },
        fill: false,
        legend: {
                display: true,
                labels: {
                    color: 'rgb(255, 99, 132)'
                },
				position: 'top',
				align: 'center'
            }
      },
	 
    }

    var ctx = document.getElementById('overview_age').getContext('2d');
    new Chart(ctx, options);
  }
  
  if ($("#overview_education").length) {
    var options = {
      type: 'bar',
      data: {
          labels: ["Total"],
	 datasets: [{
            label: 'Professional',
            data: ["987"], //getEmpLeave(1),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[0],
            borderColor: chartColors[0],
            borderWidth: 0
          },
          {
            label: 'College Graduate',
             data: ["678"], //getEmpLeave(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[1],
            borderColor: chartColors[1],
            borderWidth: 0
          },
		  {
            label: 'Undergraduate',
             data: ["787"], //getEmpLeave(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[2],
            borderColor: chartColors[2],
            borderWidth: 0
          },
		  {
            label: 'Vocational',
             data: ["245"], //getEmpLeave(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[3],
            borderColor: chartColors[3],
            borderWidth: 0
          },
		  {
            label: 'SR High Grad',
             data: ["78"], //getEmpLeave(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[4],
            borderColor: chartColors[4],
            borderWidth: 0
          }
        ]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              reverse: false
            },
			
          }]
        },
        fill: false,
        legend: {
                display: true,
                labels: {
                    color: 'rgb(255, 99, 132)'
                },
				position: 'top',
				align: 'center'
            }
      },
	 
    }

    var ctx = document.getElementById('overview_education').getContext('2d');
    new Chart(ctx, options);
  }
  
  if ($("#overview_rate").length) {
    var options = {
      type: 'bar',
      data: {
          labels: ["Total"],
	 datasets: [{
            label: '10k - 15k',
            data: ["256"], //getEmpLeave(1),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[0],
            borderColor: chartColors[0],
            borderWidth: 0
          },
          {
            label: '16k - 20k',
             data: ["678"], //getEmpLeave(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[1],
            borderColor: chartColors[1],
            borderWidth: 0
          },
		  {
            label: '21k - 30k',
             data: ["67"], //getEmpLeave(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[2],
            borderColor: chartColors[2],
            borderWidth: 0
          },
		  {
            label: '31k-40k',
             data: ["24"], //getEmpLeave(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[3],
            borderColor: chartColors[3],
            borderWidth: 0
          },
		  {
            label: '50k & Above',
             data: ["19"], //getEmpLeave(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[4],
            borderColor: chartColors[4],
            borderWidth: 0
          }
        ]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              reverse: false
            },
			
          }]
        },
        fill: false,
        legend: {
                display: true,
                labels: {
                    color: 'rgb(255, 99, 132)'
                },
				position: 'top',
				align: 'center'
            }
      },
	 
    }

    var ctx = document.getElementById('overview_rate').getContext('2d');
    new Chart(ctx, options);
  }
  
  if ($("#overview_type").length) {
    var options = {
      type: 'bar',
      data: {
          labels: ["Total"],
	 datasets: [{
            label: 'Agent',
            data: ["156"], //getEmpLeave(1),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[0],
            borderColor: chartColors[0],
            borderWidth: 0
          },
          {
            label: 'Support',
             data: ["146"], //getEmpLeave(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[1],
            borderColor: chartColors[1],
            borderWidth: 0
          },
		  {
            label: 'Employee',
             data: ["895"], //getEmpLeave(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[2],
            borderColor: chartColors[2],
            borderWidth: 0
          },
        ]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              reverse: false
            },
			
          }]
        },
        fill: false,
        legend: {
                display: true,
                labels: {
                    color: 'rgb(255, 99, 132)'
                },
				position: 'top',
				align: 'center'
            }
      },
	 
    }

    var ctx = document.getElementById('overview_type').getContext('2d');
    new Chart(ctx, options);
  }
  
 
});


