<?php 
session_start();
if (empty($_SESSION['laboratory']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tests - HMS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right">
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

				 <?php 
				@require '../includes/connect.php';
				$id = $_GET['id'];
				$sql = mysql_query("SELECT * FROM `medication` WHERE `id`='$id'");
				while ($row=mysql_fetch_array($sql)) {
					echo "Please Test The following Disease: <br><b>".$row['tests']."</b>";
					
				}
				 ?><br><br>
				<form action="test.php?id=<?php echo $id = $_GET['id']; ?>" method="POST">
				<input type="number" required="required" name="price" class="form" placeholder="Enter Test Price"><br><br>
				 <center><label for="results">Enter Test Results</label></center><br>

				<textarea required="required" name="results" id="results" class="form" style="height:200px; padding-left:20px;padding-top:20px;font-family:Arial;" placeholder=""></textarea>
				<br><br>
				
				<input type="submit" value="Send To Doctor" class="btnlink" name="btn"><br><br>
			</form>
			<?php 
			extract($_POST);
			if (isset($btn) && !empty($results)&&!empty($price)) {
				require "../includes/laboratory.php";
				addresult();
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