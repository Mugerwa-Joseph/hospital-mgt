<?php 
session_start();
if (empty($_SESSION['reception']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
else{
	$id = $_GET['id'];

	require_once "../includes/connect.php";
	$sql = "DELETE FROM `patient` WHERE `id`='$id'";
	$query = mysql_query($sql);
	if (!empty($query)) {
		header("Location: patients.php");
	}
}
?>