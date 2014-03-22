<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    	include("session_checker.php"); 
    	include("header.php"); 
    ?>    
    <title>PICA - Products</title>
        
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <link href="css/items_context.css" rel="stylesheet">
  </head>
  <body>
	<?php require 'nav_bar.php'; ?>
	
	<div class="container">		
		<div class="row">
		   <?php
		  	if(isset($_GET['err']))
			{
				printf('<div class="alert alert-danger">
						Error: ');
				
				switch ($_GET['err']) 
			  	{
					  case 0: printf("Product name or code is a empty.");	break;
					  case 1: printf("Product name or code already exists."); break;
					  case 2: printf("Invalid Image File"); break;					  
					  default: printf("An Error Occur."); break;
				 }
				
				printf('</div>');	
			}
			
			if(isset($_GET['nt']) && $_GET['nt']==1)
			{
				printf('<div class="alert alert-info">
							Successfully added new item.
						</div>');
			}  	
		  ?>			
			<div class="col-md-8">
				<div class="panel panel-warning">
					<div class="panel-heading">
					  <h3 class="panel-title">Item</h3>
					</div>
					<div class="panel-body">
					  <?php include 'items_screen.php'; ?>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-success">
					<div class="panel-heading">
					  <h3 class="panel-title">Add New Item</h3>
					</div>
					<div class="panel-body">
					  <?php include 'items_addnew.php'; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>