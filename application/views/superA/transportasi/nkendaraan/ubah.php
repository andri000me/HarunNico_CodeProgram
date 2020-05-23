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
            <div class="card-header">Ubah Nama kendaraan</div>
            <div class="card-body">
                <?php foreach ($nkendaraan as $nk) { ?>
                    <form action="<?php echo site_url('sa/sa_kendaraan/ubah_nkendaraan/' . $nk['id_nama_kendaraan']); ?>" method="post">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="id_lokasi" name="id" class="form-control" placeholder="id_lokasi" required="required" value="<?= $nk['id_nama_kendaraan']; ?>" readonly="">
                                <label for="id_lokasi">ID Nama Kendaraan</label>
                                <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <select class="form-control" id="ha" name="mkendaraan">
                                    <option disabled="" selected="">Pilih Merk Kendaraan</option>
                                    <?php foreach ($mkendaraan as $mk) { ?>
                                        <?php if ($mk['id_merk_kendaraan'] == $nk['id_merk_kendaraan']) { ?>
                                            <option value="<?= $mk['id_merk_kendaraan'] ?>" selected><?= $mk['nama_mk']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $mk['id_merk_kendaraan'] ?>"><?= $mk['nama_mk']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                <?= form_error('mkendaraan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="nama_gedung" name="nkendaraan" class="form-control" placeholder="nama_gedung" required="required" value="<?= $nk['nama_kendaraan']; ?>">
                                <label for="nama_gedung">Nama kendaraan</label>
                                <?= form_error('nkendaraan', '<small class="text-danger pl-3">', '</small>'); ?>
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