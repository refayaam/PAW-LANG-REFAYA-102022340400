<?php
include 'connect.php';

// Check if there is data sent
if (isset($_GET[' '])) {
    $id = $_GET['id'];

    // Define query to delete data
    $delete_query ="DELETE FROM tb_book WHERE id = $id";
    
    // Run the query
    mysqli_query($conn, $delete_query);

    if (mysqli_affected_rows($conn) > 0) {
        header("location: catalog_book.php");
    } else {
        echo "<script>alert('Data failed to be deleted');</script>";
    }
}
?>