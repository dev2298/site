<html>
<head>
<style>
.c1{
	background-image:url("thanks_final.jpg");
	background-size: 100%;
	background-repeat: no-repeat;
	background-position:center;
	text-align:center;
	font-size:20px;
	font-family:verdana;
	color: black;
	font-weight:bold;	
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

//Take data from front_end file and insert it into Database Tables.

$date='2018-01-01';
$time='01:14:21';





//Now to display similar datas
echo "<br/><br/><br/>";

$sql = "SELECT name FROM user_info WHERE (DATEDIFF(MINUTE, '$time' , time))<00:30:00 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. "<br>";
    }
} else {
    echo "No matches found as of now. We will intimate you later if we find anyone!!!";
}

//Close Connection
$conn->close();
?>

</body>
</html>