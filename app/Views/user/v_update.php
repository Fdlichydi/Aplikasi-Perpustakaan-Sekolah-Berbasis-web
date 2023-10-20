<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Edit User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
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
        
         <?php
            if (session()->getFlashdata('pesan')) {
                echo ' <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>

        <?php
        echo form_open_multipart('User/Edit/' . $user['id_user']);
        ?>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama User</label>
                        <input class="form-control" name="nama_user" value="<?= $user['nama_user'] ?>" placeholder="Nama User">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" value="<?= $user['email'] ?>" placeholder="Email">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="password" value="<?= $user['password'] ?>" placeholder="Password">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>No Hp</label>
                        <input class="form-control" name="no_hp" value="<?= $user['no_hp'] ?>" placeholder="No Hp">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control">
                            <option value="<?= $user['level'] ?>"><?= $user['level']==0 ? 'Admin' : 'Petugas' ?></option>
                            <option value="0">Admin</option>
                            <option value="1">Petugas</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Ganti File Foto</label>
                        <input type="file" name="foto" value="<?= $user['foto'] ?>" class="form-control" accept="image/*">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <a href="<?= base_url('User') ?>" class="btn btn-warning">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>

        </div>
        <?php echo form_close() ?>
    </div>
</div>