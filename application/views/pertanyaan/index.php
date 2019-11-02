<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Pertanyaan</h1>
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
						Data Pertanyaan
						<a href="<?= base_url('pertanyaan/tambah') ?>" class="btn btn-primary btn-sm float-right"><i
								class="fa fa-plus"></i> Tambah Data Pertanyaan</a><span
							class="float-right">&nbsp;</span>
					</div>
					<div class="card-body">
						<table id="example1" class="table table-bordered ">
							<thead>
							<tr>
								<th>No</th>
								<th>Faktor</th>
								<th>Subfaktor</th>
								<th>Pertanyaan</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($pertanyaan as $key => $value):
								?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['faktor_nama'] ?></td>
									<td><?= $value['subfaktor_nama'] ?></td>
									<td><?= $value['pertanyaan_isi'] ?></td>
									<td>
										<a href="<?= base_url('pertanyaan/edit/' . $value['pertanyaan_id']) ?>"
										   class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
										<a href="<?= base_url('pertanyaan/hapus/' . $value['pertanyaan_id']) ?>"
										   class="btn btn-danger btn-sm" onclick="return confirm('Hapus data? ')"><i
												class="fa fa-trash-o"></i></a>
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

