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
			  
			  <li style = "float:right;" role="presentation" class="active"><a href="rules.php">Rules </a></li>
			  <li style = "float:right;" role="presentation"><a href="leader.php">Leaderboard </a></li>
			  <li style = "float:right;" role="presentation"><a href="contact.php">Contacts </a></li>
			 
			</ul>
			<div style = "padding-top: 25px;padding-bottom: 50px;" class="row-fluid">
				<div class="span2">
				</div>
				<div class="span10">
					<div class="jumbotron">
							<center><h3 style = "padding-top: 0px;padding-bottom: 25px;"><font="40">Rules :</font></h3></center>
							<ul style="font-family:cursive">
								<li>There will be about 15-20 levels.<br><br>
								<li>Only after successfully completing the first task you can move on to the next.<br><br> 
								<li>Levels are sorted in order of increasing difficulty. <br><br>
								<li>The first to solve maximum problems in least time will be the winner.<br><br>
								<li>To participate in the contest, interested candidates need to form a team of 1 or 2 members.<br><br> 
								<li>The more you answer and the faster your answer, the closer you get to capturing the winner’s flag.<br><br>
								<li>Internet service may or may not be provided. <br><br>
								<li>Final decision rests in the hands of organizers<br><br>


							</ul>
					</div>
				</div>
			 </div>
		</div>
	</body>
</html>