<?php
$con = mysql_connect('localhost','root','');
if (empty($con)) {
 	echo mysql_error();
 } 
 $data = mysql_select_db("hospital");
 if (empty($data)) {
 	echo mysql_error();
 }
?>