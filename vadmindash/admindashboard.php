
<!DOCTYPE html>
<html>
<head>
	<title>Admin : Wakanda Bank</title>
	<link href="admindashboard.css" rel="stylesheet">
	<script type="text/javascript" src="../java.js"></script>
</head>
<?php
if (isset($_COOKIE["admin"]))
{
	$usernya = $_COOKIE["admin"];

	include "../mysql_conn.php";


	$query = mysqli_query($ismatConn,"SELECT * FROM ADMIN WHERE USERNAME = '$usernya'");
	$cookie = $query->fetch_assoc();
	?>
<body>
<header>
	<table>
		<tr>
			<td rowspan="3"><a href="admindashboard.php"><img src="../image/mybank header.png" height="100px"></a></td>
		</tr>
		<tr>
			<td align="right"><br><br><br>Welcome : ADMIN  <?php echo $cookie["USERNAME"]; ?></td>
		</tr>
		<tr>
			<td align="right"><a href="logout.php" style="color: white;">LOG OUT</a></td>
		</tr>
	</table>
</header>

	<div class="buttongrp"><br><br>
		<button type = button class="bcol" onclick="location.href = '../signup/registration.html';">
			<img src="../image/userreg.png"><div class="btext"><h3>Register New User</h3></div>
		</button>
		<button type = button class="bcol" onclick="location.href = 'balanceenquiry.php';">
			<img src="../image/bank.png"><div class="btext"><h3>User Account Search</h3></div>
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