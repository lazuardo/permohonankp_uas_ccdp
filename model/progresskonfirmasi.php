<?php

include_once('connection.php');


if (isset($_GET['id_kelompok'])) {
    $id_kelompok = $_GET['id_kelompok'];
    $query = mysqli_query($connect, "SELECT * FROM kelompok_mahasiswa WHERE id_kelompok = '$id_kelompok'");
    $result = mysqli_fetch_row($query);
    $id_perusahaan = $result[5];

    $query = mysqli_query($connect, "SELECT * FROM perusahaan WHERE id_perusahaan = '$id_perusahaan'");
    $result = mysqli_fetch_row($query);
    $jumlah_mahasiswa = $result[6];

    $query = mysqli_query($connect, "SELECT COUNT(*) as jumlah FROM mahasiswa WHERE id_kelompok = '$id_kelompok'");
    $result = mysqli_fetch_row($query);
    $jumlah_mahasiswa_baru = $result[0];
    $jumlah_mahasiswa = $jumlah_mahasiswa + $jumlah_mahasiswa_baru;



    $query = mysqli_query($connect, "UPDATE perusahaan SET jumlah_mahasiswa = '$jumlah_mahasiswa' WHERE id_perusahaan = '$id_perusahaan'");
    $query = mysqli_query($connect, "UPDATE kelompok_mahasiswa SET status_kelompok = 'Diterima di Perusahaan' WHERE id_kelompok = '$id_kelompok'");
} elseif (isset($_GET['id_kelompok_ditolak'])) {
    $id_kelompok = $_GET['id_kelompok_ditolak'];

    $query = mysqli_query($connect, "SELECT * FROM kelompok_mahasiswa WHERE id_kelompok = '$id_kelompok'");
    $result = mysqli_fetch_row($query);
    $id_surat = $result[1];

    $query = mysqli_query($connect, "DELETE FROM mahasiswa WHERE id_kelompok = '$id_kelompok'");
    $query = mysqli_query($connect, "DELETE FROM kelompok_mahasiswa WHERE id_kelompok = '$id_kelompok'");
    $query = mysqli_query($connect, "DELETE FROM surat WHERE id_surat = '$id_surat'");
}

header("Location: admin.php");
