<!DOCTYPE html>
<html>

<head>
	<title></title>
	<script type="text/javascript" src="../java.js"></script>
	<link rel="stylesheet" type="text/css" href="../indexstyle.css">
</head>

<body>

	<div class="daftarblank">
		<table class="tablemain">
			<tr>
				<td><img src="../image/mybank header.png" height="170px"></td>
			</tr>
		</table>
		<?php
		if (isset($_COOKIE["user"])) {
			include "../mysql_conn.php";

			$query = mysqli_query($ismatConn, "SELECT * FROM USER WHERE USERNAME = '$usernya'");
			$cookie = $query->fetch_assoc();

			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone_no = $_POST['phone_no'];
			$gen = $_POST['gender'];
			$birth = $_POST['birthday'];

			$query2 = "UPDATE USER SET NAME = '$name', EMAIL = '$email' , BIRTHDAY = '$birth',GENDER = '$gen',PHONENO = 'phone_no' where USERNAME = '$usernya'";
			if (mysqli_query($ismatConn, $query2)) {
				echo "<script> updateinfo(); </script>";
				echo "<script>location.href='update.php';</script>";

				mysqli_close($ismatConn);
			}
		} else {
			echo "<script> getloss() </script>";
			echo "<script>location.href='../index.html';</script>";
			exit();
		}
		?>
</body>

</html>