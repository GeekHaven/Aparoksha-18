<?php
    require_once("head.php");
 ?>
<html lang="en" class="no-js">
	<head>
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
				<li>The event starts on 21 March 2015 at   00:00 hrs.

				<li>It is a 1 day event closing on 21 March 2015 at 23:59 hrs.

				<li>To participate in the event, you need to register first as an individual  and join the event (<a href="https://www.facebook.com/Technobooze" target="_blank">https://www.facebook.com/Technobooze</a>).
				<li>For each level, analyse the image and figure out the respective answer that will grant you the access to the next level.
				<li>The levels in the event will be cleared sequentially.
				<li>Clues for each level would be updated at regular intervals on the <a href="https://www.facebook.com/Technobooze" target="_blank">FACEBOOK page.</a>
				<li>The answers have to be in small case. Numerals and Special Characters would not be present. Ex- if the answer is "2" then you have to write "two" in the box.
				<li>The levels can be discussed at the FACEBOOK event page of Technobooze. Please do not put spoilers or answers in the page. 
				<li>Anybody found doing so will automatically be disqualified.
				<li>As the difficulty level increase, so does our reluctance to give out obvious clues. We also promise to make a conscious effort to mislead you.
				<li>Last but not the least, for any queries regarding the hunt or registration, feel free to contact The Team.
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
				</ul>
			</nav>
		</div><!-- /container -->
	</body>
	<script src="js/classie.js"></script>
	<script src="js/borderMenu.js"></script>
</html>
