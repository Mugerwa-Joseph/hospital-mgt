<?php 

function patients()
{
			//$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE  `status`='laboratory'";
	$query = mysql_query($sql);
	while ($row = mysql_fetch_array($query)) {
		$ido = $row['patient_id'];
		$sql2 = "SELECT * FROM `patient` WHERE `id`='$ido'";
		$query2 = mysql_query($sql2);
		while ($row2 = mysql_fetch_array($query2)) {
			echo "<tr height=30px'>";
			echo "<td>P-".$row2['id']."</td>";
			echo "<td>".$row2['fname']."</td>";
			echo "<td>".$row2['sname']."</td>";
			echo "<td>".$row2['sex']."</td>";
			echo "<td><center><a href='test.php?id=".$row['id']."'>view</a></center></td>";
			echo "</tr>";
		}
		
	}
}

function resultpatients()
{
			//$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE  `status`='labdoctor' OR `status`='pharmacy' OR `status`='finish'";
	$query = mysql_query($sql);
	while ($row = mysql_fetch_array($query)) {
		$ido = $row['patient_id'];
		//$result = $row['patient_id'];
		$sql2 = "SELECT * FROM `patient` WHERE `id`='$ido'";
		$query2 = mysql_query($sql2);
		while ($row2 = mysql_fetch_array($query2)) {
			echo "<tr height=30px'>";
			echo "<td>P-".$row2['id']."</td>";
			echo "<td>".$row2['fname']." ".$row2['sname']."</td>";
			echo "<td>".$row2['sex']."</td>";
			echo "<td>".$row['date']." - ".$row['month']." - ".$row['year']."</td>";
			echo "<td>".$row['test_results']."</td>";
			echo "</tr>";
		}
		
	}
}

function addresult()
{
			$results = trim(htmlspecialchars($_POST['results']));
			$price = trim(htmlspecialchars($_POST['price']));
			if (!empty($results)) {
				$id = $_GET['id'];
				@require_once "connect.php";

				$sql = "UPDATE `medication` SET `status`='labdoctor',`test_results`='$results',`test_price`='$price' WHERE `id`='$id'";
				$query = mysql_query($sql);
				if (!empty($query)) {
					echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Sent</b><br><br>";
				}
			}
}

function searchpatients()
{
			require 'connect.php';
			$fname = $_GET['s'];
			$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE `status`='laboratory'";
			$query = mysql_query($sql);
			while ($row = mysql_fetch_array($query)) {
				$ido = $row['patient_id'];
				$sql2 = "SELECT * FROM `patient` WHERE `id`='$ido' AND `id` LIKE '%$fname%'";
				$query2 = mysql_query($sql2);
		while ($row2 = mysql_fetch_array($query2)) {
			echo "<tr height=30px'>";
			echo "<td>P-".$row2['id']."</td>";
			echo "<td>".$row2['fname']."</td>";
			echo "<td>".$row2['sname']."</td>";
			echo "<td>".$row2['sex']."</td>";
			echo "<td><center><a href='test.php?id=".$row['id']."'>view</a></center></td>";
			echo "</tr>";
		}
		
	}
}


function settings()
{
	//$username = trim(htmlspecialchars($_POST['username']));
	$fname = trim(htmlspecialchars($_POST['fname']));
	$sname = trim(htmlspecialchars($_POST['sname']));
	$password2 = trim(htmlspecialchars($_POST['password2']));
	$password = trim(htmlspecialchars($_POST['password']));
	if ($password != $password) {
		echo "<br><b style='color:red;font-size:14px;font-family:Arial;'>Password Must Match</b>";
	}
	else{
		$pass = sha1($password);
		$name = $_SESSION['laboratory'];
		$type = $_SESSION['type'];
			
				$sql = "UPDATE `users` SET `fname`='$fname',`sname`='$sname',`password`='$pass' WHERE `username`='$name' AND `type`='$type'";
				$query = mysql_query($sql);
				if (!empty($query)) {
					echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Updated</b>";

				}	
		}
	}

?>