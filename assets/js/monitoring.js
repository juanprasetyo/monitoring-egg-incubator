$(window).on("load", function () {
	let userLink;
	if ($(".role_id").val() == 1) {
		userLink = "dashboard/";
	} else {
		userLink = "admin/";
	}
	let date, suhu, kelembaban;
	function showChart() {
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: baseurl + userLink + "get_suhu_kelembaban",
			async: false,
		}).done((response) => {
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
				animation: {
					duration: 0,
				},
				responsive: true,
				hoverMode: "index",
				stacked: false,
				title: {
					display: true,
					text: "Monitoring Suhu dan Kelembaban",
					fontSize: 28,
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
			url: baseurl + userLink + "get_last_suhu_kelembaban",
			async: false,
		}).done((response) => {
			$(".suhu").text(response["SUHU"]);
			$(".kelembaban").text(response["KELEMBABAN"]);
		});
		window.setTimeout(showLastSuhuKelembaban, 1000);
	}
	showLastSuhuKelembaban();

	function showConfigDevice() {
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: baseurl + "dashboard/get_config_device",
			async: false,
		}).done((response) => {
			response.lampu == 1
				? $(".switchLampu").prop("checked", true)
				: $(".switchLampu").prop("checked", false);
			response.kipas == 1
				? $(".switchKipas").prop("checked", true)
				: $(".switchKipas").prop("checked", false);
		});
		window.setTimeout(showConfigDevice, 10000);
	}
	showConfigDevice();

	$(".switchLampu").on("change", function () {
		if (this.checked) {
			updateStatusLampu(1);
		} else {
			updateStatusLampu(0);
		}
	});

	$(".switchKipas").on("change", function () {
		if (this.checked) {
			updateStatusKipas(1);
		} else {
			updateStatusKipas(0);
		}
	});

	function updateStatusLampu(status) {
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: baseurl + "admin/update_status_lampu",
			data: {
				status: status,
			},
		});
	}

	function updateStatusKipas(status) {
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: baseurl + "admin/update_status_kipas",
			data: {
				status: status,
			},
		});
	}

	$(".settingDHT").click(function () {
		let modal = $("#mdlSettingDHT");
		modal.modal("show");

		let dataConfigDHT = getDataConfigDHT();
		if ($(this).hasClass("settingSuhu")) {
			$(".jenisSetting").val("suhu");
			modal.find(".modal-title").text("Atur Suhu");
			$(".input-config-min").val(dataConfigDHT.SUHU_MIN);
			$(".input-config-max").val(dataConfigDHT.SUHU_MAX);
			$(".input-config-min, .input-config-max").attr("min", 0);
			$(".input-config-min, .input-config-max").attr("max", 50);
		} else if ($(this).hasClass("settingKelembaban")) {
			$(".jenisSetting").val("suhu");
			modal.find(".modal-title").text("Atur Kelembaban");
			$(".input-config-min").val(dataConfigDHT.KELEMBABAN_MIN);
			$(".input-config-max").val(dataConfigDHT.KELEMBABAN_MAX);
			$(".input-config-min, .input-config-max").attr("min", 20);
			$(".input-config-min, .input-config-max").attr("max", 80);
		}

		validateConfigDHT();
	});

	function getDataConfigDHT() {
		let data;

		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: baseurl + userLink + "get_data_config_dht",
			async: false,
		}).done((response) => {
			data = response;
		});
		return data;
	}

	$(".btn-reset-config-dht").click(function () {
		let judul = $(this).parents(".modal-content").find(".modal-title").text();
		if (judul.includes("Suhu")) {
			$(".input-config-min").val(38);
			$(".input-config-max").val(40);
		} else if (judul.includes("Kelembaban")) {
			$(".input-config-min").val(50);
			$(".input-config-max").val(60);
		}
	});

	function validateConfigDHT() {
		let inputsConfigDHT = $(".inputConfig");
		// loop over each input and watch blur event
		let validation = Array.prototype.filter.call(
			inputsConfigDHT,
			function (input) {
				input.addEventListener(
					"input",
					function (event) {
						// reset
						input.classList.remove("is-invalid");
						input.classList.remove("is-valid");

						if (input.checkValidity() === false) {
							input.classList.add("is-invalid");
						} else {
							input.classList.add("is-valid");
						}
					},
					false
				);
			}
		);
	}

	$("#formConfigDHT").submit(function (e) {
		e.preventDefault();
		let jenisSetting = $(".jenisSetting").val();
		Swal.fire({
			title: "Apakah anda yakin?",
			text: "Config DHT akan diupdate",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, Update!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					dataType: "JSON",
					url: baseurl + userLink + "save_config_dht",
					data: {
						jenis: jenisSetting,
						min: $(".input-config-min").val(),
						max: $(".input-config-max").val(),
					},
				}).done((response) => {
					if (response == 1) {
						Swal.fire("Berhasil!", "Config berhasil di update.", "success");
					}
					$("#mdlSettingDHT").modal("hide");
				});
			}
		});
	});
});
