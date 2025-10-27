<?php
session_start();

if (isset($_SESSION['admin'])) {
    header('Location: dashboard_list.php');
    exit();
} else {
    echo "<script>alert('Kamu Bukan Admin'); window.location.href='login.php';</script>";
    exit();
}
