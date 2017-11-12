<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user']))
{
header("Location: home.php");
}


if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['pass']);
	
	$email = trim($email);
	$upass = trim($upass);
	
	$res=mysql_query("SELECT user_id, user_name, user_pass FROM users WHERE user_email='$email'");
	$row=mysql_fetch_array($res);
	
	$count = mysql_num_rows($res); // if uname/pass correct it must return row
	
	if($count == 1 && $row['user_pass']==md5($upass))
	{
		$_SESSION['user'] = $row['user_id'];
		header("Location: home.php");
	}
	else
	{
		?>
        <script>alert('Username / Password Seems Wrong !');</script>
        <?php
	}
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>APAROKSHA-2016</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="css/general.css" type="text/css" />
</head>
<body>
<div id="snow">
<nav>
    <ul class="nav">
        <li>
          <a href="index.php">
            <span class="icon-home"></span>
            <span class="screen-reader-text">Home</span>
          </a>
        </li></ul></nav>
<center>
<div id="login-form" class="center">
<form method="post" >
<table class="center "  border="0">
<tr>
<td><input type="text" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
<tr>
<td><button type="button" name="signup" onclick ="window.location.assign('register.php')">Create a New Account</button></td>


</tr>
</table>

</form>
</div>
</center>
</div>
</body>
</html>
