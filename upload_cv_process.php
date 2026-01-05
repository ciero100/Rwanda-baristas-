<?php
session_start();
include "config/db.php";

if (!isset($_SESSION['barista_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_FILES['cv'])) {

    $barista_id = $_SESSION['barista_id'];
    $fileName = $_FILES['cv']['name'];
    $fileTmp = $_FILES['cv']['tmp_name'];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if ($fileExt != "pdf") {
        die("Only PDF files are allowed.");
    }

    $newName = time() . "_" . $fileName;
    $uploadPath = "uploads/cvs/" . $newName;

    if (move_uploaded_file($fileTmp, $uploadPath)) {

        mysqli_query($conn, "DELETE FROM cvs WHERE barista_id=$barista_id");

        $sql = "INSERT INTO cvs (barista_id, file) VALUES ($barista_id, '$newName')";
        mysqli_query($conn, $sql);

        echo "CV uploaded successfully. <a href='dashboard.php'>Go back</a>";
    } else {
        echo "Upload failed.";
    }
}
?>
