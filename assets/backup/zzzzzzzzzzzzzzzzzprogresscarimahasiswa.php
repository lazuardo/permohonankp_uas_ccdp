<?php

// include_once('database/connection.php');
// $connect;
$data = file_get_contents('C:\xampp\htdocs\permohonankp\datamahasiswa.json');
$data_mahasiswa = json_decode($data, true);

$nim_mahasiswa = $_POST['nim_mahasiswa'];



for ($i = 0; $i < count($data_mahasiswa); $i++) {
    if ($data_mahasiswa[$i]['MAHASISWA']['nim'] == $nim_mahasiswa) {
        // KALAU NIMNYA ADA

        break;
    } else {
        // KALAU NIMNYA GA ADA
        echo "ga ada";

        break;
    }
}



// if ($success == TRUE) {
//     session_start();
//     $_SESSION["nim"] = $nim;
//     $_SESSION["is_logged"] = TRUE;
//     $_SESSION['nama'] = $nama;
//     header("Location: dashboard.php");
// } else {
//     echo "Gagal";
// }
