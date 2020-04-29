
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
							$jumlahSemuanya = 0;
							foreach ($faktor as $key => $value):
								?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['faktor_nama'] ?></td>
									<td>
										<?php
										$nilai = 0;
										if ($detail == null):
											?>
											Kuesioner belum diisi
										<?php
										else:
											$nomor = 0;
											$jumlahSemua = 0;
											$rataRata = 0;
											foreach ($pertanyaan as $key3 => $value3):
												if ($value['faktor_id'] == $value3['faktor_id']):
													if ($value3['pertanyaan_jenis'] == 'dosen'):
														$nomor++;
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
														foreach ($detail as $key2 => $value2):
															if ($value3['pertanyaan_id'] == $value2['detail_pertanyaan_id']):
																if ($value2['kuesioner_fakultas'] == 'fst') {
																	$fstTotal += $value2['detail_jawaban'];
																	$fst++;
																	if ($fst == 1) {
																		$hitung++;
																	}
																} elseif ($value2['kuesioner_fakultas'] == 'fasih') {
																	$fshTotal += $value2['detail_jawaban'];
																	$fsh++;
																	if ($fsh == 1) {
																		$hitung++;
																	}
																} elseif ($value2['kuesioner_fakultas'] == 'ftk') {
																	$ftkTotal += $value2['detail_jawaban'];
																	$ftk++;
																	if ($ftk == 1) {
																		$hitung++;
																	}
																} elseif ($value2['kuesioner_fakultas'] == 'fud') {
																	$fudTotal += $value2['detail_jawaban'];
																	$fud++;
																	if ($fud == 1) {
																		$hitung++;
																	}
																} elseif ($value2['kuesioner_fakultas'] == 'fdk') {
																	$fdkTotal += $value2['detail_jawaban'];
																	$fdk++;
																	if ($fdk == 1) {
																		$hitung++;
																	}
																} elseif ($value2['kuesioner_fakultas'] == 'fapertapet') {
																	$fppTotal += $value2['detail_jawaban'];
																	$fpp++;
																	if ($fpp == 1) {
																		$hitung++;
																	}
																} elseif ($value2['kuesioner_fakultas'] == 'fekonsos') {
																	$fesTotal += $value2['detail_jawaban'];
																	$fes++;
																	if ($fes == 1) {
																		$hitung++;
																	}
																} elseif ($value2['kuesioner_fakultas'] == 'fpsi') {
																	$fpsTotal += $value2['detail_jawaban'];
																	$fps++;
																	if ($fps == 1) {
																		$hitung++;
																	}
																}
															endif;
														endforeach;
														?>
														<?php $nilai = isNan(($fstTotal / $fst)) +
														isNan(($fshTotal / $fsh)) +
														isNan(($ftkTotal / $ftk)) +
														isNan(($fudTotal / $fud)) +
														isNan(($fdkTotal / $fdk)) +
														isNan(($fppTotal / $fpp)) +
														isNan(($fesTotal / $fes)) +
														isNan(($fpsTotal / $fps)) ?>

														<?php $rata = $nilai / $hitung ?>
														<?php
														$jumlahSemua += $nilai;
														$rataRata += $rata;
													endif;
												endif;
											endforeach;
											$jumlahSemuanya += ($rataRata / $nomor);
											echo round($rataRata / $nomor, 2);
											$rentangNilai[$value['faktor_nama']]['dosen'] = round($rataRata / $nomor, 2);
										endif;
										?>
									</td>
									<td>
										<?php
										if ($rataRata / $nomor != null):
											echo kategori($rataRata / $nomor);
										else: ?>
											Kuesioner belum diisi
										<?php
										endif;
										?>
									</td>
									<td>
										<?php
										$faktorNama = str_replace(' ', '-', $value['faktor_nama']);
										?>
										<a href="<?= base_url('laporan/detail/dosen/' . $faktorNama) ?>"
										   class="btn btn-primary btn-sm" title="Lihat Detail"> <i
												class="fa fa-eye"></i>
										</a></td>
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
									echo round($jumlahSemuanya / ($no - 1), 2);
									?></th>
								<th><?= kategori($jumlahSemuanya / ($no - 1)) ?></th>
								<th><a href="<?= base_url('laporan/semua-detail/dosen') ?>"
									   class="btn btn-primary btn-sm" title="Lihat Detail"> <i
											class="fa fa-eye"></i>
									</a></th>
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
							$jumlahSemuanya = 0;
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
											$nomor = 0;
											$jumlahSemua = 0;
											$rataRata = 0;
											foreach ($pertanyaan as $key3 => $value3):
												if ($value['faktor_id'] == $value3['faktor_id']):
													if ($value3['pertanyaan_jenis'] == 'mahasiswa'):
														$nomor++;
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
														foreach ($detail as $key2 => $value2):
															if ($value3['pertanyaan_id'] == $value2['detail_pertanyaan_id']):
																if ($value2['kuesioner_fakultas'] == 'fst') {
																	$fstTotal += $value2['detail_jawaban'];
																	$fst++;
																	if ($fst == 1) {
																		$hitung++;
																	}
																} elseif ($value2['kuesioner_fakultas'] == 'fasih') {
																	$fshTotal += $value2['detail_jawaban'];
																	$fsh++;
																	if ($fsh == 1) {
																		$hitung++;
																	}
																} elseif ($value2['kuesioner_fakultas'] == 'ftk') {
																	$ftkTotal += $value2['detail_jawaban'];
																	$ftk++;
																	if ($ftk == 1) {
																		$hitung++;
																	}
																} elseif ($value2['kuesioner_fakultas'] == 'fud') {
																	$fudTotal += $value2['detail_jawaban'];
																	$fud++;
																	if ($fud == 1) {
																		$hitung++;
																	}
																} elseif ($value2['kuesioner_fakultas'] == 'fdk') {
																	$fdkTotal += $value2['detail_jawaban'];
																	$fdk++;
																	if ($fdk == 1) {
																		$hitung++;
																	}
																} elseif ($value2['kuesioner_fakultas'] == 'fapertapet') {
																	$fppTotal += $value2['detail_jawaban'];
																	$fpp++;
																	if ($fpp == 1) {
																		$hitung++;
																	}
																} elseif ($value2['kuesioner_fakultas'] == 'fekonsos') {
																	$fesTotal += $value2['detail_jawaban'];
																	$fes++;
																	if ($fes == 1) {
																		$hitung++;
																	}
																} elseif ($value2['kuesioner_fakultas'] == 'fpsi') {
																	$fpsTotal += $value2['detail_jawaban'];
																	$fps++;
																	if ($fps == 1) {
																		$hitung++;
																	}
																}
															endif;
														endforeach;
														?>
														<?php $nilai = isNan(($fstTotal / $fst)) +
														isNan(($fshTotal / $fsh)) +
														isNan(($ftkTotal / $ftk)) +
														isNan(($fudTotal / $fud)) +
														isNan(($fdkTotal / $fdk)) +
														isNan(($fppTotal / $fpp)) +
														isNan(($fesTotal / $fes)) +
														isNan(($fpsTotal / $fps)) ?>

														<?php $rata = $nilai / $hitung ?>
														<?php
														$jumlahSemua += $nilai;
														$rataRata += $rata;
													endif;
												endif;
											endforeach;
											$jumlahSemuanya += ($rataRata / $nomor);
											echo round($rataRata / $nomor, 2);
											$rentangNilai[$value['faktor_nama']]['mahasiswa'] = round($rataRata / $nomor, 2);
										endif;
										?>
									</td>
									<td>
										<?php
										if ($rataRata / $nomor != null):
											echo kategori($rataRata / $nomor);
										else: ?>
											Kuesioner belum diisi
										<?php
										endif;
										?>
									</td>
									<td>
										<?php
										$faktorNama = str_replace(' ', '-', $value['faktor_nama']); ?>
										<a href="<?= base_url('laporan/detail/mahasiswa/' . $faktorNama) ?>"
										   class="btn btn-primary btn-sm" title="Lihat Detail"> <i
												class="fa fa-eye"></i>
										</a></td>
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
									echo round($jumlahSemuanya / ($no - 1), 2);
									?></th>
								<th><?= kategori($jumlahSemuanya / ($no - 1)) ?></th>
								<th><a href="<?= base_url('laporan/semua-detail/mahasiswa') ?>"
									   class="btn btn-primary btn-sm" title="Lihat Detail"> <i
											class="fa fa-eye"></i>
									</a></th>
							</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div class="card card-primary card-outline">
					<div class="card-header">
						Data Laporan PTIPD
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
							$jumlahSemuanya = 0;
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
											$nomor = 0;
											$jumlahSemua = 0;
											$rataRata = 0;
											foreach ($pertanyaan as $key3 => $value3):
												if ($value['faktor_id'] == $value3['faktor_id']):
													if ($value3['pertanyaan_jenis'] == 'ptipd'):
														$nomor++;
														$nilai = 0;
														$hitung = 0;
														$fst = 0;
														$fstTotal = 0;
														foreach ($detail as $key2 => $value2):
															if ($value3['pertanyaan_id'] == $value2['detail_pertanyaan_id']):
																if ($value2['kuesioner_fakultas'] == 'ptipd') {
																	$fstTotal += $value2['detail_jawaban'];
																	$fst++;
																	if ($fst == 1) {
																		$hitung++;
																	}
																}
															endif;
														endforeach;
														?>
														<?php $nilai = isNan($fstTotal / $fst) ?>

														<?php $rata = isNan($nilai / $hitung) ?>
														<?php
														$jumlahSemua += $nilai;
														$rataRata += $rata;
													endif;
												endif;
											endforeach;
											$jumlahSemuanya += ($rataRata / $nomor);
											echo isNan(round($rataRata / $nomor, 2));
										endif;
										?>
									</td>
									<td>
										<?php
										if ($rataRata / $nomor != null):
											echo kategori($rataRata / $nomor);
										else: ?>
											Kuesioner belum diisi
										<?php
										endif;
										?>
									</td>
									<td><a href="<?= base_url('laporan/detail/ptipd/' . $value['faktor_nama']) ?>"
										   class="btn btn-primary btn-sm" title="Lihat Detail"> <i
												class="fa fa-eye"></i>
										</a></td>
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
									echo isNan(round($jumlahSemuanya / ($no - 1), 2));
									?></th>
								<th colspan="2"><?= kategori($jumlahSemuanya / ($no - 1)) ?></th>
							</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div class="card card-primary card-outline">
					<div class="card-header">
						Data Laporan Semua Responden
					</div>
					<div class="card-body">
						<table class="table table-bordered ">
							<thead>
							<tr>
								<th>No</th>
								<th>Faktor</th>
								<th>Rentang Nilai</th>
								<th>Keterangan</th>
							</tr>
							</thead>
							<tbody>
							<?php
							//							echo "<pre>";
							//							print_r ($detail);
							//							echo "</pre>";die;
							$no = 1;
							$jumlahSemuanya = 0;
							foreach ($faktor as $key => $value):
								?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['faktor_nama'] ?></td>
									<td>
										<?php
										$nilaidosen = null;
										$nilaimhs = null;
										if ($detail == null):
											?>
											Kuesioner belum diisi
										<?php
										else:
											$hitungdosen = 0;
											$hitungmhs = 0;

											$ratadosen = $rentangNilai[$value['faktor_nama']]['dosen'];
											$ratamhs = $rentangNilai[$value['faktor_nama']]['mahasiswa'];
											$rataSemua = ($ratadosen + $ratamhs) / 2;
											$jumlahSemuanya += $rataSemua;
											echo round($rataSemua, 2);
										endif;
										?>
									</td>
									<td>
										<?php
										if ($rataSemua / $nomor != null):
											echo kategori($rataSemua);
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
							<tfoot>
							<tr>
								<th colspan="2">Rata-rata</th>
								<th><?php
									echo round($jumlahSemuanya / ($no - 1), 2);
									?></th>
								<th colspan="1"><?= kategori($jumlahSemuanya / ($no - 1)) ?></th>
							</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
