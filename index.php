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
                    <img src=/images/<?php echo $row["image"];?>
                         height="150"
                         alt="Book">
                </td>
                <td><?php echo $row["name"];?></td>
                <td>
                    <a href="#" class="btn btn-info">Show</a>
                    <a href="/edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-dark">Edit</a>
                    <a href="#" class="btn btn-danger" data-delete="<?php echo $row["id"]; ?>">Delete</a>


                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="modalDelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>You want to delete this book</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="btnDeleteConfirm">Delete</button>
                <!-- Additional buttons if needed -->
            </div>
        </div>
    </div>
</div>


<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/axios.min.js"></script>
<script>
    var myModal = new bootstrap.Modal(document.getElementById('modalDelete'));
    let id = 0;
    const list = document.querySelectorAll('[data-delete]');
    const elementsArray = Array.from(list);
    elementsArray.forEach(item => {
        item.addEventListener("click", (e) => {
            e.preventDefault();
            id = e.target.dataset.delete;
            myModal.show();

            //axios.post("");
            //console.log("delete item", id);
            //e.target.closest("tr").remove();
        });
    });
    document.getElementById("btnDeleteConfirm").addEventListener("click", async () => {
        try {
            const response = await axios.delete(`/delete_post.php?id=${id}`);

            if (response.status === 200) {
                var item = document.querySelector('[data-delete="'+id+'"]');
                item.closest("tr").remove();
            } else {
                console.error("Failed to delete item");
            }
        } catch (error) {
            console.error("Error:", error);
        }
        finally {
            myModal.hide();
        }
    });
</script>
</body>
</html>