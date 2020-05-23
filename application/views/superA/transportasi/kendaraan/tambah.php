<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= site_url('sa/sa_halaman'); ?>">Super Admin</a>
        </li>
        <li class="breadcrumb-item active">Selamat Datang <?= $name; ?></li>
    </ol>
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Tambah Data kendaraan</div>
            <div class="card-body">
                <form action="<?= site_url('sa/sa_kendaraan/tambah_kendaraan'); ?>" method="post">
                    <input type="hidden" id="ajaxurlnama" value="<?= site_url('sa/sa_kendaraan/nama_kendaraan_form/'); ?>">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="id_lokasi" name="id" class="form-control" placeholder="id_lokasi" required="required" value="<?= $kendaraan; ?>" readonly="">
                            <label for="id_lokasi">ID Kendaraan</label>
                            <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <select class="form-control" id="mkendaraan" name="mkendaraan" onchange="showNama()">
                                <option disabled="" selected="">Pilih Merk Kendaraan</option>
                                <?php foreach ($mkendaraan as $p) { ?>
                                    <option value="<?= $p['id_merk_kendaraan'] ?>"><?= $p['nama_mk']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('mkendaraan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <select class="form-control" id="nkendaraan" name="nkendaraan">
                                <option disabled="" selected="">Pilih Nama Kendaraan</option>
                            </select>
                            <?= form_error('nkendaraan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <select class="form-control" id="ha" name="jenken">
                                <option disabled="" selected="">Pilih Jenis Kendaraan</option>
                                <option value="0">Van</option>
                                <option value="1">Mini Box</option>
                                <option value="2">Medium Box</option>
                                <option value="3">Big Box</option>
                                <option value="4">Container</option>
                            </select>
                            <?= form_error('jenken', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="nama_gedung" name="kapasitas" class="form-control" placeholder="nama_gedung" required="required">
                            <label for="nama_gedung">kapasitas kendaraan (CM<sup>3</sup>)</label>
                            <?= form_error('kapasitas', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="nama_gedung" name="noken" class="form-control" placeholder="nama_gedung" required="required">
                            <label for="nama_gedung">No Kendaraan</label>
                            <?= form_error('noken', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                    <button type="reset" name="submit" class="btn btn-warning">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>