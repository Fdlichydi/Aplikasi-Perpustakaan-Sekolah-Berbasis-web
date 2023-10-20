<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>

            <div class="card-tools">
                
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i>
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>

            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th width="150px">Tanggal Pinjam</th>
                        <th width="150px">Nama Siswa</th>
                        <th>Kelas</th>
                        <th width="400px">Judul Buku Dipinjam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($peminjaman as $key => $value) : ?>
                        <?php if ($value['status'] == 'Pinjam') : ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $value['tgl_pinjam'] ?></td>
                                <td><?= $value['nama'] ?> </td>
                                <td><?= $value['nama_kelas'] ?></td>
                                <td><?= $value['judul_buku'] ?> <?= $value['no'] ?></td>

                                
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
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
                $tgl = date('d F Y');
                ?>


                <?php echo form_open(base_url('Peminjaman1/Add')) ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Tanggal Peminjaman</label>
                            <input type="text" class="form-control" name="tgl_pinjam" value="<?= $tgl?>" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="id_kelas" class="form-control select2" placeholder="Kelas">
                                <option value="">Pilih Kelas</option>
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
                            <input type="text" class="form-control" name="no" placeholder="No Buku">
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


<!-- modal hapus -->
<?php foreach ($peminjaman as $key => $value) { ?>

    <div class="modal fade" id="modal-delete<?= $value['id_pinjam'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open(base_url('Peminjaman1/DeleteData/' . $value['id_pinjam'])) ?>
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
