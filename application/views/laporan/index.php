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
								<th>Keterangan</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							$jumlahSemua = 0;
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
											$jumlahSemua = $jumlahSemua + $nilai;
											?>
											<?= $nilai ?>
										<?php
										endif
										?>
									</td>
									<td>
										<?php
										if ($nilai != null):
											echo kategori($nilai);
										else: ?>
											Kuesioner belum diisi
										<?php
										endif;
										?>
									</td>
									<td><a href="<?= base_url('laporan/detail/dosen/'.$value['faktor_nama']) ?>" class="btn btn-primary btn-sm" title="Lihat Detail"> <i class="fa fa-eye"></i>  </a></td>
								</tr>
								<?php
								$no++;
							endforeach;
							?>
							</tbody>
							<tfoot>
							<tr>
								<th colspan="2">Rata-rata</th>
								<th><?php
									$rataRata = $jumlahSemua / ($no-1);
									echo $rataRata;
									?></th>
								<th colspan="2"><?= kategori($rataRata) ?></th>
							</tr>
							</tfoot>
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
								<th>Keterangan</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							$jumlahSemua = 0;
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
											$jumlahSemua = $jumlahSemua + $nilai;
											?>
											<?= $nilai ?>
										<?php
										endif
										?>
									</td>
									<td>
										<?php
										if ($nilai != null):
											echo kategori($nilai);
										else: ?>
											Kuesioner belum diisi
										<?php
										endif;
										?>
									</td>
									<td><a href="<?= base_url('laporan/detail/mahasiswa/'.$value['faktor_nama']) ?>" class="btn btn-primary btn-sm" title="Lihat Detail"> <i class="fa fa-eye"></i>  </a></td>
								</tr>
								<?php
								$no++;
							endforeach;
							?>
							</tbody>
							<tfoot>
							<tr>
								<th colspan="2">Rata-rata</th>
								<th><?php
									$rataRata = $jumlahSemua / ($no-1);
									echo $rataRata;
									?></th>
								<th colspan="2"><?= kategori($rataRata) ?></th>
							</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
