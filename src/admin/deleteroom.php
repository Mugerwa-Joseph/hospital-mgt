<?php 
session_start();
if (empty($_SESSION['admin']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
else{
	$id = $_GET['id'];

	require_once "../includes/connect.php";
	$sql = "DELETE FROM `rooms` WHERE `room_no`='$id'";
	$query = mysql_query($sql);
	if (!empty($query)) {
		header("Location: rooms.php");
	}
}
?>