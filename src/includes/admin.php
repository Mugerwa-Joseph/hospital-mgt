<?php 
function users()
{
	require 'connect.php';
	$sql = "SELECT * FROM `users`";
	$query = mysql_query($sql);
	while ($row = mysql_fetch_array($query)) {
		echo "<tr height=30px'>";
		echo "<td>".$row['username']."</td>";
		echo "<td>".$row['type']."</td>";
		echo "<td><center><a href='edituser.php?name=".$row['username']."'><img src='../assets/img/glyphicons-151-edit.png' height='16px' width='17px'></a></center></td>";
		echo "<td><center><a href='deleteuser.php?name=".$row['username']."'><img src='../assets/img/glyphicons-17-bin.png' height='16px' width='12px'></a></center></td>";
	
		echo "</tr>";
	}
}


function rooms()
{
	require 'connect.php';
	$sql = "SELECT * FROM `rooms`";
	$query = mysql_query($sql);
	while ($row = mysql_fetch_array($query)) {
		echo "<tr height=30px'>";
		echo "<td>".$row['room_no']."</td>";
		echo "<td>".$row['room_name']."</td>";
		echo "<td>".$row['patientsinroom']."</td>";
		echo "<td><center><a href='editroom.php?id=".$row['room_no']."'><img src='../assets/img/glyphicons-151-edit.png' height='16px' width='17px'></a></center></td>";
		echo "<td><center><a href='deleteroom.php?id=".$row['room_no']."'><img src='../assets/img/glyphicons-17-bin.png' height='16px' width='12px'></a></center></td>";
	
		echo "</tr>";
	}
}


function adduser()
{
	$username = trim(htmlspecialchars($_POST['username']));
	$fname = trim(htmlspecialchars($_POST['fname']));
	$sname = trim(htmlspecialchars($_POST['sname']));
	$type = trim(htmlspecialchars($_POST['type']));
	$password = trim(htmlspecialchars($_POST['password']));
	$pass = sha1($password);

	$sql1 = "SELECT * FROM `users` WHERE `username`='$username'";
	$query1 = mysql_query($sql1);
	if (mysql_num_rows($query1)==0) {
		$sql = "INSERT INTO `users` VALUES ('$username','$pass','$fname','$sname','$type')";
		$query = mysql_query($sql);
		if (!empty($query)) {
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>User is Succesifully Added</b>";
		}
	}
	else{
		echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Choose Unique Name</b>";
	}

	
}


function addroom()
{
	$number = trim(htmlspecialchars($_POST['number']));
	$name = trim(htmlspecialchars($_POST['name']));

	$sql1 = "SELECT * FROM `rooms` WHERE `room_name`='$name'";
	$query1 = mysql_query($sql1);
	if (mysql_num_rows($query1)==0) {
		$sql = "INSERT INTO `rooms` VALUES ('$number','$name','0')";
		$query = mysql_query($sql);
		if (!empty($query)) {
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Room is Succesifully Added</b>";
		}
		else{
			echo "<br>".mysql_error();
		}
	}
	else{
		echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Choose Unique Name</b>";
	}

	
}


function updateuser()
{
	//$username = trim(htmlspecialchars($_POST['username']));
	$fname = trim(htmlspecialchars($_POST['fname']));
	$sname = trim(htmlspecialchars($_POST['sname']));
	$type = trim(htmlspecialchars($_POST['type']));
	$password = trim(htmlspecialchars($_POST['password']));
	$pass = sha1($password);


	$name = $_GET['name'];
	
		$sql = "UPDATE `users` SET `fname`='$fname',`sname`='$sname',`type`='$type',`password`='$pass' WHERE `username`='$name'";
		$query = mysql_query($sql);
		if (!empty($query)) {
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>User is Succesifully Updated</b>";

		}	
}


function updateroom()
{
	$name = trim(htmlspecialchars($_POST['name']));


	$id = $_GET['id'];
	
		$sql = "UPDATE `rooms` SET `room_name`='$name' WHERE `room_no`='$id'";
		$query = mysql_query($sql);
		if (!empty($query)) {
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Room is Succesifully Updated</b>";

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
		$name = $_SESSION['admin'];
		$type = $_SESSION['type'];
			
				$sql = "UPDATE `users` SET `fname`='$fname',`sname`='$sname',`password`='$pass' WHERE `username`='$name' AND `type`='$type'";
				$query = mysql_query($sql);
				if (!empty($query)) {
					echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Updated</b>";

				}	
		}
	}
	
?>