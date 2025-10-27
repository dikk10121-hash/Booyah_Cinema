<?php
include 'sys_koneksi.php';
session_start();

// Ambil id film
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$result = $koneksi->query("SELECT * FROM film WHERE id=$id");
if ($result->num_rows == 0) {
  die("Film tidak ditemukan.");
}
$film = $result->fetch_assoc();

// Fungsi ubah URL ke embed
function convertToEmbedUrl($url)
{
  if (empty($url)) return '';
  if (strpos($url, 'embed') !== false) return $url;

  // YouTube watch
  if (strpos($url, 'watch?v=') !== false) {
    $video_id = substr($url, strpos($url, 'v=') + 2);
    $video_id = strtok($video_id, '&');
    return 'https://www.youtube.com/embed/' . $video_id;
  }

  // Short link youtu.be
  if (strpos($url, 'youtu.be/') !== false) {
    $video_id = substr($url, strpos($url, 'youtu.be/') + 9);
    $video_id = strtok($video_id, '?');
    return 'https://www.youtube.com/embed/' . $video_id;
  }

  return $url;
}

$embed_url = !empty($film['trailer']) ? convertToEmbedUrl($film['trailer']) : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($film['title']); ?> - Booyah Cinema</title>
  <link rel="stylesheet" href="css/style2.css">
  <link rel="stylesheet" href="css/deks_film.css">
</head>

<body>

  <header>
    <div class="nav-container">
      <div class="brand">
        <img src="image/logo.png" alt="Booyah Logo">
        <h3>Booyah Cinema</h3>
      </div>
      <nav>
        <a href="index.php">Home</a>
        <a href="index.php#2">Playing Now</a>
        <a href="index.php#3">Coming Soon</a>
      </nav>
      <?php if (isset($_SESSION['username']) || isset($_SESSION['admin'])): ?>
        <a href="logout.php">Sign Out</a>
      <?php else: ?>
        <a href="login.php">Login</a>
      <?php endif; ?>
    </div>
  </header>

  <div class="container">
    <div class="poster">
      <img src="<?= htmlspecialchars($film['poster']); ?>" alt="<?= htmlspecialchars($film['title']); ?>">
    </div>
    <div class="details">
      <h2><?= strtoupper($film['title']); ?></h2>
      <p><strong>Durasi:</strong> <?= $film['duration']; ?></p>
      <p><strong>Age:</strong> <?= $film['age']; ?></p>
      <p><strong>Produser:</strong> <?= $film['produser']; ?></p>
      <p><strong>Sutradara:</strong> <?= $film['sutradara']; ?></p>
      <p><strong>Penulis:</strong> <?= $film['penulis']; ?></p>
      <p><strong>Produksi:</strong> <?= $film['produksi']; ?></p>
      <p><strong>Aktor:</strong> <?= $film['aktor']; ?></p>
      <p><strong>Release Date:</strong> <?= htmlspecialchars($film['release_date']); ?></p>

      <div class="sinopsis">
        <h4>Sinopsis</h4>
        <p><?= nl2br($film['sinopsis']); ?></p>
      </div>

      <div class="buttons">
        <a href="index.php">Kembali Ke Home</a>
      </div>
    </div>
  </div>

  <!-- Modal popup tanpa JS -->
  <div id="trailerModal">
    <a href="#" class="close">&times;</a>
    <iframe src="<?= htmlspecialchars($embed_url); ?>"
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
      allowfullscreen></iframe>
  </div>

</body>

</html>
