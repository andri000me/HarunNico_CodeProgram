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
            <a href="<?php echo site_url('sa/sa_barang/tambah_mbrg'); ?>" class="btn btn-primary my-2">Tambah Merk Barang</a>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i>Daftar Merk Barang</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Merk Barang</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($mbrg as $mb) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $mb['nama_barang'] ?></td>
                                    <td><?= $mb['nama_merk_barang'] ?></td>
                                    <td><a href="<?= site_url('sa/sa_barang/ubah_mbrg/' . $mb['id_merk_barang']); ?>" class="btn btn-warning mx-1">Ubah</a><a href="<?= site_url('sa/sa_barang/hapus_mbrg/' . $mb['id_merk_barang']); ?>" class="btn btn-danger" onclick="return confirm('Yakin Menghapus Data <?= $mb['nama_merk_barang']; ?>')">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>