<!DOCTYPE html>
<html>
<head>
	<title>Register :: Wakanda Bank</title>
	  <script type="text/javascript" src="../java.js"></script>
	  	<link rel="stylesheet" type="text/css" href="../indexstyle.css">
</head>
<body>
	<div class="daftarblank">
	<table class="tablemain">
		<tr><td><img src="../image/mybank header.png" height="170px"></td></tr>
	</table>

	<?php

	if (isset($_COOKIE["admin"]))
	{
		$nama = $_POST["name"];
		$emel = $_POST["email"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$birthday = $_POST["Birth"];
		$gender = $_POST["gender"];
		$nophone = $_POST["phone"];
		$acctype = $_POST["acctype"];
		$balance = $_POST["Balance"];

		include "../mysql_conn.php";

		$query = mysqli_query($conn,"INSERT INTO USER VALUES ('$username','$password','$nama','$emel','$birthday','$balance','$acctype','$gender','$nophone')");

		if($query)
		{
			echo "<script> save(); </script>";
			echo "<script>location.href='../vadmindash/admindashboard.php';</script>";
		}

		else
		{
			echo "<script> daftarfail(); </script>";
			echo "<script>location.href='registration';</script>";
		}
		
		mysqli_close($conn);
	}

	else
	{
		echo "<script> getloss(); </script>";
		echo "<script>location.href='../index.html';</script>";
		exit();
	}	
	
	?>
	</div>
	
</body>
</html>

