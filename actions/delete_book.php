<?php
global $pdo;
include $_SERVER['DOCUMENT_ROOT'] . "/config/connection_database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_book'])) {
    $bookId = $_POST['delete_book'];

    // Perform the delete operation
    $sql = "DELETE FROM books WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $bookId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Book deleted successfully
        header("Location: /index.php"); // Redirect to the main page or any other page after deletion
        exit();
    } else {
        // Handle the deletion error
        echo "Error deleting book";
    }
}
?>
