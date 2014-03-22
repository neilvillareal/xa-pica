<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
	    session_start();
		
		if(isset($_SESSION['username']))
		{
			header("Location: dashboard.php");
			exit(0);
		}
	    
	    include("header.php");
    ?>    
    
    <title>PICA</title>    
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li><a href="index.php">Home</a></li>          
          <li class="active"><a href="gallery.php">Gallery</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="signin.php">Sign In</a></li>
        </ul>
        <h3 class="text-muted">PICA</h3>
      </div>
    
    
    	
	  </div>
	      
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>	
