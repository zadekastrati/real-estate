<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addUser'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $connection = new mysqli("localhost", "root", "", "real_estate");

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    $role = 'user';


    if ($connection->query($sql) === TRUE) {
        echo "User added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
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
            <div class="padding" style="padding: 20px">
                <h2>Add User</h2>
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <button class="createProperty" type="submit" name="addUser">Add User</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>