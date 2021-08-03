<?php
include_once("connection.php");


if (isset($_GET['terima_id'])) {

    $id = $_GET['terima_id'];
    $tanggal = date('Y-m-d');
    $query = mysqli_query($connect, "UPDATE surat SET status_surat='Diterima', tanggal_disetujui='$tanggal' WHERE id_surat = '$id'");
} elseif (isset($_GET['tolak_id'])) {
    $id = $_GET['tolak_id'];
    $query = mysqli_query($connect, "SELECT * FROM kelompok_mahasiswa WHERE id_kelompok = '$id'");
    $result = mysqli_fetch_row($query);
    $id_surat = $result[1];
    $query = mysqli_query($connect, "DELETE FROM mahasiswa WHERE id_kelompok = '$id'");
    $query = mysqli_query($connect, "DELETE FROM kelompok_mahasiswa WHERE id_kelompok = '$id'");
    $query = mysqli_query($connect, "DELETE FROM surat WHERE id_surat = '$id_surat'");
}
header("Location: admin.php");
