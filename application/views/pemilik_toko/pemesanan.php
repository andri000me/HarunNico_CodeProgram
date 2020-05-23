<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= site_url('pt/C_pemilik_toko'); ?>">Pemilik Toko</a>
        </li>
        <li class="breadcrumb-item active">Selamat Datang <?= $name; ?></li>
    </ol>
    <div class="row-mx">
        <div class="col-my-6">
            <a href="<?php echo site_url('pt/C_pemilik_toko/tambahpemesanan'); ?>" class="btn btn-primary my-2">Tambah Pesanan</a>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="card mb-3">
        <div class="card-header"><i class="fas fa-table"></i>Daftar Pesan</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori Barang</th>
                            <th>Nama Barang</th>
                            <th>Merk Barang</th>
                            <th>Jumlah Barang Yang Dipesan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pemesanan as $psn) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $psn['nama_ktgr_brg']; ?></td>
                                <td><?= $psn['nama_barang']; ?></td>
                                <td><?= $psn['nama_merk_barang']; ?></td>
                                <td><?= $psn['jmlh_pemesanan']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>