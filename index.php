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
<div class="container">
    <?php include("_header.php"); ?>
    <h1 class="text-center mt-5 mb-5">Products</h1>

    <?php
    $n=2;
    $list = array();
    $list[0] = [
        "id"=>1,
        "name"=>"Book",
        "image"=>"https://nebopublishing.com.ua/files/books/Isbn_978_617_7914_62_3_0-0.jpg"
    ];
    $list[1] = [
        "id"=>2,
        "name"=>"Book",
        "image"=>"https://nebopublishing.com.ua/files/books/ISBN_978_617_7914_43_2_0-0.jpg"
    ]
    ?>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Category</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php for($i=0;$i<$n;$i++) {

            ?>
            <tr>
                <th scope="row"> <?php echo $list[$i]["id"];?> </th>
                <td>
                    <img src=<?php echo $list[$i]["image"];?>
                         height="150"
                         alt="Book">
                </td>
                <td><?php echo $list[$i]["name"];?></td>
                <td>
                    <a href="#" class="btn btn-info">Show</a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>


<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>