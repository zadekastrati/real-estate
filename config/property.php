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
    public function create($title, $price, $description, $photo)
    {
        $timestamp = (new DateTime())->getTimestamp();
        $targetDirectory = "../uploads/"; 
        $targetFile = $targetDirectory . $timestamp . basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
        if(isset($_POST["createProperty"])) {
            $check = getimagesize($_FILES["photo"]["tmp_name"]);
            if($check === false) {
                $_SESSION['propertyCreationError'] = "File is not an image.";
                $uploadOk = 0;
            }
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
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                $user_id = $_SESSION['user']['id'];
                $sql = "INSERT INTO properties (user_id, title, price, description, photo) VALUES ('$user_id', '$title', '$price', '$description', '$targetFile')";
                $result = mysqli_query($this->connection, $sql);
    
                if (!$result) {
                    $_SESSION['propertyCreationError'] = 'Failed to create property, please try again!';
                } else {
                    $_SESSION['propertyCreationSuccess'] = 'Property is successfully created';
                }
            } else {
                $_SESSION['propertyCreationError'] = "Sorry, there was an error uploading your file.";
            }
        }
    }
    
    public function editProperty($id, $title, $price, $description, $photo)
    {
        if (!$this->propertyExists($id)) {
            return "Property not found";
        }

        $stmt = $this->connection->prepare("UPDATE properties SET title = ?, price = ?, description = ?, photo = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $title, $price, $description, $photo, $id);

        if ($stmt->execute()) {
            $stmt->close();
            return [
                'message' => "Property updated successfully",
                'status' => 200
            ];
        } else {
            [
                'message' => "Error updating property: " . $stmt->error,
                'status' => 404
            ];
        }
    }

    private function propertyExists($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM properties WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->num_rows > 0;
    }
    public function getProperty($property_id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM properties WHERE id = ?");
        $stmt->bind_param("i", $property_id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}