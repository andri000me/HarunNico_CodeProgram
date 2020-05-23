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
            <a href="<?php echo site_url('sa/sa_lokasi/tambah_rak'); ?>" class="btn btn-primary my-2">Tambah Rak Baru</a>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i>Daftar Rak</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lorong</th>
                                <th>Nama Kategori Barang</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($rak as $r) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $r['nama_lorong'] ?></td>
                                    <td><?= $r['nama_ktgr_brg'] ?></td>
                                    <td><a href="<?= site_url('sa/sa_lokasi/ubah_rak/' . $r['id_rak']); ?>" class="btn btn-warning mx-1">Ubah</a><a href="<?= site_url('sa/sa_lokasi/hapus_rak/' . $r['id_rak']); ?>" class="btn btn-danger" onclick="return confirm('Yakin Menghapus Data <?= $r['id_rak']; ?>')">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>