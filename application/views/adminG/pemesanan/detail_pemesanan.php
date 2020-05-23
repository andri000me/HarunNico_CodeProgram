<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= site_url('ag/adminG_halaman'); ?>">Petugas Gudang</a>
        </li>
        <li class="breadcrumb-item active">Selamat Datang <?= $name; ?></li>
    </ol>
    <div class="row-mx mb-3">
        <div class="col-my-6">
            <a href="<?= site_url('ag/adminG_barang_lorong/hal_kirim_barang'); ?>" class="btn btn-success btn-sm">Kirim Barang</a>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="card mb-3 mt-3">
        <div class="card-header"><i class="fas fa-table"></i>Detail Pemesanan</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Nama Barang</th>
                            <th>Merk Barang</th>
                            <th>Jumlah Pemesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pemesanan as $pm) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $pm['nama_ktgr_brg']; ?></td>
                                <td><?= $pm['nama_barang']; ?></td>
                                <td><?= $pm['nama_merk_barang']; ?></td>
                                <td><?= $pm['jmlh_pemesanan']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>