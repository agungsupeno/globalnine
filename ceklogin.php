<?php
session_start();
include 'function.php';

$nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
$password = md5(mysqli_real_escape_string($koneksi, $_POST['password']));

$login = mysqli_query($koneksi, "SELECT * FROM user WHERE nik='$nik' AND password='$password'");
$cek = mysqli_num_rows($login);



if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    
    if ($data['level'] == "1") {
        $_SESSION['nik'] = $nik;
        $_SESSION['level'] = "1";
        header("location:admin/dashboardadmin.php");
    } elseif ($data['level'] == "2") {
        $_SESSION['nik'] = $nik;
        $_SESSION['level'] = "2";
        header("location:user/dashboarduser.php");
    } elseif ($data['level'] == "3") {
        $_SESSION['nik'] = $nik;
        $_SESSION['level'] = "3";
        header("location:user/home-user.php");
    }
} else {
    $_SESSION['response'] = $response;
    header('location:index.php?response=Gagal');
}
?>