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
            <div class="card-header">Ubah Data kendaraan</div>
            <div class="card-body">
                <?php foreach ($kendaraan as $k) { ?>
                    <form action="<?= site_url('sa/sa_kendaraan/ubah_kendaraan/' . $k['id_kendaraan']); ?>" method="post">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="id_lokasi" name="id" class="form-control" placeholder="id_lokasi" required="required" value="<?= $k['id_kendaraan']; ?>" readonly="">
                                <label for="id_lokasi">ID Kendaraan</label>
                                <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <select class="form-control" id="ha" name="mkendaraan">
                                    <option disabled="" selected="">Pilih Merk Kendaraan</option>
                                    <?php foreach ($mkendaraan as $p) { ?>
                                        <?php if ($p['id_merk_kendaraan'] == $k['id_merk_kendaraan']) { ?>
                                            <option value="<?= $p['id_merk_kendaraan'] ?>" selected><?= $p['nama_mk']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $p['id_merk_kendaraan'] ?>"><?= $p['nama_mk']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                <?= form_error('mkendaraan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <select class="form-control" id="ha" name="nkendaraan">
                                    <option disabled="" selected="">Pilih Nama Kendaraan</option>
                                    <?php foreach ($nkendaraan as $nk) { ?>
                                        <?php if ($nk['id_nama_kendaraan'] == $k['id_nama_kendaraan']) { ?>
                                            <option value="<?= $nk['id_nama_kendaraan'] ?>" Selected><?= $nk['nama_kendaraan']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $nk['id_nama_kendaraan'] ?>"><?= $nk['nama_kendaraan']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                <?= form_error('nkendaraan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <select class="form-control" id="jenken" name="jenken">
                                    <option disabled="" selected="">Pilih Jenis Kendaraan</option>
                                    <option value="0" <?php if ($k['jenis_kendaraan'] == 0) {
                                                                echo "selected";
                                                            } ?>>Van</option>
                                    <option value="1" <?php if ($k['jenis_kendaraan'] == 1) {
                                                                echo "selected";
                                                            } ?>>Mini Box</option>
                                    <option value="2" <?php if ($k['jenis_kendaraan'] == 2) {
                                                                echo "selected";
                                                            } ?>>Medium Box</option>
                                    <option value="3" <?php if ($k['jenis_kendaraan'] == 3) {
                                                                echo "selected";
                                                            } ?>>Big Box</option>
                                    <option value="4" <?php if ($k['jenis_kendaraan'] == 4) {
                                                                echo "selected";
                                                            } ?>>Container</option>
                                </select>
                                <?= form_error('jenken', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="nama_gedung" name="kapasitas" class="form-control" placeholder="nama_gedung" required="required" value="<?= $k['kapasitas']; ?>">
                                <label for="nama_gedung">kapasitas kendaraan (CM<sup>3</sup>)</label>
                                <?= form_error('kapasitas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="nama_gedung" name="noken" class="form-control" placeholder="nama_gedung" required="required" value="<?= $k['no_kendaraan']; ?>">
                                <label for="nama_gedung">No Kendaraan</label>
                                <?= form_error('noken', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
                        <button type="reset" name="submit" class="btn btn-warning">Reset</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>