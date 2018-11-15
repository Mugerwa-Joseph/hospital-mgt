<?php 
session_start();
if (empty($_SESSION['admin']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Dashboard - HMS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	<style type="text/css">
	.total{
		height: 120px;
		width: 170px;
		border: 1px solid #408080;
		margin-top: 25px;
		margin-left: 40px;
		float: left;
		text-align: center;
		padding-top: 20px;
	}
	</style>
</head>
<body>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right">
			<div class="total">
				<b>Total Receptionist</b><hr>
				<?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM `users` WHERE `type`='Reception'";
				$query = mysql_query($sql);
				echo "<br><b style='color:#408080; font-family:Arial; font-size:35px;'>".$row = mysql_num_rows($query)."</b>"; 
				 ?>
			</div>

			<div class="total">
				<b>Total Doctors</b><hr>
				<?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM `users` WHERE `type`='NormalDoctor' OR `type`='DentalDoctor' OR `type`='WomenDoctor'";
				
				$query = mysql_query($sql);
				echo "<br><b style='color:#408080; font-family:Arial; font-size:35px;'>".$row = mysql_num_rows($query)."</b>"; 
				 ?>
			</div>

			<div class="total">
				<b>Total Laboratorist</b><hr>
				<?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM `users` WHERE `type`='Laboratory'";
				$query = mysql_query($sql);
				echo "<br><b style='color:#408080; font-family:Arial; font-size:35px;'>".$row = mysql_num_rows($query)."</b>"; 
				 ?>
			</div><br><br>
			<div class="total">
				<b>Total Admins</b><hr>
				<?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM `users` WHERE `type`='Admin'";
				
				$query = mysql_query($sql);
				echo "<br><b style='color:#408080; font-family:Arial; font-size:35px;'>".$row = mysql_num_rows($query)."</b>"; 
				 ?>
			</div>

			<div class="total">
				<b>Total Pharmatist</b><hr>
				<?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM `users` WHERE `type`='Pharmacy'";
				$query = mysql_query($sql);
				echo "<br><b style='color:#408080; font-family:Arial; font-size:35px;'>".$row = mysql_num_rows($query)."</b>"; 
				 ?>
			</div>

			<div class="total">
				<b>Total Bursar</b><hr>
				<?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM `users` WHERE `type`='Bursar'";
				$query = mysql_query($sql);
				echo "<br><b style='color:#408080; font-family:Arial; font-size:35px;'>".$row = mysql_num_rows($query)."</b>"; 
				 ?>
			</div>
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>