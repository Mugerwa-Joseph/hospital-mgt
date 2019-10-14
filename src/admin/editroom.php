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
	<title>Edit Room - HMS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
			<a href="rooms.php" style="margin-left:10px;"><button class="btnlink">View Rooms</button></a><br>
			<?php

			$id = $_GET['id'];

			?>
			<center>
				<form action="editroom.php?id=<?php echo $id; ?>" method="POST">
				<input type="text" name="number" class="form" value="<?php echo $id; ?>" required="required" disabled="disabled"><br><br>
				
				
				<?php 
				require_once '../includes/connect.php';
				$sql = "SELECT * FROM `rooms` WHERE `room_no`='$id'";
				$query = mysql_query($sql);
				while ($row = mysql_fetch_array($query)) {
					?>
					<input type="text" name="name" class="form" value="<?php echo $row['room_name']; ?>" required="required"><br><br>
					<?php
				}
				 ?>
				<input type="submit" value="Update" class="btnlink" name="btn">
			</form>
			<?php 
			extract($_POST);
			if (isset($btn) && !empty($name)) {
				require "../includes/admin.php";
				updateroom();
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