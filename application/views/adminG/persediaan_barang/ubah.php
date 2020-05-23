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
            <div class="card-header">Ubah Stok Barang</div>
            <div class="card-body">
                <?php foreach ($brg as $b) { ?>
                    <form action="<?php echo site_url('ag/adminG_persediaan_barang/ubah_bs/' . $b['id_barang']); ?>" method="post">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="id_lokasi" name="id" class="form-control" placeholder="id_lokasi" required="required" value="<?= $b['id_barang']; ?>" readonly="">
                                <label for="id_lokasi">ID Barang</label>
                                <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="text" id="id_lokasi" name="kbrg" class="form-control" placeholder="id_lokasi" required="required" value="<?= $b['nama_ktgr_brg']; ?>" readonly="">
                                        <label for="id_lokasi">Kategori Barang</label>
                                        <?= form_error('kbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="text" id="id_lokasi" name="nbrg" class="form-control" placeholder="id_lokasi" required="required" value="<?= $b['nama_barang']; ?>" readonly="">
                                        <label for="id_lokasi">Nama Barang</label>
                                        <?= form_error('nbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="text" id="id_lokasi" name="mbrg" class="form-control" placeholder="id_lokasi" required="required" value="<?= $b['nama_merk_barang']; ?>" readonly="">
                                        <label for="id_lokasi">Merk Barang</label>
                                        <?= form_error('mbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <select class="form-control" id="mbrg" name="jenbrg">
                                    <option disabled="" selected="">Jenis Barang</option>
                                    <option value="0" <?php if ($b['jenis_barang'] == 0) {
                                                                echo "selected";
                                                            } ?>>Pecah Belah</option>
                                    <option value="1" <?php if ($b['jenis_barang'] == 1) {
                                                                echo "selected";
                                                            } ?>>Mudah Terbakar</option>
                                    <option value="2" <?php if ($b['jenis_barang'] == 2) {
                                                                echo "selected";
                                                            } ?>>Korosif</option>
                                    <option value="3" <?php if ($b['jenis_barang'] == 3) {
                                                                echo "selected";
                                                            } ?>>Cepat Kadaluarsa</option>
                                </select>
                                <?= form_error('jenbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="nama_gedung" name="jbrg" class="form-control" placeholder="nama_gedung" required="required" value="<?= $b['stok'] ?>">
                                <label for="nama_gedung">Jumlah Barang</label>
                                <?= form_error('jbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="text" id="nama_gedung" name="pbrg" class="form-control" placeholder="nama_gedung" required="required" value="<?= $b['panjang_barang'] ?>">
                                        <label for="nama_gedung">Panjang Barang (CM)</label>
                                        <?= form_error('pbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="text" id="nama_gedung" name="lbrg" class="form-control" placeholder="nama_gedung" required="required" value="<?= $b['lebar_barang'] ?>">
                                        <label for="nama_gedung">Lebar Barang (CM)</label>
                                        <?= form_error('lbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="text" id="nama_gedung" name="tbrg" class="form-control" placeholder="nama_gedung" required="required" value="<?= $b['tinggi_barang'] ?>">
                                        <label for="nama_gedung">Tinggi Barang (CM)</label>
                                        <?= form_error('tbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
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