<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modal-sm">
                    <i class="fas fa-plus"> Tambah</i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if (session()->getFlashdata('pesan')) {
                echo ' <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>ISBN</th>
                        <th>Tahun</th>
                        <th>Bahasa</th>
                        <th>Halaman</th>
                        <th>Jumlah</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($buku as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td class="text-center"><img src="<?= base_url('cover/' . $value['cover']) ?>" width="80px" height="80px"></td>
                            <td>
                                <h5><?= $value['judul_buku'] ?></h5>
                                <p>Kategori : <?= $value['id_kategori'] ?></p>
                                <p> penulis : <?= $value['id_penulis'] ?></p>
                                <p>penerbit : <?= $value['id_penerbit'] ?></p>
                                <p> lokasi : <?= $value['id_rak'] ?></p>

                            </td>
                            <td><?= $value['isbn'] ?></td>
                            <td><?= $value['tahun'] ?></td>
                            <td><?= $value['bahasa'] ?></td>
                            <td><?= $value['halaman'] ?></td>

                            <td class="text-center"><?= $value['jumlah'] ?></td>
                            <td>
                                <a href="<?= base_url('Buku/Update/' . $value['id_buku']) ?>" class="btn btn-warning btn-flat btn-sm">
                                    <i class="fas fa-edit"> </i>
                                </a>
                                <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value['id_buku'] ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>



        </div>
        <!-- /.card-body -->
    </div>
</div>




<!-- modal tambah -->
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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

                <?php echo form_open(base_url('Buku/Add')) ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <input class="form-control" name="judul_buku" value="<?= old('judul_buku') ?>" placeholder="Judul Buku">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="id_kategori" class="form-control" placeholder="Kelas">
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($kategori as $key => $value) { ?>
                                    <option value="<?= $value['nama_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Penulis</label>
                            <select name="id_penulis" class="form-control" placeholder="Kelas">
                                <option value="">Pilih Penulis</option>
                                <?php foreach ($penulis as $key => $value) { ?>
                                    <option value="<?= $value['nama_penulis'] ?>"><?= $value['nama_penulis'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Penerbit</label>
                            <select name="id_penulis" class="form-control" placeholder="Kelas">
                                <option value="">Pilih Penerbit</option>
                                <?php foreach ($penerbit as $key => $value) { ?>
                                    <option value="<?= $value['nama_penerbit'] ?>"><?= $value['nama_penerbit'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Lokasi</label>
                            <select name="id_rak" class="form-control" placeholder="Kelas">
                                <option value="">Pilih Lokasi</option>
                                <?php foreach ($rak as $key => $value) { ?>
                                    <option value="<?= $value['nama_rak'] ?> Lantai <?= $value['lantai_rak'] ?>"><?= $value['nama_rak'] ?> Lantai <?= $value['lantai_rak'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>ISBN</label>
                            <input class="form-control" name="isbn" value="<?= old('isbn') ?>" placeholder="ISBN">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tahun</label>
                            <input class="form-control" name="tahun" value="<?= old('tahun') ?>" placeholder="Tahun">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Bahasa</label>
                            <input class="form-control" name="bahasa" value="<?= old('bahasa') ?>" placeholder="Bahasa">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Halaman</label>
                            <input class="form-control" name="halaman" value="<?= old('halaman') ?>" placeholder="Halaman">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input class="form-control" name="jumlah" value="<?= old('jumlah') ?>" placeholder="Jumlah">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Cover Buku</label>
                            <input type="file" name="cover" value="<?= old('cover') ?>" class="form-control" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- modal edit -->
    <?php foreach ($buku as $key => $value) { ?>

        <div class="modal fade" id="modal-edit<?= $value['id_buku'] ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit <?= $judul ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open(base_url('Buku/UpdateData/' . $value['id_buku'])) ?>
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" class="form-control" value="<?= $value['judul_buku'] ?>" name="judul_buku" placeholder="Nama Kategori" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    <?php } ?>


    <!-- modal hapus -->
    <?php foreach ($buku as $key => $value) { ?>

        <div class="modal fade" id="modal-delete<?= $value['id_buku'] ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus <?= $judul ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open(base_url('Buku/DeleteData/' . $value['id_buku'])) ?>
                        <div class="form-group">
                            Yakin Hapus Data <b><?= $value['judul_buku'] ?></b> ?

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger btn-flat">Hapus</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    <?php } ?>