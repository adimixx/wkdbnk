<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="transferstyle.css">
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
	<title>Fund Transfering</title>
	<script type="text/javascript" src="../java.js"></script>
</head>

<body>
	<?php
	if (isset($_COOKIE["user"])) {
		$usernya = $_COOKIE["user"];

		include "../mysql_conn.php";


		$query = mysqli_query($ismatConn, "SELECT * FROM USER WHERE USERNAME = '$usernya'");
		$cookie = $query->fetch_assoc();
	?>
		<header>
			<table>
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
		<div class="heading">
			<h1>FUND TRANSFER</h1>
			<form action="fund.php" method="POST" name="pindah" id="contact-form">
				<div class="word">Receiver's Account Username: </div>
				<input type="text" name="receive" size="30" maxlength="30">
				<br>
				<br>
				<div class="word">Amount(RM):</div><input type="Number" name="amount" size="50" maxlength="50">
				<br>
				<br>
				<div class="word">Transaction Description:</div><input type="text" name="desc" size="50" maxlength="50">
				<br>
				<br>

				<input type="submit" name="sumit" value="Confirm" class="form-control submit">
				<input type="reset" name="tutup" value="Cancel" class="form-control submit">
			</form>
		</div>

		<br><br>
		<div class="buttongrp">
			<button type=button class="bcol" onclick="location.href = 'userdashboard.php';">
				<h3>BACK TO DASHBOARD</h3>
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