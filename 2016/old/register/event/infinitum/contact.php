<?php
    require_once("head.php");
 ?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Infinitum</title>
		
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/bootstrap.min.js"></script>
	</head>
	
	<body style="background-image:url(img/bg.jpg);background-size:cover;">
		
		
		<div style = "padding-top: 25px;padding-right: 50px;padding-bottom: 25px;padding-left: 50px;" class="container">
			<ul class="nav nav-pills">
			  <li style = "float:left;" role="presentation" ><a href="index.php">Home</a></li>
			  <?php if($_SESSION['log']) {
				 
			  	echo '<li style = "float:left;" role="presentation"><a href="http://aparoksha.iiita.ac.in/register/models/logout.php">Logout</a></li>';
			  }?>
			  
			  <li style = "float:right;" role="presentation"><a href="rules.php">Rules </a></li>
			  <li style = "float:right;" role="presentation"><a href="leader.php">Leaderboard </a></li>
			  <li style = "float:right;" role="presentation" class="active"><a href="contact.php">Contacts </a></li>
			  
			</ul>
			<div style = "padding-top: 25px;padding-bottom: 50px;" class="row-fluid">
				<div class="span2">
				</div>
				<div class="span10">
					<div class="jumbotron">
							<center><h3 style = "padding-top: 0px;padding-bottom: 25px;">Contacts :</h3></center>
							<div style="line-height:3em;">
								Man Mohan Mishra (+91-8756043120)<br>
								Rivu Das (+91-9818385207)<br>
								
							</div>
						
					</div>
				</div>
			 </div>
		</div>
	</body>
</html>