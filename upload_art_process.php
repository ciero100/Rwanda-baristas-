<?php
session_start();
include "config/db.php";

if (!isset($_SESSION['barista_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_FILES['art'])) {

    $barista_id = $_SESSION['barista_id'];
    $desc = mysqli_real_escape_string($conn, $_POST['description']);

    $fileName = $_FILES['art']['name'];
    $fileTmp = $_FILES['art']['tmp_name'];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowed = ['jpg', 'jpeg', 'png'];

    if (!in_array($fileExt, $allowed)) {
        die("Only JPG, JPEG, PNG allowed.");
    }

    $newName = time() . "_" . $fileName;
    $uploadPath = "uploads/arts/" . $newName;

    if (move_uploaded_file($fileTmp, $uploadPath)) {

        $sql = "INSERT INTO arts (barista_id, image, description)
                VALUES ($barista_id, '$newName', '$desc')";
        mysqli_query($conn, $sql);

        echo "Art uploaded successfully. <a href='dashboard.php'>Go back</a>";
    } else {
        echo "Upload failed.";
    }
}
?>
