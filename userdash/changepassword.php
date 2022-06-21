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
		<tr><td><img src="../image/mybank header.png" height="170px"></td></tr>
	</table>
<?php
	 if (isset($_COOKIE["user"]))
	 {
		  $usernya = $_COOKIE["user"];
		  include "../mysql_conn.php";

		  $cookie = $query->fetch_assoc();

		  if($cookie["PASSWORD"] == $_POST['currentpwd'])
		  {

			$password = $_POST['newpwd'];
			
			$query2 = "UPDATE USER SET PASSWORD = '$password' where USERNAME = '$usernya'";
			if(mysqli_query($ismatConn, $query2))
			{ 
				echo "<script> updatepwd(); </script>";
				echo "<script>location.href='update.php';</script>";

				mysqli_close($ismatConn);
			}
		}
		else
		{
			echo "<script> wrongpwd(); </script>";
			echo "<script>location.href='update.php';</script>";
		} 

	}
	else
	{
		echo "<script> getloss() </script>";
		echo "<script>location.href='../index.html';</script>";
		exit();
	}	
	?>
</body>
</html>

