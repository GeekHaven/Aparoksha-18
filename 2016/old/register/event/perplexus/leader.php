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
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Perplexuz</title>
		
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/bootstrap.min.js"></script>
	<style type="text/css">
		table, th, td {
		    border: 1px solid black;
		    border-collapse: collapse;
		}
		th,td {
		    padding: 15px;
		}
		.titles {
			font-weight: bold;
		}
	</style>
	</head>
	
	<body background = "img/demo-1-bg.jpg">
		
		
		<div style = "padding-top: 10px;padding-right: 30px;padding-bottom: 10px;padding-left: 30px;" class="container">
			<ul class="nav nav-pills">
			  <li style = "float:left;" role="presentation" ><a href="index.php">Home</a></li>
			  <?php if($_SESSION['log']) {
				 
			  	echo '<li style = "float:left;" role="presentation"><a href="http://aparoksha.iiita.ac.in/register/models/logout.php">Logout</a></li>';
			  }?>
			  <li style = "float:right;" role="presentation"><a href="https://www.facebook.com/pages/Perplexuz/761496347301070" target="_blank">Clues</a></li>
			  <li style = "float:right;" role="presentation"><a href="rules.php">Rules </a></li>
			  <li style = "float:right;" role="presentation" class="active"><a href="leader.php">Leaderboard </a></li>
			  <li style = "float:right;" role="presentation"><a href="contact.php">Contacts </a></li>
			</ul>
			<div style = "padding-top: 25px;padding-bottom: 50px;" class="row-fluid">
				<div class="span2">
				</div>
				<div class="span10">
					<div class="jumbotron">
							<center><h3 style = "padding-top: 0px;padding-bottom: 25px;">Leaderboard:</h3></center>
							<div class="row well well-lg">
								<table style="width:100%;">
									<tr class = "titles"><!--ADD THE STYLE FOR titles CLASS-->
										<td>Rank</td>
										<td>Names</td>
										<td>Institute</td>
										<td>Score</td>
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
							</div>
						
					</div>
				</div>
			 </div>
		</div>
	</body>
</html>