<!DOCTYPE html>
<html lang="en">
  <head>
    <?php		
		include("session_checker.php");
    	include("header.php"); 
	?>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="container">		
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-warning">
					<div class="panel-heading">
					  <h3 class="panel-title">Edit Item Info</h3>
					</div>
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
						
						$query =sprintf("select * from products where prod_id='%s'", pg_escape_string($_GET['mm']));
						$result = pg_query($dbconn, $query);
						
						$row = pg_fetch_assoc($result);						
						
					?>
					<div class="panel-body">						
						<form role="form" action="_items_edit.php" method="post" enctype="multipart/form-data" id="editItem" name="editItem">
							<input type="hidden" class="form-control" id="upkey" name="upkey" value="<?php echo $row['prod_id']; ?>">
							<input type="hidden" class="form-control" id="cc" name="cc" value="<?php echo $row['cat_id']; ?>">
							
							<label for="item_code">Item Code:</label>
							<input type="text" class="form-control" id="item_code" name="item_code" value="<?php echo $row['prod_id']; ?>" placeholder="Item Code" required autofocus><br/>
							
							<label for="item_name">Item Name:</label>
							<input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $row['prod_name'];?>" placeholder="Item Name" required><br/>
							
							<label for="item_cat">Category: </label>
							<select class="form-control" id="item_cat" name="item_cat" required>		
								<?php							    	
									
									$query = sprintf("select cat_id, cat_name from categories order by cat_name");
									$result = pg_query($query);
									
									while ($row2 = pg_fetch_assoc($result))
									{
										echo '<option value="' . $row2['cat_id'] . '">' . $row2['cat_name'] . '</option>';
									}
									pg_close($dbconn); 
						    	?>
							</select>
							<br/>
							
							<label for="item_price">Price:</label>
							<input type="text" class="form-control" id="item_price" name="item_price" value="<?php echo $row['prod_price']; ?>" placeholder="Price" required><br/>
							
							<label for="item_desc">Description:</label>
							<input type="text" class="form-control" id="item_desc" name="item_desc" value="<?php echo $row['prod_desc']; ?>" placeholder="Description"><br/>
							
							<label for="item_sizes">Sizes:</label>
							<input type="text" class="form-control" id="item_sizes" name="item_sizes" value='<?php echo $row['sizes']; ?>' placeholder="Sizes"><br/>
														
							<label for="item_covnum">Cover Number:</label>
							<input type="text" class="form-control" id="item_covnum" name="item_covnum" value="<?php echo $row['cov_num']; ?>" placeholder="Cover Number"required><br/>
																												
							<label for="img_url">Image URL:</label>
							<input type="text" class="form-control" id="img_url" name="img_url" value="<?php echo $row['img_url']; ?>" placeholder="Image URL" required><br/>
							
							<button type="submit" class="btn btn-lg btn-primary">Save</button>
							<a href="view_items.php?cc=<?php echo pg_escape_string($_GET['cc']); ?>"><button type="button" class="btn btn-lg btn-danger">Cancel</button></a>
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