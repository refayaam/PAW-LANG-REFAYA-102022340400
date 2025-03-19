<?php
include 'connect.php';

// Check if there is data sent
if (isset($_POST["update"])) {
    $id = $_GET['$id'];
    $title = $_POST['$title'];
    $writer = $_POST['$writer'];
    $release_date = $_POST['$release_date'];    


    // Make a query to update data
    $query = "UPDATE tb_book SET
            title='$title',
            writer='$writer',
            release_date='$release_date'
            WHERE id='$id'";

    

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        header("location: catalog_book.php");
    } else {
        echo "<script>alert('Data failed to be added');</script>";
    }
}
?>