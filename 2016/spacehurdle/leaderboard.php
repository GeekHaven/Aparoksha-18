<?php

session_start();
ob_start();
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once("../register/config/config.php");

require_once("../register/models/database.php");
require_once("../register/models/session.php");

require_once("../register/api/contentFunctions.php");

require_once("../register/business/Database_handler.class.php");
require_once("../register/business/Link.class.php");
require_once("../register/business/Error_handler.class.php");
require_once('../register/business/Logger.class.php');
require_once('../register/business/recaptcha.php');
$publickey = "6LeBe-gSAAAAAA-Hq1oEgFlTNluEsysgL9lb5Hx-";
 
//require_once('../register/includes/html_head.php'); 

$sql = "SELECT * FROM space_hurdle_users ORDER BY score DESC";
$params = array();
$result = DatabaseHandler::GetAll($sql, $params);
//print_r($result);
?>

<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="pragma" content="no-cache"/>
        <meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="keywords" content="aparoksha, space hurdle, flappy bird, gamemaker" />
	<meta name="description" content="An online desktop adaptation of flappy bird with a sci fi touch." />
	<meta name="author" content="Amritesh Singh" />
        <meta name ="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta charset="utf-8"/>

	<link type="text/css" rel="stylesheet" href="../register/css/materialize.min.css"  media="screen,projection"/>

        <!-- Set the title bar of the page -->
        <title>Space Hurdle</title>

        <!-- Set the background colour of the document -->
        <style>
		body {
			background: url('back.jpg') repeat;
		}
	</style>
    </head>
    <body>
	<nav style="position:fixed; background: #346F8D;">
	  <img src="f1.png" style="position: absolute; width: 10%; top: 105%;">
	  <div class="nav-wrapper" style="font-color:blue; a:hover{color:black}" >
	     <ul class="right hide-on-med-and-down">
	      <li><a href="../index.html">Aparoksha</a></li>
	      <li><a href="index.php">Game</a></li>
	    </ul>
	  </div>
	</nav>
	<table align="center" class="centered bordered" style="width: 75%;position: absolute;top: 25%;color: white;left: 15%;">
		<thead>
			<tr>
				<th width="20%">
					Rank
				</th>
				<th width="20%">
					Name
				</th>
				<th width="20%">
					Score
				</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach($result as $rank=>$ranker){
					?>
					<tr>
						<td><?php echo $rank + 1 ?></td>
						<td><?php echo $ranker['username'] ?></td>
						<td><?php echo $ranker['score'] ?></td>
					</tr>
				<?php } ?>
		</tbody>			
	</table>
    </body>
</html>
