<?php
include 'connect.php';

// ==================1==================
// Definisikan query untuk mengambil semua data book
// Define the query to get all book data
$search = isset ($_GET['search']) ? $_GET['search'] :'';

$query = "SELECT * FROM tb_book WHERE title LIKE '%$search%'";


$result = mysqli_query($conn, $query);

$books = [];
while ($row = mysqli_fetch_assoc($result)) {
    $books[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <h1>book Catalog</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Writer</th>
                  <th>Year</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($books) == 0) : ?>
                    <tr>
                        <th colspan="7" class="text-center">NO DATA</th>
                    </tr>
                <?php endif;?>
                <?php foreach ($books as $book) : ?>
                    <tr>
                        <!-- ==================2================== -->
                        <!-- Buatlah kolom untuk masing-masing variabel pada $book -->
                        <!-- Create column for each variable in $book -->
                        <td><?= $book["id"] ?></td>
                        <td><?= $book["title"] ?></td>
                        <td><?= $book["writer"] ?></td>
                        <td><?= $book["publishing_year"] ?></td>
                        <td>
                            <a href="edit_book.php?id=<?=$book['id']?>" class="btn btn-primary">Edit</a>
                            <a href="delete.php?id=<?=$book['id']?>" class="btn btn-danger" >Delete</a>
                        </td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>

</body>
</html>

