<?php
if (!isset($_GET['email']) || empty($_GET['email'])) {
    echo "<script>alert('Email tidak valid!'); window.location='forgot_password.php';</script>";
    exit;
}
$email = $_GET['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/forgot_password.css">
    <title>Reset Password</title>
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
                <a href="index.php#2">Playing Now</a>
                <a href="index.php#3">Coming Soon</a>
            </nav>
        </div>
    </header>
    <div class="login-container">
        <div class="login-box">
            <img src="image/logo.png" alt="Logo Booyah" class="login-logo">
            <h2>Ubah Password</h2>
            <p>Pastikan password baru Anda kuat dan unik.</p><br>

            <form method="post" action="sys_reset.php">
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <label>Password Baru</label>
                <input type="password" name="password" placeholder="Masukkan password baru" required>
                <label>Konfirmasi Password</label>
                <input type="password" name="konfirmasi" placeholder="Konfirmasi password" required><br>
                <button type="submit" name="reset" class="btn-email">Ubah Password</button>
            </form>
        </div>
    </div>
</body>

</html>