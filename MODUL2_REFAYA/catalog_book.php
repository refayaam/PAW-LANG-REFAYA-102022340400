<?php
include 'connect.php';

// (1.) Check if there is data sent
    if (isset($_GET['search']) ? $_GET['search'] :''){
    $search = $_GET['search'];

    // (2.) Validate Input if search input is less than 3 characters
    // Hint : Use strlen()
    if (strlen('$search') > 3) {
        echo "Must more than 3 characters!";
        $search = ' ';  
    }

    // (3.) Validate Input if search input is not alphanumeric
    // Hint : Use preg_match()
    elseif(!preg_match('/([a-zA-Z0-9])/', $search))
        echo "not valid string";
        $search =' ';
    }
    else {
        $search =' ';
    }



// (4.) Make a query to show data (Hint : use query SELECT)
$query = "SELECT * FROM tb_book WHERE title LIKE '%$search%'";


// (5.) Run query (Hint : Use mysqli_query())\
$data = mysqli_query($conn, $query);


// (6.) Save the query result into an array (Hint : Use mysqli_fetch_assoc())
$books = [];
while ($row =mysqli_fetch_assoc($data)) {
    $boosk[]=$row;
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
        <h1>Book Catalog</h1>
        <!-- (7.) add GET Method -->
        <form action="catalog_book.php" class="form-inline" method="GET">
            <!-- (8.)Add Value $search -->
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" value="<?=$search?>">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
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
                        <th colspan="5" class="text-center">No Data in the Catalog</th>
                    </tr>
                <?php endif;?>
                <?php foreach ($books as $book) : ?>
                    <tr>
                        <td><?= $book['id']?></td>
                        <td><?= $book['title']?></td>
                        <td><?= $book['writer']?></td>
                        <td><?= $book['release_date']?></td>
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
