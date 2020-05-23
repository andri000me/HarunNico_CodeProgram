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
            <div class="card-header">Ubah Merk kendaraan</div>
            <div class="card-body">
                <?php foreach ($mkendaraan as $mk) { ?>
                    <form action="<?php echo site_url('sa/sa_kendaraan/ubah_mkendaraan/' . $mk['id_merk_kendaraan']); ?>" method="post">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="id_lokasi" name="id" class="form-control" placeholder="id_lokasi" required="required" value="<?= $mk['id_merk_kendaraan']; ?>" readonly="">
                                <label for="id_lokasi">ID Merk Kendaraan</label>
                                <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="nama_gedung" name="mkendaraan" class="form-control" placeholder="nama_gedung" required="required" value="<?= $mk['nama_mk']; ?>">
                                <label for="nama_gedung">Merk kendaraan</label>
                                <?= form_error('mkendaraan', '<small class="text-danger pl-3">', '</small>'); ?>
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