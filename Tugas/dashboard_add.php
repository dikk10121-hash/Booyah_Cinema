<?php
include 'sys_koneksi.php';

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $status    = $_POST['status']; // now or coming
  $title     = $koneksi->real_escape_string($_POST['title']);
  $genre     = $koneksi->real_escape_string($_POST['genre']);
  $duration  = $koneksi->real_escape_string($_POST['duration']);
  $age       = (int)$_POST['age'];
  $produser  = $koneksi->real_escape_string($_POST['producer']);
  $sutradara = $koneksi->real_escape_string($_POST['director']);
  $penulis   = $koneksi->real_escape_string($_POST['screenwriter']);
  $produksi  = $koneksi->real_escape_string($_POST['production']);
  $aktor     = $koneksi->real_escape_string($_POST['actor']);
  $sinopsis  = $koneksi->real_escape_string($_POST['synopsis']);
  $trailer   = isset($_POST['trailer']) ? $koneksi->real_escape_string($_POST['trailer']) : '';
  $release_date = !empty($_POST['release_date']) ? $koneksi->real_escape_string($_POST['release_date']) : NULL;

  // Upload poster
  $poster = "";
  if (!empty($_FILES['poster']['name'])) {
    $fileName = basename($_FILES['poster']['name']);
    $fileName = preg_replace("/[^A-Za-z0-9._-]/", "_", $fileName);
    $targetFile = "uploads/" . time() . "_" . $fileName;

    if (move_uploaded_file($_FILES['poster']['tmp_name'], $targetFile)) {
      $poster = $koneksi->real_escape_string($targetFile);
    }
  }

  $sql = "INSERT INTO film (title, genre, duration, age, produser, sutradara, penulis, produksi, aktor, sinopsis, poster, trailer, status, release_date)
          VALUES ('$title','$genre','$duration',$age,'$produser','$sutradara','$penulis','$produksi','$aktor','$sinopsis','$poster','$trailer','$status', " . ($release_date ? "'$release_date'" : "NULL") . ")";

  if ($koneksi->query($sql)) {
    header("Location: dashboard_list.php");
    exit();
  } else {
    echo "Error: " . $koneksi->error;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
    <link rel="icon" href="image/logo.png" type="image/x-icon">
  <title> Add Film</title>
  <img src="image/logo.png" alt="Logo Booyah" class="brand-logo">
  <link rel="stylesheet" href="css/dashboard_add.css">
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <div>
      <div class="logo">
        <img src="image/logo.png" alt="Logo Bioskop" />
      </div>
      <div class="menu">
        <a href="dashboard_list.php">Dashboard</a>
        <a href="dashboard_add.php" class="active">Add Film</a>
        <a href="dashboard_account.php">Account</a>
      </div>
    </div>
    <a href="logout.php" class="logout">Sign Out</a>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <h2>Add Film</h2>
    <form method="POST" enctype="multipart/form-data">
      <div class="form-container">
        <!-- Left -->
        <div class="form-left">
          <h3>Basic Information</h3>

          <div class="form-group"><label>Movie Title</label><input type="text" name="title" required></div>
          <div class="form-group"><label>Genre</label><input type="text" name="genre"></div>
          <div class="form-group"><label>Duration</label><input type="text" name="duration"></div>
          <div class="form-group"><label>Age Rating</label><input type="text" name="age"></div>
          <div class="form-group"><label>Producer</label><input type="text" name="producer"></div>
          <div class="form-group"><label>Film Director</label><input type="text" name="director"></div>
          <div class="form-group"><label>Screenwriter</label><input type="text" name="screenwriter"></div>
          <div class="form-group"><label>Production</label><input type="text" name="production"></div>
          <div class="form-group"><label>Actor</label><input type="text" name="actor"></div>
          <div class="form-group"><label>Synopsis</label><textarea name="synopsis"></textarea></div>
          <div class="form-group"><label>Trailer (URL)</label><input type="text" name="trailer"></div>

          <!-- 🟩 Tambahan: Status Film -->
          <div class="form-group">
            <label class="status" >Status Film</label>
            <select name="status" required>
              <option value="">-- Pilih Status --</option>
              <option value="now">Now Playing</option>
              <option value="coming">Coming Soon</option>
            </select>
          </div>

          <!-- 🟩 Tambahan: Tanggal Rilis -->
          <div class="form-group">
            <label>Release Date</label>
            <input type="date" name="release_date">
          </div>

          <div class="form-group"><label>Poster</label><input type="file" name="poster" accept="image/*"></div>
        </div>

        <!-- Right -->
        <div class="form-right preview">
          <img src="https://via.placeholder.com/200x280?text=Preview" id="posterPreview">
          <h4 id="titlePreview">Movie Title Preview</h4>
          <button type="submit" class="btn btn-confirm">Confirm</button>
          <button type="reset" class="btn btn-cancel">Cancel</button>
        </div>
      </div>
    </form>
  </div>

  <script>
    // Preview poster & title
    const posterInput = document.querySelector('input[name="poster"]');
    const posterPreview = document.getElementById('posterPreview');
    const titleInput = document.querySelector('input[name="title"]');
    const titlePreview = document.getElementById('titlePreview');

    posterInput.addEventListener('change', e => {
      const file = e.target.files[0];
      if (file) {
        posterPreview.src = URL.createObjectURL(file);
      }
    });

    titleInput.addEventListener('input', e => {
      titlePreview.textContent = e.target.value || "Movie Title Preview";
    });
  </script>
</body>

</html>