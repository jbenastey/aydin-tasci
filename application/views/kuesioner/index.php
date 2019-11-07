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
					</div>
					<div class="card-body">
						<table id="example1" class="table table-bordered ">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama Responden</th>
								<th>Jabatan</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($kuesioner as $key => $value):
								?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['kuesioner_nama'] ?></td>
									<td><?= $value['kuesioner_jabatan'] ?></td>
									<td>
										<a href="<?= base_url('kuesioner/lihat/' . $value['kuesioner_id']) ?>"
										   class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>

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

