<?php
$adusername = $_POST["username"];
$adpassword = $_POST["password"];

include "../mysql_conn.php";

$message = "WRONG USER OR PASSWORD";
if (isset($adusername))
{
	$query = mysqli_query($ismatConn,"SELECT * FROM ADMIN WHERE USERNAME ='$adusername' AND PASSWORD ='$adpassword'");

	if (mysqli_num_rows($query))
	{
		setcookie("admin",$adusername,time() + (1800),'/');
		echo "<script>location.href='../vadmindash/admindashboard.php';</script>";
		exit();
	}
	else
	{
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script>location.href='../login/adminlog.html';</script>";
		exit();
	}	
}


mysqli_close($ismatConn);

?>