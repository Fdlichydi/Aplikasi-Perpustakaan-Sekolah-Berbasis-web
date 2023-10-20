<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>

            <div class="card-tools">
                <a href="<?= base_url('Anggota/Add') ?>" class="btn btn-primary btn-flat btn-sm">
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
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No Hp</th>
                        <th>Password</th>
                        <th>Foto</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($anggota as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $value['nis'] ?></td>
                            <td><?= $value['nama_siswa'] ?><br>
                                <?php if ($value['verifikasi'] == 1) { ?>
                                    <a class="text-success"><i class="fa fa-check"></i>verifikasi</a>
                                <?php } else { ?>
                                    <a class="text-danger"><i class="fa fa-times"></i>verifikasi</a><br>
                                    <a class="btn btn-success btn-xs" href="<?= base_url('Anggota/Verifikasi/' . $value['id_anggota']) ?>">verifikasi</a>
                                <?php } ?>
                            </td>
                            <td><?= $value['id_kelas'] ?></td>
                            <td><?= $value['jenis_kelamin'] ?></td>
                            <td><?= $value['alamat'] ?></td>
                            <td><?= $value['no_hp'] ?></td>
                            <td><?= $value['password'] ?></td>
                            <td class="text-center"><img src="<?= base_url('foto/' . $value['foto']) ?>" width="50px" height="50px"></td>
                            <td class="text-center">
                                <a href="<?= base_url('Anggota/Update/' . $value['id_anggota']) ?>" class="btn btn-warning btn-flat btn-sm">
                                    <i class="fas fa-edit"> </i>
                                </a>
                                <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value['id_anggota'] ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>



        </div>
    </div>
</div>
<!-- modal hapus -->
<?php foreach ($anggota as $key => $value) { ?>

    <div class="modal fade" id="modal-delete<?= $value['id_anggota'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open(base_url('anggota/DeleteData/' . $value['id_anggota'])) ?>
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