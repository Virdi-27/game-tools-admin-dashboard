<?php
session_start();

if (!isset($_SESSION['status_login'])) {
    header("Location: ../index.php");
    exit;
}

include "../config/config.php";

$id = $_GET['id'];

$query = mysqli_query($conn,
"SELECT * FROM game_scripts WHERE id=$id");

$data = mysqli_fetch_assoc($query);

if (!$data) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Script</title>

    <link rel="stylesheet" href="../assets/css/form.css">
</head>
<body>

<div class="form-container">

    <div class="form-card">

        <div class="form-title">

            <h1>Edit Script</h1>

            <p>Update your game script information</p>

        </div>

        <form action="../process/crud_process.php" method="POST">

            <input type="hidden" name="action" value="update">

            <input
            type="hidden"
            name="id"
            value="<?= $data['id'] ?>">

            <div class="form-group">

                <label>Nama Script / File</label>

                <input
                type="text"
                name="nama_script"
                value="<?= htmlspecialchars($data['nama_script']) ?>"
                required>

            </div>

            <div class="form-group">

                <label>Nama Game</label>

                <input
                type="text"
                name="nama_game"
                value="<?= htmlspecialchars($data['nama_game']) ?>"
                required>

            </div>

            <div class="form-group">

                <label>Versi Game</label>

                <input
                type="text"
                name="versi_game"
                value="<?= htmlspecialchars($data['versi_game']) ?>"
                required>

            </div>

            <div class="form-group">

                <label>Link Download</label>

                <input
                type="url"
                name="link_download"
                value="<?= htmlspecialchars($data['link_download']) ?>"
                required>

            </div>

            <div class="form-actions">

                <a href="dashboard.php" class="btn-cancel">
                    Cancel
                </a>

                <button type="submit" class="btn-save">
                    Update Script
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>