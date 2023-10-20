<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Form <?= $judul ?></h3>

            <div class="card-tools">
                <button class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modal-sm">
                    <i class="fas fa-plus"> Tambah Pengajuan</i>
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
                        <th>Tanggal Pengajuan</th>
                        <th>Judul Buku</th>
                        <th>Status</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pengajuanbuku as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $value['tgl_pinjam']?></td>
                            <td><?= $value['id_buku']?></td>
                            <td><?= $value['status_pinjam']?></td>
                            <td></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal tambah Pengajuan -->
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
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
                <?php echo form_open(base_url('Peminjaman1/AddPengajuan')) ?>
                <div class="form-group">
                    <label>Tanggal Pinjam</label>
                    <input type="date" name="tgl_pinjam" value="<?= old('tgl_pinjam') ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Judul Buku</label>
                    <select name="id_buku" class="form-control select2" placeholder="Kelas">
                        <option value="">Pilih Buku</option>
                        <?php foreach ($buku as $key => $value) { ?>
                            <option value="<?= $value['judul_buku'] ?>"><?= $value['judul_buku'] ?></option>
                        <?php } ?>
                    </select>
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