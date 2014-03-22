<?php
	try
	{
		$dbconn = pg_connect("host=ec2-107-20-224-35.compute-1.amazonaws.com port=5432 dbname=dd9ro9d0e8ct4e user=bthvtxiidnfbib password=UEYeT1DTLrTVMKn1KWiFILPckF sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());									
	}
	catch(Exception $ex)
	{
		echo $ex->getMessage(); 
		die;
	}
	
    if(!isset($_GET['cc']))
	{
		header("location: categories.php?err=3");
		exit(0);
	}
		
	try
	{
		
		$query = sprintf("delete from categories where cat_id='%s'", pg_escape_string($_GET['cc']));
		$result = pg_query($query);
		
		pg_close();
		
		header("location: categories.php");
	}
	catch(Exception $e)
	{
		header("location: categories.php?err=4");
		die;
	}
	
	exit(0);
?>