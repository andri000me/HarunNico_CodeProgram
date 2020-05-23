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
            <div class="card-header">Ubah Rak</div>
            <div class="card-body">
                <?php foreach ($rak as $r) { ?>
                    <form action="<?php echo site_url('sa/sa_lokasi/ubah_rak/' . $r['id_rak']); ?>" method="post">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="id_lokasi" name="id" class="form-control" placeholder="id_lokasi" required="required" value="<?= $r['id_rak']; ?>" readonly="">
                                <label for="id_lokasi">ID Rak</label>
                                <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <select class="form-control" id="ha" name="kbrg">
                                    <option disabled="" selected="">Pilih Kategori Barang</option>
                                    <?php foreach ($kbrg as $kb) { ?>
                                        <?php if ($kb['id_ktgr_brg'] == $r['id_ktgr_brg']) { ?>
                                            <option value="<?= $kb['id_ktgr_brg'] ?>" selected><?= $kb['nama_ktgr_brg']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $kb['id_ktgr_brg'] ?>"><?= $kb['nama_ktgr_brg']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                <?= form_error('kbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <select class="form-control" id="ha" name="lorong">
                                    <option disabled="" selected="">Pilih Lorong</option>
                                    <?php foreach ($lorong as $l) { ?>
                                        <?php if ($l['id_lorong'] == $r['id_lorong']) { ?>
                                            <option value="<?= $l['id_lorong'] ?>" selected><?= $l['nama_lorong']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $l['id_lorong'] ?>"><?= $l['nama_lorong']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                <?= form_error('lorong', '<small class="text-danger pl-3">', '</small>'); ?>
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