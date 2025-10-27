<?php include 'sys_koneksi.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE email ='$email'");
    if (mysqli_num_rows($cek) > 0) {
        header("location: /Dhika Febry Rahman/Tugas/reset_password.php?email=$email");
        exit();
    } else {
        echo "<script>alert('Email tidak ditemukan'); window.location='forgot_password.php';</script>";
    }
};
?>
