<?php
$userupdate = $_POST["user"];
$passupdate = $_POST["pass"];
$repass = $_POST["repass"];
$fmsg = "REPEAT PASSWORD NOT SAME WITH NEW PASSWORD";
$smsg = "YOUR PASSWORD HAS BEEN UPDATED";

include "../mysql_conn.php";


mysqli_query($conn, "UPDATE user SET PASSWORD = '$passupdate' WHERE USERNAME = '$userupdate'");

if ($passupdate != $repass)
{ 
	echo "<script type='text/javascript'>alert('$fmsg');</script>";
	echo "<script>location.href='../login/updateuser.html';</script>";
}
else if ($passupdate == $repass)
{
	echo "<script type='text/javascript'>alert('$smsg');</script>";
	echo "<script>location.href='../login/userlog.html';</script>";
}

mysqli_close($conn);

?>