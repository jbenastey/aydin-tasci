<style>
	@media print {
		#printable {
			height: 1200px;
		}

		#laporan {
			display: block;
		}
	}
</style>
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Detail Laporan</h1>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-print-none">
						<button onclick="excel()" class="btn btn-outline-success btn-sm float-right ml-1"
								title="Export Excel"><i class="fa fa-file-excel-o"></i></button>
						<button onclick="window.print()" class="btn btn-outline-danger btn-sm float-right"
								title="Export PDF"><i class="fa fa-file-pdf-o"></i></button>
					</div>
					<div class="card-body" id="printable">
						<h3 id="laporan">Laporan <?= ucfirst($responden) ?> Faktor <?= $faktor ?></h3>
						<div class="excel">
							<table class="table table-bordered" id="excel">
								<thead class="text-center">
								<tr>
									<th rowspan="2">Nomor</th>
									<th rowspan="2">Pertanyaan</th>
									<th colspan="8">Fakultas</th>
									<th rowspan="2">Nilai</th>
									<th rowspan="2">Rata-rata</th>
									<th rowspan="2">Keterangan</th>
								</tr>
								<tr>
									<th>FST</th>
									<th>FSH</th>
									<th>FTK</th>
									<th>FUD</th>
									<th>FDK</th>
									<th>FPP</th>
									<th>FES</th>
									<th>FPS</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$no = 1;
								$jumlahSemua = 0;
								$rataRata = 0;
								foreach ($pertanyaan as $key => $value):
									if ($value['pertanyaan_jenis'] == $responden):
										?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $value['pertanyaan_isi'] ?></td>
											<?php
											$nilai = 0;
											$hitung = 0;
											$fst = 0;
											$fstTotal = 0;
											$fsh = 0;
											$fshTotal = 0;
											$ftk = 0;
											$ftkTotal = 0;
											$fud = 0;
											$fudTotal = 0;
											$fdk = 0;
											$fdkTotal = 0;
											$fpp = 0;
											$fppTotal = 0;
											$fes = 0;
											$fesTotal = 0;
											$fps = 0;
											$fpsTotal = 0;
											foreach ($jawaban as $key2 => $value2):
												if ($value['pertanyaan_id'] == $value2['detail_pertanyaan_id']):
													if ($value2['kuesioner_fakultas'] == 'fst') {
														$fstTotal += $value2['detail_jawaban'];
														$fst++;
														if($fst == 1){
															$hitung++;
														}
													} elseif ($value2['kuesioner_fakultas'] == 'fasih') {
														$fshTotal += $value2['detail_jawaban'];
														$fsh++;
														if($fsh == 1){
															$hitung++;
														}
													} elseif ($value2['kuesioner_fakultas'] == 'ftk') {
														$ftkTotal += $value2['detail_jawaban'];
														$ftk++;
														if($ftk == 1){
															$hitung++;
														}
													} elseif ($value2['kuesioner_fakultas'] == 'fud') {
														$fudTotal += $value2['detail_jawaban'];
														$fud++;
														if($fud == 1){
															$hitung++;
														}
													} elseif ($value2['kuesioner_fakultas'] == 'fdk') {
														$fdkTotal += $value2['detail_jawaban'];
														$fdk++;
														if($fdk == 1){
															$hitung++;
														}
													} elseif ($value2['kuesioner_fakultas'] == 'fapertapet') {
														$fppTotal += $value2['detail_jawaban'];
														$fpp++;
														if($fpp == 1){
															$hitung++;
														}
													} elseif ($value2['kuesioner_fakultas'] == 'fekonsos') {
														$fesTotal += $value2['detail_jawaban'];
														$fes++;
														if($fes == 1){
															$hitung++;
														}
													} elseif ($value2['kuesioner_fakultas'] == 'fpsi') {
														$fpsTotal += $value2['detail_jawaban'];
														$fps++;
														if($fps == 1){
															$hitung++;
														}
													}
												endif;
											endforeach;
											?>
											<td><?= $fstTotal / $fst ?></td>
											<td><?= $fshTotal / $fsh ?></td>
											<td><?= $ftkTotal / $ftk ?></td>
											<td><?= $fudTotal / $fud ?></td>
											<td><?= $fdkTotal / $fdk ?></td>
											<td><?= $fppTotal / $fpp ?></td>
											<td><?= $fesTotal / $fes ?></td>
											<td><?= $fpsTotal / $fps ?></td>
											<td><?= $nilai = ($fstTotal / $fst) +
													($fshTotal / $fsh) +
													($ftkTotal / $ftk) +
													($fudTotal / $fud) +
													($fdkTotal / $fdk) +
													($fppTotal / $fpp) +
													($fesTotal / $fes) +
													($fpsTotal / $fps) ?></td>
											<td><?= $rata = $nilai / $hitung ?></td>
											<td><?= kategori($rata) ?></td>
										</tr>
										<?php
										$no++;
										$jumlahSemua += $nilai;
										$rataRata += $rata;
									endif;
								endforeach;
								?>
								</tbody>
								<tfoot>
								<tr>
									<th colspan="10">Total</th>
									<th><?= $jumlahSemua ?></th>
									<th><?= $rataRata / ($no - 1) ?></th>
									<th><?= kategori($rataRata / ($no - 1)) ?></th>
								</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	function excel() {

		// console.log('asd');
		// let file = new Blob([$('.excel').html()], {type: "application/vnd.ms-excel"});
		// let url = URL.createObjectURL(file);
		// let a = $("<a />", {
		// 	href: url,
		// 	download: "filename.xls"
		// }).appendTo("body").get(0).click();
		// e.preventDefault();

		var tab_text = "<table border='2px'><tr>";
		var textRange;
		var j = 0;
		tab = document.getElementById('excel'); // id of table

		for (j = 0; j < tab.rows.length; j++) {
			tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
			//tab_text=tab_text+"</tr>";
		}

		tab_text = tab_text + "</table>";
		tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
		tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
		tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

		var ua = window.navigator.userAgent;
		var msie = ua.indexOf("MSIE ");

		if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
		{
			txtArea1.document.open("txt/html", "replace");
			txtArea1.document.write(tab_text);
			txtArea1.document.close();
			txtArea1.focus();
			sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xlsx");
		} else                 //other browser not tested on IE 11
			sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

		return (sa);
	}
</script>
