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
            <a href="<?php echo site_url('sa/sa_pengemudi/tambah_pengemudi'); ?>" class="btn btn-primary my-2">Tambah Data Pengemudi</a>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i>Daftar Pengemudi</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Tanggal Lahir</th>
                                <th>No HP Pengemudi</th>
                                <th>Status Pengemudi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pengemudi as $pen) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><img src="<?= base_url('assets/img/pengemudi/' . $pen['foto_penggemudi']) ?>" height="50px" width="50px"></td>
                                    <td><?= $pen['nama'] ?></td>
                                    <td><?= $pen['umur'] ?></td>
                                    <td><?= $pen['email_pengemudi'] ?></td>
                                    <td><?= $pen['alamat_pengguna'] ?></td>
                                    <td><?= $pen['tanggal_lahir'] ?></td>
                                    <td><?= $pen['no_hp_penggemudi'] ?></td>
                                    <td>
                                        <?php
                                        if ($pen['status_pengemudi'] == 0) {
                                            echo "Tersedia";
                                        } elseif ($pen['status_pengemudi'] == 1) {
                                            echo "Dalam Perjalanan";
                                        } else {
                                            echo "Berhalangan";
                                        } ?>
                                    </td>
                                    <td><a href="<?= site_url('sa/sa_pengemudi/ubah_pengemudi/' . $pen['id_pengemudi']); ?>" class="btn btn-warning mx-1 d-inline">Ubah</a><a href="<?= site_url('sa/sa_pengemudi/hapus_pengemudi/' . $pen['id_pengemudi']); ?>" class="btn btn-danger d-inline" onclick="return confirm('Yakin Menghapus Pengemudi <?= $pen['nama']; ?>')">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>