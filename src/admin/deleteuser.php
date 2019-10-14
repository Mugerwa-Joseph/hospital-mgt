<?php 
session_start();
if (empty($_SESSION['admin']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
else{
	$name = $_GET['name'];

	require_once "../includes/connect.php";
	$sql = "DELETE FROM `users` WHERE `username`='$name'";
	$query = mysql_query($sql);
	if (!empty($query)) {
		header("Location: users.php");
	}
}
?>