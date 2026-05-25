<?php
session_start();

if (!isset($_SESSION["status_login"]) || $_SESSION["status_login"] != true) {
  header("Location: ../index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Script</title>

    <link rel="stylesheet" href="../assets/css/form.css">
</head>
<body>

<div class="form-container">

    <div class="form-card">

        <div class="form-title">

            <h1>Add New Script</h1>

            <p>Create and manage your game scripts</p>

        </div>

        <form action="../process/crud_process.php" method="POST">

            <input type="hidden" name="action" value="create">

            <div class="form-group">

                <label>Nama Script / File</label>

                <input
                type="text"
                name="nama_script"
                placeholder="Contoh: Auto Aim V2"
                required>

            </div>

            <div class="form-group">

                <label>Nama Game</label>

                <input
                type="text"
                name="nama_game"
                placeholder="Contoh: PUBG Mobile"
                required>

            </div>

            <div class="form-group">

                <label>Versi Game</label>

                <input
                type="text"
                name="versi_game"
                placeholder="Contoh: v3.1.0"
                required>

            </div>

            <div class="form-group">

                <label>Link Download</label>

                <input
                type="url"
                name="link_download"
                placeholder="https://mediafire.com/xyz"
                required>

            </div>

            <div class="form-actions">

                <a href="dashboard.php" class="btn-cancel">
                    Cancel
                </a>

                <button type="submit" class="btn-save">
                    Save Script
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>