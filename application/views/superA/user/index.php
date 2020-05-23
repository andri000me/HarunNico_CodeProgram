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
            <a href="<?php echo site_url('sa/sa_user/form_tambah_akun'); ?>" class="btn btn-primary my-2">Tambah Pengguna</a>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="card mb-3">
        <div class="card-header"><i class="fas fa-table"></i>Daftar Pengguna</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Umur Pengguna</th>
                            <th>Alamat Pengguna</th>
                            <th>Username</th>
                            <th>Hak Akses</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pengguna as $pen) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $pen['nama']; ?></td>
                                <td><?= $pen['umur']; ?></td>
                                <td><?= $pen['alamat_pengguna']; ?></td>
                                <td><?= $pen['username']; ?></td>
                                <td>
                                    <?php
                                    if ($pen['hak_akses'] == 0) {
                                        echo 'Super User';
                                    } elseif ($pen['hak_akses'] == 1) {
                                        echo 'Petugas Gudang';
                                    } elseif ($pen['hak_akses'] == 2) {
                                        echo 'Staf';
                                    } elseif ($pen['hak_akses'] == 3) {
                                        echo 'Pengemudi';
                                    } else {
                                        echo 'Pemilik Toko';
                                    }
                                    ?>
                                </td>
                                <td><a href="<?= site_url('sa/sa_user/form_ubah_akun/' . $pen['id_pengguna']); ?>" class="btn btn-warning mx-1">Ubah</a><a href="<?= site_url('sa/sa_user/hapus_pengguna/' . $pen['id_pengguna']); ?>" class="btn btn-danger" onclick="return confirm('Yakin Menghapus Data <?= $pen['id_pengguna']; ?>')">Hapus</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>