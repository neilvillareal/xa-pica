<?php
	try
	{
		$dbconn = pg_connect("host=ec2-107-20-224-35.compute-1.amazonaws.com port=5432 dbname=dd9ro9d0e8ct4e user=bthvtxiidnfbib password=UEYeT1DTLrTVMKn1KWiFILPckF sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());									
			
		$query = sprintf("update categories
							set cat_id='%s',
							cat_name='%s',
							cat_desc='%s'
							where cat_id='%s'", 
							pg_escape_string($_POST['cat_code']), 
							pg_escape_string($_POST['cat_name']),
							pg_escape_string($_POST['cat_desc']),
							pg_escape_string($_POST['upKey']));
									
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