<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barista Login | Rwandan Baristas</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h2 style="text-align:center;">Barista Login</h2>

<form action="login_process.php" method="POST">
    <input type="email" name="email" placeholder="Email Address" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

<p style="text-align:center;">
    Don’t have an account? <a href="register.php">Register</a>
</p>

</body>
</html>
