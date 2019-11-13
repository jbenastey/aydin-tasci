$(document).ready(function () {
	'use strict';
	var root = window.location.origin + '/aydin-tasci/';

	var ticksStyle = {
		fontColor: '#495057',
		fontStyle: 'bold'
	};

	var mode = 'index';
	var intersect = true;

	var $salesChart = $('#dosen-chart');
	$.ajax({
		url: root + 'grafik/dosen',
		type: 'GET',
		async: true,
		cache: false,
		dataType: 'json',
		success: function (response) {
			var faktor = [];
			var jumlahnya = [];
			for (var i = 0; i < response.faktor.length; i++) {
				faktor.push(response.faktor[i].faktor_nama);
			}
			for (var k = 0; k < faktor.length; k++) {
				var total = 0;
				var hitung = 0;
				for (var j = 0; j < response.grafik.length; j++) {
					if (response.grafik[j].faktor_nama === faktor[k]) {
						total = total + parseInt(response.grafik[j].detail_jawaban);
						hitung++;
					}
				}
				var rata = total/hitung;
				jumlahnya.push(rata)
			}
			var salesChart = new Chart($salesChart, {
				type: 'bar',
				data: {
					labels: faktor,
					datasets: [
						{
							label: 'Nilai',
							backgroundColor: '#007bff',
							borderColor: '#007bff',
							data: jumlahnya
						}
					]
				},
				options: {
					maintainAspectRatio: false,
					tooltips: {
						mode: mode,
						intersect: intersect
					},
					hover: {
						mode: mode,
						intersect: intersect
					},
					legend: {
						display: true,
						position: 'bottom',
					},
					scales: {
						yAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					},
					title: {
						display: true,
						text: 'Responden Dosen'
					},
				}
			});
		},
		error: function (response) {
			console.log(response.status + 'error');
		}
	});
	var $salesChart2 = $('#mahasiswa-chart');
	$.ajax({
		url: root + 'grafik/mahasiswa',
		type: 'GET',
		async: true,
		cache: false,
		dataType: 'json',
		success: function (response) {
			var faktor = [];
			var jumlahnya = [];
			for (var i = 0; i < response.faktor.length; i++) {
				faktor.push(response.faktor[i].faktor_nama);
			}
			for (var k = 0; k < faktor.length; k++) {
				var total = 0;
				var hitung = 0;
				for (var j = 0; j < response.grafik.length; j++) {
					if (response.grafik[j].faktor_nama === faktor[k]) {
						total = total + parseInt(response.grafik[j].detail_jawaban);
						hitung++;
					}
				}
				var rata = total/hitung;
				jumlahnya.push(rata)
			}
			var salesChart = new Chart($salesChart2, {
				type: 'bar',
				data: {
					labels: faktor,
					datasets: [
						{
							label: 'Nilai',
							backgroundColor: '#00ff30',
							borderColor: '#00ff30',
							data: jumlahnya
						}
					]
				},
				options: {
					maintainAspectRatio: false,
					tooltips: {
						mode: mode,
						intersect: intersect
					},
					hover: {
						mode: mode,
						intersect: intersect
					},
					legend: {
						display: true,
						position: 'bottom',
					},
					scales: {
						yAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					},
					title: {
						display: true,
						text: 'Responden Mahasiswa'
					},
				}
			});
		},
		error: function (response) {
			console.log(response.status + 'error');
		}
	});
})
