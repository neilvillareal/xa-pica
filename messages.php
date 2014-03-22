<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    	include("session_checker.php"); 
    	include("header.php"); 
    ?>    
    <title>PICA - Messages</title>
        
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <link href="css/items_context.css" rel="stylesheet">
    <link href="css/msg_matrix.css" rel="stylesheet">
  </head>
  <body>
	<?php require 'nav_bar.php'; ?>
	
	<div class="container">		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-warning">
					<div class="panel-heading">
					  <h3 class="panel-title">Messages</h3>
					</div>
					<div class="panel-body">
						<table class="matrix">
							<tr>
								<th class="sender">Sender</th>
								<th class="email">Email Address</th>
								<th class="subject">Subject</th>
								<th class="timerec">Time Received</th>
								<th class="button"></th>
							</tr>
							
							<?php
								try
								{
									$dbconn = pg_connect("host=ec2-107-20-224-35.compute-1.amazonaws.com port=5432 dbname=dd9ro9d0e8ct4e user=bthvtxiidnfbib password=UEYeT1DTLrTVMKn1KWiFILPckF sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());									
								}
								catch(Exception $ex)
								{
									echo $ex->getMessage(); 
									die;
								}
								
								$query = sprintf("select * from messages order by ts desc");
								$result = pg_query($query);
								
								
								while($row = pg_fetch_assoc($result))
								{
									echo '<tr>
											<td class="sender"> ' . $row["sender"] . '</td>
											<td class="email"> ' . $row["email_add"] . '</td>
											<td class="subject"> ' . $row["subject"] . '</td>
											<td class="timerec"> ' . $row["ts"] . '</td>
											<td class="button"><a href="readmsg.php?q=' . $row["mid"] . '">Read</a></td>
										</tr>';	
									
								}
							
							?>
							
						</table>
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