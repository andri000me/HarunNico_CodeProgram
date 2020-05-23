<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= site_url('ag/adminG_halaman'); ?>">Petugas Gudang</a>
        </li>
        <li class="breadcrumb-item active">Selamat Datang <?= $name; ?></li>
    </ol>
    <?= $this->session->flashdata('message'); ?>
    <div class="card mb-3 mt-3">
        <div class="card-header"><i class="fas fa-table"></i>Info Pemesanan</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Toko</th>
                            <th>Alamat Toko</th>
                            <th>Bukti Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pemesan as $pm) {
                            if ($pm['status_pemesanan'] == 1) {
                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $pm['nama_toko']; ?></td>
                                    <td><?= $pm['alamat_toko']; ?></td>
                                    <td>
                                        <?php if ($pm['bukti_pembayaran'] == 'null') {
                                            echo "Belum Melakukan Pembayaran";
                                        } else { ?>
                                            <img src="<?= base_url('assets/img/bukti_pembayaran/' . $pm['bukti_pembayaran']) ?>" height="50px" width="50px">
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('ag/adminG_halaman/detail_pemesanan/' . $pm['id_pemesanan']); ?>" class="btn btn-warning mx-1 d-inline">Detail Barang</a>
                                        <a href="<?= site_url('ag/adminG_barang_lorong/hal_kirim_barang'); ?>" class="btn btn-success btn-sm">Kirim Barang</a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>