<!DOCTYPE html>
<?php
    ob_start();
?>
<?php
    require_once("includes/session.php");
?>
<?php 
    if (isset($_POST['submit'])) {
	require_once("includes/functions.php");
	require_once("includes/header.php");
	require_once("seed/seed.php");

	extract($_POST);
	
	$login = new Login(EVENT, EVENT_SEED, $uid, $pwd, $dbh);
	
	switch ($login->login()) {
	    case "admin":
		echo "admin";
		break;
	    case "part":
		echo "part";
		break;
	    default:
		echo "Unknown Username and Password Combination.";
		break;
	}
    } else {
        $uid = "";
        $pwd = "";
    }
?>
<html>
    <body>
<?php
	$message = "LOGIN";
	if (isset($_GET['logout']) and $_GET['logout'] == 1) {
	        $message = "You have been successfully logged out.";
	} else if (isset($_GET['login_attempt']) and $_GET['login_attempt'] == 1) {
	    $message = "Unknown Username and Password Combination.";
	}
	print('	<div class="5grid-layout 5grid" id="page-wrapper">
		<div class="row">
			<div class="12u" align="center">
				<section id="pbox2">
					<h3><strong>' .  $message . '</strong></h3>
				</section>
			</div>
		</div>
	</div>');
?>

<div class="5grid-layout 5grid">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div class="row" align=center>
			<div class="12u">
				<section id="pbox2">
					<span>Username :</span><input type="text" name="uid" required="">
				</section>
			</div>
		</div>
		<div class="row" align=center>
			<div class="12u">
				<section id="pbox2">
					<span>Password :</span><input type="password" name="pwd" required="">
				</section>
			</div>
		</div>
		<br>
		<div class="row" align="center">
			<div class="12u">
				<section id="pbox1">
					<input id="button-style1" name="submit" type="submit" value="Login">
				</section>
			</div>
		</div>
	</form>
</div>

</body>
</html>
<?php
    ob_end_flush();
?>