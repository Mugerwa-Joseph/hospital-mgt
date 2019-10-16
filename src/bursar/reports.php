<?php 
session_start();
if (empty($_SESSION['bursar']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bursar Dashboard - HMS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	<style type="text/css">
	.statistics{
		width:70%;
		height: 230px;
		margin: 0 auto;
		margin-top: 20px;
		border: 1px solid #000;
		font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
		font-size:16px;
		font-weight:400;
		line-height:1.42857143;
		}
		.statistics p b{
		margin-left: 35%;
		}
		</style>
</head>
<body>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right">
		<div class="statistics">
			<h4 align="center">Financial Statistics</h4><hr>
			<p><b>Today:</b> <?php
			require_once "../includes/connect.php";
			$day = date('d');
			$month = date('m');
			$year = date('Y');
				
				$sql = "SELECT sum(doctor_price) AS aa FROM `medication` WHERE `date`='$day' AND `month`='$month' AND `year`='$year'";
				$result = mysql_query($sql);
				while ($row = mysql_fetch_array($result)) {
					$sql1 = mysql_query("SELECT sum(test_price) AS bb FROM `medication` WHERE `date`='$day' AND `month`='$month' AND `year`='$year'");
					while ($row1 = mysql_fetch_array($sql1)) {
						$sql2 =mysql_query("SELECT sum(medical_price) AS cc FROM `medication` WHERE `date`='$day' AND `month`='$month' AND `year`='$year'");
						while ($row2 = mysql_fetch_assoc($sql2)) {
							$all = $row['aa'] + $row1['bb'] + $row2['cc'];
							echo number_format($all);
						}
					
					}

					
				}
			?> Ugx</p>
			<p><b>This Month:</b> <?php
			require_once "../includes/connect.php";
			$day = date('d');
			$month = date('m');
			$year = date('Y');
				
				$sql = "SELECT sum(doctor_price) AS aa FROM `medication` WHERE `month`='$month' AND `year`='$year'";
				$result = mysql_query($sql);
				while ($row = mysql_fetch_array($result)) {
					$sql1 = mysql_query("SELECT sum(test_price) AS bb FROM `medication` WHERE `month`='$month' AND `year`='$year'");
					while ($row1 = mysql_fetch_array($sql1)) {
						$sql2 =mysql_query("SELECT sum(medical_price) AS cc FROM `medication` WHERE `month`='$month' AND `year`='$year'");
						while ($row2 = mysql_fetch_assoc($sql2)) {
							$all = $row['aa'] + $row1['bb'] + $row2['cc'];
							echo number_format($all);
						}
					
					}

					
				}
			?></p>
			<p><b>This Year:</b> <?php
			require_once "../includes/connect.php";
			$day = date('d');
			$month = date('m');
			$year = date('Y');
				
				$sql = "SELECT sum(doctor_price) AS aa FROM `medication` WHERE  `year`='$year'";
				$result = mysql_query($sql);
				while ($row = mysql_fetch_array($result)) {
					$sql1 = mysql_query("SELECT sum(test_price) AS bb FROM `medication` WHERE `year`='$year'");
					while ($row1 = mysql_fetch_array($sql1)) {
						$sql2 =mysql_query("SELECT sum(medical_price) AS cc FROM `medication` WHERE `year`='$year'");
						while ($row2 = mysql_fetch_assoc($sql2)) {
							$all = $row['aa'] + $row1['bb'] + $row2['cc'];
							echo number_format($all);
						}
					
					}

					
				}
			?> Ugx</p>
		</div>
		<center><br>
			<form action="reports.php" method="POST">
			<select name="day" class="form2">
			<option value="">Choose Day</option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
			<option>11</option>
			<option>12</option>
			<option>13</option>
			<option>14</option>
			<option>15</option>
			<option>16</option>
			<option>17</option>
			<option>18</option>
			<option>19</option>
			<option>20</option>
			<option>21</option>
			<option>22</option>
			<option>23</option>
			<option>24</option>
			<option>25</option>
			<option>26</option>
			<option>27</option>
			<option>28</option>
			<option>29</option>
			<option>30</option>
			<option>31</option>
		</select>&nbsp;&nbsp;<select name="month" class="form2">
			<option value="">Choose Month</option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
			<option>11</option>
			<option>12</option>
		</select>&nbsp;&nbsp;<select name="year" class="form2">
			<option value="">Choose Year</option>
			<option>2015</option>
			<option>2016</option>
			<option>2017</option>
			<option>2018</option>
			<option>2019</option>
			<option>2020</option>
			</select>&nbsp;&nbsp;<input type="submit" value="View Report" class="btnlink">
		</form><br>
		<?php
		if ($_SERVER['REQUEST_METHOD']=="POST") {
			require_once "../includes/connect.php";

			$day = trim(htmlspecialchars($_POST['day']));
			$month = trim(htmlspecialchars($_POST['month']));
			$year = trim(htmlspecialchars($_POST['year']));
			

			if (!empty($day) AND !empty($month) AND !empty($year)) {?>
			<br><table class="table">
			<thead>
				<tr class="info">
					<th>Patient Id</th>
					<th>Doctor Type</th>
					<th>Doctor Price</th>
					<th>Test Price</th>
					<th>Medical Price</th>
				</tr>	
			</thead>
			<tbody>
			<?php
				$sql = "SELECT * FROM `medication` WHERE `date`='$day' AND `month`='$month' AND `year`='$year' ORDER BY `patient_id` DESC";
				 	$result = mysql_query($sql);
				 	if (mysql_num_rows($result)> 0) {
				 		while ($row = mysql_fetch_array($result)) {
				 			echo "
				 			<tr>
				 				<td>".$row['patient_id']."</td>
				 				<td>".$row['doctor_type']."</td>
				 				<td>".$row['doctor_price']."</td>
				 				<td>".$row['test_price']."</td>
				 				<td>".$row['medical_price']."</td>
				 			</tr>
				 			";
					}
				}
				else{
					echo "<br><b>No data Available</b>";
				}
				?>
				</tbody>
				</table>
				<h3 align="center"><?php echo $day.'/'.$month.'/'.$year; ?> Sales:
				<?php
				$sql = "SELECT sum(doctor_price) AS aa FROM `medication` WHERE `date`='$day' AND `month`='$month' AND `year`='$year'";
				$result = mysql_query($sql);
				while ($row = mysql_fetch_array($result)) {
					$sql1 = mysql_query("SELECT sum(test_price) AS bb FROM `medication` WHERE `date`='$day' AND `month`='$month' AND `year`='$year'");
					while ($row1 = mysql_fetch_array($sql1)) {
						$sql2 =mysql_query("SELECT sum(medical_price) AS cc FROM `medication` WHERE `date`='$day' AND `month`='$month' AND `year`='$year'");
						while ($row2 = mysql_fetch_assoc($sql2)) {
							$all = $row['aa'] + $row1['bb'] + $row2['cc'];
							echo "is: <b>".number_format($all);
						}
					
					}

					
				}
			?>
			 Tsh
				</b></h3>
				<?php
			}
			else
			{
				echo "<center><br><b>All Input Required</b></center>";
			}
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