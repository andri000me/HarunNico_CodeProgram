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
                <?php foreach ($toko as $t) { ?>
                    <form action="<?php echo site_url('pt/C_pemilik_toko/bayar'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="pemilik" name="pemilik" class="form-control" placeholder="nama_gedung" required="required" readonly="" value="<?= $t['nama']; ?>">
                                <label for="pemilik">Nama Pemilik Toko</label>
                                <?= form_error('pemilik', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="toko" name="toko" class="form-control" placeholder="nama_gedung" required="required" readonly="" value="<?= $t['nama_toko']; ?>">
                                <label for="toko">Nama Toko</label>
                                <?= form_error('toko', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Bukti Pembayaran</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
                                <label class="custom-file-label" for="inputGroupFile01">Cari FIle</label>
                                <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                        <button type="reset" name="submit" class="btn btn-warning">Reset</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>