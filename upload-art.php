<?php
session_start();
if (!isset($_SESSION['barista_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Coffee Art</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h2>Upload Coffee Art</h2>

<form action="upload_art_process.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="art" accept="image/*" required>
    <textarea name="description" placeholder="Description (optional)"></textarea>
    <button type="submit">Upload</button>
</form>

<a href="dashboard.php">⬅ Back to Dashboard</a>

</body>
</html>
