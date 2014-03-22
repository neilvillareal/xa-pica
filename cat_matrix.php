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
		
	$query = sprintf("select * from categories order by cat_name");
	$result = pg_query($query);
	
	echo '<table class="matrix">
			<tr>
				<th class="cat_code">Category Code</th>
				<th class="cat_name">Category Name</th>
				<th class="cat_desc">Description</th>
				<th class="button"></th>
				<th class="button"></th>
			</tr>
		 ';
		 
		 
	if (pg_num_rows($result)>0)
	{
		while($row = pg_fetch_assoc($result))
		{
			echo '<tr>
					<td class="cat_name">' . $row["cat_id"] . '</td>
					<td class="cat_name">' . $row["cat_name"] . '</td>
					<td class="cat_desc">' . $row["cat_desc"] . '</td>
					<td class="button"><a href="edit_cat.php?cc=' . $row["cat_id"] . '">Edit</a></td>
					<td class="button"><a href="_cat_del.php?cc=' . $row["cat_id"] . '">Remove</a></td>
				 </tr>'; 
		}	
	}
			
	echo '</table>';	 
	pg_close();
?>