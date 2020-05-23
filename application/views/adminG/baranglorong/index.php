<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= site_url('ag/adminG_halaman'); ?>">Petugas Gudang</a>
        </li>
        <li class="breadcrumb-item active">Selamat Datang <?= $name; ?></li>
    </ol>
    <div class="card mb-3">
        <div class="card-header"><i class="fas fa-table"></i>Data Barang Setiap Lorong</div>
        <div class="card-body">
            <form action="<?= site_url(); ?>" method="post">
                <input type="hidden" id="ajaxurllorong" value="<?php echo site_url('ag/adminG_barang_lorong/lorong_barang/'); ?>">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-label-group">
                                <select class="form-control" id="lorong" name="lorong" onchange="showLorong()">
                                    <option disabled="" selected="">Cek Lorong</option>
                                    <?php foreach ($lorong as $l) { ?>
                                        <option value="<?= $l['id_lorong']; ?>"><?= $l['nama_lorong']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a href="<?= site_url('ag/adminG_barang_lorong/hal_kirim_barang'); ?>" class="btn btn-success btn-sm">Kirim Barang</a>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                </div>

            </form>
            <div class="table-responsive">
                <table class="table table-bordered" id="lorong_id" name="lorong_id" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori Barang</th>
                            <th>Nama Barang</th>
                            <th>Merk Barang</th>
                            <th>Jumlah Barang Masuk</th>
                        </tr>
                    </thead>
                    <tbody id="isitabel">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>