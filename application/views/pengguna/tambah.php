
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Pengguna</h1>
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
						Tambah Data Pengguna
					</div>
					<div class="card-body">
						<form method="post" action="<?=base_url('pengguna/tambah')?>">
							<div class="card-body">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" class="form-control" name="nama" placeholder="nama" required autocomplete="off">
								</div>
								<div class="form-group">
									<label>Username</label>
									<input type="text" class="form-control" name="username" placeholder="username" required autocomplete="off">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" name="password" placeholder="password" required autocomplete="off">
								</div>
								<div class="form-group">
									<label>Level</label>
									<select name="level" class="form-control" id="">
										<option value="dosen">dosen</option>
										<option value="mahasiswa">mahasiswa</option>
									</select>
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
