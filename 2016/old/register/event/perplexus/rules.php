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
	
	<body background = "img/demo-1-bg.jpg">
		
		
		<div style = "padding-top: 25px;padding-right: 50px;padding-bottom: 25px;padding-left: 50px;" class="container">
			<ul class="nav nav-pills">
			  <li style = "float:left;" role="presentation" ><a href="index.php">Home</a></li>
			  <?php if($_SESSION['log']) {
				 
			  	echo '<li style = "float:left;" role="presentation"><a href="http://aparoksha.iiita.ac.in/register/models/logout.php">Logout</a></li>';
			  }?>
			  <li style = "float:right;" role="presentation"><a href="https://www.facebook.com/pages/Perplexuz/761496347301070" target="_blank">Clues</a></li>
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
							<ul>
								<li>To participate in the event, you need to register first.<br><br></li>
								<li>Each question will consist of one or a collection of more than one pictures or photos.<br><br></li>
								<li>Each answer will be derivable from the image in the question, and will consist of one or a collection of words.<br><br></li>
								<li>The answer must be submitted in LOWER CASE letters. In case the answer is more than one word long, all the words must be written WITHOUT SPACES in between and submitted accordingly. If the answer is a number, submit it written in words.<br><br></li>
								<li>Each question correctly answered will fetch one point. There ill be no negative marks for wrong answers. So repeated trials are welcome.<br><br></li>
								<li>Questions can be answered only within the time frame alloted to the event, and not after it expires.<br><br></li>
								<li>In case of a draw, the time of submission will be the criteria for judging the winner, and no draw of any form will be an end result.<br><br></li>
								<li>In any other cases of conflict, the decision of the 'Perplexus Organizers Committee' will be final.<br><br></li>

							</ul>
					</div>
				</div>
			 </div>
		</div>
	</body>
</html>