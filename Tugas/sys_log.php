zzzz<?php
include 'sys_koneksi.php';
session_start();

// Jika sudah ada cookie username → set session otomatis
if (isset($_COOKIE['username']) && !isset($_SESSION['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];

    if ($_COOKIE['username'] == 'admin') {
        header("Location: dashboard.php");
    } else {
        header("Location: index.php");
    }
    exit();
}

// Kalau sudah ada cookie username, langsung redirect
if (isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
    header("Location: index.php");
    exit();
}

// --- PROSES LOGIN ---
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek login admin
    if ($username == 'admin' && $password == 'admin1234') {
        $_SESSION['admin'] = $username;

        if (!empty($_POST['remember'])) {
            setcookie("username", $username, time() + (86400 * 30), "/"); // berlaku 30 hari
        }

        header('Location: dashboard.php');
        exit();
    }

    // Cek login user biasa
    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($cek) > 0) {
        $_SESSION['username'] = $username;

        if (!empty($_POST['remember'])) {
            setcookie("username", $username, time() + (86400 * 30), "/");
        }

        header('Location: index.php');
        exit();
    } else {
        echo "<script>alert('Login gagal! Username atau password salah'); window.location.href='login.php';</script>";
        exit();
    }
}
?>

