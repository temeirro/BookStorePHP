<!doctype html>
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

    <h1 class="text-center">Add product</h1>


    <form class="col-md-6 offset-md-3 needs-validation" novalidate>
        <div class="mb-3">
            <label for="validationCustom01" class="form-label">Category</label>
            <input type="text" class="form-control" id="validationCustom02" required>
            <div class="invalid-feedback">
                Please provide a valid name of category.
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">

                    <img onclick="triggerFileInput()" alt="Selected photo" src="https://t4.ftcdn.net/jpg/04/70/29/97/360_F_470299797_UD0eoVMMSUbHCcNJCdv2t8B2g1GVqYgs.jpg" id="frame" width="100%"/>

            </div>
            <div class="col-md-9">
                <div class="mb-3">
                    <label for="image" class="form-label">Choose image...</label>
                    <input required onchange="preview()"  class="form-control inputImage"  type="file" id="formFile" name="image" accept="image/*">
                    <div class="invalid-feedback">
                        Please provide a valid image.
                    </div>
                </div>
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