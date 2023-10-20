<?php
$db = \Config\Database::connect();
foreach ($pengajuanmasuk as $key => $value) {
    $buku = $db->table('tbl_peminjaman')
        ->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku', 'left')
        ->where('id_anggota', $value['id_anggota'])
        ->Get()->getResultArray();
?>

    <div class="col-md-12">
        <!-- Widget: user widget style 2 -->
        <div class="card card-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-warning">
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><?= $value['nama_siswa'] ?></h3>
                <h5 class="widget-user-desc">kelas : </h5>
            </div>
            <div class="card-footer p-0">
                <table class="table table-hover">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pimjam</th>
                        <th>Judul buku</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($buku as $key => $data) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['tgl_pinjam'] ?></td>
                            <td><?= $data['id_buku'] ?></td>
                            <td><?= $data['status_pinjam'] ?></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#modal-tolak<?= $value['id_peminjaman'] ?>">
                                    <i class="fas fa-times"> Tolak</i>
                                </button>
                                <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-terima">
                                    <i class="fas fa-check">Terima</i>
                                </button>
                            </td>
                        </tr>

                        <div class="modal fade" id="modal-tolak<?= $data['id_peminjaman'] ?>">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Hapus <?= $judul ?></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo form_open(base_url('Kategori/DeleteData/' . $data['id_peminjaman'])) ?>
                                        <div class="form-group">
                                            Yakin Hapus Data <b><?= $data['nama_kategori'] ?></b> ?

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
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>

<?php } ?>

<!-- modal TOLAKs -->


<div class="modal fade" id="modal-tolak<?= $data['id_kategori'] ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content"> 
            <div class="modal-header">
                <h4 class="modal-title">tolak peminjaman</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('Kategori/DeleteData/' . $data['id_kategori'])) ?>
                <div class="form-group">
                    

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