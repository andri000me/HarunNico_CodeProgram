<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= site_url('sa/sa_halaman'); ?>">Super Admin</a>
        </li>
        <li class="breadcrumb-item active">Selamat Datang <?= $name; ?></li>
    </ol>
    <div class="row-mx">
        <div class="col-my-6">
            <a href="<?php echo site_url('sa/sa_toko/tambah_toko'); ?>" class="btn btn-primary my-2">Tambah Toko</a>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="card mb-3">
        <div class="card-header"><i class="fas fa-table"></i>Daftar Toko</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Toko</th>
                            <th>Pemilik Toko</th>
                            <th>Alamat Toko</th>
                            <th>Kota</th>
                            <th>No Telepon Toko</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($toko as $t) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $t['nama_toko']; ?></td>
                                <td><?= $t['nama']; ?></td>
                                <td><?= $t['alamat_toko']; ?></td>
                                <td><?= $t['nama_lokasi_tujuan']; ?></td>
                                <td><?= $t['notel_toko']; ?></td>
                                <td><a href="<?= site_url('sa/sa_toko/ubah_toko/' . $t['id_toko']); ?>" class="btn btn-warning mx-1">Ubah</a><a href="<?= site_url('sa/sa_toko/hapus_toko/' . $t['id_toko']); ?>" class="btn btn-danger" onclick="return confirm('Yakin Menghapus Data Toko <?= $t['nama_toko']; ?>')">Hapus</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>