<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/admin/css/admin.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="Header">
        <a href="../index.php" class="logo">
            <img src="../assets/images/logo.png" style="width: 100px;">
        </a>
        <div class="authentication" style="margin-right: 20px;">
            <a href="../auth/logout.php" style="color: #000; text-decoration: none;">Log out</a>
        </div>
    </div>

    <nav>
        <?php if (isset($_SESSION['user'])) { ?>
            <h3 style="color: white; text-decoration: underline;">
                <?php echo $_SESSION['user']['name']; ?>
            </h3>
        <?php } ?>
        <a href="admin_dashboard.php" style="margin-top:20px ;">Dashboard</a>
        <a href="admin_properties.php">Properties</a>
        <?php
        if ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'superadmin') {
            echo '<a href="admin_users.php">Users</a>';
        }
        ?>
        <a href="admin_contact.php">Contact Us</a>
    </nav>

    <div class="main">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title" style="font-size: x-large;">Visitors</h3>
                        <p class="card-title">10,000 in a week</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title" style="font-size: x-large;">Users registered</h3>
                        <p class="card-title">999+</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title" style="font-size: x-large;">Number of properties</h3>
                        <p class="card-title">28,558</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title" style="font-size: x-large;">Rating</h3>
                        <p class="card-title">⭐⭐⭐⭐⭐</p>
                    </div>
                </div>
            </div>
        </div>
    </div>