<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Laporan</h1>
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
						Data Laporan Dosen
					</div>
					<div class="card-body">
						<table class="table table-bordered ">
							<thead>
							<tr>
								<th>No</th>
								<th>Faktor</th>
								<th>Rentang Nilai</th>
								<th>Kategori</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($faktor as $key => $value):
								?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['faktor_nama'] ?></td>
									<td>
										<?php
										$nilai = null;
										if ($detail == null):
											?>
											Kuesioner belum diisi
										<?php
										else:
											$total = 0;
											$jumlah = 0;
											foreach ($detail as $key2 => $value2):
												if ($value2['pertanyaan_jenis'] == 'dosen') :
													if ($value2['faktor_id'] == $value['faktor_id']):
														$total = $total + $value2['detail_jawaban'];
														$jumlah++;
													endif;
												endif;
											endforeach;
											$nilai = $total / $jumlah;
											?>
											<?= $nilai ?>
										<?php
										endif
										?>
									</td>
									<td>
										<?php
										if ($nilai != null):
											if ($nilai >= 1 && $nilai <= 2.6):
												?>
												Belum siap dan butuh banyak peningkatan
											<?php
											elseif ($nilai > 2.6 && $nilai <= 3.4):
												?>
												Tidak siap dan butuh sedikit peningkatan
											<?php
											elseif ($nilai > 3.4 && $nilai <= 4.2):
												?>
												Siap, tetapi masih butuh sedikit peningkatan
											<?php
											elseif ($nilai > 4.2 && $nilai <= 5):
												?>
												Siap dan penerapan dapat dilakukan
											<?php
											endif;
										else: ?>
											Kuesioner belum diisi
										<?php
										endif;
										?>
									</td>
								</tr>
								<?php
								$no++;
							endforeach;
							?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="card card-primary card-outline">
					<div class="card-header">
						Data Laporan Mahasiswa
					</div>
					<div class="card-body">
						<table class="table table-bordered ">
							<thead>
							<tr>
								<th>No</th>
								<th>Faktor</th>
								<th>Rentang Nilai</th>
								<th>Kategori</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($faktor as $key => $value):
								?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['faktor_nama'] ?></td>
									<td>
										<?php
										$nilai = null;
										if ($detail == null):
											?>
											Kuesioner belum diisi
										<?php
										else:
											$total = 0;
											$jumlah = 0;
											foreach ($detail as $key2 => $value2):
												if ($value2['pertanyaan_jenis'] == 'mahasiswa') :
													if ($value2['faktor_id'] == $value['faktor_id']):
														$total = $total + $value2['detail_jawaban'];
														$jumlah++;
													endif;
												endif;
											endforeach;
											$nilai = $total / $jumlah;
											?>
											<?= $nilai ?>
										<?php
										endif
										?>
									</td>
									<td>
										<?php
										if ($nilai != null):
											if ($nilai >= 1 && $nilai <= 2.6):
												?>
												Belum siap dan butuh banyak peningkatan
											<?php
											elseif ($nilai > 2.6 && $nilai <= 3.4):
												?>
												Tidak siap dan butuh sedikit peningkatan
											<?php
											elseif ($nilai > 3.4 && $nilai <= 4.2):
												?>
												Siap, tetapi masih butuh sedikit peningkatan
											<?php
											elseif ($nilai > 4.2 && $nilai <= 5):
												?>
												Siap dan penerapan dapat dilakukan
											<?php
											endif;
										else: ?>
											Kuesioner belum diisi
										<?php
										endif;
										?>
									</td>
								</tr>
								<?php
								$no++;
							endforeach;
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
