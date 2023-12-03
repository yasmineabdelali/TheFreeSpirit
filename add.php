<?php
session_start();
include_once('connection.php');

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id']; 
    if (!empty($_FILES["image"]["name"])) {
        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            $_SESSION['error'] = 'File is not a valid image.';
            $uploadOk = 0;
        }

        if ($_FILES["image"]["size"] > 500000) {
            $_SESSION['error'] = 'Sorry, your file is too large.';
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $_SESSION['error'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $sql = "INSERT INTO products (name, description, price, category_id, image) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss", $name, $description, $price, $category_id, $targetFile);
                
                if ($stmt->execute()) {
                    $_SESSION['success'] = 'Product added successfully';
                } else {
                    $_SESSION['error'] = 'Something went wrong while adding data to the database.';
                }

                $stmt->close();
            } else {
                $_SESSION['error'] = 'Sorry, there was an error uploading your file.';
            }
        } else {
            $_SESSION['error'] = 'Sorry, there was an error with the file upload.';
        }
    } else {
        $_SESSION['error'] = 'Please select an image file.';
    }
} else {
    $_SESSION['error'] = 'Fill up the add form first.';
}

header('location: index.php');
?>
