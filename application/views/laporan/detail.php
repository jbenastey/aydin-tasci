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
				<div class="card card-primary card-outline">
					<div class="card-header">
						Data Laporan <?= $responded ?> Faktor <?= $faktor ?>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
							<tr>
								<th>Nomor</th>
								<th>1</th>
								<th>2</th>
								<th>3</th>
								<th>4</th>
								<th>5</th>
								<th>Jumlah</th>
								<th>Rata"</th>
								<th>Keterangan</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							$jumlahSemua  = 0;
							$jumlahRata = 0;
							foreach ($pertanyaan as $key => $value):
								if ($value['pertanyaan_jenis'] == $responden):
									?>
									<tr>
										<td><?= $no ?></td>
											<?php
											$satu = 0;
											$dua = 0;
											$tiga = 0;
											$empat = 0;
											$lima = 0;
											foreach ($jawaban as $key2 => $value2):
												if ($value['pertanyaan_id'] == $value2['detail_pertanyaan_id']):
													if ($value2['detail_jawaban'] == 1):
														$satu++;
													elseif ($value2['detail_jawaban'] == 2):
														$dua++;
													elseif ($value2['detail_jawaban'] == 3):
														$tiga++;
													elseif ($value2['detail_jawaban'] == 4):
														$empat++;
													elseif ($value2['detail_jawaban'] == 5):
														$lima++;
													endif;
												endif;
											endforeach;
											?>
										<td>
											<?= $satu ?>
										</td>
										<td>
											<?= $dua ?>
										</td>
										<td>
											<?= $tiga ?>
										</td>
										<td>
											<?= $empat ?>
										</td>
										<td>
											<?= $lima ?>
										</td>
										<td><?php
											$jumlah = $satu+$dua+$tiga+$empat+$lima;
											echo $jumlah;
											$jumlahSemua = $jumlahSemua + $jumlah;
											?></td>
										<td>
											<?php
											$rata = $jumlah/5;
											echo $rata;
											$jumlahRata = $jumlahRata + $rata;
											?>
										</td>
									</tr>
									<?php
									$no++;
								endif;
							endforeach;
							$rataRata = $jumlahRata/($no-1);
							?>
							</tbody>
							<thead>
							<tr>
								<td colspan="6"></td>
								<td><?= $jumlahSemua ?></td>
								<td><?= $rataRata ?></td>
							</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
