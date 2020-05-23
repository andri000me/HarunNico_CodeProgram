<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= site_url('ag/adminG_halaman'); ?>">Petugas Gudang</a>
        </li>
        <li class="breadcrumb-item active">Selamat Datang <?= $name; ?></li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-shipping-fast"></i>
                    </div>
                    <div class="mr-5"><?= $bkeluar; ?> Barang Keluar</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"></a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-dark o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-boxes"></i>
                    </div>
                    <div class="mr-5"><?= $barang; ?> Barang</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"></a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-dolly"></i>
                    </div>
                    <div class="mr-5"><?= $bmasuk; ?> Barang Masuk</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"></a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-cart-plus"></i>
                    </div>
                    <div class="mr-5"><?= $pemesanan; ?> Pemesanan</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#"></a>
            </div>
        </div>
    </div>
</div>
<!-- <?php
        foreach ($barmas as $bm) {
            $tmsk[] = $bm['waktu_masuk'];
            $jmsk[] = $bm['jumlah_brg_masuk'];
        }
        ?>
<canvas id="canvas" width="1100" height="350"></canvas>
<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>
<script>
    var ctx = document.getElementById('canvas').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($tmsk); ?>,
            datasets: [{
                label: 'Jumlah Masuk',
                data: <?= json_encode($jmsk); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script> -->