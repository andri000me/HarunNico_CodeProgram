<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= site_url('ag/adminG_halaman'); ?>">Petugas Gudang</a>
        </li>
        <li class="breadcrumb-item active">Selamat Datang <?= $name; ?></li>
    </ol>
    <div class="row">
        <div class="col-md-3">
            <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal">Tambah Barang Keluar</button>
        </div>
        <div class="col-md-3">

        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="card my-3">
        <div class="card-header"><i class="fas fa-table"></i>Barang Yang Akan Dikirim</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori Barang</th>
                            <th>Nama Barang</th>
                            <th>Merk Barang</th>
                            <th>Jumlah Barang Kirim</th>
                            <th>Dimensi</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($bkeluar as $bk) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $bk['nama_ktgr_brg']; ?></td>
                                <td><?= $bk['nama_barang']; ?></td>
                                <td><?= $bk['nama_merk_barang']; ?></td>
                                <td><?= $bk['jmlh_brg_klr']; ?></td>
                                <td><?= $bk['dimensi_barang']; ?> CM<sup>3</sup></td>
                                <td><?= $bk['total_dimensi']; ?> CM<sup>3</sup></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php foreach ($button as $bk) { ?>
        <form action="<?= site_url('ag/adminG_barang_keluar/hal_pilih_supir/' . $bk['id_barang_keluar']); ?>" method="POST">
            <button class="btn btn-success d-inline">Tambah Detail Info</button>
        </form>
    <?php } ?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('ag/adminG_barang_keluar/insert_data_keluar'); ?>" method="post">
                    <input type="hidden" id="ajaxurlbarang1" value="<?= site_url('ag/adminG_barang_keluar/form_kategori/'); ?>">
                    <input type="hidden" id="ajaxurlbarang2" value="<?= site_url('ag/adminG_barang_keluar/form_nama/'); ?>">
                    <input type="hidden" id="ajaxurlbarang3" value="<?= site_url('ag/adminG_barang_keluar/form_merk/'); ?>">
                    <input type="hidden" id="ajaxurlbarang4" value="<?= site_url('ag/adminG_barang_keluar/form_stok/'); ?>">
                    <input type="hidden" id="ajaxurlbarang5" value="<?= site_url('ag/adminG_barang_keluar/form_panjang/'); ?>">
                    <input type="hidden" id="ajaxurlbarang6" value="<?= site_url('ag/adminG_barang_keluar/form_lebar/'); ?>">
                    <input type="hidden" id="ajaxurlbarang7" value="<?= site_url('ag/adminG_barang_keluar/form_tinggi/'); ?>">
                    <input type="hidden" id="ajaxurlbarang8" value="<?= site_url('ag/adminG_barang_keluar/form_idktgr/'); ?>">
                    <input type="hidden" id="ajaxurlbarang9" value="<?= site_url('ag/adminG_barang_keluar/form_idnb/'); ?>">
                    <input type="hidden" id="ajaxurlbarang10" value="<?= site_url('ag/adminG_barang_keluar/form_idmb/'); ?>">
                    <input type="hidden" id="idkbrg" name="idkbrg">
                    <input type="hidden" id="idnbrg" name="idnbrg">
                    <input type="hidden" id="idmbrg" name="idmbrg">
                    <div class="form-group">
                        <div class="form-label-group">
                            <select class="form-control" id="barang" name="barang" onchange="showBarang1(),showBarang2(),showBarang3(),showBarang4(),showBarang5(),showBarang6(),showBarang7(),showBarang8(),showBarang9(),showBarang10()">
                                <option disabled="" selected="">ID Barang</option>
                                <?php foreach ($barang as $b) { ?>
                                    <?php if ($b['stok_barang'] > 0) { ?>
                                        <option value="<?= $b['id_barang']; ?>"><?= $b['id_barang']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                            <?= form_error('barang', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="kbrg" name="kbrg" class="form-control" placeholder="id_lokasi" required="required" readonly="">
                                    <label for="id_lokasi">Kategori Barang</label>
                                    <?= form_error('kbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="nbrg" name="nbrg" class="form-control" placeholder="id_lokasi" required="required" readonly="">
                                    <label for="id_lokasi">Nama Barang</label>
                                    <?= form_error('nbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="mbrg" name="mbrg" class="form-control" placeholder="id_lokasi" required="required" readonly="">
                                    <label for="id_lokasi">Merk Barang</label>
                                    <?= form_error('mbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="jbrgkel" name="jbrgkel" class="form-control" placeholder="id_lokasi" required="required">
                                    <label for="id_lokasi">Jumlah Barang Keluar</label>
                                    <?= form_error('jbrgkel', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="jbrg" name="jbrg" class="form-control" placeholder="id_lokasi" required="required" readonly="">
                                    <label for="id_lokasi">Stok Barang</label>
                                    <?= form_error('jbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="pbrg" name="pbrg" class="form-control" placeholder="id_lokasi" required="required" readonly="">
                                    <label for="id_lokasi">Panjang Barang (CM)</label>
                                    <?= form_error('pbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="lbrg" name="lbrg" class="form-control" placeholder="id_lokasi" required="required" readonly="">
                                    <label for="id_lokasi">Lebar Barang (CM)</label>
                                    <?= form_error('lbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="tbrg" name="tbrg" class="form-control" placeholder="id_lokasi" required="required" readonly="">
                                    <label for="id_lokasi">Tinggi Barang (CM)</label>
                                    <?= form_error('tbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
            </form>
        </div>
    </div>
</div>