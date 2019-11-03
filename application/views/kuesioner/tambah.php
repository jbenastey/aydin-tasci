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
				<div class="card">
					<div class="card-header">
						Isi Kuesioner
					</div>
					<div class="card-body">
						<form action="<?=base_url('kuesioner/tambah/'.$this->session->userdata('session_level'))?>" method="post">
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
									if ($value2['pertanyaan_jenis'] == $this->session->userdata('session_level')):
										?>
										<tr>
											<td><?= $value2['pertanyaan_isi'] ?></td>
											<td><?= $value2['pertanyaan_jenis'] ?></td>
											<td><input type="radio" class="form-control"
													   name="pilihan<?= $value2['pertanyaan_id'] ?>" value="5" required></td>
											<td><input type="radio" class="form-control"
													   name="pilihan<?= $value2['pertanyaan_id'] ?>" value="4" required></td>
											<td><input type="radio" class="form-control"
													   name="pilihan<?= $value2['pertanyaan_id'] ?>" value="3" required></td>
											<td><input type="radio" class="form-control"
													   name="pilihan<?= $value2['pertanyaan_id'] ?>" value="2" required></td>
											<td><input type="radio" class="form-control"
													   name="pilihan<?= $value2['pertanyaan_id'] ?>" value="1" required></td>
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
