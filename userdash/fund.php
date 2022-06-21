<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <script type="text/javascript" src="../java.js"></script>
</head>
<body>
<?php
$receiver=$_POST["receive"];
$amount=$_POST["amount"];
$desc=$_POST["desc"];
$dbname = "id5880613_wakandabank";

if (isset($_COOKIE["user"]))
{
	$usernya = $_COOKIE["user"];
	include "../mysql_conn.php";

	$conn = $ismatConn;

	$query = mysqli_query($conn,"SELECT * FROM USER WHERE USERNAME = '$usernya'");
	$cookie = $query->fetch_assoc();
	if($cookie["BALANCE"]>= $amount)
	{

		$query2 = mysqli_query($conn,"SELECT * FROM USER WHERE USERNAME ='$receiver'");
		
		if (mysqli_num_rows($query2))
	    {
    		$total2 = $query2->fetch_assoc();
    
    		$total = $amount+$total2["BALANCE"];
    
    		mysqli_query($conn,"UPDATE USER SET BALANCE = '$total' WHERE USERNAME = '$receiver'");
    
    		$amount2 = $cookie["BALANCE"] - $amount;
    
    		mysqli_query($conn,"UPDATE USER SET BALANCE = '$amount2' WHERE USERNAME = '$usernya'");
    		
    		$query2 = mysqli_query($conn,"SELECT * FROM USER WHERE USERNAME ='$receiver'");
    		$total2 = $query2->fetch_assoc();

    		$a = $total2["USERNAME"];
    		$b = $total2["BALANCE"];
     
    		$query3 = mysqli_query($conn,"INSERT INTO STATEMENT VALUES (NULL,'$a', CURRENT_TIME(), '$desc', '$amount', NULL,'$b')");
    
    		if($query3)
    		{
    		   	$query = mysqli_query($conn,"SELECT * FROM USER WHERE USERNAME = '$usernya'");
	            $cookie = $query->fetch_assoc();
    			$c = $cookie["USERNAME"];
    			$d = $cookie["BALANCE"];
    
    			$query4 = mysqli_query($conn,"INSERT INTO STATEMENT VALUES (NULL,'$c', CURRENT_TIME(), '$desc', NULL,'$amount','$d')");
    			if($query4)
    			{
    				$message = "TRANSACTION SUCCESSFULL";
    				echo "<script type='text/javascript'>alert('$message');</script>";
    				echo "<script>location.href='../userdash/userdashboard.php';</script>";
    				exit();			
    			}
    			else
            	{
            		$message = "TRANSACTION UNSUCCESSFULL";
            		echo "<script type='text/javascript'>alert('$message');</script>";
            		echo "<script>location.href='../userdash/userdashboard.php';</script>";
            		exit();			
            	}
    		}
    		
    		else
        	{
        		$message = "TRANSACTION UNSUCCESSFULL";
        		echo "<script type='text/javascript'>alert('$message');</script>";
        		echo "<script>location.href='../userdash/userdashboard.php';</script>";
        		exit();			
        	}
	    }
	    else
    	{
    		$message = "TRANSACTION UNSUCCESSFULL";
    		echo "<script type='text/javascript'>alert('$message');</script>";
    		echo "<script>location.href='../userdash/userdashboard.php';</script>";
    		exit();			
    	}
	}

	else 
	{
		$message = "INSUFFICIENT AMOUNT";
				echo "<script type='text/javascript'>alert('$message');</script>";
				echo "<script>location.href='../userdash/transfer.php';</script>";
				exit();		
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

