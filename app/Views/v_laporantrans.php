<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>

            <!-- /.card-tools -->
        </div>
        <div class="card-body">
        <div class="container-fluid" >
<div class="row" >
    <div class="col-lg-3 col-6" >
        <!-- small box -->
        <div class="small-box bg-white" >
            <div class="inner">

                <p>Peminjaman</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-print"></i>
            </div>
            <a href="<?= base_url('peminjaman1/cetak') ?>" class="small-box-footer">Cetak <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-white">
            <div class="inner">

                <p>Pengembalian</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-print"></i>
            </div>
            <a href="<?= base_url('peminjaman1/cetak1') ?>" class="small-box-footer">Cetak <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-white">
            <div class="inner">

                <p>Buku Hilang</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-print"></i>
            </div>
            <a href="<?= base_url('Hilang/Laporanhil') ?>" class="small-box-footer">Cetak <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-white">
            <div class="inner">

                <p>Denda</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-print"></i>
            </div>
            <a href<?= base_url('Denda/Laporanden') ?>" class="small-box-footer">Cetak <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
</div>
        </div>
        <!-- /.card-body -->
    </div>
</div>

