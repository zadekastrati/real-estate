<?php
session_start();
require_once('../config/users.php');

$user_id = $_GET['user_id'];
$userObject = new Users();
$user = $userObject->getUser($user_id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['editUser'])) {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $editResult = $userObject->editUser($user_id, $name, $email, $password);
        echo $editResult;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/admin/css/admin.css">
    <title>Add User</title>
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
        <?php if (isset($_SESSION['userCreationError'])) { ?>
            <p class="userAlert" style="color: red;">
                <?php echo $_SESSION['userCreationError']; ?>
            </p>
            <?php unset($_SESSION['userCreationError']); ?>
        <?php } elseif (isset($_SESSION['userCreationSuccess'])) { ?>
            <p class="userAlert" style="color: green;">
                <?php echo $_SESSION['userCreationSuccess']; ?>
            </p>
            <?php unset($_SESSION['userCreationSuccess']); ?>
        <?php } ?>
        <div class="tableRow">
            <div class="padding" style="padding:20px;">
                <h2>Edit User</h2>
                <form method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <button class="createProperty" type="submit" name="editUser">Edit User</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>