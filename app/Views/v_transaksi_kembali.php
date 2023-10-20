<table id="example2" class="table table-bordered table-hover">
    <thead>
        <tr class="text-center">
            <th width="50px">No</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali </th>
            <th width="100px">Nama Siswa</th>
            <th>Kelas</th>
            <th width="400px">Buku yang Dikembalikan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($peminjaman as $key => $value) { ?>
            <tr>
                <td>
                    <?= $no++ ?>.
                </td>
                <td>
                    <?= $value['tgl_peminjaman'] ?>

                </td>
                <td>
                    <?= $value['tgl_pengembalian'] ?>

                </td>
                <td>
                    <?= $value['nama_siswa'] ?>

                </td>
                <td>
                    <?= $value['nama_kelas'] ?>

                </td>
                <td>
                    <p>

                        <?= $value['id_buku1'] ?> <?= $value['no_buku1'] ?>


                    </p>
                    <p>

                        <?= $value['id_buku2'] ?> <?= $value['no_buku2'] ?>

                    </p>
                    <p>

                        <?= $value['id_buku3'] ?> <?= $value['no_buku3'] ?>

                    </p>
                    <p>
                        <?= $value['id_buku4'] ?> <?= $value['no_buku4'] ?>

                    </p>
                    <p>
                        <?= $value['id_buku5'] ?> <?= $value['no_buku5'] ?>


                </td>
                </p>

                <td>
                    <p>
                        <?php if ($value['status1'] == 'Dikembalikan') { ?><br>
                            <a class="text-success">Diterima</a>
                        <?php } else { ?>
                            <a class="btn btn-success btn-xs" href="<?= base_url('Peminjaman/VerifikasiPengembalian1/' . $value['id_transaksi']) ?>">Terima</a>
                        <?php } ?>
                    </p>
                    <p>
                        <?php if ($value['status2'] == 'Dikembalikan') { ?><br>
                            <a class="text-success">Diterima</a>
                        <?php } else { ?>
                            <a class="btn btn-success btn-xs" href="<?= base_url('Peminjaman/VerifikasiPengembalian2/' . $value['id_transaksi']) ?>">Terima</a>
                        <?php } ?>
                    </p>
                    <p>
                        <?php if ($value['status3'] == 'Dikembalikan') { ?><br>
                            <a class="text-success">Diterima</a>
                        <?php } else { ?>
                            <a class="btn btn-success btn-xs" href="<?= base_url('Peminjaman/VerifikasiPengembalian3/' . $value['id_transaksi']) ?>">Terima</a>
                        <?php } ?>
                    </p>
                    <p>
                        <?php if ($value['status4'] == 'Dikembalikan') { ?><br>
                            <a class="text-success">Diterima</a>
                        <?php } else { ?>
                            <a class="btn btn-success btn-xs" href="<?= base_url('Peminjaman/VerifikasiPengembalian4/' . $value['id_transaksi']) ?>">Terima</a>
                        <?php } ?>
                    </p>
                    <p>
                        <?php if ($value['status5'] == 'Dikembalikan') { ?><br>
                            <a class="text-success">Diterima</a>
                        <?php } else { ?>
                            <a class="btn btn-success btn-xs" href="<?= base_url('Peminjaman/VerifikasiPengembalian5/' . $value['id_transaksi']) ?>">Terima</a>
                        <?php } ?>
                    </p>
                </td>
                <td>
                    <a href="<?= base_url('Peminjaman/Update/' . $value['id_transaksi']) ?>" class="btn  ">
                        <i class="fas fa-edit"> </i>
                    </a>
                    <button type="button" class="btn " data-toggle="modal" data-target="#modal-delete<?= $value['id_transaksi'] ?>">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!-- modal hapus -->
<?php foreach ($peminjaman as $key => $value) { ?>

    <div class="modal fade" id="modal-delete<?= $value['id_transaksi'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open(base_url('Peminjaman/DeleteData1/' . $value['id_transaksi'])) ?>
                    <div class="form-group">
                        Yakin Hapus Data <b><?= $value['nama_siswa'] ?></b> ?

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