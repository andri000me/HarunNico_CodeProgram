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
            <a href="<?php echo site_url('sa/sa_kendaraan/tambah_nkendaraan'); ?>" class="btn btn-primary my-2">Tambah Nama Kendaraan</a>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i>Daftar Nama Kendaraan</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Merk Kendaraan</th>
                                <th>Nama Kendaraan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($nkendaraan as $nk) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $nk['nama_mk'] ?></td>
                                    <td><?= $nk['nama_kendaraan'] ?></td>
                                    <td><a href="<?= site_url('sa/sa_kendaraan/ubah_nkendaraan/' . $nk['id_nama_kendaraan']); ?>" class="btn btn-warning mx-1">Ubah</a><a href="<?= site_url('sa/sa_kendaraan/hapus_nkendaraan/' . $nk['id_nama_kendaraan']); ?>" class="btn btn-danger" onclick="return confirm('Yakin Menghapus Data <?= $nk['nama_kendaraan']; ?>')">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>