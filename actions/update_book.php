<?php
global $pdo;
include $_SERVER['DOCUMENT_ROOT'] . "/config/connection_database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['book_id'])) {
    $bookId = $_POST['book_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    // File upload logic
    $targetDir = "../images/"; // Set your upload directory
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists

    // Allow certain file formats (adjust as needed)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // Handle the file upload error
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Update the book details
            $sql = "UPDATE books SET name = :name, image = :image, description = :description WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $bookId, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':image', $targetFile, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);

            if ($stmt->execute()) {
                // Book updated successfully
                header("Location: /");
                exit();
            } else {
                // Handle the update error
                echo "Error updating book";
            }
        } else {
            // Handle the file move error
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    // Redirect to the main page if no book ID is provided
    header("Location: /");
    exit();
}
?>
