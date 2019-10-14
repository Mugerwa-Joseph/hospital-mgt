<?php 
session_start();
if (empty($_SESSION['pharmacy']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Search Medicine - HMS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
			<a href="medical.php" style="margin-left:10px;"><button class="btnlink">View Medicine</button></a><form action="searchmedicine.php" method="get" style="float:right;margin-right:15px;"><input type="text" style="height:25px; width:180px;padding-left:15px;" name="s" placeholder="Search Patient By Firstname"></form><br>
			<br><table class="table">
				<tr>
					<th>Madicine Name</th>
					<th>Price</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php 
				require '../includes/pharmacy.php';
				searchmedicine();
				 ?>
			</table>
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>