<?php
session_start();
session_unset(); // Mereset semua data
session_destroy(); // Menghapus semua data

if (isset($_COOKIE['username'])) {
    setcookie("username", "", time() - 3600, "/"); // atur expired ke masa lalu
}

//Logout dan pindah ke index.php
header("Location: index.php");
exit();
