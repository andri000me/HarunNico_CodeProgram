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
            <div class="card-header">Ubah Lokasi Tujuan</div>
            <div class="card-body">
                <?php foreach ($tujuan as $t) { ?>
                    <form action="<?php echo site_url('sa/sa_lokasi/ubah_tujuan/' . $t['id_tujuan']); ?>" method="post">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="id_lokasi" name="id" class="form-control" placeholder="id_lokasi" required="required" value="<?= $t['id_tujuan']; ?>" readonly="">
                                <label for="id_lokasi">ID Tujuan</label>
                                <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="nama_gedung" name="ntujuan" class="form-control" placeholder="nama_gedung" required="required" value="<?= $t['nama_lokasi_tujuan']; ?>">
                                <label for="nama_gedung">Nama Tujuan</label>
                                <?= form_error('ntujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="nama_gedung" name="latitude" class="form-control" placeholder="nama_gedung" required="required" value="<?= $t['latitude']; ?>">
                                <label for="nama_gedung">Titik Latitude</label>
                                <?= form_error('latitude', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="nama_gedung" name="longitude" class="form-control" placeholder="nama_gedung" required="required" value="<?= $t['longitude']; ?>">
                                <label for="nama_gedung">Titik Longitude</label>
                                <?= form_error('longitude', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
                        <button type="reset" name="submit" class="btn btn-warning">Reset</button>
                        <a href="https://www.latlong.net/convert-address-to-lat-long.html" class="btn btn-dark my-3" target="_blank">Titik Lat & Long</a>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>