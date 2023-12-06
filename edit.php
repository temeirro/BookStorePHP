<?php
global $pdo;
include $_SERVER['DOCUMENT_ROOT'] . "/config/connection_database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_book'])) {
    $bookId = $_POST['edit_book'];


    // Fetch book details for the given ID
    $sql = "SELECT id, name, image, description FROM books WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $bookId, PDO::PARAM_INT);
    $stmt->execute();
    $book = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Redirect to the main page if no book ID is provided
    header("Location: /"); // Redirect to the main page or any other page after deletion
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/site.css">
</head>
<body>
    <div class="container py-3">

        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/_header.php";
        ?>

        <h1 class="text-center mt-5 mb-5">Edit Book</h1>

        <form enctype="multipart/form-data" method="post" class="col-md-6 offset-md-3 needs-validation" action="actions/update_book.php">
            <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">


            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Name</label>
                <input name="name" type="text" value="<?php echo $book['name']; ?>" class="form-control" id="validationCustom02" required>
                <div class="invalid-feedback">
                    Please provide a valid name of book.
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">

                    <img onclick="triggerFileInput()" alt="Selected photo" src="https://t4.ftcdn.net/jpg/04/70/29/97/360_F_470299797_UD0eoVMMSUbHCcNJCdv2t8B2g1GVqYgs.jpg" id="frame" width="100%"/>

                </div>
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="image" class="form-label">Choose image...</label>
                        <input value="<?php echo $book['image']; ?>" name="image" required onchange="preview()"  class="form-control inputImage"  type="file" id="formFile"  accept="image/*">
                        <div class="invalid-feedback">
                            Please provide a valid image.
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Description</label>
                <textarea name="description" type="text" class="form-control" id="validationCustom02" required><?php echo $book['description']; ?></textarea>
                <div class="invalid-feedback">
                    Please provide a valid description.
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="js/validation.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/imageChange.js"></script>

</body>
</html>
