<?php
include 'sys_koneksi.php';

$id = $_GET['id'];
$result = $koneksi->query("SELECT * FROM film WHERE id = $id");
$film = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="icon" href="image/logo.png" type="image/x-icon">
  <title><?= htmlspecialchars($film['title']); ?> Booyah Cinema</title>
  <link rel="stylesheet" href="css/dashboard_detail.css">
</head>

<body>
  <div class="container">
    <div class="poster">
      <img src="<?= htmlspecialchars($film['poster']); ?>" alt="<?= htmlspecialchars($film['title']); ?>">
    </div>
    <div class="details">
      <h2><?= strtoupper($film['title']); ?></h2>
      <p></p>
      <p><strong>Durasi:</strong> <?= $film['duration']; ?></p>
      <p><strong>Age:</strong> <?= $film['age']; ?></p>
      <p><strong>Produser:</strong> <?= $film['produser']; ?></p>
      <p><strong>Sutradara:</strong> <?= $film['sutradara']; ?></p>
      <p><strong>Penulis:</strong> <?= $film['penulis']; ?></p>
      <p><strong>Produksi:</strong> <?= $film['produksi']; ?></p>
      <p><strong>Aktor:</strong> <?= $film['aktor']; ?></p>
      <p><strong>Release Date:</strong> <?= htmlspecialchars($film['release_date']); ?></p>
      <p><strong>Status:</strong> <?= $film['status'] == 'now' ? 'Now Playing' : 'Coming Soon'; ?></p>

      <div class="sinopsis">
        <h4>Sinopsis</h4>
        <p><?= nl2br($film['sinopsis']); ?></p>
      </div>

      <div class="buttons">
        <a href="dashboard_list.php">Kembali ke List</a>
      </div>
    </div>
</body>

</html>