<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= site_url('sa/sa_halaman'); ?>">Super Admin</a>
        </li>
        <li class="breadcrumb-item active">Selamat Datang <?= $name; ?></li>
    </ol>
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Tambah Pengguna Baru</div>
            <div class="card-body">
                <form action="<?= site_url('sa/sa_user/tambah_pengguna'); ?>" method="post">
                    <input type="hidden" name="id_pengguna" value="<?= $id; ?>">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" name="namal" id="Nama" class="form-control" placeholder="Nama Depan" required="required">
                            <label for="Nama">Nama Lengkap</label>
                            <?= form_error('namal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" name="umur" id="belakang" class="form-control" placeholder="Nama Belakang" required="required">
                            <label for="belakang">Umur</label>
                            <?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" name="alamat" id="belakang" class="form-control" placeholder="Nama Belakang" required="required">
                            <label for="belakang">Alamat</label>
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
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
                    <div class="form-group">
                        <div class="form-label-group">
                            <select class="form-control" id="ha" name="hak">
                                <option disabled="" selected="">Pilih Hak Akses</option>
                                <option value="0">Super Admin</option>
                                <option value="1">Petugas Gudang</option>
                                <option value="2">Staff</option>
                                <option value="3">Pengemudi</option>
                                <option value="4">Pemilik Toko</option>
                            </select>
                            <?= form_error('hak', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-md">Tambah</button>
                    <button type="reset" Value="kosongkan" class="btn btn-primary btn-md">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>