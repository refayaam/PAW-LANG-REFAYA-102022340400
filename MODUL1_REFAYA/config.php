<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nim = $_POST['nim'];

    if (!empty($name) && !empty($email) && !empty($nim)) {
        $sql = "INSERT INTO students (name, email, nim) VALUES ('$name', '$email', '$nim')";

        if ($conn->query($sql) === TRUE) {
            echo "<h1>Registration Successful!</h1>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<h1>Error: All fields are required!</h1>";
    }
    $conn->close();
} else {
    echo "<h1>Error: Invalid request!</h1>";
}
?>