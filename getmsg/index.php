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
	
	$dt = new DateTime;
	$trid = $dt->format("ymdhis");
	
	$query = sprintf("insert into reviews(prod_id, comment, email_add, ts, rid) 
					values('%s', '%s', '%s', now(), '%s')",
					pg_escape_string($_GET['prod']),
					pg_escape_string($_GET['cmt']),
					pg_escape_string($_GET['email']),
					$trid);
						
	if(pg_query($query))
	{
		echo "true";
	}
	else {
		echo "false";
	}
	
	exit;				
?>