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
            <div class="card-header">Pendaftaran Toko</div>
            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= site_url('welcome/registoko'); ?>" method="post">
                    <input type="hidden" name="id_pengguna" value="<?= $id; ?>">
                    <input type="hidden" name="id_toko" value="<?= $toko; ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" name="namal" id="Nama" class="form-control" placeholder="Nama Depan" required="required">
                                    <label for="Nama">Nama Lengkap</label>
                                    <?= form_error('namal', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" name="umur" id="belakang" class="form-control" placeholder="Nama Belakang" required="required">
                                    <label for="belakang">Umur</label>
                                    <?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="username" id="username" name="username" class="form-control" placeholder="username" required="required">
                            <label for="username">Username</label>
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" name="password1" class="form-control" placeholder="Password" required="required">
                                    <label for="inputPassword">Password</label>
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" name="password2" class="form-control" placeholder="Repeat Password" required="required">
                                    <label for="inputPassword">Ulangi Password</label>
                                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" name="namat" id="Nama" class="form-control" placeholder="Nama Depan" required="required">
                                    <label for="Nama">Nama Toko</label>
                                    <?= form_error('namat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" name="noteltoko" id="belakang" class="form-control" placeholder="Nama Belakang" required="required" value="+62">
                                    <label for="belakang">No Wa Pemilik Toko</label>
                                    <?= form_error('noteltoko', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" name="alamat" id="belakang" class="form-control" placeholder="Nama Belakang" required="required">
                                    <label for="belakang">Alamat Jalan Toko</label>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <select class="form-control" id="ha" name="tujuan">
                                        <option disabled="" selected="">Pilih Kota</option>
                                        <?php foreach ($kota as $kt) { ?>
                                            <option value="<?= $kt['id_tujuan']; ?>"><?= $kt['nama_lokasi_tujuan']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block">Daftar</button>
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