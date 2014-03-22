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
	
	try
	{
		$query = sprintf("update products
							set cat_id='%s',
							prod_id='%s', 
							prod_name='%s',
							prod_price='%s', 
							prod_desc='%s',
							img_url='%s',
							cov_num='%s',
							sizes='%s'
							where prod_id='%s'",
						pg_escape_string(strtoupper($_POST['item_cat'])), 
						pg_escape_string(strtoupper($_POST['item_code'])),
						pg_escape_string($_POST['item_name']),
						pg_escape_string($_POST['item_price']),
						pg_escape_string($_POST['item_desc']),
						pg_escape_string($_POST['img_url']),
						pg_escape_string($_POST['item_covnum']),
						pg_escape_string($_POST['item_sizes']),					    
						pg_escape_string($_POST['upkey']));
						
		$result = pg_query($query);	
		pg_close();
				
		header("location: view_items.php?cc=".$_POST['cc']);
	}
	catch(Exception $e)
	{
		header("location: view_items.php?cc=".$_POST['cc']);
		die;
	}
?>