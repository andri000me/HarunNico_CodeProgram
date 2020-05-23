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
            <a href="<?php echo site_url('sa/sa_lokasi/tambah_tujuan'); ?>" class="btn btn-primary my-2">Tambah Lokasi Tujuan</a>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i>Daftar Lokasi Tujuan</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tujuan</th>
                                <th>Titik Latitude</th>
                                <th>Titik Longitude</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($tujuan as $t) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $t['nama_lokasi_tujuan'] ?></td>
                                    <td><?= $t['latitude'] ?></td>
                                    <td><?= $t['longitude'] ?></td>
                                    <td><a href="<?= site_url('sa/sa_lokasi/ubah_tujuan/' . $t['id_tujuan']); ?>" class="btn btn-warning mx-1">Ubah</a><a href="<?= site_url('sa/sa_lokasi/hapus_tujuan/' . $t['id_tujuan']); ?>" class="btn btn-danger" onclick="return confirm('Yakin Menghapus Data <?= $t['nama_lokasi_tujuan']; ?>')">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>