<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>

            <div class="card-tools">
                
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
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>kelas</th>
                        <th>Denda</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($denda as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $value['tgl_denda'] ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['kelas'] ?></td>
                            <td><?= $value['denda'] ?></td>
                            <td><?= $value['ket'] ?></td>
                            
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
                <?php echo form_open(base_url('Denda/Add')) ?>
                <div class="row">
                <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" name="tgl_denda" placeholder="Tanggal" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="kelas" class="form-control select2" placeholder="Kelas">
                                <option value="">Pilih kelas</option>
                                <?php foreach ($kelas as $key => $value) { ?>
                                    <option value="<?= $value['nama_kelas'] ?>"><?= $value['nama_kelas'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Denda</label>
                            <input type="text" class="form-control" name="denda" placeholder="Denda" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" name="ket" placeholder="Keterangan" required>
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
<?php foreach ($denda as $key => $value) { ?>

    <div class="modal fade" id="modal-edit<?= $value['id_denda'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open(base_url('Denda/UpdateData/' . $value['id_denda'])) ?>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" value="<?= $value['tgl_denda'] ?>" name="tgl_denda" placeholder="Tanggal" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="<?= $value['nama'] ?>" name="nama" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" class="form-control" value="<?= $value['kelas'] ?>" name="kelas" placeholder="kelas" required>
                    </div>
                    <div class="form-group">
                        <label>Denda</label>
                        <input type="text" class="form-control" value="<?= $value['denda'] ?>" name="denda" placeholder="No Buku" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" value="<?= $value['ket'] ?>" name="ket" placeholder="Keterangan" required>
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
<?php foreach ($denda as $key => $value) { ?>

    <div class="modal fade" id="modal-delete<?= $value['id_denda'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open(base_url('Denda/DeleteData/' . $value['id_denda'])) ?>
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