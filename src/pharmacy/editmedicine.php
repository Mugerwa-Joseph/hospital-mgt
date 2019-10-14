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
	<title>Edit Medicine - HMS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
			<a href="medical.php" style="margin-left:10px;"><button class="btnlink">View Medicine</button></a><form action="searchmedicine.php" method="get" style="float:right;margin-right:15px;"><input type="text" style="height:25px; width:180px;padding-left:15px;" name="s" placeholder="Search Medicine By Name"></form><br><br>
			<center>
				<form action="editmedicine.php?id=<?php echo $id = $_GET['id']; ?>" method="POST">
				<input type="text" name="name" class="form" value="
				<?php require "../includes/connect.php";
				$id = $_GET['id'];
				$sql = mysql_query("SELECT * FROM `medicine` WHERE `id`='$id'");
				while ($row = mysql_fetch_array($sql)) {
				 	echo trim(htmlspecialchars($row['medicine_name']));
				 } ?>
				" required="required"><br><br>
				<input type="text" name="price" class="form" value="
				<?php @require "../includes/connect.php";
				$id = $_GET['id'];
				$sql = mysql_query("SELECT * FROM `medicine` WHERE `id`='$id'");
				while ($row = mysql_fetch_array($sql)) 
				{
				 	echo $row['price'];
				 }
				 ?>
				 " required="required"><br><br>
				<input type="submit" value="Update" class="btnlink" name="btn">
			</form>
			<?php 
			extract($_POST);
			if (isset($btn) && !empty($name) && !empty($price)) {
				require "../includes/pharmacy.php";
				updatemedicines();
			}
			 ?>
			</center>
			
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>