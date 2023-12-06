<?php global $pdo; ?>
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
    <?php include("_header.php");
    include $_SERVER['DOCUMENT_ROOT'] . "/config/connection_database.php";
    ?>

    <h1 class="text-center mt-5 mb-5">Books</h1>

    <?php
    $n=1;
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
            <th scope="col">Name</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Select query
        $sql = "SELECT id, name, image, description FROM books";
        $stmt = $pdo->query($sql);

        // Fetch the results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Output the results
        foreach ($results as $row) {

            ?>

            <tr>
                <th scope="row"><?php echo $n++;?> </th>
                <td>
                    <img src=<?php echo $row["image"];?>
                         height="150"
                         alt="Book">
                </td>
                <td><?php echo $row["name"];?></td>
                <td>
                    <a href="#" class="btn btn-info">Show</a>
                    <form method="post" action="edit.php" style="display: inline;">
                        <input type="hidden" name="edit_book" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                    <form method="post" action="actions/delete_book.php" style="display: inline;">
                        <input type="hidden" name="delete_book" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>


<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>