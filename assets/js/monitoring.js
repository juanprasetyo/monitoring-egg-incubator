$(window).on("load", function () {
	console.log(baseurl);
	let date, suhu, kelembaban;
	function showChart() {
	$.ajax({
		type: "POST",
		dataType: "JSON",
			url: baseurl + "dashboard/get_suhu_kelembaban",
		async: false,
	}).done((response) => {
		console.log(response);
		date = response.date;
		suhu = response.suhu;
		kelembaban = response.kelembaban;
	});
	let canvas = $("#lineChart");

	var lineChartData = {
		labels: date,
		datasets: [
			{
				label: "Suhu",
				borderColor: "red",
				backgroundColor: "red",
				fill: false,
				data: suhu,
				yAxisID: "y-axis-1",
			},
			{
				label: "Kelembaban",
				borderColor: "blue",
				backgroundColor: "blue",
				fill: false,
				data: kelembaban,
			},
		],
	};

	var myLineChart = new Chart(canvas, {
		type: "line",
		data: lineChartData,
		options: {
			responsive: true,
			hoverMode: "index",
			stacked: false,
			title: {
				display: true,
				text: "Monitoring Suhu dan Kelembaban",
			},
			scales: {
				yAxes: [
					{
						type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
						display: true,
						position: "left",
						id: "y-axis-1",
					},
				],
			},
		},
	});
		window.setTimeout(showChart, 10000);
	}
	showChart();

	function showLastSuhuKelembaban() {
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: baseurl + "dashboard/get_last_suhu_kelembaban",
			async: false,
		}).done((response) => {
			$(".suhu").text(response["SUHU"]);
			$(".kelembaban").text(response["KELEMBABAN"]);
		});
		window.setTimeout(showLastSuhuKelembaban, 10000);
	}
	showLastSuhuKelembaban();
});
