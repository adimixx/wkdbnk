<?php
setcookie("user","",time()-(3600*30),'/');

if (isset($_COOKIE["user"])) header('Refresh: 0; url=?setcookie=done');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Out : Wakanda Bank</title>
	<script type="text/javascript" src="../java.js"></script>
	<link rel="stylesheet" type="text/css" href="../indexstyle.css">
</head>
<body>

<div class="daftarblank">
<table class="tablemain">
<tr><td><img src="../image/mybank header.png" height="170px"></td></tr>
</table>
<?php
if (!isset($_COOKIE["user"]))
{
	echo "<script> bye(); </script>";
	echo "<script>location.href='../index.html';</script>";
}
?>


</div>
</body>
</html>