<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "DROP DATABASE iwp_proj";
if ($conn->query($sql) === TRUE) {
    echo "Database destroyed successfully";
} else {
    echo "Error in dropping database: " . $conn->error;
}
$conn->close();
?>
