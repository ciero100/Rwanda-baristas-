<?php
include "config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name  = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email      = mysqli_real_escape_string($conn, $_POST['email']);
    $phone      = mysqli_real_escape_string($conn, $_POST['phone']);
    $location   = mysqli_real_escape_string($conn, $_POST['location']);
    $skills     = mysqli_real_escape_string($conn, $_POST['skills']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT id FROM baristas WHERE email='$email'");

    if (mysqli_num_rows($check) > 0) {
        echo "Email already registered.";
        exit;
    }

    $sql = "INSERT INTO baristas 
            (full_name, email, phone, location, skills, experience, password)
            VALUES 
            ('$full_name','$email','$phone','$location','$skills','$experience','$password')";

    if (mysqli_query($conn, $sql)) {
        header("Location: login.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
