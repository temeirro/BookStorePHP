<?php include $_SERVER["DOCUMENT_ROOT"]."/edit_post.php"; ?>

<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/site.css">
</head>
<body>
<div class="container py-3">
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/_header.php";
    ?>

    <h1 class="text-center">Edit book</h1>

    <form class="col-md-6 offset-md-3" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id; ?>" name="id"/>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name"
                   value="<?php echo $name ?>">
        </div>

<!--        <div class="row">-->
<!--            <div class="col-md-4">-->
<!--                <img src="/images/--><?php //echo $image; ?><!--"-->
<!--                     alt="Обране фото" width="100%">-->
<!--            </div>-->
<!--            <div class="col-md-8">-->
<!--                <div class="mb-3">-->
<!--                    <label for="image" class="form-label">Choose photo</label>-->
<!--                    <input class="form-control" type="file" id="image" name="image" accept="image/*">-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <div class="row">
            <div class="col-md-3">

                <img src="/images/<?php echo $image; ?>" onclick="triggerFileInput()" id="frame" width="100%"/>

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
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description"><?php echo $description; ?></textarea>
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>
<script src="js/validation.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/imageChange.js"></script>
</body>
</html>