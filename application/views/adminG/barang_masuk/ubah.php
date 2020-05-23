<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= site_url('ag/adminG_halaman'); ?>">Petugas Gudang</a>
        </li>
        <li class="breadcrumb-item active">Selamat Datang <?= $name; ?></li>
    </ol>
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Ubah Barang Masuk</div>
            <div class="card-body">
                <?php foreach ($brg as $b) { ?>
                    <form action="<?php echo site_url('ag/adminG_barang_masuk/ubah_bm/' . $b['id_barang']); ?>" method="post">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="id_lokasi" name="id" class="form-control" placeholder="id_lokasi" required="required" value="<?= $b['id_barang']; ?>" readonly="">
                                <label for="id_lokasi">ID Barang</label>
                                <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <select class="form-control" id="ha" name="asal">
                                    <option disabled="" selected="">Asal Barang</option>
                                    <?php foreach ($asal as $a) { ?>
                                        <?php if ($a['id_asal'] == $b['id_asal']) { ?>
                                            <option value="<?= $a['id_asal'] ?>" selected><?= $a['nama_lokasi_asal']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $a['id_asal'] ?>"><?= $a['nama_lokasi_asal']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                <?= form_error('asal', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="nama_gedung" name="jbrg" class="form-control" placeholder="nama_gedung" required="required" value="<?= $b['jumlah_brg_masuk']; ?>">
                                <label for="nama_gedung">Jumlah Barang</label>
                                <?= form_error('jbrg', '<small class="text-danger pl-3">', '</small>'); ?>
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