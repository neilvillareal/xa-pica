<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
		include("session_checker.php");
	    include("header.php"); 
	?>
		
    <link href="css/cat_matrix.css" rel="stylesheet">
    <title>PICA - Categories</title>
    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<?php require_once'nav_bar.php'; ?>
	<div class="container">		
		<div class="row">				
		  <?php
		  	if(isset($_GET['err']))
			{
				printf('<div class="alert alert-danger">
						Error: ');
				
				switch ($_GET['err']) 
			  	{
					  case 0: printf("Category name or code is a empty.");	break;
					  case 1: printf("Category name or code already exists."); break;
					  case 2: printf("Invalid Image File"); break;					  
					  default: printf("An Error Occur."); break;
				 }
				
				printf('</div>');	
			}
			
			if(isset($_GET['nt']) && $_GET['nt']==1)
			{
				printf('<div class="alert alert-success">
							Successfully added new category.
						</div>');
			}	
			  	
		  ?>
			<div class="col-md-9">
				<div class="panel panel-warning">
					<div class="panel-heading">
					  <h3 class="panel-title">Categories</h3>
					</div>
					<div class="panel-body">
					  <?php require_once 'cat_matrix.php'; ?>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-info">
					<div class="panel-heading">
					  <h3 class="panel-title">Add New Category</h3>
					</div>
					<div class="panel-body">
					  <?php require_once 'cat_addnew.php'; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>