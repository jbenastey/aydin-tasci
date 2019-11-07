<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Kuesioner</h1>
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
						Biodata Responden
					</div>
					<div class="card-body">
						<div class="form-group">
							<label>Nama </label>
							<input type="text" class="form-control" name="nama" value="<?= $kuesioner['kuesioner_nama'] ?>" placeholder="nama" required
								   autocomplete="off" readonly>
						</div>
						<div class="form-group">
							<label>NIP/NIK </label>
							<input type="number" class="form-control" name="nik" value="<?= $kuesioner['kuesioner_nip_nik_nim'] ?>" placeholder="nik" required
								   autocomplete="off" readonly>
						</div>
						<div class="form-group">
							<label>Jabatan </label>
							<input type="text" class="form-control" name="nik" value="<?= $kuesioner['kuesioner_jabatan'] ?>" placeholder="nik" required
								   autocomplete="off" readonly>
						</div>
						<div class="form-group">
							<label>Fakultas </label>
							<input type="text" class="form-control" name="nik" value="<?= $kuesioner['kuesioner_fakultas'] ?>" placeholder="nik" required
								   autocomplete="off" readonly>
						</div>
					</div>
				</div>
				<div class="card card-primary card-outline">
					<div class="card-header">
						Lihat Hasil Kuesioner
					</div>
					<div class="card-body">
						<?php
						foreach ($faktor as $key => $value):
							?>
							<p>Faktor <?= $value['faktor_nama'] ?></p>
							<table class="table table-bordered">
								<thead class="text-center">
								<tr>
									<th rowspan="2">Pertanyaan</th>
									<th rowspan="2">Responden</th>
									<th colspan="5">Pilihan</th>
								</tr>
								<tr>
									<td>SS <br>(5)</td>
									<td>S <br>(4)</td>
									<td>N <br>(3)</td>
									<td>TS <br>(2)</td>
									<td>STS <br>(1)</td>
								</tr>
								</thead>
								<tbody>
								<?php
								foreach ($detail as $key2 => $value2):
									if ($value['faktor_id'] == $value2['pertanyaan_faktor_id']):
//											if ($value2['pertanyaan_jenis'] == $this->session->userdata('session_level')):
										?>
										<tr>
											<td><?= $value2['pertanyaan_isi'] ?></td>
											<td><?= $value2['pertanyaan_jenis'] ?></td>
											<td><input type="radio" class="form-control"
													   name="pilihan<?= $value2['pertanyaan_id'] ?>"
													   value="5" <?php if ($value2['detail_jawaban'] == 5) echo 'checked' ?>
													   disabled></td>
											<td><input type="radio" class="form-control"
													   name="pilihan<?= $value2['pertanyaan_id'] ?>"
													   value="4" <?php if ($value2['detail_jawaban'] == 4) echo 'checked' ?>
													   disabled></td>
											<td><input type="radio" class="form-control"
													   name="pilihan<?= $value2['pertanyaan_id'] ?>"
													   value="3" <?php if ($value2['detail_jawaban'] == 3) echo 'checked' ?>
													   disabled></td>
											<td><input type="radio" class="form-control"
													   name="pilihan<?= $value2['pertanyaan_id'] ?>"
													   value="2" <?php if ($value2['detail_jawaban'] == 2) echo 'checked' ?>
													   disabled></td>
											<td><input type="radio" class="form-control"
													   name="pilihan<?= $value2['pertanyaan_id'] ?>"
													   value="1" <?php if ($value2['detail_jawaban'] == 1) echo 'checked' ?>
													   disabled></td>
										</tr>
									<?php
//											endif;
									endif;
								endforeach;
								?>
								</tbody>
							</table>
							<hr>
						<?php
						endforeach;
						?>
						<a href="<?= base_url('kuesioner') ?>" class="btn btn-primary btn-outline-primary"
						   name="simpan">Kembali</a>

					</div>
				</div>
			</div>
		</div>
</section>
