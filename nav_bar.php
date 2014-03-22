	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
          	</button>          
            <a class="navbar-brand" href="dashboard.php"><strong>PICA</strong></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="dashboard.php">Home</a></li>            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<b class="caret"></b></a>
              <ul class="dropdown-menu">
              	<li><a href="categories.php">Categories</a></li>
              	<li><a href="items.php">Items</a></li>
              </ul>
            </li>              
            <li><a href="messages.php">Messages</a></li>
            <li><a href="reviews.php">Reviews</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo strtoupper($_SESSION['username']); ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
              	<li><a href="print/index.php" target="_blank">List of Products</a></li>
              	<li class="divider"></li>
                <li><a href="logout.php">Sign Out</a></li>
              </ul>
            </li>
          </ul>	          
        </div><!--/.nav-collapse -->
      </div>
 </div>