<!DOCTYPE html>
<html>
<head>
	<title>balance </title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
   <link href="admindashboard.css" rel="stylesheet">

	<script type="text/javascript" src="../java.js"></script>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
</head>
<body>
    <header>
    <table>
        <tr>
            <td rowspan="3"><a href="admindashboard.php"><img src="../image/mybank header.png" height="100px"></a></td>
        </tr>
    </table>
</header>
<?php

if (isset($_COOKIE["admin"]))
{
$carian = $_POST["find"];
$host = "localhost";
$user = "id5880613_wakanda";
$pass = "wakanda";
$dbname = "id5880613_wakandabank";

include "../mysql_conn.php";
$conn = $ismatConn;

$query = mysqli_query($conn,"SELECT * FROM USER WHERE NAME LIKE '%$carian%' ");


echo "<h1>ACCOUNT INFORMATION"."<br>";
echo "<br>";
echo "<table>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Username</th>
    <th>Password</th>
    <th>Birthday</th>
    <th>Balance</th>
    <th>Account Type</th>
    <th>Mobile Phone</th>
    <th>Gender</th>
  </tr>";

  while($row = mysqli_fetch_assoc($query))
  {
    echo "<tr>
    	<td>".$row["NAME"]."</td>
        <td>".$row["EMAIL"]."</td>
        <td>".$row["USERNAME"]."</td>
        <td>".$row["PASSWORD"]."</td>
        <td>".$row["BIRTHDAY"]."</td>
        <td>".$row["BALANCE"]."</td>
        <td>".$row["ACCTYPE"]."</td>
        <td>".$row["PHONENO"]."</td>
        <td>".$row["GENDER"]."</td>
    </tr>";
    }
echo "</table>";

mysqli_close($conn);
}

else
    {
        echo "<script> getloss() </script>";
        echo "<script>location.href='../index.html';</script>";
        exit();
    }

?>

<br><br><a href="admindashboard.php">BACK TO DASHBOARD</a>
</body>
</html>
