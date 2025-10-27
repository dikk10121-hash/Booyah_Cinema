<?php
$host = '127.0.0.1:3307';   
$user = 'root';        // user default XAMPP/MAMP
$pass = '';            // password default XAMPP kosong
$database = 'bioskop';   // nama database yang sudah dibuat

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $database);

// Check connection
if (mysqli_connect_error()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
    die();
}
?>
