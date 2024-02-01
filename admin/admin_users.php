<?php 
session_start();
require_once('../config.php');
$sql = "SELECT id, username, role FROM user
        UNION
        SELECT id, username, role FROM users";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin.css">
    <title>Users</title>
</head>

<body>
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
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['role']; ?></td>
                        <td>
                            <a href="edit_user.php?user_id=<?php echo $user['id']; ?>">
                                <i class="fa fa-pencil pl-2 pr-3 edit" style="cursor: pointer; color: black;"></i>
                            </a>
                            <a href="delete_user.php?user_id=<?php echo $user['id']; ?>">
                                <i class="fa fa-trash" style="cursor: pointer; color: black;"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>