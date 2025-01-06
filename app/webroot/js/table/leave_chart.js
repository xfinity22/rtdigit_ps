$(function () {
  'use strict';	
	
  
  if ($("#leave-chart").length) {
    var options = {
      type: 'bar',
      data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	 datasets: [{
            label: 'VL',
            data: getEmpLeave(1),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[0],
            borderColor: chartColors[0],
            borderWidth: 0
          },
          {
            label: 'SL',
             data: getEmpLeave(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[1],
            borderColor: chartColors[1],
            borderWidth: 0
          },
          {
            label: 'SPL',
             data: getEmpLeave(3),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[2],
            borderColor: chartColors[2],
            borderWidth: 0
          },
		  {
		  label: 'PL',
             data: getEmpLeave(4),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[3],
            borderColor: chartColors[3],
            borderWidth: 0
          },
		  {
		  label: 'ML',
            data: getEmpLeave(5),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[4],
            borderColor: chartColors[4],
            borderWidth: 0
          },
		  {
		  label: 'BL',
             data: getEmpLeave(6),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[5],
            borderColor: chartColors[5],
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

    var ctx = document.getElementById('leave-chart').getContext('2d');
    new Chart(ctx, options);
  }
  
  if ($("#single-leave-chart").length) {
    var options = {
      type: 'bar',
      data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	 datasets: [{
            label: 'VL',
            data: getEmpLeave(1),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[0],
            borderColor: chartColors[0],
            borderWidth: 0
          },
          {
            label: 'SL',
             data: getEmpLeave(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[1],
            borderColor: chartColors[1],
            borderWidth: 0
          },
          {
            label: 'SPL',
             data: getEmpLeave(3),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[2],
            borderColor: chartColors[2],
            borderWidth: 0
          },
		  {
		  label: 'PL',
             data: getEmpLeave(4),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[3],
            borderColor: chartColors[3],
            borderWidth: 0
          },
		  {
		  label: 'ML',
            data: getEmpLeave(5),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[4],
            borderColor: chartColors[4],
            borderWidth: 0
          },
		  {
		  label: 'BL',
             data: getEmpLeave(6),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[5],
            borderColor: chartColors[5],
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

    var ctx = document.getElementById('single-leave-chart').getContext('2d');
    new Chart(ctx, options);
  }
  
 
});