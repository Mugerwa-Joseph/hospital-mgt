<?php 
session_start();
if (empty($_SESSION['reception']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Patient - HMS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
			<a href="patients.php" style="margin-left:10px;"><button class="btnlink">View Patients</button></a><form action="search.php" method="get" style="float:right;margin-right:15px;"><input name="s" type="text" style="height:25px; width:180px;padding-left:15px;" placeholder="Search Patient By Firstname"></form><br><br>
			<?php $id = $_GET['id']; ?>
			<center>
				<form action="editpatient.php?id=<?php echo $id; ?>" method="POST">
				<?php
				require "../includes/connect.php";
				$sql = "SELECT * FROM `patient` WHERE `id`='$id'"; 
				$query = mysql_query($sql);
				while ($row = mysql_fetch_array($query)) {
					?>
				<input type="text" name="fname" class="form" value="<?php echo $row['fname']; ?>" required="required"><br><br>
				<input type="text" name="sname" class="form" value="<?php echo $row['sname']; ?>" required="required"><br><br>
				<input type="email" name="email" class="form" value="<?php echo $row['email']; ?>" required="required"><br><br>
				<input type="number" name="phone" class="form" value="<?php echo $row['phone']; ?>" required="required"><br><br>
				<input type="text" name="address" class="form" value="<?php echo $row['address']; ?>" required="required"><br><br>
					<?php
				}
				 ?>
				
				<select name="gender" class="form" required="required">
					<option value="">Choose Gender</option>
					<option>Male</option>
					<option>Female</option>
				</select><br><br>

				<select name="bloodgroup" class="form" required="required">
					<option value="">Choose Blood Group</option>
					<option>A</option>
					<option>B</option>
					<option>AB</option>
					<option>o</option>
				</select><br><br>

				<select name="birthyear" class="form" required="required">
					<option value="">Choose Birth Year</option>
					<option>2015</option>
					<option>2014</option>
					<option>2013</option>
					<option>2012</option>
					<option>2011</option>
					<option>2010</option>
					<option>2009</option>
					<option>2008</option>
					<option>2007</option>
					<option>2006</option>
					<option>2005</option>
					<option>2004</option>
					<option>2003</option>
					<option>2002</option>
					<option>2001</option>
					<option>2000</option>
					<option>1999</option>
					<option>1998</option>
					<option>1997</option>
					<option>1996</option>
					<option>1995</option>
					<option>1994</option>
					<option>1993</option>
					<option>1992</option>
					<option>1991</option>
					<option>1990</option>
					<option>1989</option>
					<option>1988</option>
					<option>1987</option>
					<option>1986</option>
					<option>1985</option>
					<option>1984</option>
					<option>1983</option>
					<option>1982</option>
					<option>1981</option>
					<option>1980</option>
					<option>1979</option>
					<option>1978</option>
					<option>1977</option>
					<option>1976</option>
					<option>1975</option>
					<option>1974</option>
					<option>1973</option>
					<option>1972</option>
					<option>1971</option>
					<option>1970</option>
				</select><br><br>
				<input type="submit" value="Update" class="btnlink" name="btn"><br><br>
			</form>
			<?php 
			extract($_POST);
			if (isset($btn) && !empty($fname) && !empty($sname) &&!empty($email)&&!empty($phone)&&!empty($address)&&!empty($gender)&&!empty($birthyear) && !empty($bloodgroup)) {
				require "../includes/reception.php";
				updatepatient();
			}
			 ?>
			</center>
			
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>