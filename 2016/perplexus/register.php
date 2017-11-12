<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['pass']));
	$first_name = mysql_real_escape_string($_POST['first_name']);
	$last_name = mysql_real_escape_string($_POST['last_name']);
	$ver_code = rand(100000,999999);

	$uname = trim($uname);
	$email = trim($email);
	$upass = trim($upass);
	$first_name = trim($first_name);
	$last_name = trim($last_name);
	$ver_code = trim($ver_code);

	// email exist or not
	$query = "SELECT user_email FROM users WHERE user_email='$email'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	
	if($count == 0){
		
		if(mysql_query("INSERT INTO users(user_name,user_email,user_pass,user_fname,user_lname,ver_code) VALUES('$uname','$email','$upass','$first_name','$last_name','$ver_code')"))
		{
			?>
			<script>alert('successfully registered ');</script>
			<?php
				header("Location: mail.php");
		}
		else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}		
	}
	else{
			?>
			<script>alert('Sorry Email ID already taken ...');</script>
			<?php
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="css/general.css" type="text/css" />

</head>
<body>
<center>
<div id = "snow">
<nav>
    <ul class="nav">
        <li>
          <a href="index.php">
            <span class="icon-home"></span>
            <span class="screen-reader-text">Home</span>
          </a>
        </li></ul></nav>
<div id="login-form">
<form method="post">
<table width="60%" border="0">
<tr>
<td><input type="text" name="first_name" placeholder="First Name" required /></td>
</tr>
<tr>
<td><input type="text" name="last_name" placeholder="Last Name" required /></td>
</tr>
<tr>
<td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Register</button></td>
</tr>
<tr>
<td><button type="button" name="button" onclick="window.location.assign('login.php')">Already Registered? Login here</button></td>

</tr>
</table>
</form>
</div>
</center></div>
</body>
</html>

