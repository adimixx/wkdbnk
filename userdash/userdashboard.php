<!DOCTYPE html>
<html>

<head>
	<title>Dashboard : Wakanda Bank</title>
	<link href="userdashboard.css" rel="stylesheet">
	<script type="text/javascript" src="../java.js"></script>
</head>
<?php
if (isset($_COOKIE["user"])) {
	$usernya = $_COOKIE["user"];

	include "../mysql_conn.php";


	$query = mysqli_query($ismatConn, "SELECT * FROM USER WHERE USERNAME = '$usernya'");
	$cookie = $query->fetch_assoc();
?>

	<body>
		<header>
			<table class="head">
				<tr>
					<td rowspan="3"><a href="userdashboard.php"><img src="../image/mybank header.png" height="100px"></a></td>
				</tr>
				<tr>
					<td align="right"><br><br><br>Welcome <?php echo $cookie["NAME"]; ?></td>
				</tr>
				<tr>
					<td align="right"><a href="logout.php" style="color: white;">LOG OUT</a></td>
				</tr>
			</table>
		</header>
		<div class="buttongrp"><br><br>
			<button type=button class="bcol" onclick="location.href = 'balance.php';">
				<img src="../image/but4.jpg">
				<div class="btext">
					<h3>Balance Inquiry</h3>
				</div>
			</button>
			<button type=button class="bcol" onclick="location.href = 'update.php';">
				<img src="../image/but1.jpg">
				<div class="btext">
					<h3>Update User Details</h3>
				</div>
			</button>
			<button type=button class="bcol" onclick="location.href = 'search.php';">
				<img src="../image/but3.jpg">
				<div class="btext">
					<h3>Mini Statement</h3>
				</div>
			</button>
			<button type=button class="bcol" onclick="location.href = 'transfer.php';">
				<img src="../image/but2.jpg">
				<div class="btext">
					<h3>Transfer Funds</h3>
				</div>
			</button>
		</div>
	</body>

</html>

<?php } else {
	echo "<script> getloss() </script>";
	echo "<script>location.href='../index.html';</script>";
	exit();
}
?>