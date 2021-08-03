<?php


include_once("connection.php");

$nim_mahasiswa = $_GET['nim'];

$query = mysqli_query($connect, "DELETE FROM mahasiswa WHERE nim_mahasiswa=$nim_mahasiswa");
header("Location: dashboard.php#step-2");
