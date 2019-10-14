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
	<title>Pharmacy Dashboard - HMS</title>
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
			Welcome, <b>Pharmatist</b><br><br>
			In your Dashboard you can do the following jobs,<br><br>
			<ol>
				<li>View Suggested Medicine</li><br>
				<li>Add Medicine</li><br>
				<li>Edit Medicine</li><br>
				<li>Delete Medicine</li><br>
				<li>Add Medicine Price</li><br>
				<li>Search Medicine</li><br>
			</ol>
		</div>
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>