<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		include("session_checker.php");
	    include("header.php");		
	?>
	
	<link href="css/ord_matrix.css" rel="stylesheet">
	
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body>
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
					
		echo '<div class="row">';
		
		$query =sprintf("select * from products where cat_id='%s' order by prod_name", pg_escape_string($_GET['cc']));
  		$result = pg_query($query);
		
		while($row = pg_fetch_assoc($result))
		{
			printf(' <div class="col-sm-4">
			          <div class="panel panel-default">
			            <div class="panel-heading">
			              <h3 class="panel-title">%s</h3>
			            </div>
			            <div class="panel-body">
			              	<img src="%s" height="200px" width="150px"><br/>
			              	Product Code: %s<br/>
							Price: Php %s<br/>
							Description: %s<br/>
							Sizes: %s<br/><br/>
							<a href="edit_item.php?mm=%s&cc=%s">Edit</a> | 
							<a href="_items_del.php?mm=%s&cc=%s">Remove</a>
			            </div>
			          </div>
			        </div>', $row['prod_name'],
			        		 $row['img_url'],
  							 $row['prod_id'],
  							 $row['prod_price'],
							 $row['prod_desc'],
							 $row['sizes'],
							 $row['prod_id'],
							 $_GET['cc'],
							 $row['prod_id'],
							 $_GET['cc']);	
		}
		pg_close();
		
		echo ' </div>';
  	?>
  	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>