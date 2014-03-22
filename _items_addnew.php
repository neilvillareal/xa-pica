<?php
	if(!isset($_POST['item_name']) || !isset($_POST['item_code']))
	{
		header("location: items.php?err=0");
		exit;
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
	
	$query = sprintf("select * from products 
						where prod_id='%s' 
						or prod_name='%s'",
						pg_escape_string($_POST['prod_code']), 
						pg_escape_string($_SESSION['prod_name']));
					
	$result = pg_query($query);
	
	if (pg_num_rows($result)>0)
	{
		pg_close();
		header("location: items.php?err=1");
		exit;
	}
		
	try
	{
		$query = sprintf("insert into products(
							cat_id,
							prod_id, 
							prod_name,
							prod_price,
							prod_desc,
							img_url,
							cov_num,
							sizes)
						values('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
						pg_escape_string(strtoupper($_POST['item_cat'])), 
						pg_escape_string(strtoupper($_POST['item_code'])),
						pg_escape_string($_POST['item_name']),
						pg_escape_string($_POST['item_price']), 
						pg_escape_string($_POST['item_desc']),
						pg_escape_string($_POST['img_url']),
						pg_escape_string($_POST['item_covnum']),
						pg_escape_string($_POST['item_sizes']));
						
		pg_query($query);		
		pg_close();
		
		header("location: items.php?nt=1");
	}
	catch(Exception $ex)
	{
		echo $ex->getMessage();
		header("location: items.php?err=3");
	}	
		
	exit;
?>