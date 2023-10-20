<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form <?= $judul ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
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

        <?php
        echo form_open_multipart('Peminjaman1/Edit/' . $peminjaman['id_pinjam']);
        ?>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Tanggal Peminjaman</label>
                        <input type="text hiden" class="form-control" name="tgl_pinjam" value="<?= $peminjaman['tgl_pinjam'] ?>" disabled>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" class="form-control" name="nama" value="<?= $peminjaman['nama'] ?>" placeholder="Nama Siswa" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_kelas" class="form-control select2" placeholder="Kelas">
                            <?php foreach ($kelas as $key => $value) { ?>
                                <option value="<?= $value['id_kelas'] ?>"><?= $value['nama_kelas'] ?></option>
                            <?php } ?>
                            <?php foreach ($kelas as $key => $value) { ?>
                                <option value="<?= $value['id_kelas'] ?>"><?= $value['nama_kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <select name="id_buku" class="form-control select2" placeholder="Kelas">
                            <?php foreach ($buku as $key => $value) { ?>
                                <option value="<?= $value['id_buku'] ?>"><?= $value['judul_buku'] ?></option>
                            <?php } ?>
                            <?php foreach ($buku as $key => $value) { ?>
                                <option value="<?= $value['id_buku'] ?>"><?= $value['judul_buku'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>No Buku</label>
                        <input type="text" class="form-control" name="no" value="<?= $peminjaman['no'] ?>" placeholder="No Buku">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <a href="<?= base_url('Peminjaman1') ?>" class="btn btn-warning">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>

    </div>
    <?php echo form_close() ?>
</div>
</div>