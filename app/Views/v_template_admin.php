<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Perpustakaan | <?= $judul ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <h3><b>SMA Negeri 1 Nan Sabaris</b></h3>
                </li>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Auth/LogOut') ?>">
                        <i class="fas fa-sign-out-alt"> Logout</i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a class="brand-link">
                <img src="<?= base_url('template') ?>/dist/img/logotut.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Perpustakaan</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('template') ?>/dist/img/user.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a class="d-block">Petugas</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= base_url('Admin') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<= base_url('Anggota') ?>" class="nav-link <= $menu == 'anggota' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Anggota</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="<?= base_url('Buku') ?>" class="nav-link <?= $menu == 'buku' ? 'active' : '' ?> ">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Buku</p>
                            </a>
                        </li>
                        <li class="nav-item <?= $menu == 'transaksi' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'transaksi' ? 'active' : '' ?> ">
                                <i class="nav-icon fas fa-swatchbook"></i>
                                <p>
                                    Transaksi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Peminjaman1') ?>" class="nav-link <?= $submenu == 'peminjaman1' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Peminjaman</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Peminjaman1/Pengembalian') ?>" class="nav-link <?= $submenu == 'peminjaman2' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pengembalian</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Hilang') ?>" class="nav-link <?= $submenu == 'buku hilang' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Buku Hilang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Denda') ?>" class="nav-link <?= $submenu == 'denda' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Denda</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Peminjaman/Laporantrans') ?>" class="nav-link <?= $menu == 'laporan' ? 'active' : '' ?> ">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Laporan</p>
                            </a>
                        </li>
                       

                        <!-- <li class="nav-item">
                            <a href="<= base_url('Peminjaman/Laporan') ?>" class="nav-link <= $menu == 'laporan' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Laporan
                                </p>
                            </a>
                        </li> -->
                        <li class="nav-item <?= $menu == 'masterbuku' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'masterbuku' ? 'active' : '' ?> ">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Master
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Kelas') ?>" class="nav-link <?= $submenu == 'kelas' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kelas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Kategori') ?>" class="nav-link <?= $submenu == 'kategori' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Rak') ?>" class="nav-link <?= $submenu == 'rak' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Rak</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Penerbit') ?>" class="nav-link <?= $submenu == 'penerbit' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Penerbit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Penulis') ?>" class="nav-link <?= $submenu == 'penulis' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Penulis</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item <?= $menu == 'masteranggota' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'masteranggota' ? 'active' : '' ?> ">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>
                                    Pengaturan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('User') ?>" class="nav-link <?= $submenu == 'user' ? 'active' : '' ?>">
                                        <i class="far fa-user nav-icon"></i>
                                        <p>User</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"> <!-- ubah warna disiko koding nyo : style="background-color: greenyellow;" -->
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <?php

                        if ($page) {
                            echo view($page);
                        }

                        ?>

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy;<a>SMA N 1 NAN SABARIS</a>.</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('template') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('template') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url('template') ?>/plugins/select2/js/select2.full.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('template') ?>/dist/js/adminlte.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "buttons": ["excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
</body>

</html>