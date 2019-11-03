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
						Data Faktor
						<a href="<?= base_url('faktor/tambah') ?>" class="btn btn-primary btn-sm float-right"><i
								class="fa fa-plus"></i> Tambah Data Faktor</a><span
							class="float-right">&nbsp;</span>
					</div>
					<div class="card-body">
						<table id="example1" class="table table-bordered ">
							<thead>
							<tr>
								<th>No</th>
								<th>Faktor</th>
								<th>Subfaktor</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($faktor as $key => $value):
								?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['faktor_nama'] ?></td>
									<td>
										<?php
										foreach ($subfaktor as $key2 => $value2):
											if ($value2['subfaktor_faktor_id'] == $value['faktor_id']):
											?>
										<ul>
											<li><?=$value2['subfaktor_nama']?></li>
										</ul>
										<?php
											else:
//												echo 'belum ada subfaktor'; break;
										endif;
										endforeach;
										?>
									</td>
									<td>
										<a href="<?= base_url('faktor/lihat/' . $value['faktor_id']) ?>"
										   class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
										<a href="<?= base_url('faktor/edit/' . $value['faktor_id']) ?>"
										   class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
										<a href="<?= base_url('faktor/hapus/' . $value['faktor_id']) ?>"
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
