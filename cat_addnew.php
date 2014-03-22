<form role="form" action="_cat_addnew.php" method="post" enctype="multipart/form-data" id="addNewCat" name="addNewCat">
	<input type="text" class="form-control" id="cat_code" name="cat_code" placeholder="Category Code" required autofocus><br/>
	<input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="Category Name" required><br/>
	<textarea class="form-control" id="cat_desc" name="cat_desc" placeholder="Description"></textarea><br/>
	<br/>
	<button type="submit" class="btn btn-lg btn-primary">Add</button>
</form>