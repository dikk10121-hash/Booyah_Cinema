<?php
include 'sys_koneksi.php';
session_start();

// Ambil film yang sedang tayang
$nowPlaying = $koneksi->query("SELECT * FROM film WHERE status='now' ORDER BY release_date DESC");
if (!$nowPlaying) {
  die("Query Error (Now Playing): " . $koneksi->error);
}

// Ambil film yang akan datang
$comingSoon = $koneksi->query("SELECT * FROM film WHERE status='coming' ORDER BY release_date ASC");
if (!$comingSoon) {
  die("Query Error (Coming Soon): " . $koneksi->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="image/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="css/style2.css">
  <link rel="stylesheet" href="css/index.css">
  <title> Booyah - Home</title>
</head>

<body>
  <!-- Header -->
  <header>
    <div class="nav-container">
      <div class="brand">
        <img src="image/logo.png" alt="Logo Booyah" class="brand-logo">
        <h4 class="logo">Booyah Cinema</h4>
      </div>
      <nav>
        <a href="index.php">Home</a>
        <a href="#2">Playing Now</a>
        <a href="#3">Coming Soon</a>
      </nav>
      <?php if (isset($_SESSION['username']) || isset($_SESSION['admin'])): ?>
        <a href="logout.php">Sign Out</a>
      <?php else: ?>
        <a href="login.php">Login</a>
      <?php endif; ?>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="cinema">
    <div class="hero-content">
      <div class="hero-text">
        <h1>Welcome to Booyah Cinema</h1>
        <p>Experience the magic of movies like never before,<br>
          with the latest blockbusters and timeless classics.</p>
      </div>
      <div class="hero-img">
        <img src="image/cinema.png" alt="Cinema Hall">
      </div>
    </div>
  </section>

  <!-- Now Playing -->
  <section class="now-playing">
    <h1 id="2">Now Playing</h1>
    <div class="film-list">
      <?php while ($row = $nowPlaying->fetch_assoc()): ?>
        <div class="film-card">
          <img src="<?php echo htmlspecialchars($row['poster']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
          <h4><?php echo htmlspecialchars($row['title']); ?></h4>
          <p><?php echo htmlspecialchars($row['genre']); ?></p>
          <button type="button" onclick="window.location.href='deks_film.php?id=<?php echo $row['id']; ?>'">Watch Now</button>
        </div>
      <?php endwhile; ?>
    </div>
  </section>

  <!-- Coming Soon -->
  <section class="coming-soon">
    <h1 id="3">Coming Soon</h1>
    <div class="film-list">
      <?php while ($row = $comingSoon->fetch_assoc()): ?>
        <div class="film-card">
          <img src="<?php echo htmlspecialchars($row['poster']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
          <h4><?php echo htmlspecialchars($row['release_date']); ?></h4>
          <a href="coming_deks.php?id=<?php echo $row['id']; ?>">View Details</a>
        </div>
      <?php endwhile; ?>
    </div>
  </section>

</body>

</html>
