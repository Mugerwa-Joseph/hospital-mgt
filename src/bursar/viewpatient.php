<?php 
session_start();
if (empty($_SESSION['bursar']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Patients - HMS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
			<a href="addpatient.php" style="margin-left:10px;" style="float:left;"><button class="btnlink">Add Patient</button></a><form action="search.php" method="get" style="float:right;margin-right:15px;"><input type="text" style="height:25px; width:180px;padding-left:15px;" name="s" placeholder="Search Patient By ID"></form><br>
			<table class="table" style="width:80% !important;">
			<?php 
				require '../includes/reception.php';
				viewpatient();
				 ?>
			</table><br><br>
			<center>
				<form action="viewpatient.php?id=<?php echo $id = $_GET['id']; ?>" method="post">
				<select name="doctor" class="form" required="required">
					<option value="">Choose Doctor</option>
					<option>NormalDoctor</option>
					<option>DentalDoctor</option>
					<option>WomenDoctor</option>
				</select><br><br>
				<input type="submit" name="btn" value="Assign To Doctor" class="btnlink">
			</form><br>
			<?php
			extract($_POST);
			if (isset($btn)&&!empty($doctor)) {
			 	assigntodoctor();
			 } 
			 ?>
			 <br><br>
			</center>
			
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>