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
            <div class="card-header">Tambah Nama kendaraan</div>
            <div class="card-body">
                <form action="<?php echo site_url('sa/sa_kendaraan/tambah_nkendaraan'); ?>" method="post">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="id_lokasi" name="id" class="form-control" placeholder="id_lokasi" required="required" value="<?= $nkendaraan; ?>" readonly="">
                            <label for="id_lokasi">ID Merk Kendaraan</label>
                            <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <select class="form-control" id="ha" name="mkendaraan">
                                <option disabled="" selected="">Pilih Merk Kendaraan</option>
                                <?php foreach ($mkendaraan as $mk) { ?>
                                    <option value="<?= $mk['id_merk_kendaraan'] ?>"><?= $mk['nama_mk']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('mkendaraan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="nama_gedung" name="nkendaraan" class="form-control" placeholder="nama_gedung" required="required">
                            <label for="nama_gedung">Nama kendaraan</label>
                            <?= form_error('nkendaraan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                    <button type="reset" name="submit" class="btn btn-warning">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>