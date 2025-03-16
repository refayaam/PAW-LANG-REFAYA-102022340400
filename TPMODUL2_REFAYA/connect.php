<?php
// ==================1==================
// Define variables to connect to the database
$host = "localhost";

$username = "root";

$pass = "";

$db = "db_library";

$port =3306;


// ==================2==================
// Definisikan $conn untuk melakukan koneksi ke database 
// Define $conn to connect to the database
$conn = mysqli_connect($host, $username, $pass, $db, $port);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>