<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/register.css">
    <title>Booyah - Register</title>
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
            <h2>Register</h2>
            <p>Create your account to get started.</p>

            <form method="post" action="sys_register.php">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter your username" required>
                <label>E-Mail</label>
                <input type="email" name="email" placeholder="Enter your E-Mail" required>
                <label>Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <label>Confirm Password</label>
                <input type="password" id="konfirmasi" name="konfirmasi" placeholder="Confirm password" required>
                <button type="submit" class="btn-register">Register</button>
            </form>
        </div>
    </div>
</body>

</form>
</body>

</html>