<?php

require_once('connection.php');
class Property extends Connection
{
    public function list($user_id = null)
    {
        $sql = "";
        if (!$user_id) {
            $sql .= "SELECT * FROM properties";
        } else {
            $sql .= "SELECT * FROM properties WHERE user_id = '$user_id'";
        }

        $result = mysqli_query($this->connection, $sql);

        if (!$result) {
            die("Error executing query: " . mysqli_error($this->connection));
        }

        $properties = [];

        while ($property = mysqli_fetch_assoc($result)) {
            $properties[] = $property;
        }

        return $properties;
    }
    public function create($title)
    {
        $sql = "INSERT INTO properties(title) VALUES('$title')";
        $result = mysqli_execute_query($this->connection, $sql);

        if(!$result) {
            $_SESSION['propertyCreationError'] = 'Failed to create property, please try again!';
        }

        $_SESSION['propertyCreationSuccess'] = 'Property is successfully created';
    }
}