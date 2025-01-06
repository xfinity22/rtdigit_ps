$(function () {
  'use strict';	
	if ($("#chartjs-staked-line-chart").length) {
    var options = {
      type: 'bar',
      data: {
       labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	 datasets: [{
            label: 'SL',
            data: getTeamLeave(1),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[0],
            borderColor: chartColors[0],
            borderWidth: 0
          },
          {
            label: 'VL',
            data: getTeamLeave(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[1],
            borderColor: chartColors[1],
            borderWidth: 0
          },
          {
            label: 'SPL',
            data: getTeamLeave(3),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[2],
            borderColor: chartColors[2],
            borderWidth: 0
          },
          {
            label: 'PL',
            data: getTeamLeave(4),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[3],
            borderColor: chartColors[3],
            borderWidth: 0
          },
          {
            label: 'ML',
            data: getTeamLeave(5),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[4],
            borderColor: chartColors[4],
            borderWidth: 0
          },
          {
            label: 'BL',
            data: getTeamLeave(6),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[5],
            borderColor: chartColors[5],
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

    var ctx = document.getElementById('chartjs-staked-line-chart').getContext('2d');
    new Chart(ctx, options);
  }

  if ($("#chartjs-staked-area-chart").length) {
    var options = {
      type: 'bar',
      data: {
       labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	 datasets: [{
            label: 'Late',
            data: getTeamLate(1),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[0],
            borderColor: chartColors[0],
            borderWidth: 0
          },
          {
            label: 'Over Time',
            data: getTeamLate(2),
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[1],
            borderColor: chartColors[1],
            borderWidth: 0
          },
          {
            label: 'Under Time',
            data: getTeamLate(3),
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

    var ctx = document.getElementById('chartjs-staked-area-chart').getContext('2d');
    new Chart(ctx, options);
  }
  
  if ($("#team-performance-chart").length) {
    var options = {
      type: 'bar',
      data: {
      labels: ["Job Knowledge", "Work Quality", "Punctuality", "Communication", "Dependability"],
	 datasets: [{
            label: ['Excellent'],
            data: [12, 23, 11, 12, 10],
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[0],
            borderColor: chartColors[0],
            borderWidth: 0
          },
          {
           label: ['Average'],
            data: [17, 45, 11, 12, 10],
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[1],
            borderColor: chartColors[1],
            borderWidth: 0
          },
		  {
           label: ['Poor'],
            data: [19, 11, 11, 12, 10],
            borderWidth: 2,
            fill: false,
            backgroundColor: chartColors[2],
            borderColor: chartColors[2],
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

    var ctx = document.getElementById('team-performance-chart').getContext('2d');
    new Chart(ctx, options);
  }
  
 
});