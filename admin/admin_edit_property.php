<?php
session_start();
require_once('../config/property.php');

$property_id = $_GET['property_id'];
$propertyObject = new Property();
$propertyDetails = $propertyObject->getProperty($property_id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['updateProperty'])) {
        $property_id = $_POST['id'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $currentPhoto = $propertyDetails['photo'];

        if (!empty($_FILES['photo']['name'])) {
            // Check if the file exists before unlinking
            if (file_exists($currentPhoto)) {
                unlink($currentPhoto);
            }

            $timestamp = (new DateTime())->getTimestamp();
            $targetDirectory = "../uploads/"; 
            $targetFile = $targetDirectory . $timestamp . basename($_FILES["photo"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["photo"]["tmp_name"]);
            if($check === false) {
                $_SESSION['propertyCreationError'] = "File is not an image.";
                $uploadOk = 0;
            }
            if (file_exists($targetFile)) {
                $_SESSION['propertyCreationError'] = "Sorry, file already exists.";
                $uploadOk = 0;
            }
        
            $allowedFormats = ["jpg", "jpeg", "png", "gif"];
            if (!in_array($imageFileType, $allowedFormats)) {
                $_SESSION['propertyCreationError'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
        
            if ($uploadOk == 0) {
                $_SESSION['propertyCreationError'] = "Sorry, your file was not uploaded.";
            } else {
                move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile);
            }

            $newPhoto = $targetFile;
        } else {
            $newPhoto = $currentPhoto;
        }

        $updateResult = $propertyObject->editProperty($property_id, $title, $price, $description, $newPhoto);
        
        if($updateResult['status'] == 200) {
            $_SESSION['propertyUpdateSuccess'] = $updateResult['message'];
        } else {
            $_SESSION['propertyUpdateError'] = $updateResult['message'];
        }

        header("Location: admin_properties.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/admin/css/admin.css">
    <title>Edit Property</title>
</head>

<body>
    <div class="Header">
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
        <h2>Edit Property</h2>
        <?php if (isset($_SESSION['propertyUpdateError'])) { ?>
            <p class="propertyAlert" style="color: red;">
                <?php echo $_SESSION['propertyUpdateError']; ?>
            </p>
            <?php unset($_SESSION['propertyUpdateError']); ?>
        <?php } ?>

        <form action="admin_edit_property.php?property_id=<?php echo $property_id; ?>" method="post" enctype="multipart/form-data">
        <div class="tableRow">
            <div class="padding" style="padding: 20px">
                <h2>Update Property</h2>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="<?php echo isset($propertyDetails['title']) ? htmlspecialchars($propertyDetails['title']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" value="<?php echo isset($propertyDetails['price']) ? htmlspecialchars($propertyDetails['price']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" required><?php echo isset($propertyDetails['description']) ? htmlspecialchars($propertyDetails['description']) : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="photo">Property Photo</label>
                    <input type="file" name="photo" accept="image/*">
                </div>
                <input type="hidden" name="id" value="<?php echo $property_id; ?>">
                <input type="submit" value="Update Property" name="updateProperty">
            </div>
        </div>
    </form>
    </div>
</body>

</html>
