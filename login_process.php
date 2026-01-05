<?php
session_start();
include "config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM baristas WHERE email='$email'");

    if (mysqli_num_rows($query) == 1) {
        $barista = mysqli_fetch_assoc($query);

        if (password_verify($password, $barista['password'])) {

            $_SESSION['barista_id'] = $barista['id'];
            $_SESSION['barista_name'] = $barista['full_name'];

            header("Location: dashboard.php");
            exit;
        } else {
            echo "Incorrect password.";
        }

    } else {
        echo "Account not found.";
    }
}
?>
