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
	
	$query = sprintf("select * from products 
						inner join categories
						on products.cat_id=categories.cat_id 
						order by prod_name");	
	$result = pg_query($query);
	
	$data = array();
	$rowArr = array();
	
	$i=0;
	
	while($row = pg_fetch_assoc($result))
	{
		$rowArr['cat'] = trim($row['cat_name']);
		$rowArr['prod_id'] = trim($row['prod_id']);
		$rowArr['prod_name'] = trim($row['prod_name']);
		$rowArr['price'] = trim($row['prod_price']);
		$rowArr['desc'] = trim($row['prod_desc']);
		$rowArr['img_url'] = trim($row['img_url']);
		$rowArr['cov'] = $row['cov_num'];
		$rowArr['sizes'] = trim($row['sizes']);
		
		$data[$i] = $rowArr;
	  	$i++;
	}
	
	echo json_encode($data);

	pg_close();
	exit();
?>