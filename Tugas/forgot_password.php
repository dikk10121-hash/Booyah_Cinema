<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/forgot_password.css">
    <title> Forgot Password</title>
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

    <body>
        <div class="login-container">
            <div class="login-box">
                <img src="image/logo.png" alt="Logo Booyah" class="login-logo">
                <h2> Change Password</h2>
                <p>Make sure you enter the correct email address.</p><br>

                <form method="post" action="sys_forgot.php">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email" required><br>
                    <button type="submit" name="submit" class="btn-email">Enter Email</button>
                </form>
            </div>
        </div>

    </body>

</html>