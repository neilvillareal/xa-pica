<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
    	session_start();
	
		if(!isset($_SESSION['username']))
		{
			header("Location: signin.php");
			exit(0);
		}
		
    	include_once("header.php"); 
	?>
    
    <title>PICA - Dashboard</title>
        
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>
	<?php require 'nav_bar.php'; ?>
			
    
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>    
  </body>
</html>