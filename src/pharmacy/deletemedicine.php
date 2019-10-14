<?php 
session_start();
if (empty($_SESSION['pharmacy']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
else{
	$id = $_GET['id'];

	require_once "../includes/connect.php";
	$sql = "DELETE FROM `medicine` WHERE `id`='$id'";
	$query = mysql_query($sql);
	if (!empty($query)) {
		header("Location: medical.php");
	}
}
?>