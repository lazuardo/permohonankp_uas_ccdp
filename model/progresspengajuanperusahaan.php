<?php
include_once('database/connection.php');

$connect;

// deklarasi data
$nama_perusahaan = $_POST['nama_perusahaan'];
$alamat_perusahaan = $_POST['alamat_perusahaan'];
$tanggal_pengajuan = date('Y-m-d');
$status_pengajuan = "Belum Di Approve";



$progress_masuk = mysqli_query($connect, "INSERT INTO perusahaan VALUES('', '$nama_perusahaan', '$alamat_perusahaan', '$tanggal_pengajuan','', '$status_pengajuan', '')");

if ($progress_masuk) {
    echo "Input Data Berhasil";
} else {
    echo "Input Data Gagal";
}
