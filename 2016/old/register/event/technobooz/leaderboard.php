<?php

	require_once("head.php");


	
    
    $rankList = $ranks->getRankList();
    //$instt = $rank->getInstitute();
    //echo '<br><br><br><br><br>';
    
    //-1 = No Submission/No rank
    //echo $rank->getMyRank();

?>  
<html lang="en" class="no-js">
	<head>
		<link rel="shortcut icon" href="../favicon.ico">
	<!--	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/icons.css" /> !-->
		<link rel="stylesheet" type="text/css" href="css/leader.css" />
		
		<script src="js/modernizr.custom.js"></script>
		<style>
		@font-face {
    font-family: fairview;
    src: url(Fairview.otf);    
}

table,td,tr{
    font-family: fairview;
    border: none;
    padding-right: 100px;
    padding-left: 100px;
    padding-bottom: 10px;
    color: #000000;
    font-size: 25px; 
	}
		</style>
	</head>
	<body>
		<div class="container">
			<h1 style="padding-left:520px;font-family:fairview;font-size:40px;color:#000000;">Leaderboard</h1>
			<table align="center">
				<br>
				<tr>
					<th>Rank</th>
					<th>Username</th>
					<th>Institution</th>
					<th>Score</th>
				</tr>
				<?php 
				foreach($rankList as $rank=>$ranker){
					$instt = $ranks->getInstitute($ranker);
					?>
					<tr>
						<td><?php echo $rank ?></td>
						<td><?php echo $ranker ?></td>
						<td><?php echo $instt ?></td>
						<td><?php if($level->getscore($ranker) != -2)
										echo $level->getscore($ranker); 
						?></td>
					</tr>
				<?php } ?>

			</table>
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