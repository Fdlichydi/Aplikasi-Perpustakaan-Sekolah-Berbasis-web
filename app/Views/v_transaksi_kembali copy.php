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
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Tanggal Kembali </th>
                        <th width="400px">Nama Siswa</th>
                        <th>Kelas</th>
                        <th width="500px">Buku yang Dipinjam</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pengembalian as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $value['tgl_pengembalian'] ?></td>
                            <td><?= $value['nama_siswa'] ?></td>
                            <td><?= $value['nama_kelas'] ?></td>
                            <td>
                           <p> <?= $value['id_buku1'] ?> <?= $value['no_buku1'] ?></p> 
                           <p><?= $value['id_buku2'] ?> <?= $value['no_buku2'] ?></p> 
                           <p> <?= $value['id_buku3'] ?> <?= $value['no_buku3'] ?></p> 
                           <p> <?= $value['id_buku4'] ?> <?= $value['no_buku4'] ?></p> 
                           <p> <?= $value['id_buku5'] ?> <?= $value['no_buku5'] ?></p> 
                             
                            </td>

                            <td>
                                <a class="d-block"><?= $value['status'] ?></a>
                                <?php
                                if ($value['status'] == 'Dipinjamkan') {
                                    echo '<a class="text-danger" ><i class="fas fa-times"> Belum Dikembalikan</i></a>';
                                } else {
                                    echo '<a class="text-success" ><i class="fas fa-check-circle"> Sudah Dikembalikan </i></a>';
                                }

                                ?>
                            </td>
                            <td><?= $value['ket'] ?></td>
                            <td>
                                <a href="<?= base_url('Pengembalian/Update/' . $value['id_transaksi']) ?>" class="btn btn-warning btn-flat btn-sm">
                                    <i class="fas fa-edit"> </i>
                                </a>
                                <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value['id_transaksi'] ?>">
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


                <?php echo form_open(base_url('Pengembalian/Add')) ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Tanggal Pengembalian</label>
                            <input type="date" class="form-control" name="tgl_pengembalian">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <select name="nama_siswa" class="form-control select2" placeholder="Kelas">
                                <option value="">Cari Nama Peminjaman</option>
                                <?php foreach ($peminjaman as $key => $value) { ?>
                                    <option value="<?= $value['nama_siswa'] ?>"><?= $value['nama_siswa'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="hidden text" class="form-control" name="id_kelas" placeholder="Nama Siswa" id="id_kelas">
                        </div>
                    </div>
                    <!-- <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="id_kelas" class="form-control select2" placeholder="Kelas">
                                <option value="">Pilih Kelas</option>
                                <php foreach ($kelas as $key => $value) { ?>
                                    <option value="<= $value['id_kelas'] ?>"><= $value['nama_kelas'] ?></option>
                                <php } ?>
                            </select>
                        </div>
                    </div> -->
                    <!-- <div class="col-sm-12">
                        <div class="form-group">
                            <label>Buku yang Dipinjam</label>
                            <textarea type="text" class="form-control"" name="buku_dipinjam" placeholder="Buku yang Dipinjam" required></textarea>
                        </div>
                    </div> -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="Dipinjamkan">Dipinjamkan</option>
                                <option value="Dikembalikan">Dikembalikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" name="ket" placeholder="Keterangan">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <select name="id_buku1" class="form-control select2" placeholder="Kelas">
                                <option value="">Pilih Buku</option>
                                <?php foreach ($buku as $key => $value) { ?>
                                    <option value="<?= $value['judul_buku'] ?>"><?= $value['judul_buku'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>No Buku</label>
                            <input type="text" class="form-control" name="no_buku1" placeholder="No Buku">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <select name="id_buku2" class="form-control select2" placeholder="Kelas">
                                <option value="">Pilih Buku</option>
                                <?php foreach ($buku as $key => $value) { ?>
                                    <option value="<?= $value['judul_buku'] ?>"><?= $value['judul_buku'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>No Buku</label>
                            <input type="text" class="form-control" name="no_buku2" placeholder="No Buku">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <select name="id_buku3" class="form-control select2" placeholder="Kelas">
                                <option value="">Pilih Buku</option>
                                <?php foreach ($buku as $key => $value) { ?>
                                    <option value="<?= $value['judul_buku'] ?>"><?= $value['judul_buku'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>No Buku</label>
                            <input type="text" class="form-control" name="no_buku3" placeholder="No Buku">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <select name="id_buku4" class="form-control select2" placeholder="Kelas">
                                <option value="">Pilih Buku</option>
                                <?php foreach ($buku as $key => $value) { ?>
                                    <option value="<?= $value['judul_buku'] ?>"><?= $value['judul_buku'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>No Buku</label>
                            <input type="text" class="form-control" name="no_buku4" placeholder="No Buku">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <select name="id_buku5" class="form-control select2" placeholder="Kelas">
                                <option value="">Pilih Buku</option>
                                <?php foreach ($buku as $key => $value) { ?>
                                    <option value="<?= $value['judul_buku'] ?>"><?= $value['judul_buku'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>No Buku</label>
                            <input type="text" class="form-control" name="no_buku5" placeholder="No Buku">
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
<?php foreach ($pengembalian as $key => $value) { ?>

    <div class="modal fade" id="modal-delete<?= $value['id_transaksi_kembali'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open(base_url('pengem$pengembalian/DeleteData/' . $value['id_transaksi_kembali'])) ?>
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