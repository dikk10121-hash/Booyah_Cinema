<?php
include 'sys_koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $koneksi->query("DELETE FROM film WHERE id = $id");
}

header("Location: dashboard_list.php");
exit();
