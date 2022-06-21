<!DOCTYPE html>
<html>
<head>
	<title>Dashboard : Wakanda Bank</title>
	<link href="userdashboard.css" rel="stylesheet">
	<script type="text/javascript" src="../java.js"></script>

</head>
<?php
if (isset($_COOKIE["user"]))
{
	$usernya = $_COOKIE["user"];

	include "../mysql_conn.php";

	$query = mysqli_query($ismatConn,"SELECT * FROM USER WHERE USERNAME = '$usernya'");
	$cookie = $query->fetch_assoc();
	?>
<body class="bal">
<header>
	<table>
		<tr>
			<td rowspan="3"><a href="userdashboard.php"><img src="../image/mybank header.png" height="100px"></a></td>
		</tr>
		<tr>
			<td align="right"><br><br><br>Welcome <?php echo $cookie["NAME"]; ?></td>
		</tr>
		<tr>
			<td align="right"><a href="logout.php">LOG OUT</a></td>
		</tr>
	</table>
</header>

<table style="text-align: center;">
	<tr>
		<td><h1>YOUR ACCOUNT BALANCE :</h1></td>
	</tr>
	<tr>
		<td><h2> <?php echo "RM ". $cookie["BALANCE"];?></h2></td>
	</tr>
	<tr>
		<td><h3>ACCOUNT TYPE : <?php echo $cookie["ACCTYPE"];?></h3></td>
	</tr>
</table>

	<br><br>
	<div class="buttongrp">
		<button type = button class="bcol" onclick="location.href = 'userdashboard.php';"><h3>BACK TO DASHBOARD</h3>
		</button>
	</div>
</body>
</html>

<?php }

else
	{
		echo "<script> getloss() </script>";
		echo "<script>location.href='../index.html';</script>";
		exit();
	}	
?>