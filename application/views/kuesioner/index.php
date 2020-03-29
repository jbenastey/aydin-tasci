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
<!--						<button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file-excel-o"></i> Import</button>-->
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Import Data Kuesioner</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('import') ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="card-body">
						<div class="form-group">
							<label for="">Unduh Format</label><br>
							<a href="<?= base_url('assets/excel/format/format.xlsx') ?>" class="btn btn-sm btn-outline-success">format.xlsx</a>
						</div>
						<div class="form-group">
							<label for="">Upload</label>
							<input type="file" class="form-control" name="excel" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="upload" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
