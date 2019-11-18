<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Aplikasi Penilai Kesiapan E-Learning UIN SUSKA</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/iCheck/square/blue.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="icon" href="<?= base_url() ?>assets/image/download.jpg" type="image/x-icon"/>
	<link rel="shortcut icon" href="<?=base_url()?>assets/dist/img/iconBuku2.png">
	<link rel="shortcut icon" href="<?= base_url() ?>assets/dist/css/sweetalert2.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="<?= base_url() ?>">Aplikasi Penilai Kesiapan E-Learning UIN SUSKA</a>
	</div>
	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<?php if ($this->session->flashdata('alert') == 'gagalLogin') { ?>
				<div class="alert alert-danger animated fadeInDown" role="alert">
					<button type="button" class="close" data-dismiss="alert"></button>
					Password / Username salah. Periksa kembali
				</div>
			<?php } ?>

			<?php echo form_open('login', array('id' => 'formValidation')) ?>
			<a href="<?= base_url('kuesioner/tambah/mahasiswa') ?>" class="btn btn-primary btn-block">Isi Kuesioner Mahasiswa</a>
			<a href="<?= base_url('kuesioner/tambah/dosen') ?>" class="btn btn-primary btn-block">Isi Kuesioner Dosen</a>
			</form>


			<!-- /.login-card-body -->
		</div>
	</div>
	<a href="<?= base_url('kuesioner/tambah/ptipd') ?>">Kuesioner PTIPD</a>
	<a href="<?= base_url('login') ?>" class="float-right">Login admin</a>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- iCheck -->
	<script src="<?= base_url() ?>/assets/plugins/iCheck/icheck.min.js"></script>
	<script src="<?=base_url()?>assets/dist/js/sweetalert2.all.js"></script>
	<script src="<?=base_url()?>assets/dist/js/sweetalert2.min.js"></script>
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
			})
		})
	</script>


	<?php if ($this->session->flashdata('alert') == 'isi_kuesioner') { ?>
		<script>
			Swal.fire(
				'Terima kasih telah mengisi kuesioner!',
				'',
				'success'
			)
		</script>
	<?php } ?>
</body>
</html>

