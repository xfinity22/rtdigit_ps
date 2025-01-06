$(function () {
  'use strict';	
	
  
  if ($("#attendance-chart").length) {
    var options = {
      type: 'bar',
      data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	 datasets: [{
            label: 'Late',
            data: getEmpLate(1),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[0],
            borderColor: chartColors[0],
            borderWidth: 0
          },
          {
            label: 'Over Time',
             data: getEmpLate(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[1],
            borderColor: chartColors[1],
            borderWidth: 0
          },
          {
            label: 'Under Time',
            data: getEmpLate(3),
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

    var ctx = document.getElementById('attendance-chart').getContext('2d');
    new Chart(ctx, options);
  }
  
  if ($("#single-leave-chart").length) {
    var options = {
      type: 'bar',
      data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	 datasets: [{
            label: 'Late',
            data: getEmpLate(1),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[0],
            borderColor: chartColors[0],
            borderWidth: 0
          },
          {
            label: 'Over Time',
             data: getEmpLate(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[1],
            borderColor: chartColors[1],
            borderWidth: 0
          },
          {
            label: 'Under Time',
            data: getEmpLate(3),
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

    var ctx = document.getElementById('single-leave-chart').getContext('2d');
    new Chart(ctx, options);
  }
  
 
});