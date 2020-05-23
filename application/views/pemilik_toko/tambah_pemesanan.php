<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= site_url('pt/C_pemilik_toko'); ?>">Pemilik Toko</a>
        </li>
        <li class="breadcrumb-item active">Selamat Datang <?= $name; ?></li>
    </ol>
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Tambah Pemesanan Barang</div>
            <div class="card-body">
                <form action="<?php echo site_url('pt/C_pemilik_toko/tambahpemesanan'); ?>" method="post">
                    <input type="hidden" id="ajaxurlnama" value="<?= site_url('pt/C_pemilik_toko/form_nama/'); ?>">
                    <input type="hidden" id="ajaxurlmerk" value="<?= site_url('pt/C_pemilik_toko/form_merk/'); ?>">
                    <div class="row">
                        <div class="col-md-4">
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <select class="form-control" id="nbrg" name="nbrg" onchange="showMerk()">
                                        <option disabled="" selected="">Nama Barang</option>
                                    </select>
                                    <?= form_error('nbrg', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <select class="form-control" id="mbrg" name="mbrg">
                                        <option disabled="" selected="">Merk Barang</option>
                                    </select>
                                    <?= form_error('mbrg', '<small class="text-danger pl-3">', '</small>'); ?>
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
                    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                    <button type="reset" name="submit" class="btn btn-warning">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>