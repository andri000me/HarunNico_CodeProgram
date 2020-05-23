<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Gudang In - Transit Merge</title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/'); ?>css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

	<div class="container">
		<div class="card card-login mx-auto mt-5">
			<div class="card-header">Login</div>
			<div class="card-body">
				<?= $this->session->flashdata('message'); ?>
				<form action="<?= site_url('welcome/cek'); ?>" method="post">
					<div class="form-group">
						<div class="form-label-group">
							<input type="text" id="username" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" name="uname">
							<label for="username">Username</label>
							<?= form_error('uname', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="form-label-group">
							<input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="pass">
							<label for="inputPassword">Password</label>
							<?= form_error('pass', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<button class="btn btn-primary btn-block">Login</button>
						</div>
						<div class="col-md-6">
							<a href="<?= site_url('Welcome/registoko'); ?>" class="btn btn-success btn-block">Daftar</a>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>