<?php
include "../config/config.php";

$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password != $confirm_password) {

    header("Location: ../register.php?error=password");
    exit();
}

$password = password_hash($password, PASSWORD_DEFAULT);

$cek_email = mysqli_query($conn,
    "SELECT * FROM users WHERE email='$email'"
);

if (mysqli_num_rows($cek_email) > 0) {

    header("Location: ../register.php?error=email");
    exit();
}

$query = "INSERT INTO users (email, password)
VALUES ('$email', '$password')";

mysqli_query($conn, $query);

header("Location: ../index.php?register=success");
exit();
?>