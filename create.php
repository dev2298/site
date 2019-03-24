<?php
//Create user table
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iwp_proj";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "CREATE TABLE user_info (  
user_id int(5) PRIMARY KEY AUTO_INCREMENT, 
name varchar(20) NOT NULL, 
source varchar(15) NOT NULL, 
destination varchar(15) NOT NULL, 
num_of_trav int(2), 
trans_mode varchar(10) NOT NULL, 
date DATE NOT NULL, 
time TIME, 
email varchar(20) NOT NULL, 
phone int(12), 
gender varchar(6) )";

if ($conn->query($sql) === TRUE){
	echo "<br/><br/><br/>";
	echo" Table user_info created succcessfully";
}
else{
	echo "<br/><br/><br/>";
	echo "Error in creating table: " . $conn->error;
}


//Create feedback table
$sql = "CREATE TABLE feedback (  
name varchar(20), 
email varchar(20), 
message varchar(100) )";

if ($conn->query($sql) === TRUE){
	echo "<br/><br/><br/>";
	echo" Table for Feedback Form created succcessfully";
}
else{
	echo "<br/><br/><br/>";
	echo "Error in creating feedback form table: " . $conn->error;
}

//Close
$conn->close();
?>