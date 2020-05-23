<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= site_url('pt/C_pemilik_toko'); ?>">Pemilik Toko</a>
        </li>
        <li class="breadcrumb-item active">Selamat Datang <?= $name; ?></li>
    </ol>
    <?= $this->session->flashdata('message'); ?>
    <div class="card bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header">Profile Toko</div>
        <div class="card-body">
            <?php foreach ($toko as $t) { ?>
                <h5 class="card-title"><?= $t['nama_toko']; ?></h5>
                <p class="card-text"><?= $t['alamat_toko']; ?></p>
                <p class="card-text"><?= $t['notel_toko']; ?></p>
            <?php } ?>
        </div>
    </div>
</div>