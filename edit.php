<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
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
					$sql = "UPDATE products SET name = '$name', description = '$description', price = '$price', category_id = '$category_id', image = '$targetFile' WHERE id = '$id'";
					if ($conn->query($sql)) {
						$_SESSION['success'] = 'Product updated successfully';
					} else {
						$_SESSION['error'] = 'Something went wrong in updating product';
					}
				} else {
					$_SESSION['error'] = 'Sorry, there was an error uploading your file.';
				}
			} else {
				$_SESSION['error'] = 'Sorry, there was an error with the file upload.';
			}
		} else {
			$sql = "SELECT image FROM products WHERE id = '$id'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$currentImage = $row['image'];
				$sql = "UPDATE products SET name = '$name', description = '$description', price = '$price', category_id = '$category_id', image = '$currentImage' WHERE id = '$id'";
				if ($conn->query($sql)) {
					$_SESSION['success'] = 'Product updated successfully';
				} else {
					$_SESSION['error'] = 'Something went wrong in updating product';
				}
			} else {
				$_SESSION['error'] = 'Product not found';
			}
		}
	}
	else{
		$_SESSION['error'] = 'Select a product to edit first';
	}

	header('location: index.php');
?>
