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
    <title>Upload CV</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h2>Upload Your CV (PDF only)</h2>

<form action="upload_cv_process.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="cv" accept=".pdf" required>
    <button type="submit">Upload CV</button>
</form>

<a href="dashboard.php">⬅ Back to Dashboard</a>

</body>
</html>
