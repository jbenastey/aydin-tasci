
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
						Tambah Data Pertanyaan
					</div>
					<div class="card-body">
						<form method="post" action="<?=base_url('pertanyaan/tambah')?>">
							<div class="card-body">
								<div class="form-group">
									<label>Faktor</label>
									<select name="faktor" class="form-control" required id="faktor">
										<option selected disabled>- Pilih Faktor -</option>
										<?php
										foreach ($faktor as $item):
										?>
											<option value="<?=$item['faktor_id']?>"><?=$item['faktor_nama']?></option>
										<?php
										endforeach;
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Subfaktor</label>
									<select name="subfaktor" class="form-control" required id="subfaktor">
										<option selected disabled>- Pilih Subfaktor -</option>
									</select>
								</div>
								<div class="form-group">
									<label>Responden</label>
									<select name="responden" class="form-control" required >
										<option>dosen</option>
										<option>mahasiswa</option>
									</select>
								</div>
								<div class="form-group">
									<label for="">Pertanyaan</label>
									<textarea name="pertanyaan" class="form-control" id="" cols="30" rows="5"></textarea>
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
