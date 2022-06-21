<!DOCTYPE html>
<html>

<head>
	<title>E-Statement : Wakanda Bank</title>
	<link href="mini.css" rel="stylesheet">
	<script type="text/javascript" src="../java.js"></script>
</head>
<?php
if (isset($_COOKIE["user"])) {
	$usernya = $_COOKIE["user"];

	include "../mysql_conn.php";
	$conn = $ismatConn;
	$query = mysqli_query($conn, "SELECT * FROM USER WHERE USERNAME = '$usernya'");
	$cookie = $query->fetch_assoc();
?>

	<body>

	<?php
	if (isset($_COOKIE["user"])) {
		$a = $cookie["USERNAME"];

		$query2 = mysqli_query($conn, "SELECT * FROM STATEMENT WHERE USERNAME = '$a'");

		echo "<h3> <center> E-Statement <center> </h3>";
		echo "<br>";

		$count = 1;
		echo '<td align="center">' . '</td>';
		echo "<table border='1' align=center>

<tr>

<th>ID</th>

<th>Username</th>

<th>Entry Date</th>

<th>Transaction Description</th>

<th>Debit</th>

<th>Credit</th>

<th>Statement Balance</th>

</tr>";
		while ($row = mysqli_fetch_assoc($query2)) {

			echo "<tr>";

			echo "<td>" . $row['ID'] . "</td>";

			echo "<td>" . $row['USERNAME'] . "</td>";

			echo "<td>" . $row['ENTRYDATE'] . "</td>";

			echo "<td>" . $row['TRANSACTIONDESC'] . "</td>";

			echo "<td>" . $row['DEBIT'] . "</td>";

			echo "<td>" . $row['CREDIT'] . "</td>";

			echo "<td>" . $row['STATEMENTBALANCE'] . "</td>";

			echo "</tr>";
			$count++;
		}
		echo "</table>";


		mysqli_close($conn);
	}
} else {
	echo "<script> getloss() </script>";
	echo "<script>location.href='../index.html';</script>";
	exit();
}
	?>

	<br><br>
	<div class="buttongrp">
		<button type=button class="bcol" onclick="location.href = 'userdashboard.php';">
			<h3>BACK TO DASHBOARD</h3>
		</button>
	</body>

</html>