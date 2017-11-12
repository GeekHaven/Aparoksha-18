<?php
    require_once("head.php");
 ?>
<html lang="en" class="no-js">
	<head>
		<title>Platzen</title>
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/icons.css" />
		<link rel="stylesheet" type="text/css" href="css/rules.css" />
		<style>
			@font-face{
				font-family: fairview;
				src: url(Fairview.otf);
			}
			h1{
				font-family: fairview;
				font-size: 40px;
				color: #000000;
			}
			div.container ul {
				font-family: fairview;
				font-size: 25px;
				color:#000000;
			}
		</style>
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<h1 align="center">Rules</h1>
			<ul>
				<li>To participate in the event, you need to register first as an individual and join the event at LOCATION (to be updated).</li>
				<li>You will be taken to the next question only on correct answer for your present question.</li>
				<li>Do not use spaces in answers (Example: if answer is "you win" then submit your answer as "youwin").</li>
				<li>Anyone can participate in this event but to be eligible for winning the prizes the user must be registered in a university.</li>
				<li>Any user found indulging in foul play will be disqualified immediately.</li>
				<li>Organizers decision shall be treated as final.</li>
			</ul>
			<header class="codrops-header">
			<nav id="bt-menu" class="bt-menu">
				<a href="#" class="bt-menu-trigger"><span>Menu</span></a>
				<ul>
					<li><a href="index.php">Arena</a></li>
					<?php if(isset($_SESSION['log'])&&$_SESSION['log']) {
				 
					  	echo '<li><a href="../../models/logout.php">Logout</a></li>';
					  }?>
					<li><a href="leaderboard.php">Leaderboard</a></li>
					<li><a href="rules.php">Rules</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li><a href="https://www.facebook.com/Aparoksha.Platzen">Clues</a></li>
				</ul>
			</nav>
		</div><!-- /container -->
	</body>
	<script src="js/classie.js"></script>
	<script src="js/borderMenu.js"></script>
</html>
