<?php
include 'sys_koneksi.php';

// Ambil data user berdasarkan ID
$id = (int)$_GET['id'];
$result = $koneksi->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();

// Update data user jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $koneksi->real_escape_string($_POST['username']);
  $email    = $koneksi->real_escape_string($_POST['email']);
  $password = $koneksi->real_escape_string($_POST['password']);

  $sql = "UPDATE users SET 
                username='$username',
                email='$email',
                password='$password'
            WHERE id=$id";

  if ($koneksi->query($sql)) {
    header("Location: dashboard_account.php");
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
  <title> Edit Account</title>
  <img src="image/logo.png" alt="Logo Booyah" class="brand-logo">
  <link rel="stylesheet" href="css/dashboard_account_edit.css">
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <div>
      <div class="logo">
         <img src="image\logo.png" alt="Logo Bioskop" />
         <h2></h2>
      </div>
      <div class="menu">
        <a href="dashboard_list.php">
          <svg class="menu-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 4V11H9V4H4ZM11 11C11 12.1046 10.1046 13 9 13H4C2.89543 13 2 12.1046 2 11V4C2 2.89543 2.89543 2 4 2H9C10.1046 2 11 2.89543 11 4V11Z" fill="#cfcfcf" style="fill-opacity:1;"/>
            <path d="M15 4V7H20V4H15ZM22 7C22 8.10457 21.1046 9 20 9H15C13.8954 9 13 8.10457 13 7V4C13 2.89543 13.8954 2 15 2H20C21.1046 2 22 2.89543 22 4V7Z" fill="#cfcfcf" style="fill-opacity:1;"/>
            <path d="M15 13V20H20V13H15ZM22 20C22 21.1046 21.1046 22 20 22H15C13.8954 22 13 21.1046 13 20V13C13 11.8954 13.8954 11 15 11H20C21.1046 11 22 11.8954 22 13V20Z" fill="#cfcfcf" style="fill-opacity:1;"/>
            <path d="M4 17V20H9V17H4ZM11 20C11 21.1046 10.1046 22 9 22H4C2.89543 22 2 21.1046 2 20V17C2 15.8954 2.89543 15 4 15H9C10.1046 15 11 15.8954 11 17V20Z" fill="#cfcfcf" style="fill-opacity:1;"/>
          </svg>
          Dashboard
        </a>
        <a href="dashboard_add.php">
          <svg class="menu-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19 11C19.5523 11 20 11.4477 20 12C20 12.5523 19.5523 13 19 13H5C4.44772 13 4 12.5523 4 12C4 11.4477 4.44772 11 5 11H19Z" fill="#cfcfcf" style="fill-opacity:1;"/>
            <path d="M11 19V5C11 4.44772 11.4477 4 12 4C12.5523 4 13 4.44772 13 5V19C13 19.5523 12.5523 20 12 20C11.4477 20 11 19.5523 11 19Z" fill="#cfcfcf" style="fill-opacity:1;"/>
          </svg>
          Add Film
        </a>
        <a href="dashboard_account.php" class="active">
          <svg class="menu-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12ZM23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12Z" fill="#cfcfcf" style="fill-opacity:1;"/>
            <path d="M14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12C13.1046 12 14 11.1046 14 10ZM16 10C16 12.2091 14.2091 14 12 14C9.79086 14 8 12.2091 8 10C8 7.79086 9.79086 6 12 6C14.2091 6 16 7.79086 16 10Z" fill="#cfcfcf" style="fill-opacity:1;"/>
            <path d="M16 20.6621V19C16 18.7348 15.8946 18.4805 15.707 18.293C15.5195 18.1054 15.2652 18 15 18H9C8.73478 18 8.48051 18.1054 8.29297 18.293C8.10543 18.4805 8 18.7348 8 19V20.6621C7.99994 21.2143 7.55225 21.6621 7 21.6621C6.44775 21.6621 6.00006 21.2143 6 20.6621V19C6 18.2044 6.3163 17.4415 6.87891 16.8789C7.44152 16.3163 8.20435 16 9 16H15C15.7957 16 16.5585 16.3163 17.1211 16.8789C17.6837 17.4415 18 18.2043 18 19V20.6621C17.9999 21.2143 17.5522 21.6621 17 21.6621C16.4478 21.6621 16.0001 21.2143 16 20.6621Z" fill="#cfcfcf" style="fill-opacity:1;"/>
          </svg>
          Account
        </a>
      </div>
    </div>
    <a href="logout.php" class="logout">Sign Out</a>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <h2>Edit Account</h2>
    <form method="POST" class="form-edit">
      <label>User Name</label>
      <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>

      <label>Email</label>
      <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

      <label>Password</label>
      <input type="text" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" required>

      <button type="submit" class="btn-edit">Update</button>
      <a href="dashboard_account.php" class="btn-delete">Cancel</a>
    </form>
  </div>
</body>
</html>