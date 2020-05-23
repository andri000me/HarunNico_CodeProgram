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
            <div class="card-header">Ubah Lokasi Lorong</div>
            <div class="card-body">
                <?php foreach ($lorong as $l) { ?>
                    <form action="<?php echo site_url('sa/sa_lokasi/ubah_lorong/' . $l['id_lorong']); ?>" method="post">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="id_lokasi" name="id" class="form-control" placeholder="id_lokasi" required="required" value="<?= $l['id_lorong']; ?>" readonly="">
                                <label for="id_lokasi">ID Lorong</label>
                                <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <select class="form-control" id="ha" name="tujuan">
                                    <option disabled="" selected="">Pilih Tujuan Barang</option>
                                    <?php foreach ($tujuan as $t) { ?>
                                        <?php if ($t['id_tujuan'] == $l['id_tujuan']) { ?>
                                            <option value="<?= $t['id_tujuan'] ?>" selected><?= $t['nama_lokasi_tujuan']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $t['id_tujuan'] ?>"><?= $t['nama_lokasi_tujuan']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="nama_gedung" name="nlorong" class="form-control" placeholder="nama_gedung" required="required" value="<?= $l['nama_lorong']; ?>">
                                <label for="nama_gedung">Nama Lorong</label>
                                <?= form_error('nlorong', '<small class="text-danger pl-3">', '</small>'); ?>
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