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
        
    <title>PICA - Sign In</title>
    
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    
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
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li class="active"><a href="signin.php">Sign In</a></li>
        </ul>
        <h3 class="text-muted">PICA</h3>
      </div>
      
      <div class="container">
    	<!--<div class="page-header">
    		<h2 align="center">Product Interactive Catalogue App</h2>
    	</div>-->
		<form class="form-signin" role="form" id="loginForm" name="loginForm" method="post" action="login.php">
			<input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
			<button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
			<?php
				if(isset($_GET['err']))
				{
					echo '<br/><br/>
						  <div class="alert alert-danger">
							<h4>Invalid username or password</h4>
						  </div>';
				}
			?>
		</form>
       </div>
	  </div>
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>	
