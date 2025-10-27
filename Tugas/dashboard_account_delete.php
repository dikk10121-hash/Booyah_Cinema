<?php
include 'sys_koneksi.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $sql = "DELETE FROM users WHERE id=$id";
    if ($koneksi->query($sql)) {
        header("Location: dashboard_account.php");
        exit();
    } else {
        echo "Error: " . $koneksi->error;
    }
} else {
    header("Location: dashboard_account.php");
    exit();
}
?>
