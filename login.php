<?php
	session_start();
	   
	$uname = $_POST["username"];
	$pass = $_POST["password"];
	
	if(!isset($uname) || !isset($pass))
	{
		header("location: signin.php?err=true");
		exit(0);
	}
	
	try
	{
		$dbconn = pg_connect("host=ec2-107-20-224-35.compute-1.amazonaws.com port=5432 dbname=dd9ro9d0e8ct4e user=bthvtxiidnfbib password=UEYeT1DTLrTVMKn1KWiFILPckF sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());									
	}
	catch(Exception $ex)
	{
		echo $ex->getMessage(); 
		die;
	}
	
	$query = sprintf("select * from users 
						where username='%s' 
						and password=md5('%s')", 
						addslashes($uname), 
						addslashes($pass));
						
	$fetch=pg_query($query);
		
	if(pg_num_rows($fetch)>0)
	{
		$row = pg_fetch_assoc($fetch);
		$_SESSION['username'] = $row["username"];
		$_SESSION['lastname'] = $row["lastname"];
		$_SESSION['firstname'] = $row["firstname"];
	    header("location: dashboard.php");
	}
	else
	{	
		header("location: signin.php?err=true");
	}
		
	pg_close();	
	exit(0);
?>