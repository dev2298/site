<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>
.c1{
	background-image:url("alone.jpg");
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

<body class="c1","h1">

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

$name = $_POST['NAME'];
$source = $_POST['FROM'];
$dest = $_POST['CheckOut'];
$traveller = $_POST['numtraveller'];
$mode = $_POST['cars'];
$date = $_POST['date'];
$time = $_POST['time'];
$email = $_POST['email'];
$phone = $_POST['mobile'];
//Close Connection
?>
<div class="limiter">
	<?php $sql = "INSERT INTO user_info ( name, source, destination, num_of_trav, trans_mode, date, time, email, phone ) VALUES ( '$name','$source','$dest','$traveller','$mode','$date',
	'$time','$email','$phone' )";


	if ($conn->query($sql) === TRUE){
		echo "<br/><br/><br/>	";
		echo"THANK YOU!!! YOUR DATA HAS BEEN ENTERED SUCCESSFULLY.<br/><br/><br/>
		WE HAVE DISPLAYED YOUR INFORMATION, FOLLOWED BY THAT OF THOSE, WHO HAVE SIMILAR TRAVEL TIMINGS TO YOU
		ON THE SAME DATE AND BETWEEN SAME LOCATIONS AT THE MOMENT.
		<br/><br/>WE WILL LET YOU KNOW IF WE FIND MORE SUITABLE TRAVEL PARTNERS FOR YOU.";
	}
	else{
		echo "<br/><br/><br/>";
		echo "SORRY!! WE COULDN'T ENTER YOUR DATA. WE GOT THE FOLLOWING ERROR: " . $conn->error;                             //AND ABS(TMEDIFF($time,time)) < 30
	}


	//Now to display similar datas
	echo "<br/><br/><br/>";
 ?>
	<div class="container-table100">
		<div class="wrap-table100">
			<div class="table100 ver1">
				<div class="table100-firstcol">
					<table>
						<thead>
							<tr class="row100 head">
								<th class="cell100 column1">Name</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT name, trans_mode, time, email, phone FROM user_info WHERE date='$date' AND source='$source' AND destination='$dest' AND TIME_TO_SEC('$time') - TIME_TO_SEC(time) < 1801 ";
							$result = $conn->query($sql);
							if ($result->num_rows>0) {
							    // output data of each row
							    while($row = $result->fetch_assoc()) {
							        echo "<tr class='row100 body'>
												<td class='cell100 column1'>".$row["name"]."</td>
											</tr>";
									}
							} else {
							    echo "No matches found as of now. We will intimate you later if we find anyone!!!";
							}
							?>
						</tbody>
					</table>
				</div>

				<div class="wrap-table100-nextcols js-pscroll">
					<div class="table100-nextcols">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column2">Travel Mode</th>
									<th class="cell100 column3">Time</th>
									<th class="cell100 column4">Email</th>
									<th class="cell100 column5">Contact Number</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT name, trans_mode, time, email, phone FROM user_info WHERE date='$date' AND source='$source' AND destination='$dest' AND TIME_TO_SEC('$time') - TIME_TO_SEC(time) < 1801 ";
								$result = $conn->query($sql);
								if ($result->num_rows>0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
												echo "<tr class='row100 body'>
													<td class='cell100 column2'>".$row['trans_mode']."</td>
													<td class='cell100 column3'>".$row['time']."</td>
													<td class='cell100 column4'>".$row['email']."</td>
													<td class='cell100 column4'>".$row['phone']."</td>
												</tr>";
										}
								} else {
										echo "No matches found as of now. We will intimate you later if we find anyone!!!";
								}
								?>
							</tbody>
							</table>
							</div>
							</div>
							</div>
							</div>
							</div>
							</div>


							<!--===============================================================================================-->
							<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
							<!--===============================================================================================-->
							<script src="vendor/bootstrap/js/popper.js"></script>
							<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
							<!--===============================================================================================-->
							<script src="vendor/select2/select2.min.js"></script>
							<!--===============================================================================================-->
							<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
							<script>
							$('.js-pscroll').each(function(){
							var ps = new PerfectScrollbar(this);

							$(window).on('resize', function(){
							ps.update();
							})

							$(this).on('ps-x-reach-start', function(){
							$(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
							});

							$(this).on('ps-scroll-x', function(){
							$(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
							});

							});




							</script>
							<!--===============================================================================================-->
							<script src="js/main.js"></script>


</body>
</html>
