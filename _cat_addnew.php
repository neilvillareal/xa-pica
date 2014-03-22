<?php
	
	if(!isset($_POST['cat_name']) || !isset($_POST['cat_code']))
	{
		header("location: categories.php?err=0");
		exit();
	}
	
 	try
	{
		$dbconn = pg_connect("host=ec2-107-20-224-35.compute-1.amazonaws.com port=5432 dbname=dd9ro9d0e8ct4e user=bthvtxiidnfbib password=UEYeT1DTLrTVMKn1KWiFILPckF sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());
		
		$query = sprintf("select * from categories 
						where cat_id='%s' 
						or cat_name='%s'",
						pg_escape_string($_POST['cat_code']), 
						pg_escape_string($_SESSION['cat_name']));
					
		$result = pg_query($query);
		
		if (pg_num_rows($result)>0)
		{
			pg_close();
			header("location: categories.php?err=1");
			exit;
		}											
	
		$query = sprintf("insert into categories values('%s', '%s', '%s')", 
					pg_escape_string(strtoupper($_POST['cat_code'])), 
					pg_escape_string($_POST['cat_name']), 
					pg_escape_string($_POST['cat_desc']));
					
		pg_query($query);
		
		pg_close();

		header("location: categories.php?nt=1");
	}
	catch(Exception $ex)
	{		
		header("location: categories.php?err=3");
	}	
		
	exit(0); 	
?>