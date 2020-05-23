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
            <a href="<?php echo site_url('sa/sa_lokasi/tambah_asal'); ?>" class="btn btn-primary my-2">Tambah Lokasi Asal</a>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i>Daftar Lokasi Asal</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Asal</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($asal as $a) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a['nama_lokasi_asal'] ?></td>
                                    <td><a href="<?= site_url('sa/sa_lokasi/ubah_asal/' . $a['id_asal']); ?>" class="btn btn-warning mx-1">Ubah</a><a href="<?= site_url('sa/sa_lokasi/hapus_asal/' . $a['id_asal']); ?>" class="btn btn-danger" onclick="return confirm('Yakin Menghapus Data <?= $a['nama_lokasi_asal']; ?>')">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>