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
						Data Kuesioner
						<?php
						if ($this->session->userdata('session_level') != 'admin'):
							if ($cek == null):?>
								<a href="<?= base_url('kuesioner/tambah/' . $this->session->userdata('session_level')) ?>"
								   class="btn btn-primary btn-sm float-right"><i
										class="fa fa-plus"></i> Isi Kuesioner</a><span
									class="float-right">&nbsp;</span>
							<?php
							endif;
						endif;
						?>
					</div>
					<div class="card-body">
						<table id="example1" class="table table-bordered ">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama Responden</th>
								<th>Level</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($kuesioner as $key => $value):
								if ($this->session->userdata('session_level') != 'admin'):
									if ($this->session->userdata('session_id') == $value['pengguna_id']):
										?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $value['pengguna_nama'] ?></td>
											<td><?= $value['pengguna_level'] ?></td>
											<td>
												<a href="<?= base_url('kuesioner/lihat/' . $value['kuesioner_id']) ?>"
												   class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>

											</td>

										</tr>
										<?php
										$no++;
									endif;
								else:
									?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $value['pengguna_nama'] ?></td>
										<td><?= $value['pengguna_level'] ?></td>
										<td>
											<a href="<?= base_url('kuesioner/lihat/' . $value['kuesioner_id']) ?>"
											   class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
										</td>
									</tr>
								<?php
								endif;
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

