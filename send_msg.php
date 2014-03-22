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
	
	$query = sprintf("insert into messages(msgcol, sender, subject, email_add, ts, mid) 
					values('%s', '%s', '%s', '%s', now(), '%s')",
					pg_escape_string($_POST['msg']),
					pg_escape_string($_POST['sender']), 
					pg_escape_string($_POST['subject']), 
					pg_escape_string($_POST['email']),
					$trid);
						
	pg_query($query);
	
	header("location: contact.php");
	exit;				
?>