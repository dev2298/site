<html>
<head>
<style>
.c1{
	background-image:url("thanks_final.jpg");
	background-size: 100%;
	background-repeat: no-repeat;
	background-position:center;
	text-align:center;
	font-size:25px;
	font-family:verdana;
	color: black;
	
}
</style>
</head>

<body class="c1">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iwp_proj";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$name = $_POST['name'];
$mail = $_POST['emailid'];
$mssg = $_POST['subject'];


$sql = "INSERT INTO feedback ( name, email, message ) VALUES ( '$name','$mail','$mssg' )";

if ($conn->query($sql) === TRUE){
	echo "<br/><br/><br/>	";
	echo" THANK YOU!!! <br/><br/>WE WILL TRY TO INCORPORATE YOUR SUGGESTIONS AND MAKE OUR SERVICE BETTER.";
}
else{
	echo "<br/><br/><br/>";
	echo "SORRY!! WE COULDN'T ENTER YOUR DATA. WE GOT THE FOLLOWING ERROR: " . $conn->error;
}
$conn->close();
?>

</body>
</html>