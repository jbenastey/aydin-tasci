
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
				<div class="card card-primary card-outline">
					<div class="card-header">
						Edit Data Faktor
					</div>
					<div class="card-body">
						<form method="post" action="<?=base_url('faktor/edit/'.$faktor['faktor_id'])?>">
							<div class="card-body">
								<div class="form-group">
									<label>Faktor</label>
									<input type="text" class="form-control" name="faktor" value="<?=$faktor['faktor_nama']?>" placeholder="faktor" required autocomplete="off">
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
