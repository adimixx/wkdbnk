<!DOCTYPE html>
<html>
<head>
	<title>SEARCH FOR USER</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<link href="admindashboard.css" rel="stylesheet">
	<script type="text/javascript" src="../java.js"></script>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
</head>
<?php
if (isset($_COOKIE["admin"]))
{
	?>
<body>
<header>
	<table>
		<tr>
			<td rowspan="3"><a href="admindashboard.php"><img src="../image/mybank header.png" height="100px"></a></td>
		</tr>
	</table>
</header>
<h1>All accounts</h1> 
<input type="button" value="BACK" onclick="window.location.href='admindashboard.php'"/>
<h3>Savings,Current & Mudarabah IA accounts </h3>
<form action="carian.php" method="POST">
    Search Account : <input type="text" name="find">
    <input type="submit" value="find" onclick="cari()">
</form>

<br><br><a href="admindashboard.php">BACK TO DASHBOARD</a>

</body>
</html>
<?php 
}

else
	{
		echo "<script> getloss() </script>";
		echo "<script>location.href='../index.html';</script>";
		exit();
	}	
?>