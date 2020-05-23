<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= site_url('ag/adminG_halaman'); ?>">Petugas Gudang</a>
        </li>
        <li class="breadcrumb-item active">Selamat Datang <?= $name; ?></li>
    </ol>
    <?= $this->session->flashdata('message'); ?>
    <div class="card my-3">
        <div class="card-header"><i class="fas fa-table"></i>Tambah Info Barang Keluar</div>
        <div class="card-body">
            <?php foreach ($bkeluar as $bk) { ?>
                <form action="<?php echo site_url('ag/adminG_barang_keluar/progres_pengiriman/' . $bk['id_barang_keluar']); ?>" method="post">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <select class="form-control" id="ha" name="lorong">
                                            <option disabled="" selected="">Lorong</option>
                                            <?php foreach ($lorong as $l) { ?>
                                                <option value="<?= $l['id_lorong']; ?>"><?= $l['nama_lorong']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('lorong', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <select class="form-control" id="ha" name="pengemudi">
                                            <option disabled="" selected="">Pengemudi</option>
                                            <?php foreach ($pengemudi as $p) { ?>
                                                <option value="<?= $p['id_pengemudi']; ?>"><?= $p['nama']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('pengemudi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <select class="form-control" id="ha" name="toko">
                                            <option disabled="" selected="">Toko</option>
                                            <?php foreach ($toko as $t) { ?>
                                                <option value="<?= $t['id_toko']; ?>"><?= $t['nama_toko']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('toko', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="text" id="mbrg" name="totdim" class="form-control" placeholder="id_lokasi" required="required" readonly="" value="<?= $bk['seluruh_dimensi']; ?>">
                                        <label for="id_lokasi">Total Keseluruhan CM<sup>3</sup></label>
                                        <?= form_error('totdim', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" name="submit" class="btn btn-primary d-inline">Kirim</button>
                            </div>
                        </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>