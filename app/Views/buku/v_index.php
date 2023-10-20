<div class="col-md-12" >
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>

            <div class="card-tools">
                <a href="<?= base_url('Buku/Add') ?>" class="btn btn-primary btn-flat btn-sm">
                    <i class="fas fa-plus"> Tambah</i>
                </a>
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
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>ISBN</th>
                        <th>Tahun</th>
                        <th>Bahasa</th>
                        <th>Tersedia</th>
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
                                <p><b>Kategori :</b> <?= $value['nama_kategori'] ?><br>
                                <b>Penulis :</b> <?= $value['nama_penulis'] ?><br>
                                <b>Penerbit :</b> <?= $value['nama_penerbit'] ?><br>
                                <b>Rak :</b> <?= $value['nama_rak'] ?></p>

                            </td>
                            <td><?= $value['isbn'] ?></td>
                            <td><?= $value['tahun'] ?></td>
                            <td><?= $value['bahasa'] ?></td>
                            

                            <td class="text-center"><span class="badge badge-success"><?= $value['jumlah'] ?></span>                            </td>
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
                    <?php echo form_open(base_url('buku/DeleteData/' . $value['id_buku'])) ?>
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




