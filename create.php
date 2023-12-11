<?php
global $pdo;
if($_SERVER["REQUEST_METHOD"]=="POST") {
    include $_SERVER['DOCUMENT_ROOT'] . "/config/connection_database.php";
    $name=$_POST["name"];
    $image_name="";
    if(isset($_FILES["image"])) {
        $dir = "images";
        $image_name = uniqid().".".pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $dir_save = $_SERVER["DOCUMENT_ROOT"]."/".$dir."/".$image_name;
        move_uploaded_file($_FILES["image"]["tmp_name"], $dir_save);

    }
    $description=$_POST["description"];
    //echo "$name $image $description\n";
    // Insert query
    $sql = "INSERT INTO books (name, image, description) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    // Execute the query with the data
    $stmt->execute([$name, $image_name, $description]);
    header("Location: /");
    exit;
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/site.css">
</head>
<body>
<div class="container py-3">
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/_header.php";
    ?>

    <h1 class="text-center mt-5 mb-5">Add Book</h1>


    <form enctype="multipart/form-data" class="col-md-6 offset-md-3 needs-validation" method="post" novalidate>
        <div class="mb-3">
            <label for="validationCustom01" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="validationCustom02" required>
            <div class="invalid-feedback">
                Please provide a valid name of book.
            </div>
        </div>

<!--        <div class="mb-3">-->
<!--            <label for="validationCustom01" class="form-label">Image</label>-->
<!--            <input name="image" type="text" class="form-control" id="validationCustom02" required>-->
<!--            <div class="invalid-feedback">-->
<!--                Please provide a valid image.-->
<!--            </div>-->
<!--        </div>-->

        <div class="row">
            <div class="col-md-3">

                <img onclick="triggerFileInput()" alt="Selected photo" src="https://t4.ftcdn.net/jpg/04/70/29/97/360_F_470299797_UD0eoVMMSUbHCcNJCdv2t8B2g1GVqYgs.jpg" id="frame" width="100%"/>

            </div>
            <div class="col-md-9">
                <div class="mb-3">
                    <label for="image" class="form-label">Choose image...</label>
                    <input name="image" required onchange="preview()"  class="form-control inputImage"  type="file" id="formFile"  accept="image/*">
                    <div class="invalid-feedback">
                        Please provide a valid image.
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="validationCustom01" class="form-label">Description</label>
            <textarea name="description" type="text" class="form-control" id="validationCustom02" required></textarea>
            <div class="invalid-feedback">
                Please provide a valid description.
            </div>
        </div>



        <button type="submit" class="btn btn-primary mt-3">Add</button>
    </form>

</div>
<script src="js/validation.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/imageChange.js"></script>
</body>
</html>