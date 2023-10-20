<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Tambah User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
       

        <?php
        echo form_open_multipart('Web/UpdateWeb');
        ?>
        <div class="card-body">
        <?php
        // notifikasi
        $errors = session()->getFlashdata('errors');
        if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <h4>Periksa kembali</h4>
                <ul>
                    <?php foreach ($errors as $key => $error) { ?>
                        <li><?= esc($error) ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

        <?php
        if (session()->getFlashdata('pesan')) {
            echo ' <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i>';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        }
        ?>
            <div class="row">
                <div class="col-sm-2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Logo Sekolah</label>
                                <img src="<?= base_url('logo/' . $web['logo']) ?>" width="150px" height="150px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Sekolah</label>
                                <input class="form-control" name="nama_sekolah" value="<?= $web['nama_sekolah'] ?>" placeholder="Nama Sekolah">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" name="alamat" value="<?= $web['alamat']  ?>" placeholder="Alamat">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input class="form-control" name="kecamatan" value="<?= $web['kecamatan']  ?>" placeholder="Kecamatan">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kabupaten/Kota</label>
                                <input class="form-control" name="kab_kota" value="<?= $web['kab_kota']  ?>" placeholder="Kabupaten/Kota">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No Telp</label>
                                <input class="form-control" name="no_tlp" value="<?= $web['no_tlp']  ?>" placeholder="No Telp">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ganti Logo</label>
                                <input type="file" name="logo" class="form-control" accept="logo/*">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="<?= base_url('User') ?>" class="btn btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>

                </div>
                <?php echo form_close() ?>
            </div>
        </div>