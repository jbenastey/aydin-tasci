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
			console.log(response);
			var faktor = [];
			var jumlahnya = [];
			var jumlahfst = [];
			var jumlahftk = [];
			var jumlahfud = [];
			var jumlahfps = [];
			var jumlahfes = [];
			var jumlahfsh = [];
			var jumlahfdk = [];
			var jumlahfpp = [];
			for (var i = 0; i < response.faktor.length; i++) {
				faktor.push(response.faktor[i].faktor_nama);
			}
			for (var k = 0; k < faktor.length; k++) {
				var totalfst = 0;
				var hitungfst = 0;
				var totalftk = 0;
				var hitungftk = 0;
				var totalfud = 0;
				var hitungfud = 0;
				var totalfps = 0;
				var hitungfps = 0;
				var totalfes = 0;
				var hitungfes = 0;
				var totalfsh = 0;
				var hitungfsh = 0;
				var totalfdk = 0;
				var totalfpp = 0;
				var hitungfdk = 0;
				var hitungfpp = 0;
				for (var j = 0; j < response.grafik.length; j++) {
					if (response.grafik[j].faktor_nama === faktor[k]) {
						if (response.grafik[j].kuesioner_fakultas === 'fst'){
							totalfst = totalfst + parseInt(response.grafik[j].detail_jawaban);
							hitungfst++;
						}
						else if (response.grafik[j].kuesioner_fakultas === 'ftk'){
							totalftk = totalftk + parseInt(response.grafik[j].detail_jawaban);
							hitungftk++;
						}
						else if (response.grafik[j].kuesioner_fakultas === 'fud'){
							totalfud = totalfud + parseInt(response.grafik[j].detail_jawaban);
							hitungfud++;
						}
						else if (response.grafik[j].kuesioner_fakultas === 'fpsi'){
							totalfps = totalfps + parseInt(response.grafik[j].detail_jawaban);
							hitungfps++;
						}
						else if (response.grafik[j].kuesioner_fakultas === 'fekonsos'){
							totalfes = totalfes + parseInt(response.grafik[j].detail_jawaban);
							hitungfes++;
						}
						else if (response.grafik[j].kuesioner_fakultas === 'fasih'){
							totalfsh = totalfsh + parseInt(response.grafik[j].detail_jawaban);
							hitungfsh++;
						}
						else if (response.grafik[j].kuesioner_fakultas === 'fdk'){
							totalfdk = totalfdk + parseInt(response.grafik[j].detail_jawaban);
							hitungfdk++;
						}
						else if (response.grafik[j].kuesioner_fakultas === 'fapertapet'){
							totalfpp = totalfpp + parseInt(response.grafik[j].detail_jawaban);
							hitungfpp++;
						}
					}
				}
				var ratafst = totalfst/hitungfst;
				jumlahfst.push(getNum(ratafst).toFixed(2));
				var rataftk = totalftk/hitungftk;
				jumlahftk.push(getNum(rataftk).toFixed(2));
				var ratafud = totalfud/hitungfud;
				jumlahfud.push(getNum(ratafud).toFixed(2));
				var ratafps = totalfps/hitungfps;
				jumlahfps.push(getNum(ratafps).toFixed(2));
				var ratafes = totalfes/hitungfes;
				jumlahfes.push(getNum(ratafes).toFixed(2));
				var ratafsh = totalfsh/hitungfsh;
				jumlahfsh.push(getNum(ratafsh).toFixed(2));
				var ratafdk = totalfdk/hitungfdk;
				jumlahfdk.push(getNum(ratafdk).toFixed(2));
				var ratafpp = totalfpp/hitungfpp;
				jumlahfpp.push(getNum(ratafpp).toFixed(2));
			}
			var salesChart = new Chart($salesChart, {
				type: 'bar',
				data: {
					labels: faktor,
					datasets: [
						{
							label: 'FST',
							backgroundColor: '#007bff',
							borderColor: '#007bff',
							data: jumlahfst
						},
						{
							label: 'FSH',
							backgroundColor: '#04ff13',
							borderColor: '#04ff13',
							data: jumlahfsh
						},
						{
							label: 'FTK',
							backgroundColor: '#ff0070',
							borderColor: '#ff0070',
							data: jumlahftk
						},
						{
							label: 'FUD',
							backgroundColor: '#09f5ff',
							borderColor: '#09f5ff',
							data: jumlahfud
						},
						{
							label: 'FES',
							backgroundColor: '#ffd200',
							borderColor: '#ffd200',
							data: jumlahfes
						},
						{
							label: 'FDK',
							backgroundColor: '#eb00ff',
							borderColor: '#eb00ff',
							data: jumlahfdk
						},
						{
							label: 'FPP',
							backgroundColor: '#ffc94c',
							borderColor: '#ffc94c',
							data: jumlahfpp
						},
						{
							label: 'FPS',
							backgroundColor: '#ff00d8',
							borderColor: '#ff00d8',
							data: jumlahfps
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
			console.log(response);
			var faktor = [];
			var jumlahnya = [];
			var jumlahfst = [];
			var jumlahftk = [];
			var jumlahfud = [];
			var jumlahfps = [];
			var jumlahfes = [];
			var jumlahfsh = [];
			var jumlahfdk = [];
			var jumlahfpp = [];
			for (var i = 0; i < response.faktor.length; i++) {
				faktor.push(response.faktor[i].faktor_nama);
			}
			for (var k = 0; k < faktor.length; k++) {
				var totalfst = 0;
				var hitungfst = 0;
				var totalftk = 0;
				var hitungftk = 0;
				var totalfud = 0;
				var hitungfud = 0;
				var totalfps = 0;
				var hitungfps = 0;
				var totalfes = 0;
				var hitungfes = 0;
				var totalfsh = 0;
				var hitungfsh = 0;
				var totalfdk = 0;
				var totalfpp = 0;
				var hitungfdk = 0;
				var hitungfpp = 0;
				for (var j = 0; j < response.grafik.length; j++) {
					if (response.grafik[j].faktor_nama === faktor[k]) {
						if (response.grafik[j].kuesioner_fakultas === 'fst'){
							totalfst = totalfst + parseInt(response.grafik[j].detail_jawaban);
							hitungfst++;
						}
						else if (response.grafik[j].kuesioner_fakultas === 'ftk'){
							totalftk = totalftk + parseInt(response.grafik[j].detail_jawaban);
							hitungftk++;
						}
						else if (response.grafik[j].kuesioner_fakultas === 'fud'){
							totalfud = totalfud + parseInt(response.grafik[j].detail_jawaban);
							hitungfud++;
						}
						else if (response.grafik[j].kuesioner_fakultas === 'fpsi'){
							totalfps = totalfps + parseInt(response.grafik[j].detail_jawaban);
							hitungfps++;
						}
						else if (response.grafik[j].kuesioner_fakultas === 'fekonsos'){
							totalfes = totalfes + parseInt(response.grafik[j].detail_jawaban);
							hitungfes++;
						}
						else if (response.grafik[j].kuesioner_fakultas === 'fasih'){
							totalfsh = totalfsh + parseInt(response.grafik[j].detail_jawaban);
							hitungfsh++;
						}
						else if (response.grafik[j].kuesioner_fakultas === 'fdk'){
							totalfdk = totalfdk + parseInt(response.grafik[j].detail_jawaban);
							hitungfdk++;
						}
						else if (response.grafik[j].kuesioner_fakultas === 'fapertapet'){
							totalfpp = totalfpp + parseInt(response.grafik[j].detail_jawaban);
							hitungfpp++;
						}
					}
				}
				var ratafst = totalfst/hitungfst;
				jumlahfst.push(getNum(ratafst).toFixed(2));
				var rataftk = totalftk/hitungftk;
				jumlahftk.push(getNum(rataftk).toFixed(2));
				var ratafud = totalfud/hitungfud;
				jumlahfud.push(getNum(ratafud).toFixed(2));
				var ratafps = totalfps/hitungfps;
				jumlahfps.push(getNum(ratafps).toFixed(2));
				var ratafes = totalfes/hitungfes;
				jumlahfes.push(getNum(ratafes).toFixed(2));
				var ratafsh = totalfsh/hitungfsh;
				jumlahfsh.push(getNum(ratafsh).toFixed(2));
				var ratafdk = totalfdk/hitungfdk;
				jumlahfdk.push(getNum(ratafdk).toFixed(2));
				var ratafpp = totalfpp/hitungfpp;
				jumlahfpp.push(getNum(ratafpp).toFixed(2));
			}
			var salesChart = new Chart($salesChart2, {
				type: 'bar',
				data: {
					labels: faktor,
					datasets: [
						{
							label: 'FST',
							backgroundColor: '#007bff',
							borderColor: '#007bff',
							data: jumlahfst
						},
						{
							label: 'FSH',
							backgroundColor: '#04ff13',
							borderColor: '#04ff13',
							data: jumlahfsh
						},
						{
							label: 'FTK',
							backgroundColor: '#ff0070',
							borderColor: '#ff0070',
							data: jumlahftk
						},
						{
							label: 'FUD',
							backgroundColor: '#09f5ff',
							borderColor: '#09f5ff',
							data: jumlahfud
						},
						{
							label: 'FES',
							backgroundColor: '#ffd200',
							borderColor: '#ffd200',
							data: jumlahfes
						},
						{
							label: 'FDK',
							backgroundColor: '#eb00ff',
							borderColor: '#eb00ff',
							data: jumlahfdk
						},
						{
							label: 'FPP',
							backgroundColor: '#ffc94c',
							borderColor: '#ffc94c',
							data: jumlahfpp
						},
						{
							label: 'FPS',
							backgroundColor: '#ff00d8',
							borderColor: '#ff00d8',
							data: jumlahfps
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
	var $salesChart3 = $('#ptipd-chart');
	$.ajax({
		url: root + 'grafik/ptipd',
		type: 'GET',
		async: true,
		cache: false,
		dataType: 'json',
		success: function (response) {
			console.log(response);
			var faktor = [];
			var jumlahnya = [];
			var jumlahfst = [];
			for (var i = 0; i < response.faktor.length; i++) {
				faktor.push(response.faktor[i].faktor_nama);
			}
			for (var k = 0; k < faktor.length; k++) {
				var totalfst = 0;
				var hitungfst = 0;
				for (var j = 0; j < response.grafik.length; j++) {
					if (response.grafik[j].faktor_nama === faktor[k]) {
						if (response.grafik[j].kuesioner_fakultas === 'ptipd'){
							totalfst = totalfst + parseInt(response.grafik[j].detail_jawaban);
							hitungfst++;
						}
					}
				}
				var ratafst = totalfst/hitungfst;
				jumlahfst.push(getNum(ratafst).toFixed(2));
			}
			var salesChart = new Chart($salesChart3, {
				type: 'bar',
				data: {
					labels: faktor,
					datasets: [
						{
							label: 'Nilai',
							backgroundColor: '#007bff',
							borderColor: '#007bff',
							data: jumlahfst
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
						text: 'Responden PTIPD'
					},
				}
			});
		},
		error: function (response) {
			console.log(response.status + 'error');
		}
	});
	var $salesChart4 = $('#semua-chart');
	$.ajax({
		url: root + 'grafik_semua',
		type: 'GET',
		async: true,
		cache: false,
		dataType: 'json',
		success: function (response) {
			console.log(response);
			var faktor = [];
			var jumlahnya = [];
			var jumlahfst = [];
			for (var i = 0; i < response.faktor.length; i++) {
				faktor.push(response.faktor[i].faktor_nama);
			}
			for (var k = 0; k < faktor.length; k++) {
				var totalfst = 0;
				var hitungfst = 0;
				for (var j = 0; j < response.grafik.length; j++) {
					if (response.grafik[j].faktor_nama === faktor[k]) {
							totalfst = totalfst + parseInt(response.grafik[j].detail_jawaban);
							hitungfst++;
					}
				}
				var ratafst = totalfst/hitungfst;
				jumlahfst.push(getNum(ratafst).toFixed(2));
			}
			var salesChart = new Chart($salesChart4, {
				type: 'bar',
				data: {
					labels: faktor,
					datasets: [
						{
							label: 'Nilai',
							backgroundColor: '#14ff00',
							borderColor: '#14ff00',
							data: jumlahfst
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
						text: 'Seluruh Responden'
					},
				}
			});
		},
		error: function (response) {
			console.log(response.status + 'error');
		}
	});

	function getNum(val) {
		if (isNaN(val)) {
			return 0;
		}
		return val;
	}
})
