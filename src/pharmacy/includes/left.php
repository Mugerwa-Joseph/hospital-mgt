<div class="left"><br>
	<center>
		<a href="index.php"><button class="btnlink">Home</button></a><br><br>
		<a href="patients.php"><button class="btnlink">Patients 
		<?php 
			@require "./../includes/connect.php";
			$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE  `status`='pharmacy'";
			$query = mysql_query($sql);
			echo "(".mysql_num_rows($query).")";
		?>
		</button></a><br><br>
		
		<a href="medical.php"><button class="btnlink">Medical</button></a><br><br>
		
		<a href="settings.php"><button class="btnlink">Settings</button></a><br><br>
	</center>
				
</div>