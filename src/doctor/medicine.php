<?php 
session_start();
if (empty($_SESSION['doctor']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Suggest Medicine - HMS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
			<br>
			<br>
			<center>
			<?php 
				require '../includes/connect.php';
				$id = $_GET['id'];
				$sql = mysql_query("SELECT * FROM `medication` WHERE `id`='$id'");
				while ($row=mysql_fetch_array($sql)) {
					$idd = $row['patient_id'];
					
					$sql1 = mysql_query("SELECT * FROM `patient` WHERE `id`='$idd'");
					while ($roww = mysql_fetch_array($sql1)) {
						echo "<h4 align='center'><u>".$roww['fname']." ".$roww['sname']."</u></h4>";
					}
				}
				 ?><br>
				 <h5><u>The Following are Results</u></h5>
				 <?php 
				require '../includes/connect.php';
				$id = $_GET['id'];
				$sql = mysql_query("SELECT * FROM `medication` WHERE `id`='$id'");
				while ($row=mysql_fetch_array($sql)) {
					echo "<b>".$idd = $row['test_results']."</b><br><br><br>";
				}
					
				 ?>
				<form action="medicine.php?id=<?php echo $id = $_GET['id']; ?>" method="POST">
				
				 <center><label for="medicine">Enter Medicine</label></center><br>

				<textarea required="required" name="medicine" id="medicine" class="form" style="height:200px; padding-left:20px;padding-top:20px;font-family:Arial;" placeholder=""></textarea>
				<br><br>
				
				<input type="submit" value="Send To Pharmacy" class="btnlink" name="btn"><br><br>
			</form>
			<?php 
			extract($_POST);
			if (isset($btn) && !empty($medicine)) {
				require "../includes/doctor.php";
				addmedicine();
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