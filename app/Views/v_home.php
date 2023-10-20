
<div class="col-sm-12">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?= base_url('slide/slide4.png') ?>" alt="First slide">
        </div>
    </div>
   
</div>
</div>

<div class="col-md-12">
    <div class="card card-outline card-primary">
        
        <div class="card-header">
        <div class="row">
        <div class="col-sm-12 ">
            <h3 class="card-title">Buku yang ada diperpustakaan SMA Negeri 1 Nan Sabaris</h3>
        <!-- </div>
            <div class="col-sm-12">
            <a href="<= base_url('file/pernyataan.pdf' ) ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-download"> Pernyataan Peminjaman</i>
                                    </a>
          
            </div> -->
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
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
                            <td class="text-center"><span class="badge badge-success"><?= $value['jumlah'] ?></span></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>



        </div>
        <!-- /.card-body -->
    </div>
</div>
