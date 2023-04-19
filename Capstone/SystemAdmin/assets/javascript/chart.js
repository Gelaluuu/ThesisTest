/*function bar_graph(data){
	
	for(var i in data){
		console.log(i);
	}
	const ctx = document.getElementById('bar').getContext('2d');
	const bar = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['Female', 'Male'],
			datasets: [{
				label: "gender",
				data: [male_st.innerText, female_st.innerText],
				backgroundColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
				],
				borderWidth: 1
			}]
		},
		options: {
			plugins:{
				legend:{
					display: false
				}
			},
			
			maintainAspectRatio:false,
			scales: {
				x: {
					grid:{
						display:false
					}
				},
				y: {
					beginAtZero: true,
					grid: {
						display:false
					}
				}
			}
		}
	});

	const ctx2 = document.getElementById('doughnut').getContext('2d');
	const doughnut = new Chart(ctx2, {
		type: 'doughnut',
		data: {
			labels: ['Severe', 'Moderate', 'Average'],
			datasets: [{
				data: [12, 19, 3],
				backgroundColor: [
				   'rgba(255, 99, 132, 1)',
				   'rgba(255, 206, 86, 1)',
				   'rgba(75, 192, 192, 1)'
				],
				borderColor: [
				   'rgba(255, 99, 132, 1)',
				   'rgba(54, 162, 235, 1)',
				   'rgba(75, 192, 192, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			maintainAspectRatio:false,
			x: {
				display: false
			},
			y: {
				ticks:{
					display:false
				},
				grid: {
					display: false
				}
			}
		}
		
	});

	const dataMonths = [{ months: "Jan",Status:{ave:20,mode:23,seve:2}},
						{ months: "Feb",Status:{ave:40,mode:11,seve:1}},
						{ months: "Mar",Status:{ave:600,mode:40,seve:10}},
						{ months: "Apr",Status:{ave:100,mode:10,seve:20}},
						{ months: "May",Status:{ave:110,mode:30,seve:8}},
						{ months: "Jun",Status:{ave:40,mode:11,seve:9}},
						{ months: "Jul",Status:{ave:500,mode:11,seve:11}},
						{ months: "Aug",Status:{ave:200,mode:100,seve:5}},
						{ months: "Sep",Status:{ave:400,mode:7,seve:7}},
						{ months: "Oct",Status:{ave:250,mode:4,seve:9}},
						{ months: "Nov",Status:{ave:120,mode:3,seve:5}},
						{ months: "Dec",Status:{ave:30,mode:2,seve:0}},
	];
	const ctx3 = document.getElementById('line').getContext('2d');
	const line = new Chart(ctx3, {
		type: 'line',
		data: {
			datasets: [{
				label:'Average',
				data: dataMonths,
				backgroundColor: '#1bff00',         
				borderColor: '#1bff00',
				borderWidth: 1,
				tension:0.4,
				parsing:{
					xAxisKey: 'months',
					yAxisKey: 'Status.ave',
				},
			},{
				label:'Moderate',
				data: dataMonths,
				backgroundColor: 'Yellow',         
				borderColor: 'Yellow',
				borderWidth: 1,
				tension:0.4,
				parsing:{
					xAxisKey: 'months',
					yAxisKey: 'Status.mode',
				},
			},{
				label:'Severe',
				data: dataMonths,
				backgroundColor: 'Red',         
				borderColor: 'Red',
				borderWidth: 1,
				tension:0.4,
				parsing:{
					xAxisKey: 'months',
					yAxisKey: 'Status.seve',
				},
			}]
		},
		options: {
			maintainAspectRatio:false,
			x: {
				display: false
			},
			y: {
				ticks:{
					display:false
				},
				grid: {
					display: false
				}
			}
		}
		
	});

 
};*/
