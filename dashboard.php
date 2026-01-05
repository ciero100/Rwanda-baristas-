<?php
session_start();

if (!isset($_SESSION['barista_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Rwandan Baristas</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h2>Welcome, <?php echo $_SESSION['barista_name']; ?> ☕</h2>

<ul>
    <li><a href="upload-art.php">Upload Coffee Art</a></li>
    <li><a href="upload-cv.php">Upload CV</a></li>
    <li><a href="profile.php">View Public Profile</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>

</body>
</html>
