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
            <div class="card-header">Ubah Toko</div>
            <div class="card-body">
                <?php foreach ($toko as $t) { ?>
                    <form action="<?= site_url('sa/sa_toko/ubah_toko/' . $t['id_toko']); ?>" method="post">
                        <div class="form-group">
                            <div class="form-label-group">
                                <select class="form-control" id="ha" name="pemilik">
                                    <option disabled="" selected="">Pilih Pemilik Toko</option>
                                    <?php foreach ($pemilik as $plk) { ?>
                                        <?php if ($t['id_pengguna'] == $plk['id_pengguna']) { ?>
                                            <option value="<?= $plk['id_pengguna']; ?>" selected><?= $plk['nama']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $plk['id_pengguna']; ?>"><?= $plk['nama']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                <?= form_error('pemilik', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" name="namat" id="Nama" class="form-control" placeholder="Nama Depan" required="required" value="<?= $t['nama_toko']; ?>">
                                <label for="Nama">Nama Toko</label>
                                <?= form_error('namat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" name="noteltoko" id="belakang" class="form-control" placeholder="Nama Belakang" required="required" value="<?= $t['notel_toko']; ?>">
                                <label for="belakang">No Wa Pemilik Toko</label>
                                <?= form_error('noteltoko', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="text" name="alamat" id="belakang" class="form-control" placeholder="Nama Belakang" required="required" value="<?= $t['alamat_toko']; ?>">
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
                                                <?php if ($t['id_tujuan'] == $kt['id_tujuan']) { ?>
                                                    <option value="<?= $kt['id_tujuan']; ?>" selected><?= $kt['nama_lokasi_tujuan']; ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $kt['id_tujuan']; ?>"><?= $kt['nama_lokasi_tujuan']; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary btn-md">Ubah</button>
                        <button type="reset" Value="kosongkan" class="btn btn-warning btn-md">Reset</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>