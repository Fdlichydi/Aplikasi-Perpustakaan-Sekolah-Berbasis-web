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
                        <th width="150px">Tanggal Kembali</th>
                        <th width="150px">Nama Siswa</th>
                        <th>Kelas</th>
                        <th width="400px">Judul Buku Dikembalikan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($peminjaman as $key => $value) : ?>
                        <?php if ($value['status'] == 'Kembali') : ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $value['tgl_pinjam'] ?></td>
                                <td><?= $value['tgl_kembali'] ?></td>
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
                <?php echo form_open(base_url('Peminjaman1/DeleteData1/' . $value['id_pinjam'])) ?>
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