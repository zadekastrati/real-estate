<?php
session_start();
require_once('../config/users.php');

$userObject = new Users();

if (isset($_SESSION['user'])) {
    $role = $_SESSION['user']['role'];
    if ($role == 'superadmin' || $role == 'admin') {
        $users = $userObject->userList();
    }
} else {
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/admin/css/admin.css">
    <title>Users</title>
</head>

<body>
    <div class="Header" style="height: 10%;">
        <a href="../index.php" target="_blank" class="logo">
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
        ?> <a href="admin_contact.php">Contact Us</a>
    </nav>
    <div class="main">
        <div class="tableRow">
            <div class="tableCard">
                <div class="tableCardHeader">
                    <a class="createProperty" href="admin_create_user.php">Add</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td>
                                        <?php echo $user['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['role']; ?>
                                    </td>
                                    <td>
                                        <a href="admin_edit_user.php?user_id=<?php echo $user['id']; ?>">
                                            <i class="fa fa-pencil pl-2 pr-3 edit"
                                                style="cursor: pointer; color: black;"></i>
                                        </a>
                                        <a href="admin_delete_user.php?user_id=<?php echo $user['id']; ?>">
                                            <i class="fa fa-trash" style="cursor: pointer; color: black;"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>