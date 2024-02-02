<?php

require_once('connection.php');
class Users extends Connection
{
    public function userList()
    {
        $sql = "SELECT * FROM users";
        $result = mysqli_query($this->connection, $sql);

        if (!$result) {
            die("Error executing query: " . mysqli_error($this->connection));
        }

        $users = [];

        while ($user = mysqli_fetch_assoc($result)) {
            $users[] = $user;
        }

        return $users;
    }

    public function getUser($user_id)
    {
        $sql = "SELECT * FROM users WHERE id=$user_id";
        $result = mysqli_query($this->connection, $sql);
        if (!$result) {
            die("Error executing query: " . mysqli_error($this->connection));
        }
        $user = mysqli_fetch_assoc($result);
        
        return $user;
    }
    public function editUser($id, $name, $email, $password)
    {
        if (!$this->userExists($id)) {
            return "User not found";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET name = '$name', email = '$email', password = '$hashedPassword' WHERE id = $id";
        $result = mysqli_query($this->connection, $sql);

        if ($result) {
            return "User updated successfully";
        } else {
            return "Error updating user: " . mysqli_error($this->connection);
        }
    }

    private function userExists($id)
    {
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($this->connection, $sql);

        return mysqli_num_rows($result) > 0;
    }
}

?>