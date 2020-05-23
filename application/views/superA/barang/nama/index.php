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
            <a href="<?php echo site_url('sa/sa_barang/tambah_nbrg'); ?>" class="btn btn-primary my-2">Tambah Nama Barang</a>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i>Daftar Nama Barang</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori Barang</th>
                                <th>Nama Barang</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($nbrg as $nb) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $nb['nama_ktgr_brg'] ?></td>
                                    <td><?= $nb['nama_barang'] ?></td>
                                    <td><a href="<?= site_url('sa/sa_barang/ubah_nbrg/' . $nb['id_nama_barang']); ?>" class="btn btn-warning mx-1">Ubah</a><a href="<?= site_url('sa/sa_barang/hapus_nbrg/' . $nb['id_nama_barang']); ?>" class="btn btn-danger" onclick="return confirm('Yakin Menghapus Data <?= $nb['nama_barang']; ?>')">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>