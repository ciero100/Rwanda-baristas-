<?php
$host = "localhost";
$user = "YOUR_DB_USERNAME";
$pass = "YOUR_DB_PASSWORD";
$db   = "YOUR_DB_NAME";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
