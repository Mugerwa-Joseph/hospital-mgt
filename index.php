<?php
session_start();
if (!empty($_SESSION['admin'])&&!empty($_SESSION['type'])) {
	header("Location: admin/");
}
elseif (!empty($_SESSION['laboratory'])&&!empty($_SESSION['type'])) {
	header("Location: laboratory/");
}
elseif (!empty($_SESSION['doctor'])&&!empty($_SESSION['type'])) {
	header("Location: doctor/");
}
elseif (!empty($_SESSION['reception'])&&!empty($_SESSION['type'])) {
	header("Location: reception/");
}
elseif (!empty($_SESSION['bursar'])&&!empty($_SESSION['type'])) {
	header("Location: reception/");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">  
    <link rel="stylesheet" type="text/css" href="index.css">  
	<title>Hospital Management System - Login</title>
</head>
<body>
<div class="main_login">
 <div class="wrapper">
	<div class="left">
		Hospital Management System<br><br>(HMS)
		</div>
		<div class="right">
			<h3>Login Here</h3><hr>
			<form action="index.php" method="post">
				<input type="text" class="input" name="username" placeholder="Enter Username"><br><br>
				<input type="password" class="input" name="password" placeholder="Enter Password"><br><br>
				<input type="submit" class="btn" name="btn" value="Login"><br>
			</form>
	<?php
			extract($_POST);
			if (isset($btn) && !empty($username) && !empty($password)) {
				require 'includes/users.php';
			 	login();
			 } 
			 ?>
			</div>
	</div>
</div>

</body>
</html>