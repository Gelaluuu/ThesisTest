var PieChartOptions = {
	
          series: [44, 55, 41,],
          chart: {
          type: 'donut',
        },
        responsive: [{
     
          options: {
            chart: {
            },
            legend: {
              display:false
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#status-chart"), PieChartOptions);
        chart.render();
