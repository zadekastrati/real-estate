<?php
session_start();
require_once('../config/property.php');

$propertyObject = new Property();

if (isset($_SESSION['user'])) {
    $role = $_SESSION['user']['role'];
    if ($role == 'superadmin' || $role == 'admin') {
        $properties = $propertyObject->list();
    } else {
        $properties = $propertyObject->list($_SESSION['user']['id']);
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
    <title>Properties</title>
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
        ?> <a href="admin_contact.php">Contact Us</a>
    </nav>
    <div class="main">
        <?php if (isset($_SESSION['propertyCreationError'])) { ?>
            <p class="propertyAlert" style="color: red;">
                <?php echo $_SESSION['propertyCreationError']; ?>
            </p>
            <?php unset($_SESSION['propertyCreationError']); ?>
        <?php } elseif (isset($_SESSION['propertyCreationSuccess'])) { ?>
            <p class="propertyAlert" style="color: green;">
                <?php echo $_SESSION['propertyCreationSuccess']; ?>
            </p>
            <?php unset($_SESSION['propertyCreationSuccess']); ?>
        <?php } ?>
        <div class="tableRow">
            <div class="tableCard">
                <div class="tableCardHeader">
                    <a class="createProperty" href="admin_property_create.php">Add</a>
                </div>
                <div class="tableCardBody">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Property image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($properties as $property) { ?>
                                <tr>
                                    <td>
                                        <img src="../uploads/<?php echo $property['photo']; ?>" class="pr-4" alt=""
                                            style="width: 100px;">
                                    </td>
                                    <td>
                                        <?php echo $property['title']; ?>
                                    </td>
                                    <td>
                                        <?php echo $property['description']; ?>
                                    </td>
                                    <td>
                                        <?php echo $property['price']; ?>&euro;
                                    </td>
                                    <td>
                                        <a href="admin_edit_property.php?property_id=<?php echo $property['id']; ?>">
                                            <i class="fa fa-pencil"
                                                style="cursor: pointer; color: black; padding-right: 15px;"></i>
                                        </a>
                                        <a href="admin_delete_property.php?property_id=<?php echo $property['id']; ?>"><i
                                                class="fa fa-trash" style="cursor: pointer; color: black;"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>