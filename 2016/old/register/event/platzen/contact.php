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
		<link rel="stylesheet" type="text/css" href="css/contact.css" />
		<style>
			@font-face{
				font-family: fairview;
				src: url(Fairview.otf);
			}
			table,tr,td,th {
				border: none;
				padding-left: 140px;
				padding-right: 140px;
				padding-bottom: 30px;
				font-family:fairview;
				font-size: 30px;
				color: #000000;
			}
			h1 {
				font-family: fairview;
				font-size: 40px;
				color: #000000;
			}
		</style>
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">

			<h1 align="center">Organizers</h1>
			<br><br><br>
			<table align="center">
				<tr>
					<th>Shubham Nanda</th>
					<th>Samarth Goyal</th>
				</tr>
				<tr>
					<td>+918176026012</td>
					<td>+919936243076</td>
				</tr>
			</table>
			<header class="codrops-header">
			<nav id="bt-menu" class="bt-menu">
				<a href="#" class="bt-menu-trigger"><span>Menu</span></a>
				<ul>
					<li><a href="index.php">Arena</a></li>
					<?php if(isset($_SESSION['log'])&&$_SESSION['log']){
				 
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
