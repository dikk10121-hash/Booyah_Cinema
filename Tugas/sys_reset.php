<?php
include 'sys_koneksi.php';

if (!isset($_POST['email']) || empty(trim($_POST['email']))) {
    echo "<script>alert('Email tidak ditemukan!'); window.location='forgot_password.php';</script>";
    exit;
}
$email = mysqli_real_escape_string($koneksi, $_POST['email']);

if (isset($_POST['reset'])) {
    $password   = mysqli_real_escape_string($koneksi, $_POST['password']);
    $konfirmasi = mysqli_real_escape_string($koneksi, $_POST['konfirmasi']);


    if ($password === $konfirmasi) {
        mysqli_query($koneksi, "UPDATE users SET password ='$password' WHERE email='$email'");
        echo  "    <script>alert('Password berhasil diubah! Silahkan login kembali');window.location='login.php';</script>";
    } else {
        echo "<script>alert('Password tidak sama!'); window.location='reset_password.php?email=" . $email . "';</script>";
    }
}
