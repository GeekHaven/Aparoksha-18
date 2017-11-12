<?php
    require_once("head.php");
 ?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Perplexuz</title>
		
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/bootstrap.min.js"></script>
	</head>
	
	<body style="background-image:url(img/bg2.jpg);background-size:cover;">
		
		
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
							<div class="container">
							<div class="row">
								<div class="col-sm-4">
									<div class="team-member">
										<img src="img/team/1.jpg" class="img-responsive img-circle" alt="">
										<h4 id="contacts">Vipul Jain</h4>
										<ul class="list-inline social-buttons"><li>
										<p class="text-muted">+918303478458</p>
										<a href="https://www.facebook.com/Vjaiin?fref=ts"><i class="fa fa-facebook"></i></a></li></ul>
									</div> 
								</div>
								<div class="col-sm-4">
									<div class="team-member">
										<img src="img/team/2.png" class="img-responsive img-circle" alt="">
										<h4>Vivek Anand</h4>
										<p class="text-muted">+919616367797</p>
										<ul class="list-inline social-buttons"><li>
										<a href="https://www.facebook.com/Vivek.TheDeadMan?fref=ts"><i class="fa fa-facebook"></i></a></li></ul>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="team-member">
									<img src="img/team/3.jpg" class="img-responsive img-circle" alt="">
									<h4>Namit Agrawal</h4>
									<p class="text-muted">+9186048330834</p>
									<ul class="list-inline social-buttons"><li>
									<a href="https://www.facebook.com/namitagrwl?fref=ts"><i class="fa fa-facebook"></i></a></li></ul>
									</div>
								</div>
				
							</div>
						</div>
					
						
					</div>
				</div>
			 </div>
		</div>
	</body>
</html>