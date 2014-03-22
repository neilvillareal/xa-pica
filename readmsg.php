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
		
		if(!isset($_GET['q']))
		{
			header("Location: messages.php");
			exit(0);
		}
		
		try
		{
			$dbconn = pg_connect("host=ec2-107-20-224-35.compute-1.amazonaws.com port=5432 dbname=dd9ro9d0e8ct4e user=bthvtxiidnfbib password=UEYeT1DTLrTVMKn1KWiFILPckF sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());									
		}
		catch(Exception $ex)
		{
			echo $ex->getMessage(); 
			die;
		}
		
		$query = sprintf("select * from messages 
						where mid='%s'", pg_escape_string($_GET['q']));
		
		$result = pg_query($query);
		
		if(pg_num_rows($result)>0)
		{
			$row = pg_fetch_array($result);
		}
		else {
			header("Location: messages.php");
			exit(0);
		}
				
    	include_once("header.php"); 
	?>
    
    <title>PICA - Message</title>
        
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>
  	<div style="position: relative; float: right; padding-right: 30px;">
  		<a href="messages.php" class="btn btn-lg btn-primary">Back</a>
  	</div>
  	<br/><br/><br/>
  	<div style="position: relative; padding-left: 30px; padding-right: 30px;">
	<div class="panel panel-info">
		<div class="panel-heading">
		  <h3>Subject: <b><?php echo $row['subject']; ?></b></h3>
		  <h4>Sender: <b><?php echo $row['sender']; ?></b></h4>
		  <h6>Email Address: <b><?php echo $row['email_add']; ?></b></h6>
		  <h6>Time Received: <?php echo $row['ts']; ?></h6>
		</div>
		<div class="panel-body">
			<p><?php echo $row['msgcol']; ?></p>
		</div>
	</div>
	</div>
    
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>    
  </body>
</html>