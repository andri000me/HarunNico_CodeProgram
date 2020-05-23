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
            <div class="card-header">Tambah Barang</div>
            <div class="card-body">
                <form action="<?php echo site_url('ag/adminG_barang_masuk/tambah_bm'); ?>" method="post">
                    <input type="hidden" id="ajaxurlnama" value="<?= site_url('ag/adminG_barang_masuk/form_nama/'); ?>">
                    <input type="hidden" id="ajaxurlmerk" value="<?= site_url('ag/adminG_barang_masuk/form_merk/'); ?>">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="id_lokasi" name="id" class="form-control" placeholder="id_lokasi" required="required" value="<?= $brg; ?>" readonly="">
                            <label for="id_lokasi">ID Barang</label>
                            <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <select class="form-control" id="ha" name="asal">
                                <option disabled="" selected="">Asal Barang</option>
                                <?php foreach ($asal as $a) { ?>
                                    <option value="<?= $a['id_asal'] ?>"><?= $a['nama_lokasi_asal']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('asal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <select class="form-control" id="ha" name="lorong">
                                <option disabled="" selected="">Lorong</option>
                                <?php foreach ($lorong as $l) { ?>
                                    <option value="<?= $l['id_lorong'] ?>"><?= $l['nama_lorong']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('lorong', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <select class="form-control" id="kbrg" name="kbrg" onchange="showNama()">
                                        <option disabled="" selected="">Kategori Barang</option>
                                        <?php foreach ($kbrg as $kb) { ?>
                                            <option value="<?= $kb['id_ktgr_brg'] ?>"><?= $kb['nama_ktgr_brg']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('kbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <select class="form-control" id="nbrg" name="nbrg" onchange="showMerk()">
                                        <option disabled="" selected="">Nama Barang</option>
                                    </select>
                                    <?= form_error('nbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <select class="form-control" id="mbrg" name="mbrg">
                                        <option disabled="" selected="">Merk Barang</option>
                                    </select>
                                    <?= form_error('mbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <select class="form-control" id="mbrg" name="jenbrg">
                                        <option disabled="" selected="">Jenis Barang</option>
                                        <option value="0">Pecah Belah</option>
                                        <option value="1">Mudah Terbakar</option>
                                        <option value="2">Korosif</option>
                                        <option value="3">Cepat Kadaluarsa</option>
                                    </select>
                                    <?= form_error('jenbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="nama_gedung" name="jbrg" class="form-control" placeholder="nama_gedung" required="required">
                            <label for="nama_gedung">Jumlah Barang</label>
                            <?= form_error('jbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="nama_gedung" name="pbrg" class="form-control" placeholder="nama_gedung" required="required">
                                    <label for="nama_gedung">Panjang Barang (CM)</label>
                                    <?= form_error('pbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-label-group">
                                <input type="text" id="nama_gedung" name="lbrg" class="form-control" placeholder="nama_gedung" required="required">
                                <label for="nama_gedung">Lebar Barang (CM)</label>
                                <?= form_error('lbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-label-group">
                                <input type="text" id="nama_gedung" name="tbrg" class="form-control" placeholder="nama_gedung" required="required">
                                <label for="nama_gedung">Tinggi Barang (CM)</label>
                                <?= form_error('tbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                    <button type="reset" name="submit" class="btn btn-warning">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>