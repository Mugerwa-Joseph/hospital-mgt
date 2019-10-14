<div class="left"><br>
	<center>
		<a href="index.php"><button class="btnlink">Home</button></a><br><br>
		<a href="reception.php"><button class="btnlink" style="height:auto !important;">From Reception 
		<?php 
			@require "./../includes/connect.php";
			$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE `doctor_type`='$typee' AND `status`='recdoctor'";
			$query = mysql_query($sql);
			echo "(".mysql_num_rows($query).")";
		?>
		</button></a><br><br>
		<a href="laboratory.php"><button class="btnlink" style="height:auto !important;">From Laboratory 
		<?php 
			@require "./../includes/connect.php";
			$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE `doctor_type`='$typee' AND `status`='labdoctor'";
			$query = mysql_query($sql);
			echo "(".mysql_num_rows($query).")";
		?>
		</button></a><br><br>
		<a href="reports.php"><button class="btnlink">Reports</button></a><br><br>
		<a href="settings.php"><button class="btnlink">Settings</button></a><br><br>
	</center>
				
</div>