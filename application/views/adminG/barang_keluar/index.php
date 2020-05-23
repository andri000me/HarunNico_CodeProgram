<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= site_url('ag/adminG_halaman'); ?>">Petugas Gudang</a>
        </li>
        <li class="breadcrumb-item active">Selamat Datang <?= $name; ?></li>
    </ol>
    <?= $this->session->flashdata('message'); ?>
    <div class="card mb-3">
        <div class="card-header"><i class="fas fa-table"></i>Info Barang Keluar</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pengemudi</th>
                            <th>Kendaraan</th>
                            <th>Tujuan</th>
                            <th>Waktu Keluar</th>
                            <th>Waktu Selesai</th>
                            <th>Waktu Respon</th>
                            <th>Waktu Tempuh</th>
                            <th>Status Barang</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($barang_keluar as $bk) {
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $bk['nama']; ?></td>
                                <td><?= $bk['nama_kendaraan']; ?></td>
                                <td><?= $bk['nama_lokasi_tujuan']; ?></td>
                                <td><?= $bk['waktu_keluar']; ?></td>
                                <td><?= $bk['waktu_selesai']; ?></td>
                                <td><?= $bk['waktu_respon']; ?></td>
                                <td><?= $bk['waktu_perjalanan']; ?></td>
                                <td>
                                    <?php
                                        if ($bk['status_barang'] == 0) {
                                            echo "Dalam In - Transit";
                                        } elseif ($bk['status_barang'] == 1) {
                                            echo "Pengantaran";
                                        } else {
                                            echo "Selesai";
                                        }
                                        ?>
                                </td>
                                <!-- <td><a href="<?= site_url('ag/adminG_halaman/detail_barang/' . $bk['id_barang_keluar']); ?>" type="button" class="btn btn-info">Detail</a></td> -->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>