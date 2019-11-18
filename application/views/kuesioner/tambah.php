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
						Isi Biodata
					</div>
					<div class="card-body">
						<form action="<?= base_url('kuesioner/tambah/' . $this->uri->segment(3)) ?>" method="post">
							<?php
							if ($this->uri->segment(3) == 'dosen'):
								?>
								<div class="form-group">
									<label>Nama </label>
									<input type="text" class="form-control" name="nama" placeholder="nama" required
										   autocomplete="off">
								</div>
								<div class="form-group">
									<label>NIP/NIK </label>
									<input type="number" class="form-control" name="nik" placeholder="nik" required
										   autocomplete="off">
								</div>
								<div class="form-group">
									<label>Jabatan </label>
									<select name="jabatan" id="" class="form-control">
										<option selected disabled>- pilih jabatan -</option>
										<option value="Dosen Pengajar">Dosen Pengajar</option>
										<option value="Kepala Jurusan">Kepala Jurusan</option>
										<option value="Dekan">Dekan</option>
									</select>
								</div>
								<div class="form-group">
									<label>Fakultas </label>
									<select name="fakultas" id="" class="form-control">
										<option selected disabled>- pilih fakultas -</option>
										<option value="ftk">Tarbiyah dan Keguruan</option>
										<option value="fud">Ushuluddin</option>
										<option value="fpsi">Psikologi</option>
										<option value="fasih">Syariah dan Hukum</option>
										<option value="fdk">Dakwah dan Ilmu Komunikasi</option>
										<option value="fst">Sains dan Teknologi</option>
									</select>
								</div>
							<?php
							elseif ($this->uri->segment(3) == 'mahasiswa'):
								?>
								<div class="form-group">
									<label>Nama </label>
									<input type="text" class="form-control" name="nama" placeholder="nama" required
										   autocomplete="off">
								</div>
								<div class="form-group">
									<label>NIM </label>
									<input type="number" class="form-control" name="nik" placeholder="nim" required
										   autocomplete="off">
								</div>
								<input type="hidden" name="jabatan" value="Mahasiswa">
								<div class="form-group">
									<label>Fakultas </label>
									<select name="fakultas" id="" class="form-control">
										<option selected disabled>- pilih fakultas -</option>
										<option value="ftk">Tarbiyah dan Keguruan</option>
										<option value="fud">Ushuluddin</option>
										<option value="fpsi">Psikologi</option>
										<option value="fasih">Syariah dan Hukum</option>
										<option value="fdk">Dakwah dan Ilmu Komunikasi</option>
										<option value="fst">Sains dan Teknologi</option>
									</select>
								</div>
							<?php
							elseif ($this->uri->segment(3) == 'ptipd'):
								?>
								<div class="form-group">
									<label>Nama </label>
									<input type="text" class="form-control" name="nama" placeholder="nama" required
										   autocomplete="off">
								</div>
								<div class="form-group">
									<label>NIP/NIK </label>
									<input type="number" class="form-control" name="nik" placeholder="nip/nik" required
										   autocomplete="off">
								</div>
								<input type="hidden" name="jabatan" value="PTIPD">
								<input type="hidden" name="fakultas" value="ptipd">
							<?php
							endif
							?>
					</div>
				</div>
				<div class="card card-primary card-outline">
					<div class="card-header">
						Isi Kuesioner
					</div>
					<div class="card-body">
						<?php
						foreach ($faktor as $key => $value):
							?>
							<p>Faktor <?= $value['faktor_nama'] ?></p>
							<table class="table table-bordered">
								<thead>
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
								foreach ($pertanyaan as $key2 => $value2):
									if ($value['faktor_id'] == $value2['pertanyaan_faktor_id']):
										if ($value2['pertanyaan_jenis'] == $this->uri->segment(3)):
											?>
											<tr>
												<td><?= $value2['pertanyaan_isi'] ?></td>
												<td><?= $value2['pertanyaan_jenis'] ?></td>
												<td><input type="radio" class="form-control"
														   name="pilihan<?= $value2['pertanyaan_id'] ?>" value="5"
														   required></td>
												<td><input type="radio" class="form-control"
														   name="pilihan<?= $value2['pertanyaan_id'] ?>" value="4"
														   required></td>
												<td><input type="radio" class="form-control"
														   name="pilihan<?= $value2['pertanyaan_id'] ?>" value="3"
														   required></td>
												<td><input type="radio" class="form-control"
														   name="pilihan<?= $value2['pertanyaan_id'] ?>" value="2"
														   required></td>
												<td><input type="radio" class="form-control"
														   name="pilihan<?= $value2['pertanyaan_id'] ?>" value="1"
														   required></td>
											</tr>
										<?php
										endif;
									endif;
								endforeach;
								?>
								</tbody>
							</table>
							<hr>
						<?php
						endforeach;
						?>
						<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
</section>
