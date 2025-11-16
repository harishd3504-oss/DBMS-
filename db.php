<?php
$servername = "localhost";
$username = "root";
$password = ""; // Default XAMPP MySQL password is empty
$database = "library_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>