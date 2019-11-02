
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Faktor</h1>
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
						Lihat Data Faktor
					</div>
					<div class="card-body">
						<form method="post" action="">
							<div class="card-body">
								<div class="form-group">
									<label>Faktor</label>
									<input type="text" class="form-control" name="faktor" placeholder="faktor" required autocomplete="off" value="<?=$faktor['faktor_nama']?>" disabled>
								</div>
								<hr>
								<table class="table table-bordered" id="example1">
									<a href="<?=base_url('subfaktor/tambah/'.$faktor['faktor_id'])?>" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Tambah Subfaktor</a>
									<thead>
									<tr>
										<th>No</th>
										<th>Subfaktor</th>
										<th>Aksi</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$no = 1;
									foreach ($subfaktor as $key => $value):
										?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $value['subfaktor_nama'] ?></td>
											<td>
												<a href="<?= base_url('subfaktor/edit/' . $value['subfaktor_id']) ?>"
												   class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
												<a href="<?= base_url('subfaktor/hapus/' . $value['subfaktor_id']) ?>"
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
							<!-- /.card-body -->
							<div class="card-footer">
								<a href="<?=base_url('faktor')?>"  name="simpan" class="btn btn-outline-primary">Kembali</a>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
