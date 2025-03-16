<?php
include 'connect.php';
if (isset($_GET['id'])) {

    // ==================1==================
    // Definisikan $query untuk menghapus data menggunakan $id
    // Define $query to delete data using $id
    $id = $_GET['id'];
    $query = "DELETE FROM tb_book WHERE id = '$id'";
    

    // ==================2==================
    // Eksekusi query
    // Execute the query

    mysqli_query($conn, $query);


    if (mysqli_affected_rows($conn) > 0) {
        header("location: catalog_book.php");
        exit ();
    } else {
        echo "<script>alert('Data gagal dihapus');</script>";
    }
}
?>