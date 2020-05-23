<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= site_url('ag/adminG_halaman'); ?>">Petugas Gudang</a>
        </li>
        <li class="breadcrumb-item active">Selamat Datang <?= $name; ?></li>
    </ol>
    <div class="row-mx mb-3">
        <div class="col-my-6">
            <a href="<?= site_url('ag/adminG_barang_masuk/tambah_bm'); ?>"><button class="btn btn-primary btn-sm">Tambah Barang Masuk</button></a>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="card mb-3 mt-3">
        <div class="card-header"><i class="fas fa-table"></i>Info Barang Masuk</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori Barang</th>
                            <th>Nama Barang</th>
                            <th>Merk Barang</th>
                            <th>Asal Barang</th>
                            <th>Waktu Masuk</th>
                            <th>Jumlah Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($barmas as $bm) {
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $bm['nama_ktgr_brg']; ?></td>
                                <td><?= $bm['nama_barang']; ?></td>
                                <td><?= $bm['nama_merk_barang']; ?></td>
                                <td><?= $bm['nama_lokasi_asal']; ?></td>
                                <td><?= $bm['waktu_masuk']; ?></td>
                                <td><?= $bm['jumlah_brg_masuk']; ?></td>
                                <td>
                                    <a href="<?= site_url('ag/adminG_barang_masuk/ubah_bm/' . $bm['id_barang']); ?>" class="btn btn-warning mx-1 d-inline">Ubah</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>