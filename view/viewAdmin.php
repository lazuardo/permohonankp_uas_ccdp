<?php

session_start();

if (!isset($_SESSION["is_logged_admin"])) {
    header("Location: index.php");
}

require('template_dashboard/header.php') ?>
<div class="wrapper">


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">


        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <img src="<?= $this->url_assets();?>AdminLTE-master/dist/img/unikom/logo_unikom.png" width="50" height="50" alt="Card image">
                    <span class="brand-text text-sm text-light">TEKNIK INFORMATIKA UNIKOM</span>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                   
                    <li class="nav-header">FORM ADMIN</li>
                 
                        <?php require_once("controller/NavLink.php");

                        $icon1 = new navLink("Pengajuan Mahasiswa", "file-alt", $this->base_url("Dashboard"));
                        $icon2 = $icon1->clone();
                        $icon2->setName("Help");
                        $icon2->setIcon("question-circle");
                        $icon2->setLink($this->base_url(""));
                        $icon3 = $icon1->clone();
                        $icon3->setName("Logout");
                        $icon3->setLink($this->base_url("Auth/progressLogout"));
                        $icon3->setIcon("sign-out-alt");
                        echo $icon1->createNavItem();
                        echo $icon2->createNavItem();
                        echo $icon3->createNavItem();

                        ?>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>FORM PENGAJUAN KERJA PRAKTEK</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <img src="<?= $this->url_assets();?>AdminLTE-master/dist/img/unikom/logo_unikom.png" width="30" height="30" class="d-inline-block align-top" alt="">
                                <span class="brand-text font-weight-light"><?= $_SESSION['username']; ?></span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>



        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Kelompok Mahasiswa yang Mengajukan Kerja Praktek</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Kelompok</th>
                                        <th>NIM Ketua Kelompok</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Alamat Perusahaan</th>
                                        <th>Deskripsi Kegiatan</th>
                                        <th>Bidang Kegiatan</th>
                                        <th>Nomor Surat</th>
                                        <th>Status Pengajuan</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Tanggal Disetujui</th>
                                        <th>Action</th>
                                        <th>Status Perusahaan</th>
                                        <th>Konfirmasi Perusahaan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    
                                    while ($data = mysqli_fetch_array($dataKelompokMahasiswa)) {

                                    ?>
                                        <tr>
                                            <td><?= $data['id_kelompok']; ?></td>
                                            <td><?= $data['ketua_kelompok']; ?></td>
                                            <td><?= $data['nama_perusahaan']; ?></td>
                                            <td><?= $data['alamat_perusahaan']; ?></td>
                                            <td><?= $data['deskripsi_kegiatan']; ?></td>
                                            <td><?= $data['bidang_kegiatan']; ?></td>
                                            <td><?= $data['nomor_surat']; ?></td>
                                            <td><?= $data['status_surat']; ?></td>
                                            <td><?= $data['tanggal_pengajuan']; ?></td>
                                            <?php $tanggal_disetujui = $data['tanggal_disetujui'];
                                            if ($tanggal_disetujui == '0000-00-00') {
                                            ?>
                                                <td>-</td>
                                                <td><a href="progressaccept.php?terima_id=<?= $data['ketua_kelompok']; ?>" class="btn btn-success">Setujui</a><a href="progressaccept.php?tolak_id=<?= $data['id_kelompok']; ?>" class="btn btn-danger">Tolak</a></td>
                                                <td><?= $data['status_kelompok']; ?></td>
                                                <td>-</td>
                                            <?php
                                            } else {
                                            ?>
                                                <td><?= $data['tanggal_disetujui']; ?></td>
                                                <td>-</td>
                                                <td><?= $data['status_kelompok']; ?></td>
                                                <?php $status_kelompok = $data['status_kelompok'];
                                                if ($status_kelompok == 'Belum Diterima Perusahaan') {
                                                ?>
                                                    <td><a href="progresskonfirmasi.php?id_kelompok_ditolak=<?= $data['id_kelompok']; ?>" class="btn btn-warning">Surat Ditolak</a><a href="progresskonfirmasi.php?id_kelompok=<?= $data['id_kelompok']; ?>" class="btn btn-primary">Surat Diterima</a></td>
                                                <?php


                                                } else {
                                                ?>
                                                    <td>-</td>
                                                <?php
                                                }

                                                ?>


                                            <?php
                                            }

                                            ?>


                                        </tr>
                                    <?php }; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID Kelompok</th>
                                        <th>NIM Ketua Kelompok</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Alamat Perusahaan</th>
                                        <th>Deskripsi Kegiatan</th>
                                        <th>Bidang Kegiatan</th>
                                        <th>Nomor Surat</th>
                                        <th>Status Pengajuan</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Tanggal Disetujui</th>
                                        <th>Action</th>
                                        <th>Status Perusahaan</th>
                                        <th>Konfirmasi Perusahaan</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Pengajuan Perusahaan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Perusahaan</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Alamat Perusahaan</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Tanggal Disetujui</th>
                                        <th>Status Pengajuan</th>
                                        <th>Jumlah Mahasiswa</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    
                                    //array berdasarkan modelUserAdmin
                                    while ($data2 = mysqli_fetch_array($dataPerusahaan)) {
                                    ?>
                                        <tr>
                                            <td><?= $data2['id_perusahaan']; ?></td>
                                            <td><?= $data2['nama_perusahaan']; ?></td>
                                            <td><?= $data2['alamat_perusahaan']; ?></td>
                                            <td><?= $data2['tanggal_pengajuan']; ?></td>
                                            <?php $tanggal_disetujui = $data2['tanggal_disetujui'];

                                            if ($tanggal_disetujui == "0000-00-00") {
                                            ?>
                                                <td>-</td>
                                            <?php
                                            } else {

                                            ?>
                                                <td><?= $data2['tanggal_disetujui']; ?></td>
                                            <?php

                                            }
                                            ?>

                                            <td><?= $data2['status_perusahaan']; ?></td>
                                            <td><?= $data2['jumlah_mahasiswa']; ?></td>

                                            <?php $status_perusahaan = $data2['status_perusahaan'];
                                            if ($status_perusahaan == "Belum Di Approve") {
                                            ?>
                                                <td><a href="proseskonfirmasiperusahaan.php?id_perusahaan_diterima=<?= $data2['id_perusahaan']; ?>" class="btn btn-success">Setujui</a><a href="proseskonfirmasiperusahaan.php?id_perusahaan_ditolak=<?= $data2['id_perusahaan']; ?>" class="btn btn-danger">Tolak</a></td>
                                            <?php

                                            } else {
                                            ?>
                                                <td>-</td>
                                            <?php
                                            }

                                            ?>

                                        </tr>
                                    <?php
                                    }
                                    ?>




                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID Perusahaan</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Alamat Perusahaan</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Tanggal Disetujui</th>
                                        <th>Status Pengajuan</th>
                                        <th>Jumlah Mahasiswa</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    <!--/.col (left) -->

    <!-- /.content -->

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2020 <a href="http://if.unikom.ac.id">Teknik Informatik UNIKOM</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<?php
require('template_dashboard/footer.php') ?>