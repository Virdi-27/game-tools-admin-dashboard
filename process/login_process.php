<?php
session_start();
include "../config/config.php";

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

    $data_user = mysqli_fetch_assoc($result);

    if (password_verify($password, $data_user['password'])) {

        $_SESSION['status_login'] = true;

        $_SESSION['email'] = $data_user['email'];

        header("Location: ../pages/dashboard.php");
        exit();
    }
}

header("Location: ../index.php?error=invalid");
exit();
?>