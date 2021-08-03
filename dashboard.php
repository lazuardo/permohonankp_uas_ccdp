<?php

session_start();

if (!isset($_SESSION["is_logged"])) {
    header("Location: index.php");
}
include_once("model/connection.php");


include('template_dashboard/header.php') ?>
<div class="wrapper">


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">


        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <img src="assets/AdminLTE-master/dist/img/unikom/logo_unikom.png" width="50" height="50" alt="Card image">
                    <span class="brand-text text-sm text-light">TEKNIK INFORMATIKA UNIKOM</span>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                    <li class="nav-header">FORM PENGAJUAN</li>
                    <li class="nav-item">
                        <a href="http://localhost/permohonankp/dashboard.php" class="nav-link">
                            <img src="assets/AdminLTE-master/dist/img/document.png" width="20" height="20" alt="Card image">
                            <p>Documentation</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/permohonankp/dashboard.php" class="nav-link" data-toggle="modal" data-target="#exampleModalHelp">
                            <img src="assets/AdminLTE-master/dist/img/question.png" width="20" height="20" alt="Card image">
                            <p>Help</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/permohonankp/controller/logout.php" class="nav-link">
                            <img src="assets/AdminLTE-master/dist/img/logout.png" width="20" height="20" alt="Card image">
                            <p>Logout</p>
                        </a>
                    </li>
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
                                <img src="assets/AdminLTE-master/dist/img/unikom/logo_unikom.png" width="30" height="30" class="d-inline-block align-top" alt="">
                                <span class="brand-text font-weight-light"><?= $_SESSION['nama']; ?></span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Content Wizard Title-->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">LANGKAH PENGAJUAN</h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="modal fade" id="exampleModalHelp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Help</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Untuk Informasi yang kurang dipahami bisa Hubungi</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <!-- Content Main Wizard-->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- general form elements -->
                        <div class="card card-primary">
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div id="smartwizard">
                                <!-- <form method="post" id="register_form"> -->
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link active_tab1" href="#step-1" id="form_1">
                                            1. Form Pengajuan Perusahaan
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link inactive_tab1" href="#step-2" id="form_2">
                                            2. Form Pengajuan Kelompok KP
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link inactive_tab1" href="#step-3" id="form_3">
                                            3. Tampil Data Mahasiswa
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <!-- Step 1 -->
                                    <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                        <div class="container">

                                            <!-- FORM PENGAJUAN -->
                                            <form action="progressstep1.php" method="POST" id="form_perusahaan" class="form_pengajuan">
                                                <div class="form-group">
                                                    <label for="namaPerusahaan">Nama Perusahaan / Instansi</label>
                                                    <select name="id_perusahaan" class="form-control" id="id_perusahaan">
                                                        <option disabled selected> Pilih Perusahaan </option>
                                                        <?php
                                                        $query = mysqli_query($connect, "SELECT * FROM perusahaan WHERE status_perusahaan='Sudah Di Approve'");
                                                        while ($data_perusahaan = mysqli_fetch_array($query)) {


                                                        ?>
                                                            <option value="<?= $data_perusahaan['id_perusahaan'] ?>"><?= $data_perusahaan['nama_perusahaan'] ?></option>

                                                        <?php }; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="alamatPerusahaan">Alamat Perusahaan / Instansi</label>
                                                    <select name="alamat_perusahaan" class="form-control" id="alamat_perusahaan">
                                                        <option disabled selected> Pilih Alamat Perusahaan </option>
                                                        <?php
                                                        $query = mysqli_query($connect, "SELECT * FROM perusahaan WHERE status_perusahaan='Sudah Di Approve'");
                                                        while ($data_perusahaan = mysqli_fetch_array($query)) {


                                                        ?>
                                                            <option value="<?= $data_perusahaan['alamat_perusahaan'] ?>"><?= $data_perusahaan['alamat_perusahaan'] ?></option>

                                                        <?php }; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="deskripsi_kegiatan">Deskripsi Kegiatan</label>
                                                    <input type="text" name="deskripsi_kegiatan" class="form-control" id="deskripsi_kegiatan" placeholder="Contoh : Sebagai Teknisi Server " required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="kategori">Bidang kategori kerja praktek</label>
                                                    <input type="text" name="kategori" class="form-control" id="kategori" placeholder="Example : Maintenance" required>
                                                </div>

                                            </form>


                                            <!-- MODAL !! -->
                                            <p>Jika data perusahaan yang saudara tuju tidak ada dalam list silahkan lakukan pengajuan melalui form berikut <a href="" data-toggle="modal" data-target="#exampleModal">Pengajuan</a></p>

                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="progresspengajuanperusahaan.php" method="post" id="form_pengajuan">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Pengajuan Perusahaan</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="nama_perusahaan">Nama Perusahaan / Instansi</label>
                                                                    <input type="text" name="nama_perusahaan" class="form-control" id="namaPerusahaan" placeholder="Contoh : PT. Telkom Indonesia" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="alamat_perusahaan">Alamat Perusahaan / Instansi</label>
                                                                    <input type="text" name="alamat_perusahaan" class="form-control" id="alamatPerusahaan" placeholder="Contoh : Jl. Pahlawan Seribu" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" form="form_pengajuan" value="Submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 2 -->
                                <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                    <div class="container-fluid">
                                        <table class="table table-hover">
                                            <tr>
                                                <td class="pt-3">Masukkan NIM mahasiswa</td>



                                                <!-- FORM CARI -->
                                                <td>
                                                    <form action="dashboard.php#step-2" method="POST">
                                                        <div class="form-group">
                                                            <input type="text" name="nim_mahasiswa" class="form-control" id="nim_mahasiswa" placeholder="Contoh : 1011****" required>
                                                        </div>
                                                </td>



                                                <!-- FORM MODAL -->
                                                <td>
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" name="button_tambah">Tambah Mahasiswa</button></form>
                                                </td>

                                                <?php
                                                $ketua_kelompok = $_SESSION['nim'];




                                                if (isset($_POST["button_tambah"])) {
                                                    $data = file_get_contents('C:\xampp\htdocs\permohonankp\datamahasiswa.json');
                                                    $data_mahasiswa = json_decode($data, true);
                                                    $nim_mahasiswa = $_POST["nim_mahasiswa"];
                                                    $i = 0;
                                                    $ada = FALSE;
                                                    while ($i <= count($data_mahasiswa)) {
                                                        if ($data_mahasiswa[$i]['MAHASISWA']['nim'] == $nim_mahasiswa) {
                                                            // KALAU NIMNYA ADA
                                                            $ada = TRUE;
                                                            break;
                                                        } else {
                                                            // KALAU NIMNYA GA ADA
                                                            $ada = FALSE;
                                                        }

                                                        $i++;
                                                    }
                                                    if ($ada) {
                                                        $index = $i;
                                                        $nim_mahasiswa = $data_mahasiswa[$index]['MAHASISWA']['nim'];
                                                        $nama_mahasiswa = $data_mahasiswa[$index]['MAHASISWA']['nama'];


                                                        // $query = mysqli_query($connect, "SELECT *, COUNT( * ) AS total FROM mahasiswa GROUP BY id_kelompok=$id");


                                                        $query = mysqli_query($connect, "SELECT * FROM kelompok_mahasiswa WHERE ketua_kelompok=$ketua_kelompok");
                                                        $row = mysqli_fetch_row($query);
                                                        $cek_user = mysqli_num_rows($query);
                                                        if ($cek_user > 0) {
                                                            $id2 = $row[0];
                                                        }
                                                        $query_jumlah = mysqli_query($connect, "SELECT *, COUNT( * ) AS total FROM mahasiswa WHERE id_kelompok=$id2");
                                                        $row_jumlah = mysqli_fetch_row($query_jumlah);
                                                        $jumlah_mahasiswa = $row_jumlah[4];

                                                        if ($jumlah_mahasiswa <= 2) {

                                                            $query = mysqli_query($connect, "SELECT * FROM kelompok_mahasiswa WHERE ketua_kelompok=$ketua_kelompok");
                                                            $row = mysqli_fetch_row($query);
                                                            $cek_user = mysqli_num_rows($query);
                                                            if ($cek_user > 0) {
                                                                $id = $row[0];
                                                            }
                                                            $progress_masuk = mysqli_query($connect, "INSERT INTO mahasiswa VALUES('$nim_mahasiswa', '$nama_mahasiswa','Anggota', $id)");
                                                        } else {
                                                            echo "UDAH PENUH BOSS";
                                                        }

                                                        $ada = FALSE;
                                                    }
                                                }

                                                ?>



                                            </tr>
                                        </table>



                                        <!-- TABEL DATA PENGAJUAN MAHASISWA-->
                                        <table class="table table-hover table-light">
                                            <tr class="table-primary">
                                                <th>No</th>
                                                <th>NIM Mahasiswa</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Posisi</th>
                                                <th>Status</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Action</th>
                                            </tr>

                                            <?php
                                            $no = 1;
                                            $query = mysqli_query($connect, "SELECT * FROM kelompok_mahasiswa WHERE ketua_kelompok=$ketua_kelompok");
                                            $row = mysqli_fetch_row($query);
                                            $cek_user = mysqli_num_rows($query);
                                            $data_mahasiswa_lengkap = "";
                                            if ($cek_user > 0) {
                                                $id = $row[0];
                                                $data_mahasiswa_lengkap = mysqli_query($connect, "SELECT * FROM mahasiswa INNER JOIN kelompok_mahasiswa ON mahasiswa.id_kelompok = kelompok_mahasiswa.id_kelompok INNER JOIN perusahaan ON kelompok_mahasiswa.id_perusahaan = perusahaan.id_perusahaan WHERE kelompok_mahasiswa.id_kelompok='$id' ORDER BY mahasiswa.posisi DESC");

                                                $data = mysqli_query($connect, "SELECT * FROM surat WHERE id_surat = $ketua_kelompok");
                                                $data = mysqli_fetch_row($data);
                                                $data = $data[2];



                                                while ($d = mysqli_fetch_array($data_mahasiswa_lengkap)) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $d['nim_mahasiswa']; ?></td>
                                                        <td><?php echo $d['nama_mahasiswa']; ?></td>
                                                        <td><?php echo $d['posisi']; ?></td>
                                                        <td><?php echo $data ?></td>
                                                        <td><?php echo $d['nama_perusahaan']; ?></td>
                                                        <td>
                                                            <?php if ($d['posisi'] != "Ketua") {


                                                            ?>
                                                                <a href="hapus_mahasiswa.php?nim=<?= $d['nim_mahasiswa'];; ?>" button class="btn btn-danger" data-toggle="" data-target="" name="button_Hapus">Hapus</a>
                                                            <?php
                                                            } ?>

                                                        </td>


                                                    </tr>
                                            <?php
                                                }
                                            }





                                            ?>



                                            </tr>
                                        </table>



                                    </div>
                                </div>

                                <!-- Step 3 -->
                                <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                    <div class="container-fluid">
                                        <table class="table table-hover table-light">
                                            <tr class="table-primary">
                                                <th>NIM Ketua Kelompok</th>
                                                <th>Nama Ketua Kelompok</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Status Pengajuan</th>
                                                <th>Link Surat Pengantar KP</th>
                                            </tr>
                                            <?php

                                            $query = mysqli_query($connect, "SELECT * FROM kelompok_mahasiswa INNER JOIN perusahaan ON kelompok_mahasiswa.id_perusahaan=perusahaan.id_perusahaan  WHERE id_kelompok=$id");


                                            $query2 = mysqli_query($connect, "SELECT * FROM surat WHERE id_surat=$ketua_kelompok");
                                            $row = mysqli_fetch_row($query2);
                                            $status_surat = $row[2];
                                            // $query2 = mysqli_query($connect, "SELECT * FROM mahasiswa WHERE nim_mahasiswa=$ketua_kelompok");
                                            // $row2 = mysqli_fetch_row($query2);
                                            // $nama_mahasiswa = $row2[1];
                                            $nama_ketua = $_SESSION['nama'];

                                            while ($d = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $d['ketua_kelompok']; ?></td>
                                                    <td><?php echo $nama_ketua; ?></td>
                                                    <td><?php echo $d['nama_perusahaan']; ?></td>
                                                    <td><?php echo $status_surat ?></td>
                                                    <?php

                                                    if ($status_surat == "Belum Di Approve") {
                                                    ?>
                                                        <td>Menunggu Persetujuan</td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td><a class="btn btn-primary" href="create_pdf.php?id_grup=<?= $id; ?>">Surat Pengantar</a></td>
                                                    <?php
                                                    } ?>



                                                </tr>

                                            <?php

                                            } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020 <a href="http://if.unikom.ac.id">Teknik Informatika UNIKOM</a>.</strong> All rights
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
include('template_dashboard/footer.php') ?>