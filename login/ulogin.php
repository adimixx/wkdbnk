<?php
$user = $_POST["user"];
$pass = $_POST["pass"];
include "../mysql_conn.php";


$message = "WRONG USER OR PASSWORD";

if ($ismatConn)
{
	$query = mysqli_query($ismatConn,"SELECT * FROM USER WHERE USERNAME ='$user' AND PASSWORD ='$pass'");
	if (mysqli_num_rows($query))
	{
		setcookie("user",$user,time() + (1800),'/');
		echo "<script>location.href='../userdash/userdashboard.php';</script>";
		exit();
	}
	else
	{
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script>location.href='../login/userlog.html';</script>";
		exit();
	}	
}

mysqli_close($ismatConn);

?>