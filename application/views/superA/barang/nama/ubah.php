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
            <div class="card-header">Ubah Merk Barang</div>
            <div class="card-body">
                <?php foreach ($nbrg as $nb) { ?>
                    <form action="<?php echo site_url('sa/sa_barang/ubah_nbrg/' . $nb['id_nama_barang']); ?>" method="post">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="id_lokasi" name="id" class="form-control" placeholder="id_lokasi" required="required" value="<?= $nb['id_nama_barang']; ?>" readonly="">
                                <label for="id_lokasi">ID Nama Barang</label>
                                <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <select class="form-control" id="ha" name="kbrg">
                                    <option disabled="">Pilih Kategori Barang</option>
                                    <?php foreach ($kbrg as $kb) { ?>
                                        <?php if ($kb['id_ktgr_brg'] == $nb['id_ktgr_brg']) { ?>
                                            <option value="<?= $kb['id_ktgr_brg'] ?>" selected><?= $kb['nama_ktgr_brg']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $kb['id_ktgr_brg'] ?>"><?= $kb['nama_ktgr_brg']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                <?= form_error('mbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="nama_gedung" name="nbrg" class="form-control" placeholder="nama_gedung" required="required" value="<?= $nb['nama_barang'] ?>">
                                <label for="nama_gedung">Nama Barang</label>
                                <?= form_error('nbrg', '<small class="text-danger pl-3">', '</small>'); ?>
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