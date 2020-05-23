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
            <a href="<?php echo site_url('sa/sa_lokasi/tambah_lorong'); ?>" class="btn btn-primary my-2">Tambah Lorong Baru</a>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i>Daftar Lorong</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lorong</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($lorong as $l) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $l['nama_lorong'] ?></td>
                                    <td><a href="<?= site_url('sa/sa_lokasi/ubah_lorong/' . $l['id_lorong']); ?>" class="btn btn-warning mx-1">Ubah</a><a href="<?= site_url('sa/sa_lokasi/hapus_lorong/' . $l['id_lorong']); ?>" class="btn btn-danger" onclick="return confirm('Yakin Menghapus Data <?= $l['nama_lorong']; ?>')">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>