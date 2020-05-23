<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= site_url('ag/adminG_halaman'); ?>">Petugas Gudang</a>
        </li>
        <li class="breadcrumb-item active">Selamat Datang <?= $name; ?></li>
    </ol>
    <div class="card mb-3">
        <div class="card-header"><i class="fas fa-table"></i>Persediaan Barang</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori Barang</th>
                            <th>Nama Barang</th>
                            <th>Merk Barang</th>
                            <th>Stok</th>
                            <th>Jenis Barang</th>
                            <th>Panjang Barang</th>
                            <th>Lebar Barang</th>
                            <th>Tinggi Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($stok as $s) {
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $s['nama_ktgr_brg']; ?></td>
                                <td><?= $s['nama_barang']; ?></td>
                                <td><?= $s['nama_merk_barang']; ?></td>
                                <td><?= $s['stok']; ?></td>
                                <td>
                                    <?php
                                        if ($s['jenis_barang'] == 0) {
                                            echo 'Pecah Belah';
                                        } elseif ($s['jenis_barang'] == 1) {
                                            echo 'Mudah Terbakar';
                                        } elseif ($s['jenis_barang'] == 2) {
                                            echo 'Korosif';
                                        } else {
                                            echo 'Mudah Kadaluarsa';
                                        }
                                        ?>
                                </td>
                                <td><?= $s['panjang_barang']; ?></td>
                                <td><?= $s['lebar_barang']; ?></td>
                                <td><?= $s['tinggi_barang']; ?></td>
                                <td>
                                    <a href="<?= site_url('ag/adminG_persediaan_barang/ubah_bs/' . $s['id_barang']); ?>" class="btn btn-warning mx-1 d-inline">Ubah</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>