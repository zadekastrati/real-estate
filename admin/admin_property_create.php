<?php
session_start();
require_once('../config/property.php');

$propertyObject = new Property();
if (isset($_SESSION['user'])) {
    if (isset($_POST['createProperty'])) {
        $propertyObject->create($_POST['title'], $_POST['price'], $_POST['description'], $_FILES['photo']);

        header("Location: admin_properties.php");
        exit();
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
    <link rel="stylesheet" href="../assets/admin/css/admin.css">
    <title>Create Property</title>
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
        <a href="admin_properties.php">All Properties</a>
        <?php
        if ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'superadmin') {
            echo '<a href="admin_users.php">Users</a>';
        }
        ?> <a href="admin_contact.php">Contact Us</a>
    </nav>
    <div class="main">
        <div class="tableRow">
            <form method="POST" enctype="multipart/form-data">
                <h2>Add Property</h2>
                <label for="title">Title</label>
                <input type="text" name="title" required>

                <label for="price">Price</label>
                <input type="number" name="price" required>

                <label for="description">Description</label>
                <textarea name="description" required></textarea>

                <label for="photo">Property Photo</label>
                <input type="file" name="photo" accept="image/*" required>

                <button type="submit" name="createProperty">Create</button>
            </form>
        </div>
    </div>