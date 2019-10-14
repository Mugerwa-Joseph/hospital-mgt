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
	<title>Laboratory Dashboard - HMS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right">
			<div style="padding-left:20px;padding-top:20px;">
			Welcome, <b>Laboratorist</b><br><br>
			In your Dashboard you can do the following jobs,<br><br>
			<ol>
				<li>View Test Suggestions</li><br>
				<li>Add Price for Test</li><br>
				<li>Enter Test Result</li><br>
				<li>Add & View Results</li><br>
				<li>Search Patient</li><br>
			</ol>
		</div>
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>