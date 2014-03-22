<?php				
	try
	{
		$dbconn = pg_connect("host=ec2-107-20-224-35.compute-1.amazonaws.com port=5432 dbname=dd9ro9d0e8ct4e user=bthvtxiidnfbib password=UEYeT1DTLrTVMKn1KWiFILPckF sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());
				
		$query = sprintf("delete from products where prod_id='%s'", pg_escape_string($_GET['mm']));
		$result = pg_query($query);
		
		header("location: view_items.php?cc=".$_GET['cc']);
	}
	catch(Exception $e)
	{
		header("location: view_items.php?cc=".$_GET['cc']);
		die;
	}
	
	exit(0);
?>