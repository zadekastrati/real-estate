<?php
session_start();
require_once('../config/property.php');

$propertyObject = new Property();

if(isset($_SESSION['user'])) {
    if (isset($_POST['createProperty'])) {
        $propertyObject->create($_POST['title']);    
        header("Location: admin_properties.php");
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
    </div>

    <nav>
        <?php if (isset($_SESSION['user'])) { ?>
            <h3 style="color: white; text-decoration: underline;">
                <?php echo $_SESSION['user']['name']; ?>
            </h3>
        <?php } ?>
        <a href="admin_dashboard.php" style="margin-top:20px ;">Dashboard</a>
        <a href="admin_properties.php">All Properties</a>
        <a href="../index.php">Home</a>
        <a href="../category-details.php">Properties</a>
        <a href="users.php">Users</a>
        <a href="admin_contact.php">Contact Us</a>
        <a href="../auth/logout.php" style="margin-top: 160%;">Log out</a>
    </nav>
    <div class="main">
        <div class="tableRow">
            <form method="POST">
                <label for="name">Property name</label>
                <input type="text" name="title">
                <button type="submit" name="createProperty">Create</button>
            </form>
        </div>
    </div>
