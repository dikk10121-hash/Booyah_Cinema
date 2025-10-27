<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/login.css">
    <title>Booyah - Login</title>
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

    <!-- Login Container -->
    <div class="login-container">
        <div class="login-box">
            <img src="image/logo.png" alt="Logo Booyah" class="login-logo">
            <h2>Welcome</h2>
            <p>Sign in to book your favorite movies and enjoy exclusive offers</p>

            <form method="post" action="sys_log.php">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter your username" required>
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>

                <!-- Options -->
                <div class="options">
                    <label><input type="checkbox" name="remember"> Remember Me</label>
                    <a href="forgot_password.php" class="forgot">Forgot Password?</a>
                </div>

                <!-- Buttons -->
                <button type="submit" name="login" class="btn-login">Sign In to Cinema</button>
                <div class="divider">Or</div>
                <button type="button" class="btn-register" onclick="location.href='register.php'">
                    Sign Up for an Account
                </button>
            </form>
        </div>
    </div>
</body>

</html>