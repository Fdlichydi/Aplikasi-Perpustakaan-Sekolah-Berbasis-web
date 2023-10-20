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
                        <th>Nama Siswa yang menghilangkan</th>
                        <th>Kelas</th>
                        <th>Judul Buku</th>
                        <th>No Buku</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($hilang as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['id_kelas'] ?></td>
                            <td><?= $value['judul_buku'] ?></td>
                            <td><?= $value['no_buku'] ?></td>
                            <td>
                                <button type="button" class="btn btn-warning btn-flat btn-sm" data-toggle="modal" data-target="#modal-edit<?= $value['id_hilang'] ?>">
                                    <i class="fas fa-edit"> </i>
                                </button>
                                <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value['id_hilang'] ?>">
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('Hilang/Add')) ?>
                <div class="row">

                <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama siswa yang mengilangkan</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama siswa yang menghilangkan" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="id_kelas" class="form-control select2" placeholder="Kelas">
                                <option value="">Pilih kelas</option>
                                <?php foreach ($kelas as $key => $value) { ?>
                                    <option value="<?= $value['nama_kelas'] ?>"><?= $value['nama_kelas'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <select name="id_buku" class="form-control select2" placeholder="Kelas">
                                <option value="">Pilih Buku</option>
                                <?php foreach ($buku as $key => $value) { ?>
                                    <option value="<?= $value['id_buku'] ?>"><?= $value['judul_buku'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>No Buku</label>
                            <input type="text" class="form-control" name="no_buku" placeholder="No Buku" required>
                        </div>
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
<?php foreach ($hilang as $key => $value) { ?>

    <div class="modal fade" id="modal-edit<?= $value['id_hilang'] ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open(base_url('Hilang/UpdateData/' . $value['id_hilang'])) ?>
                    <div class="row">
                       
                    <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama siswa yang menghilangkan</label>
                                <input type="text" class="form-control" value="<?= $value['nama'] ?>" name="nama" placeholder="Nama" required>
                            </div>
                        </div>
                       

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No Buku</label>
                                <input type="text" class="form-control" value="<?= $value['no_buku'] ?>" name="no_buku" placeholder="No Buku" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kelas</label>
                                <input type="text" class="form-control" value="<?= $value['id_kelas'] ?>" name="id_kelas" placeholder="No Buku" required>
                            </div>
                        </div>
                       
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kelas</label>
                                <select name="id_kelas" class="form-control" placeholder="Kelas">
                                    <option value="<= $value['id_kelas'] ?>"><= $value['nama_kelas'] ?></option>
                                    <php foreach ($kelas as $key => $value) { ?>
                                        <option value="<= $value['id_kelas'] ?>"><= $value['nama_kelas'] ?></option>
                                    <php } ?>
                                </select>
                            </div>
                        </div> -->

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Judul Buku</label>
                                <select name="id_buku" class="form-control select2" placeholder="Kelas">
                                    <option value="<?= $value['id_buku'] ?>"><?= $value['judul_buku'] ?></option>
                                    <?php foreach ($buku as $key => $value) { ?>
                                        <option value="<?= $value['id_buku'] ?>"><?= $value['judul_buku'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
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

<?php } ?>


<!-- modal hapus -->
<?php foreach ($hilang as $key => $value) { ?>

    <div class="modal fade" id="modal-delete<?= $value['id_hilang'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open(base_url('Hilang/DeleteData/' . $value['id_hilang'])) ?>
                    <div class="form-group">
                        Yakin Hapus Data <b><?= $value['nama'] ?></b> ?

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