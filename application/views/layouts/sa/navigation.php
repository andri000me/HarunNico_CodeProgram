<div id="wrapper">
    <!-- Bar Kiri -->
    <ul class="sidebar navbar-nav">

        <li class="nav-item active">
            <a class="nav-link" href="<?= site_url('sa/sa_halaman'); ?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-users"></i>
                <span>Akun Pengguna</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= site_url('sa/sa_user/form_tambah_akun'); ?>">Tambah Pengguna</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_user'); ?>">Lihat Data Pengguna</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-map-pin"></i>
                <span>Kelola Lokasi</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= site_url('sa/sa_lokasi/tambah_lorong'); ?>">Tambah Lorong</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_lokasi/tambah_rak'); ?>">Tambah Rak</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_lokasi/tambah_tujuan'); ?>">Tambah Tujuan</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_lokasi/tambah_asal'); ?>">Tambah Asal</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_lokasi/tampil_lorong'); ?>">Lihat Lorong</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_lokasi/tampil_rak'); ?>">Lihat Rak</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_lokasi/tampil_tujuan'); ?>">lihat Tujuan</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_lokasi/tampil_asal'); ?>">lihat Asal</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-boxes"></i>
                <span>Kelola Barang</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= site_url('sa/sa_barang/tambah_kbrg'); ?>">Tambah Kategori Barang</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_barang/tampil_kbrg'); ?>">Lihat Kategori Barang</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_barang/tambah_nbrg'); ?>">Tambah Nama Barang</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_barang/tampil_nbrg'); ?>">Lihat Nama Barang</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_barang/tambah_mbrg'); ?>">Tambah Merk Barang</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_barang/tampil_mbrg'); ?>">Lihat Merk Barang</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-bus-alt"></i>
                <span>Kelola Transportasi</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= site_url('sa/sa_kendaraan/tambah_mkendaraan'); ?>">Tambah Merk Kendaraan</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_kendaraan/tampil_mkendaraan'); ?>">Lihat Merk Kendaraan</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_kendaraan/tambah_nkendaraan'); ?>">Tambah Nama Kendaraan</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_kendaraan/tampil_nkendaraan'); ?>">Lihat Nama Kendaraan</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_kendaraan/tambah_kendaraan'); ?>">Tambah Data Kendaraan</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_kendaraan/tampil_kendaraan'); ?>">Lihat Data Kendaraan</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-biking"></i>
                <span>Kelola Pengemudi</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= site_url('sa/sa_pengemudi/tambah_pengemudi'); ?>">Tambah Data Pengemudi</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_pengemudi/tampil_pengemudi'); ?>">Lihat Data Pengemudi</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-store"></i>
                <span>Kelola Toko</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?= site_url('sa/sa_toko/tambah_toko'); ?>">Tambah Data Toko</a>
                <a class="dropdown-item" href="<?= site_url('sa/sa_toko'); ?>">Lihat Data Toko</a>
            </div>
        </li>
    </ul>

    <div id="content-wrapper">