<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= site_url('sa/sa_halaman'); ?>">Super Admin</a>
        </li>
        <li class="breadcrumb-item active">Selamat Datang <?= $name; ?></li>
    </ol>
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-user-friends"></i>
                    </div>
                    <div class="mr-5"><?= $pengguna; ?> User</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"></a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-car-side"></i>
                    </div>
                    <div class="mr-5"><?= $pengemudi; ?> Pengemudi</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"></a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-dark o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-store-alt"></i>
                    </div>
                    <div class="mr-5"><?= $toko; ?> Toko</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-truck-moving"></i>
                    </div>
                    <div class="mr-5"><?= $mkendaraan; ?> Merk Kendaraan</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"></a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-truck-pickup"></i>
                    </div>
                    <div class="mr-5"><?= $nkendaraan; ?> Nama Kendaraan</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"></a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-truck"></i>
                    </div>
                    <div class="mr-5"><?= $kendaraan; ?>Kendaraan</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-boxes"></i>
                    </div>
                    <div class="mr-5"><?= $kbrg; ?> Kategori Barang</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"></a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card bg-light o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-box"></i>
                    </div>
                    <div class="mr-5"><?= $nbrg; ?> Nama Barang</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"></a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-box-open"></i>
                    </div>
                    <div class="mr-5"><?= $mbrg; ?> Merk Barang</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-grip-vertical"></i>
                    </div>
                    <div class="mr-5"><?= $lorong; ?> Lorong Barang</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"></a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-dark o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-ruler-vertical"></i>
                    </div>
                    <div class="mr-5"> <?= $rak; ?> Rak Barang</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"></a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-map-pin"></i>
                    </div>
                    <div class="mr-5"><?= $asal; ?> Asal Barang</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"></a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-map-marker-alt"></i>
                    </div>
                    <div class="mr-5"><?= $tujuan; ?> Tujuan Barang</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"></a>
            </div>
        </div>
    </div>
</div>
<canvas id="canvas" width="1100" height="350"></canvas>