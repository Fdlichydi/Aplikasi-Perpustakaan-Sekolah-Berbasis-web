<div class="container-fluid" >
<div class="row" >
    <div class="col-lg-3 col-6" >
        <!-- small box -->
        <div class="small-box bg-info" >
            <div class="inner">
                <h3><?= $totalbuku ?></h3>

                <p>Data Buku</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-book"></i>
            </div>
            <a href="<?= base_url('Buku') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $totalpeminjaman1 ?></h3>

                <p>Transaksi</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-swatchbook"></i>
            </div>
            <a href="<?= base_url('Peminjaman1') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $totalhilang ?></h3>

                <p>Buku Hilang</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-swatchbook"></i>
            </div>
            <a href="<?= base_url('Hilang') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $totalden ?></h3>

                <p>Denda</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-swatchbook"></i>
            </div>
            <a href="<?= base_url('Denda') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
</div>