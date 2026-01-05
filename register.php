<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barista Registration | Rwandan Baristas</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h2>Barista Registration</h2>

<form action="register_process.php" method="POST">
    <input type="text" name="full_name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email Address" required>
    <input type="text" name="phone" placeholder="Phone Number" required>
    <input type="text" name="location" placeholder="Location (Kigali, Huye...)" required>
    <textarea name="skills" placeholder="Your skills (Espresso, Latte Art...)" required></textarea>
    <textarea name="experience" placeholder="Your experience" required></textarea>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>

<p>Already registered? <a href="login.php">Login</a></p>

</body>
</html>
