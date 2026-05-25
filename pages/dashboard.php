<?php
session_start();
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: ../index.php");
    exit;
}

$email_admin = isset($_SESSION['email'])
    ? $_SESSION['email']
    : 'admin@scriptify.com';

require '../config/config.php'; 

$sql_tampil = "SELECT * FROM game_scripts ORDER BY id DESC";
$result_data = mysqli_query($conn, $sql_tampil);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scriptify Dashboard</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
</head>
<body>

    <div class="sidebar">
        <div class="logo">
            Script<span>ify</span>
        </div>
        
        <div class="nav-group-title">Main Menu</div>
        <div class="nav-group">

    <a href="dashboard.php" class="nav-item active">
        <span class="material-symbols-outlined">dashboard</span>
        Dashboard
    </a>

    <a href="dashboard.php" class="nav-item">
        <span class="material-symbols-outlined">code</span>
        Script Management
    </a>

    <a href="#" class="nav-item">
        <span class="material-symbols-outlined">history</span>
        User Logs
    </a>

    <a href="#" class="nav-item">
        <span class="material-symbols-outlined">analytics</span>
        Analytics
    </a>

    <a href="#" class="nav-item">
        <span class="material-symbols-outlined">settings</span>
        Settings
    </a>

</div>

        <div class="nav-group nav-group-bottom">
            <a href="../logout.php" class="nav-item logout-item">
                <span class="material-symbols-outlined">logout</span>
                Logout Account
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="header">
            <div class="header-icons">
                <span class="material-symbols-outlined">search</span>
            </div>
            <div class="profile">
                <img src="https://ui-avatars.com/api/?name=<?= urlencode($email_admin) ?>&background=F3F7FF&color=4880FF&bold=true" alt="User Avatar">
                <span><?= htmlspecialchars($email_admin) ?></span>
            </div>
        </div>

        <div class="dashboard-body">
            
            <div class="cards-container">
                <div class="card card-1">
                    <h3>Total Scripts</h3>
                    <p>Manage all your game scripts here</p>
                </div>
                <div class="card card-2">
                    <h3>Active Games</h3>
                    <p>Games currently supported</p>
                </div>
                <div class="card card-3">
                    <h3>Downloads</h3>
                    <p>Monitor script usage</p>
                </div>
            </div>

            <div class="content-box">
                <div class="tabs">
                    <div class="tab active">Script Activities</div>
                    <div class="tab">In Progress</div>
                    <div class="tab">Archived</div>
                </div>

                <div class="filter-bar">
                    <div class="filters">
                        <div class="search-box">
                            <span class="material-symbols-outlined">search</span>
                            <input type="text" placeholder="Enter keyword to search">
                        </div>
                        <button class="btn btn-outline search-btn">Search</button>
                    </div>
                    <a href="add_script.php" class="btn btn-primary">
                        <span class="material-symbols-outlined">add</span>
                        Release Script
                    </a>
                </div>

                <div class="data-list">
                    <?php if (mysqli_num_rows($result_data) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result_data)): 
                            $is_paused = (isset($row['status']) && $row['status'] == 'paused');
                        ?>
                            <div class="list-item">
                                <div class="item-info">
                                    <div class="item-image <?= $is_paused ? 'paused' : '' ?>">
                                        <?= strtoupper(htmlspecialchars($row['nama_game'])) ?>
                                    </div>
                                    <div class="item-text">
                                        <h4><?= htmlspecialchars($row['nama_script']) ?></h4>
                                        <p>Supported Version: <b><?= htmlspecialchars($row['versi_game']) ?></b></p>
                                        
                                        <?php if($is_paused): ?>
                                            <span class="badge paused-badge">Paused (Offline)</span><br>
                                        <?php endif; ?>
                                        
                                        <a href="<?= htmlspecialchars($row['link_download']) ?>" target="_blank" class="download-link">🔗 Download Script</a>
                                    </div>
                                </div>
                                <div class="item-actions">
                                    <a href="edit_script.php?id=<?= $row['id'] ?>" class="btn-action">
    Edit
</a>
                                    
                                    <a href="../process/crud_process.php?action=pause&id=<?= $row['id'] ?>" class="btn-action">
                                        <?= $is_paused ? 'Resume' : 'Set Offline' ?>
                                    </a>
                                    
                                    <a href="../process/crud_process.php?action=delete&id=<?= $row['id'] ?>" class="btn-action delete" onclick="return confirm('Yakin ingin menghapus script ini?');">Delete</a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="empty-state">
                            Belum ada script yang ditambahkan. Silakan klik "Release Script".
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>