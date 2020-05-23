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
            <div class="card-header">Ubah Data Pengemudi</div>
            <div class="card-body">
                <?php foreach ($pengemudi as $pen) { ?>
                    <form action="<?php echo site_url('sa/sa_pengemudi/ubah_pengemudi/' . $pen['id_pengguna']); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="id_lokasi" name="id" class="form-control" placeholder="id_lokasi" required="required" value="<?= $pen['id_pengemudi']; ?>" readonly="">
                                <label for="id_lokasi">ID Pengemudi</label>
                                <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <select class="form-control" id="ha" name="user">
                                    <option disabled="" selected="">Pilih Pengguna</option>
                                    <?php foreach ($user as $u) { ?>
                                        <?php if ($u['id_pengguna'] == $pen['id_pengguna']) { ?>
                                            <option value="<?= $u['id_pengguna'] ?>" selected><?= $u['nama']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $u['id_pengguna'] ?>"><?= $u['nama']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                <?= form_error('user', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="nama_gedung" name="email" class="form-control" placeholder="nama_gedung" value="<?= $pen['email_pengemudi']; ?>">
                                <label for="nama_gedung">Email Pengemudi</label>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="date" id="nama_gedung" name="tgll" class="form-control" placeholder="nama_gedung" value="<?= $pen['tanggal_lahir']; ?>">
                                <label for="nama_gedung">Tanggal Lahir</label>
                                <?= form_error('tgll', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="nama_gedung" name="nohp" class="form-control" placeholder="nama_gedung" required="required" value="<?= $pen['no_hp_penggemudi']; ?>">
                                <label for="nama_gedung">No Handphone</label>
                                <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Foto</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="image" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="image">Cari Foto</label>
                                <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <select class="form-control" id="ha" name="spengemudi">
                                    <option disabled="">Status Pengemudi</option>
                                    <option value="0" <?php if ($pen['status_pengemudi'] == 0) {
                                                            echo "selected";
                                                        } ?>>Tersedia</option>
                                    <option value="2" <?php if ($pen['status_pengemudi'] == 2) {
                                                            echo "selected";
                                                        } ?>>Berhalangan</option>
                                </select>
                                <?= form_error('spengemudi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
                        <button type="reset" name="submit" class="btn btn-warning">Reset</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>