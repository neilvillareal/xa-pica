<form role="form" action="_items_addnew.php" method="post" enctype="multipart/form-data" id="addNewItem" name="addNewItem">
	<label for="item_code">Item Code: </label>
	<input type="text" class="form-control" id="item_code" name="item_code" placeholder="Item Code" required autofocus><br/>

	<label for="item_name">Item Name: </label>
	<input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name" required><br/>

	<label for="item_cat">Category: </label>
	<select class="form-control" id="item_cat" name="item_cat" required>
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
					
			$query = sprintf("select cat_id, cat_name from categories order by cat_name");
			$result = pg_query($dbconn, $query);
			
			while ($row = pg_fetch_assoc($result))
			{
				echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
			}
			pg_close();
    	?>
	</select>
	<br/>
	
	<label for="item_price">Price: </label>
	<input type="text" class="form-control" id="item_price" name="item_price" placeholder="Item Price" required><br/>
	
	<label for="item_desc">Description: </label>
	<input type="text" class="form-control" id="item_desc" name="item_desc" placeholder="Item Description"><br/>
	
	<label for="item_sizes">Sizes: </label>
	<input type="text" class="form-control" id="item_sizes" name="item_sizes" placeholder="Item Sizes"><br/>
	
	<label for="item_covnum">Cover Number: </label>
	<input type="text" class="form-control" id="item_covnum" name="item_covnum" placeholder="Cover Number" required><br/>
		
	<label for="img_url">Image URL: </label>
	<input type="text" class="form-control" id="img_url" name="img_url" placeholder="Image URL" required><br/>	
	<br/>
	
	<button type="submit" class="btn btn-lg btn-primary">Add</button>
</form>