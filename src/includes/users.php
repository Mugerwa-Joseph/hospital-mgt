<?php 
function login()
{
	require_once 'connect.php';
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$pass = sha1($password);
	$sql = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$pass'";
	$query = mysql_query($sql);
	$row = mysql_num_rows($query);
	if ($row == 0) {
		echo "<b style='font-size:12px;'>Wrong Username/Password Combination</b>";
	}
	elseif ($row == 1) {
		$fetch = mysql_fetch_array($query);
		$type = $fetch['type'];
		$name = $fetch['username'];
		if ($type == "Admin") {
			@session_start();
			$_SESSION['type'] = $type;
			$_SESSION['admin'] = $name;
			header("Location: admin/");
		}
		elseif ($type=="Doctor" OR $type=="NormalDoctor" OR $type=="DentalDoctor" OR $type=="WomenDoctor") {
			@session_start();
			$_SESSION['type'] = $type;
			$_SESSION['doctor'] = $name;
			header("Location: doctor/");
		}
		elseif ($type=="Reception") {
			@session_start();
			$_SESSION['type'] = $type;
			$_SESSION['reception'] = $name;
			header("Location: reception/");
		}
		elseif ($type=="Laboratory") {
			@session_start();
			$_SESSION['type'] = $type;
			$_SESSION['laboratory'] = $name;
			header("Location: laboratory/");
		}
		elseif ($type=="Pharmacy") {
			@session_start();
			$_SESSION['type'] = $type;
			$_SESSION['pharmacy'] = $name;
			header("Location: pharmacy/");
		}
		elseif ($type=="Bursar") {
			@session_start();
			$_SESSION['type'] = $type;
			$_SESSION['bursar'] = $name;
			header("Location: bursar/");
		}
		else{
			echo "<b>Error</b>";
		}
	}
	else{
		echo "<b>Error</b>";
	}
}

function logout()
{
	@session_start();
	session_destroy();
	header("Location: ./index.php");
}


function admindetails()
{
	@session_start();
	$type = $_SESSION['type'];
	$username = $_SESSION['admin'];
	$sql = "SELECT * FROM `users` WHERE `username`='$username' AND `type`='$type'";
	$query = mysql_query($sql);
	while ($row =mysql_fetch_array($query)) {
		echo "Welcome, <i>".$row['fname']." ".$row['sname']."</i> (<a href='../logout.php'>Logout</a>)";
	}
}

function bursardetails()
{
	@session_start();
	$type = $_SESSION['type'];
	$username = $_SESSION['bursar'];
	$sql = "SELECT * FROM `users` WHERE `username`='$username' AND `type`='$type'";
	$query = mysql_query($sql);
	while ($row =mysql_fetch_array($query)) {
		echo "Welcome, <i>".$row['fname']." ".$row['sname']."</i> (<a href='../logout.php'>Logout</a>)";
	}
}


function doctordetails()
{
	@session_start();
	$type = $_SESSION['type'];
	$username = $_SESSION['doctor'];
	$sql = "SELECT * FROM `users` WHERE `username`='$username' AND `type`='$type'";
	$query = mysql_query($sql);
	while ($row =mysql_fetch_array($query)) {
		echo "Welcome, <i>".$row['fname']." ".$row['sname']."</i> (<a href='../logout.php'>Logout</a>)";
	}
}

function receptiondetails()
{
	@session_start();
	$type = $_SESSION['type'];
	$username = $_SESSION['reception'];
	$sql = "SELECT * FROM `users` WHERE `username`='$username' AND `type`='$type'";
	$query = mysql_query($sql);
	while ($row =mysql_fetch_array($query)) {
		echo "Welcome, <i>".$row['fname']." ".$row['sname']."</i> (<a href='../logout.php'>Logout</a>)";
	}
}

function laboratorydetails()
{
	@session_start();
	$type = $_SESSION['type'];
	$username = $_SESSION['laboratory'];
	$sql = "SELECT * FROM `users` WHERE `username`='$username' AND `type`='$type'";
	$query = mysql_query($sql);
	while ($row =mysql_fetch_array($query)) {
		echo "Welcome, <i>".$row['fname']." ".$row['sname']."</i> (<a href='../logout.php'>Logout</a>)";
	}
}

function pharmacydetails()
{
	@session_start();
	$type = $_SESSION['type'];
	$username = $_SESSION['pharmacy'];
	$sql = "SELECT * FROM `users` WHERE `username`='$username' AND `type`='$type'";
	$query = mysql_query($sql);
	while ($row =mysql_fetch_array($query)) {
		echo "Welcome, <i>".$row['fname']." ".$row['sname']."</i> (<a href='../logout.php'>Logout</a>)";
	}
}

?>
