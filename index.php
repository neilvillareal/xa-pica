<!DOCTYPE html>
<html lang="en">
  <head>
    <?php	
	    include_once("header.php"); 
    ?>
        
	<title>PICA</title>    
    
    <link href="css/jumbotron-narrow.css" rel="stylesheet">    
    <link href="css/carousel.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>  
  <body>
  	<div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="dashboard.php">Home</a></li>          
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="signin.php">Sign In</a></li>
        </ul>
        <h3 class="text-muted">PICA</h3>
      </div>
      
      <div class="jumbotron-nar">
         <div id="mastGallery" class="carousel slide" data-ride="carousel">
	      <!-- Indicators -->
	      <ol class="carousel-indicators">
	        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	        <li data-target="#myCarousel" data-slide-to="1"></li>
	        <li data-target="#myCarousel" data-slide-to="2"></li>
	      </ol>
	      <div class="carousel-inner">
	        <div class="item active">
	          <div class="container">
	            <div class="carousel-caption">
	              
	            </div>
	          </div>
	        </div>
	        <div class="item">
	          <div class="container">
	            <div class="carousel-caption">
	              
	            </div>
	          </div>
	        </div>
	        <div class="item">
	          <div class="container">
	            <div class="carousel-caption">
	              
	            </div>
	          </div>
	        </div>
	      </div>
	      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
	      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	    </div><!-- /.carousel -->
      </div>
      
      <div class="row marketing">
        <div class="col-lg-6">
          <h4>Simple</h4>
	          <p>Easy to use with its user friendly web environment</p>
	          <h4>Cloud</h4>
	          <p>Powered by Heroku's Postgre Database.</p>
          </div>
		  <div class="col-lg-6">
	          <h4>Interactive</h4>
	          <p>Powered by the world's popular mobile operating system - Android. Compatible with the latest Android 4.4 KitKat version.</p>
          </div>
        </div>
      </div>
	      
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>	
