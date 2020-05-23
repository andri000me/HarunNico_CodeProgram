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
            <a href="<?php echo site_url('sa/sa_kendaraan/tambah_kendaraan'); ?>" class="btn btn-primary my-2">Tambah Data Kendaraan</a>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i>Daftar Data Kendaraan</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Merk Kendaraan</th>
                                <th>Nama Kendaraan</th>
                                <th>Jenis Kendaraan</th>
                                <th>Kapasitas</th>
                                <th>Nomber Kendaraan</th>
                                <th>Status Kendaraan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kendaraan as $k) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $k['nama_mk'] ?></td>
                                    <td><?= $k['nama_kendaraan'] ?></td>
                                    <td>
                                        <?php
                                            if ($k['jenis_kendaraan'] == 0) {
                                                echo "Van";
                                            } elseif ($k['jenis_kendaraan'] == 1) {
                                                echo "Mini Box";
                                            } elseif($k['jenis_kendaraan'] == 2) {
                                                echo "Medium Box";
                                            } elseif($k['jenis_kendaraan'] == 3) {
                                                echo "Big Box";
                                            } else{
                                                echo "Container";
                                            }
                                            ?>
                                    </td>
                                    <td><?= $k['kapasitas'] ?> CM<sup>3</sup></td>
                                    <td><?= $k['no_kendaraan'] ?></td>
                                    <td>
                                        <?php
                                            if ($k['status_kendaraan'] == 0) {
                                                echo "Tersedia";
                                            } else {
                                                echo "Sedang Mengirim Barang";
                                            }
                                            ?>
                                    </td>
                                    <td><a href="<?= site_url('sa/sa_kendaraan/ubah_kendaraan/' . $k['id_kendaraan']); ?>" class="btn btn-warning mx-1 d-inline">Ubah</a><a href="<?= site_url('sa/sa_kendaraan/hapus_kendaraan/' . $k['id_kendaraan']); ?>" class="btn btn-danger d-inline" onclick="return confirm('Yakin Menghapus Data <?= $k['id_kendaraan']; ?>')">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>