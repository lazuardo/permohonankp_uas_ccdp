<?php
include_once("connection.php");

$data = file_get_contents('C:\xampp\htdocs\permohonankp\model\datamahasiswa.json');
$data_mahasiswa = json_decode($data, true);



if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $username = trim($username);
    $username = stripslashes($username);
    $username = htmlspecialchars($username);
    $pwd = $_POST['password'];
    $pwd = trim($pwd);
    $pwd = stripslashes($pwd);
    $pwd = htmlspecialchars($pwd);



    
    $query = mysqli_query($connect, "SELECT * FROM user_admin WHERE username='$username'");
    $row = mysqli_fetch_row($query);
    $cek_user = mysqli_num_rows($query);
    $row = $row[2];

    if ($cek_user > 0 && $username == $row) {
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["is_logged_admin"] = TRUE;
        header("Location: admin.php");
    } else {
        for ($i = 0; $i < count($data_mahasiswa); $i++) {
            if ($data_mahasiswa[$i]['MAHASISWA']['nim'] == $username) {
                if ($data_mahasiswa[$i]['MAHASISWA']['password'] == $pwd) {
                    $success = TRUE;
                    $nama = $data_mahasiswa[$i]['MAHASISWA']['nama'];
                    break;
                } else {
                    $success = FALSE;
                }
            } else {
                $success = FALSE;
            }
        }

        if ($success == TRUE) {
            session_start();
            $_SESSION["nim"] = $username;
            $_SESSION["is_logged"] = TRUE;
            $_SESSION['nama'] = $nama;
            $_SESSION['pengajuan_perusahaan'] = FALSE;
            header("Location: dashboard.php");
        } else {
            echo "Gagal";
        }
    }
}
