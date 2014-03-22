<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
    	include("header.php");
		include("session_checker.php"); 
	?>

    <title>PICA - Edit Category</title>
    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<?php require 'nav_bar.php'; 
	
		try
		{
			$dbconn = pg_connect("host=ec2-107-20-224-35.compute-1.amazonaws.com port=5432 dbname=dd9ro9d0e8ct4e user=bthvtxiidnfbib password=UEYeT1DTLrTVMKn1KWiFILPckF sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());									
		}
		catch(Exception $ex)
		{
			echo $ex->getMessage(); 
			die;
		}
		
		$query = sprintf("select * from categories where cat_id='%s'", pg_escape_string($_GET['cc']));
		$result = pg_query($query);
		
		if(pg_num_rows($result)<=0)
		{
			pg_close();
			header("location: categories.php");
		}
		else
		{
			$row = pg_fetch_assoc($result);	
		}
		
	?>
	<div class="container">		
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-warning">
					<div class="panel-heading">
					  <h3 class="panel-title">Categories</h3>
					</div>
					<div class="panel-body">
					  <form role="form" action="_cat_edit.php" method="post" id="editCat" name="editCat">
					  	<input type="hidden" class="form-control" id="upKey" name="upKey" value="<?php echo $row['cat_id']; ?>">
						
						<label for="cat_code">Category Code</label>
						<input type="text" class="form-control" id="cat_code" name="cat_code" value="<?php echo $row['cat_id']; ?>" placeholder="Category Code" required autofocus><br/><br/>
						
						<label for="cat_name">Category Name</label>
						<input type="text" class="form-control" id="cat_name" name="cat_name" value="<?php echo $row['cat_name']; ?>" placeholder="Category Name" required><br/><br/>
						
						<label for="cat_desc">Category Description</label>
						<input type="text" id="cat_desc" class="form-control" name="cat_desc" placeholder="Description" value="<?php echo $row['cat_desc']; ?>"><br/><br/>
																		
						<div align="right">
							<button type="submit" class="btn btn-lg btn-danger">Update</button>
							<a href="categories.php"><button type="button" class="btn btn-lg btn-primary">Cancel</button></a>
						</div>						
						
					  </form>
					</div>
				</div>
			</div>	
		</div>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>