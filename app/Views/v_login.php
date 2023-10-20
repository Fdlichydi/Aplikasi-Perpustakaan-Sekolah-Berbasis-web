<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="#" class="h1">Sistem Informasi Perpustakaan</a>
        <br>
        <h2>SMAN 1 NAN SABARIS</h2></br>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="login-box">
                <div class="col-lg-12 col-12">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Admin</h3>

                            <p>Login Untuk Admin</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa fa-user"></i>
                        </div>
                        <a href="<?= base_url('Auth/LoginAdmin') ?>" class="small-box-footer">Login <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="login-box">
                <div class="col-lg-12 col-12">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>Anggota</h3>

                            <p>Login Untuk Anggota</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa fa-users"></i>
                        </div>
                        <a href="<?= base_url('Auth/LoginAnggota') ?>" class="small-box-footer">Login <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="social-auth-links text-center mb-3">
            <a href="<?= base_url() ?>" class="btn btn-block btn-info">
                <i class="fa fa-back"> Kembali</i>
            </a>
        </div>
    </div>
</div>