<div class="row">
 <div class="col-md-12">
  <div class="list-group">    
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
		$result = pg_query($query);
		
		while ($row = pg_fetch_assoc($result))
		{
			echo '<a class="list-group-item" target="menuFrame" href="view_items.php?cc=' . pg_escape_string($row['cat_id']) . '">' . $row['cat_name'] . '</a>';
		}
		
		pg_close();
    ?>    
  </div>
 </div>
</div>