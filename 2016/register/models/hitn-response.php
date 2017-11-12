<?php
$valid_passwords = array ("hitn" => "h4ck17N");
$valid_users = array_keys($valid_passwords);

$event = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($event, $valid_users)) && ($pass == $valid_passwords[$event]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="EVENT password"');
  header('HTTP/1.0 401 Unauthorized');
  die ("Not authorized");
} 

$sql = "SELECT * FROM hitn_users";
$params = array();
$result = DatabaseHandler::GetAll($sql, $params);
?>

<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="pragma" content="no-cache"/>
        <meta name="apple-mobile-web-app-capable" content="yes" />	
        <meta name ="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta charset="utf-8"/>

	<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

        <!-- Set the title bar of the page -->
        <title>HITN Registration Response</title>

        <!-- Set the background colour of the document -->
        
    </head>
    <body>
	<nav style="position:fixed; background: #346F8D;">
	  <div class="nav-wrapper" style="font-color:blue; a:hover{color:black}" >
	     <ul class="right hide-on-med-and-down">
	      <li><a href="../index.html">Aparoksha</a></li>
	    </ul>
	  </div>
	</nav>
	<table align="center" class="centered bordered" style="width: 75%;position: absolute;top: 25%;color: white;left: 15%;">
		<style>
		td {
			padding-left: 0px !important;
		}
		</style>
		<thead>
			<tr>
				<th width="10%">
					Name
				</th>
				<th width="10%">
					Accomodation
				</th>
				<th width="10%">
					Email
				</th>
				<th width="10%">
					Experience
				</th>
				<th width="10%">
					GithubId
				</th>
				<th width="10%">
					Resume
				</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach($result as $index=>$user){
					?>
					<tr>
						<td><?php echo $user['mhl_username'] ?></td>
						<td><?php echo $user['accomodation'] ?></td>
						<td><?php echo $user['mhl_email'] ?></td>
						<td><?php echo $user['userexp'] ?></td>
						<td><?php echo '<a href="https://github.com/' . $user['github_id'].'">' .  $user['github_id'] .'</a>' ?></td>
						<td><?php echo '<a href="resume/' . $user['resume'] . '">View Here</a>' ?></td>
					</tr>
				<?php } ?>
		</tbody>			
	</table>
    </body>
</html>
