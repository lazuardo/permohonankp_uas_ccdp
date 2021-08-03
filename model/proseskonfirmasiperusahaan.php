<?php


include_once("connection.php");
$tanggal_disetujui = date('Y-m-d');
if (isset($_GET['id_perusahaan_diterima'])) {
    $id_perusahaan = $_GET['id_perusahaan_diterima'];
    mysqli_query($connect, "UPDATE perusahaan SET status_perusahaan = 'Sudah Di Approve', tanggal_disetujui='$tanggal_disetujui' WHERE id_perusahaan = '$id_perusahaan'");
} elseif (isset($_GET['id_perusahaan_ditolak'])) {
    $id_perusahaan = $_GET['id_perusahaan_ditolak'];
    mysqli_query($connect, "UPDATE perusahaan SET status_perusahaan = 'Ditolak' WHERE id_perusahaan = '$id_perusahaan'");
}

header("Location: admin.php");
