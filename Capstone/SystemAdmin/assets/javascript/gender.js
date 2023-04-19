
        var BarChartOptions = {
				Labels:['Male','Female'],
			  datassets: [{
				
				labels:['Female','Male'],
				data: [400, 430,]
			}],
          chart: {
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: true,
        },
        xaxis: {
          categories: ['Female','Male'],
        }
        };

        var chart = new ApexCharts(document.querySelector("#gender-chart"), BarChartOptions);
        chart.render();
      
      
    