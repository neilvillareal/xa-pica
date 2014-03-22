<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
	    include("header.php"); 
    ?>    

    <title>PICA - Contact Us</title>
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
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="about.php">About</a></li>
          <li class="active"><a href="contact.php">Contact Us</a></li>
          <li><a href="signin.php">Sign In</a></li>
        </ul>
        <h3 class="text-muted">PICA</h3>
      </div>
      
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title">Feel free to send us your message...</h3>
        </div>
        <div class="panel-body">
          	<form role="form" action="send_msg.php" method="post" enctype="multipart/form-data" id="sendMsg" name="sendMsg">
				<input type="text" class="form-control" id="sender" name="sender" placeholder="Sender Name" required autofocus><br/>
				<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required><br/>
				<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required><br/>
				<textarea class="form-control" id="msg" name="msg" placeholder="Message..." required></textarea><br/>	
				<br/>
				<button type="submit" class="btn btn-lg btn-primary">Send</button>
			</form>
        </div>
      </div>
     </div>
	      
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>