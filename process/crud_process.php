<?php
session_start();

if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: ../index.php");
    exit;
}

require '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $action = $_POST['action'];

    $nama_script   = mysqli_real_escape_string($conn, $_POST['nama_script']);
    $nama_game     = mysqli_real_escape_string($conn, $_POST['nama_game']);
    $versi_game    = mysqli_real_escape_string($conn, $_POST['versi_game']);
    $link_download = mysqli_real_escape_string($conn, $_POST['link_download']);

    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($action == 'create') {

        $sql = "INSERT INTO game_scripts
        (nama_script, nama_game, versi_game, link_download)
        VALUES
        ('$nama_script', '$nama_game', '$versi_game', '$link_download')";

        mysqli_query($conn, $sql);

    }

    elseif ($action == 'update') {

        $sql = "UPDATE game_scripts SET
        nama_script='$nama_script',
        nama_game='$nama_game',
        versi_game='$versi_game',
        link_download='$link_download'
        WHERE id=$id";

        mysqli_query($conn, $sql);
    }

    header("Location: ../pages/dashboard.php");
    exit;
}

if (isset($_GET['action']) && isset($_GET['id'])) {

    $action = $_GET['action'];
    $id = intval($_GET['id']);

    if ($action == 'delete') {

        $sql = "DELETE FROM game_scripts WHERE id=$id";
        mysqli_query($conn, $sql);
    }

    elseif ($action == 'pause') {

        $sql_cek = "SELECT status FROM game_scripts WHERE id=$id";

        $result_cek = mysqli_query($conn, $sql_cek);

        $row_cek = mysqli_fetch_assoc($result_cek);

        $current_status = isset($row_cek['status'])
            ? $row_cek['status']
            : 'active';

        $new_status = ($current_status == 'active')
            ? 'paused'
            : 'active';

        $sql_update = "UPDATE game_scripts
        SET status='$new_status'
        WHERE id=$id";

        mysqli_query($conn, $sql_update);
    }

    header("Location: ../pages/dashboard.php");
    exit;
}
?>